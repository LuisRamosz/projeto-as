<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
{
    $workshops = Workshop::all();
    return view('workshops.index', compact('workshops'));
}

public function create()
{
    return view('workshops.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'location' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);
    $imageName =  time().'.'.$request->image->extension();
    $request->image->move(public_path('images'), $imageName);

    $workshop = new Workshop();
    $workshop->title = $request->title;
    $workshop->location = $request->location;
    $workshop->description = $request->description;
    $workshop->image = 'images/'.$imageName;
    
    $workshop->save();

    return redirect('workshops')->with('success', 'Workshop created successfully.');
}

public function edit($id)
{
    $workshop = Workshop::findOrFail($id);
    return view('workshops.edit', compact('workshop'));
}

public function update(Request $request, $id)
{
    $workshop = Workshop::findOrFail($id);
    $workshop->update($request->all());

    $workshop->title = $request->title;
    $workshop->location = $request->location;
    $workshop->description = $request->description;

    if(!is_null($request->image)) {
        $imageName =  time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $workshop->image = 'images/'.$imageName;
    }
    $workshop->save();

    return redirect('workshops')->with('success', 'Workshop updated successfully.');
}

public function destroy($id)
{
    $workshop = Workshop::findOrFail($id);
    $workshop->delete();
    return redirect('workshops')->with('success', 'Workshop deleted successfully.');
}
}
