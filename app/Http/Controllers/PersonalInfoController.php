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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bio' => 'required|string',
            'image' => 'required|string',
        ]);

        try {
            PersonalInfo::find($id)->update($request->all());
    
            return back()->with('success', 'Informação atualizada com sucesso!');
        }
        catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar informação!');
        }
    }
}
