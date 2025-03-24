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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        Skill::create($request->all());
        return redirect()->route('skills.index')->with('success', 'Habilidade criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

        Skill::find($id)->update($request->all());
        return redirect()->route('skills.index')->with('success', 'Habilidade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Skill::destroy($id);
        return redirect()->route('skills.index')->with('success', 'Habilidade deletada com sucesso!');
    }
}
