<?php

namespace App\Http\Controllers\admin;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::paginate(10);

        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->title;
        $input['slug'] = $input['slug'] ? make_slug($input['slug']) : make_slug($input['title']);

        $rules = [
            'title' => 'required|min:3',
        ];

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('course.create')->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'course');
                $input[$image] = $imageName;
            }
        }

        $course = Course::create($input);

        return redirect()->route('course.index')->with('success', 'Course added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->title;
        $input['slug'] = $input['slug'] ? make_slug($input['slug']) : make_slug($input['title']);

        $rules = [
            'title' => 'required|min:3',
        ];

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('course.edit', $course)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {

                if ($course->$image != '') {
                    $file = $course->$image;
                    removeFile($file);
                }

                $imageName = fileUpload($request, $image, 'course');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete' . $image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($course->$image != '') {
                    $file = $course->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }

        $course->update($input);

        return redirect()->route('course.index')->with('success', 'Course Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($course->$image != '') {
                $file = $course->$image;
                removeFile($file);
            }
        }

        $course->delete();

        return redirect()->route('course.index')->with('success', 'Course Deleted successfully.');
    }
}
