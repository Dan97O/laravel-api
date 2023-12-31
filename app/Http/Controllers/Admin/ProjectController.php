<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Response;
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

        //$projects = Auth::user()->projects()->orderByDesc('id')->get();
        $projects = Project::orderByDesc('id')->paginate(8);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::orderByDesc('id')->get();
        $technologies = Technology::orderByDesc('id')->get();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        //dd($request->all());

        $val_data = $request->validated();

        $slug = Project::generateSlug($val_data['title']);
        //dd($slug);
        $val_data['slug'] = $slug;
        //dd($val_data);

        //$val_data['user_id'] = Auth::id();

        if ($request->hasFile('cover_image')) {
            $image_path = Storage::put('uploads', $request->cover_image);
            //dd($image_path);

            $val_data['cover_image'] = $image_path;
        }

        // Create the new Post
        $new_project = Project::create($val_data);

        if ($request->has('technologies')) {
            $new_project->technologies()->attach($request->technologies);
        }

        // redirect back
        return to_route('admin.projects.index')->with('message', 'Project Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //dd($project);
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
        $types = Type::orderByDesc('id')->get();
        $technologies = Technology::orderByDesc('id')->get();

        /*   if (Auth::id() === $project->user_id) {
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
        };
        abort(403); */
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        /* $val_data = $request->validate([
        'title' => 'required|max:150',
        'cover_image' => 'nullable',
        'content' => 'nullable',
        'date_time' => 'nullable|date',
        ]); */
        $val_data = $request->validated();

        $slug = Project::generateSlug($val_data['title']);
        //dd($slug);
        $val_data['slug'] = $slug;
        //dd($val_data);

        if ($request->hasFile('cover_image')) {

            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }

            $image_path = Storage::put('uploads', $request->cover_image);
            //dd($image_path);
            $val_data['cover_image'] = $image_path;
        }

        $project->update($val_data);

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }

        return to_route('admin.projects.index')->with('message', 'Project Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::delete($project->cover_image);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Project deleted');
    }

    public function shows()
    {

    }
}
