<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\Skill;

class CertificateController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'skill_id' => 'required',
            'link' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        try {
            Certificate::create($request->all());
            return back()->with('success', 'Certificado criado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao criar certificado!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $skill_id)
    {
        $skill = Skill::find($skill_id);
        $certificates = Certificate::where('skill_id', $skill_id)->get();
        return view('admin.certificates', compact('certificates', 'skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'link' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        try{
            Certificate::find($id)->update($request->all());
            return back()->with('success', 'Certificado atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar certificado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Certificate::destroy($id);
            return back()->with('success', 'Certificado removido com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao remover certificado!');
        }
    }
}
