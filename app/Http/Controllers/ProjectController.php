<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProjectController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $projects = Auth::user()->projects;

    return Inertia::render("Projects/Dashboard", [
      "projects" => $projects
    ]);
  }

  public function form()
  {
    return Inertia::render("Projects/ProjectForm");
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreProjectRequest $request)
  {
    $validated = $request->validated();

    try {
      Project::create($validated);

      return redirect("/projects")->with("message", [
        "type" => "success",
        "content" => "Projeto salvo com suceso!"
      ]);
    } catch (\Throwable $th) {
      return redirect()->back()->with("message", [
        "type" => "error",
        "content" => "Erro ao salvar o projeto."
      ]);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Project  $project
   * @return \Illuminate\Http\Response
   */
  public function show(Project $project)
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Project  $project
   * @return \Illuminate\Http\Response
   */
  public function destroy(Project $project)
  {
    //
  }
}