<?php

namespace App\Http\Controllers;

use App\Models\Candidatura;
use Illuminate\Http\Request;

class CandidaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'vaga_id' => 'required|exists:vagas,id',
        ]);

        $candidatura = Candidatura::create($request->all());

        return response()->json($candidatura, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidatura $candidatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidatura $candidatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidatura $candidatura)
    {
        //
    }
}
