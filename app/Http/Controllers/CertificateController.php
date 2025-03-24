<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            'skill_id' => 'required',
            'link' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        Certificate::create($request->all());
        return back()->with('success', 'Certificado criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $skill_id)
    {
        $certificates = Certificate::where('skill_id', $skill_id)->get();
        return view('admin.certificates', compact('certificates', 'skill_id'));
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
            'skill_id' => 'required',
            'link' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        Certificate::find($id)->update($request->all());
        return back()->with('success', 'Certificado atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Certificate::destroy($id);
        return back()->with('success', 'Certificado removido com sucesso!');
    }
}
