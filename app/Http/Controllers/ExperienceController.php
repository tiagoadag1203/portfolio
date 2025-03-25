<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('admin.experiences', compact('experiences'));
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
            'name' => 'required',
            'role' => 'required',
            'description' => 'required',
            'start_date' => 'required',
        ]);

        if(!empty($request->end_date) && $request->end_date < $request->start_date) {
            return back()->with('error', 'A data de término não pode ser anterior à data de início.');
        }

        Experience::create($request->all());
        return back()->with('success', 'Experiência criada com sucesso.');
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
            'name' => 'required',
            'role' => 'required',
            'description' => 'required',
            'start_date' => 'required',
        ]);

        if(!empty($request->end_date) && $request->end_date < $request->start_date) {
            return back()->with('error', 'A data de término não pode ser anterior à data de início.');
        }

        Experience::find($id)->update($request->all());
        return back()->with('success', 'Experiência atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Experience::find($id)->delete();
        return back()->with('success', 'Experiência deletada com sucesso.');
    }
}
