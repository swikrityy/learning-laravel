<?php

namespace App\Http\Controllers\admin;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teams = Team::paginate(10);

        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $input = $request->all();

        $rules = [
            'name' => 'required|min:3',
        ];

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('team.create')->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'team');
                $input[$image] = $imageName;
            }
        }

        $team = Team::create($input);

        return redirect()->route('team.index')->with('success', 'Team added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
        $input = $request->all();

        $rules = [
            'name' => 'required|min:3',
        ];

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('team.edit', $team)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {

                if ($team->$image != '') {
                    $file = $team->$image;
                    removeFile($file);
                }

                $imageName = fileUpload($request, $image, 'team');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete'.$image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($team->$image != '') {
                    $file = $team->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }

        $team->update($input);

        return redirect()->route('team.index')->with('success', 'Team Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($team->$image != '') {
                $file = $team->$image;
                removeFile($file);
            }
        }

        $team->delete();

        return redirect()->route('team.index')->with('success', 'Team Deleted successfully.');
    }
}
