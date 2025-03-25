<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'skill_type' => 'required|in:hard,soft',
            'percentage' => 'nullable|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|string'
        ]);

        try {
            Skill::create($request->all());
            return back()->with('success', 'Habilidade criada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao criar habilidade!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'skill_type' => 'required|in:hard,soft',
            'percentage' => 'nullable|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|string'
        ]);

        try {
            Skill::find($id)->update($request->all());
            return redirect()->route('skills.index')->with('success', 'Habilidade atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar habilidade!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Skill::destroy($id);
            return redirect()->route('skills.index')->with('success', 'Habilidade deletada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao deletar habilidade!');
        }
    }
}
