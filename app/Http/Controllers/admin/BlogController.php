<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $blogs = Blog::paginate(10);

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.blog.create');
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
        $imagelist = ['image', 'featured_image_1', 'featured_image_2'];
        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->route('blog.create')->withInput()->withErrors($validator);
        }
        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'blog');
                $input[$image] = $imageName;
            }
        }
        $blog = Blog::create($input);

        return redirect()->route('blog.index')->with('success', 'Blog added successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
        return view('admin.blog.edit', compact('blog'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //

        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->title;
        $input['slug'] = $input['slug'] ? make_slug($input['slug']) : make_slug($input['title']);

        $rules = [

            'title' => 'required|min:3',

        ];

        $imagelist = ['image', 'featured_image_1', 'featured_image_2'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('blog.edit', $blog)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                if ($blog->$image != '') {
                    $file = $blog->$image;
                    removeFile($file);
                }
                $imageName = fileUpload($request, $image, 'blog');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete'.$image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($blog->$image != '') {
                    $file = $blog->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }
        $blog->update($input);
        return redirect()->route('blog.index')->with('success', 'Blog Updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $imagelist = ['image', 'featured_image_1', 'featured_image_2'];
        foreach ($imagelist as $image) {
            if ($blog->$image != '') {
                $file = $blog->$image;
                removeFile($file);
            }
        }
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Blog Deleted successfully.');
    }
}
