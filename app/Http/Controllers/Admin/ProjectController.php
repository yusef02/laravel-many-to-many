<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $techs = Technology::all();
        return view('admin.projects.create', compact('types', 'techs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $add_project = new Project();
        $add_project->fill($data);
        if (array_key_exists('image', $data)) {
            $image_path = Storage::disk('public')->put('uploads/projects', $data['image']);
            $add_project->image_path = $image_path;
        }
        $add_project->save();

        if (array_key_exists('techs', $data)) $add_project->technology()->attach($data['techs']);


        return redirect()->route('admin.projects.show', $add_project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $techs = Technology::all();
        return view('admin.projects.edit', compact('types', 'project', 'techs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->update($data);
        if (array_key_exists('image', $data)) {
            if (!empty($project->image_path)) Storage::delete($project->image_path);
            $image_path = Storage::disk('public')->put('uploads/projects', $data['image']);
            $project->image_path = $image_path;
        }
        $project->save();
        if (array_key_exists('techs', $data)) $project->technology()->sync($data['techs']);


        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
