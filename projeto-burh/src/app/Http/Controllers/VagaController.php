<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use App\Models\Empresa;
use Illuminate\Http\Request;

class VagaController extends Controller
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
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'salario' => 'numeric',
            'horario' => 'numerico',
            'tipo' => 'required|in:CLT,PJ,E',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        if(in_array($request->tipo, ['CLT', 'E']) && (!$request->has('salario') || !$request->has('horario'))) {
            return response()->json(['error' => 'Salário e horário são obrigatórios para vagas do tipo CLT e Estágio.'], 422);
        }else if($request->tipo === 'CLT' && $request->salario < 1212) {
            return response()->json(['error' => 'O salário mínimo para vagas do tipo CLT é R$ 1212.'], 422);
        }else if($request->tipo === 'E' && $request->horario < 6) {
            return response()->json(['error' => 'O horário mínimo para vagas do tipo Estágio é 6 horas.'], 422);
        }

        $empresa = Empresa::find($request->empresa_id);
        if($empresa->plano === 'F' && $empresa->vagas()->count() >= 5) {
            return response()->json(['error' => 'O plano Free permite até 5 vagas ativas.'], 403);
        } else if($empresa->plano === 'P' && $empresa->vagas()->count() >= 10) {
            return response()->json(['error' => 'O plano Premium permite até 20 vagas ativas.'], 403);
        }

        $vaga = Vaga::create($request->all());

        return response()->json($vaga, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vaga $vaga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vaga $vaga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaga $vaga)
    {
        //
    }
}
