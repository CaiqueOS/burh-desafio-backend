<?php

namespace App\Http\Controllers;

use App\Http\Resources\CandidaturaResource;
use App\Http\Requests\StoreCandidaturaRequest;

use App\Models\Candidatura;
use Illuminate\Http\Request;

class CandidaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidaturas = Candidatura::all();
        return CandidaturaResource::collection($candidaturas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidaturaRequest $request)
    {
        $candidatura = Candidatura::create($request->validated());
        return new CandidaturaResource($candidatura, 201);
    }

    public function show(Candidatura $candidatura)
    {
        return new CandidaturaResource($candidatura);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCandidaturaRequest $request, Candidatura $candidatura)
    {
        $candidatura->update($request->validated());
        return new CandidaturaResource($candidatura, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidatura $candidatura)
    {
        $candidatura->delete();
        return response()->json(null, 204);
    }
}
