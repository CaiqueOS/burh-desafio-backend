<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmpresaResource;
use App\Http\Requests\StoreEmpresaRequest;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return EmpresaResource::collection($empresas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpresaRequest $request)
    {
        $empresa = Empresa::create($request->validated());
        return new EmpresaResource($empresa, 201);
    }

    public function show(Empresa $empresa)
    {
        return new EmpresaResource($empresa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEmpresaRequest $request, Empresa $empresa)
    {
        $empresa->update($request->validated());
        return new EmpresaResource($empresa, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return response()->json(null, 204);
    }
}
