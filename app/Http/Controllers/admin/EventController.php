<?php

namespace App\Http\Controllers\admin;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $events = Event::paginate(10);

        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.event.create');
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
            'name' => 'required|min:3',
        ];
        $imagelist = ['image', 'banner_image'];
        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->route('event.create')->withInput()->withErrors($validator);
        }
        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'event');
                $input[$image] = $imageName;
            }
        }
        $event = Event::create($input);

        return redirect()->route('event.index')->with('success', 'event added successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
        return view('admin.event.edit', compact('event'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //

        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->title;
        $input['slug'] = $input['slug'] ? make_slug($input['slug']) : make_slug($input['title']);

        $rules = [

            'name' => 'required|min:3',

        ];

        $imagelist = ['image', 'banner_image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('event.edit', $event)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                if ($event->$image != '') {
                    $file = $event->$image;
                    removeFile($file);
                }
                $imageName = fileUpload($request, $image, 'event');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete'.$image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($event->$image != '') {
                    $file = $event->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }
        $event->update($input);
        return redirect()->route('event.index')->with('success', 'event Updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $imagelist = ['image', 'banner_image'];
        foreach ($imagelist as $image) {
            if ($event->$image != '') {
                $file = $event->$image;
                removeFile($file);
            }
        }
        $event->delete();
        return redirect()->route('event.index')->with('success', 'event Deleted successfully.');
    }
}
