<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('team.index')->with('teams', Team::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'image' => 'required'
        ]);

        $image = $request->image;
        $image_new = time().$image->getClientOriginalName();
        $image->move('uploads/', $image_new);

        $team = Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'image' => 'uploads/'.$image_new,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin
        ]);

        session()->flash('success', 'New team memmber added successfully');
        return redirect(route('teams.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('team.edit')->with('team', $team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required'
        ]);

        if(request()->hasFile('image')){
            
            $image = $request->image;
            $image_new = time(). $image->getClientOriginalName();
            $image->move('uploads/', $image_new);
            $team->image = 'uploads/'. $image_new;
        }
          $team->update([
             'name' => $request->name,
             'position' => $request->position,
             'facebook' => $request->facebook,
             'twitter' => $request->twitter,
             'instagram' => $request->instagram,
             'linkedin' => $request->linkedin
             
          ]);

          session()->flash('success', 'Team member profile updated succesfully.');
          return redirect(route('teams.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        if(file_exists($team->image)){
            unlink($team->image);
        }

        $team->delete();
        session()->flash('success', 'Team member deleted successfully.');
        return redirect()->back();
    }
}
