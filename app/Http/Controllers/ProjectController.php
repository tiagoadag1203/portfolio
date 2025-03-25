<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        try {
            Project::create($request->all());
            return back()->with('success', 'Projeto criado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao criar projeto!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        try {
            Project::find($id)->update($request->all());
            return back()->with('success', 'Projeto atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar projeto!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Project::destroy($id);
            return back()->with('success', 'Projeto deletado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao deletar projeto!');
        }
    }
}
