<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInfo;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalInfo = PersonalInfo::first();
        return view('admin.personal-info', compact('personalInfo'));
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
        //
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
    public function edit(string $id, Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bio' => 'required|string',
            'image' => 'required|string',
        ]);

        try {
            $personalInfo = PersonalInfo::find($id);
            $personalInfo->bio = $request->input('bio');
            $personalInfo->image = $request->input('image');
            $personalInfo->save();

            return redirect()->route('personal-info.index')->with('success', 'Informação atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('personal-info.index')->with('error', 'Erro ao atualizar a informação.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
