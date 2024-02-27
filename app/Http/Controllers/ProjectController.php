<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProjectRequest;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('pages.projects.index', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('pages.projects.show', compact('project'));
    }

    public function create()
    {
        $types = type::all();
        $technologies = Technology::all();

        return view('pages.projects.create', compact('types', 'technologies'));
    }

    public function store(EditProjectRequest $request)
    {

        $data = $request->all();

        $type = Type::find($data['type_id']);

        $project = new Project();

        $project->title = $data['title'];
        $project->description = $data['description'];

        $project->Type()->associate($type);

        $project->save();

        $project->technologies()->attach($data['technology_id']);

        return redirect()->route('project.index');
    }

    public function edit($id)
    {

        $project = Project::find($id);

        $types = Type::all();
        $technologies = Technology::all();

        return view('pages.projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update(EditProjectRequest $request, $id)
    {

        $data = $request->all();

        $type = Type::find($data['type_id']);

        $project = Project::find($id);

        $project->title = $data['title'];
        $project->description = $data['description'];

        $project->Type()->associate($type);

        $project->save();

        $project->technologies()->sync($data['technology_id']);

        return redirect()->route('project.index');
    }

    public function delete($id)
    {
        $project = Project::find($id);

        $project->technologies()->sync([]);

        $project->delete();

        return redirect()->route('project.index');
    }
}
