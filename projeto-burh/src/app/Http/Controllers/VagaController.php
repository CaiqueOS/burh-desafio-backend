<?php

namespace App\Http\Controllers;

use App\Http\Resources\VagaResource;
use App\Http\Requests\StoreVagaRequest;

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
        $vagas = Vaga::all();
        return VagaResource::collection($vagas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVagaRequest $request)
    {
        if($this->validarSalarioHorario($request)) {
            return $this->validarSalarioHorario($request);
        }

        $empresa = Empresa::find($request->empresa_id);
        $mensagem = '';
        if($empresa->plano === 'F' && $empresa->vagas()->count() >= 5) {
            $mensagem = 'O plano Free permite até 5 vagas.';
        } else if($empresa->plano === 'P' && $empresa->vagas()->count() >= 10) {
            $mensagem = 'O plano Premium permite até 10 vagas.';
        }

        if (!empty($mensagem)) {
            $mensagem = $this->validarStringUtf8($mensagem);
            return response()->json(['error' => $mensagem], 422);
        }

        $vaga = Vaga::create($request->validated());

        return new VagaResource($vaga, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreVagaRequest $request, Vaga $vaga)
    {
        if($this->validarSalarioHorario($request)) {
            return $this->validarSalarioHorario($request);
        }

        $vaga->update($request->validated());
        return new VagaResource($vaga, 201);
    }

    public function show(Vaga $vaga)
    {
        return new VagaResource($vaga);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaga $vaga)
    {
        $vaga->delete();
        return response()->json(null, 204);
    }

    private function validarSalarioHorario(StoreVagaRequest $vaga) {
        $mensagem = '';
        if(in_array($vaga->tipo, ['CLT', 'E']) && (!$vaga->has('salario') || !$vaga->has('horario'))) {
            $mensagem = 'Salário e horário são obrigatórios para vagas do tipo CLT e Estágio.';
        }else if($vaga->tipo === 'CLT' && $vaga->salario < 1212) {
            $mensagem = 'O salário mínimo para vagas do tipo CLT é de R$ 1212,00.';
        }else if($vaga->tipo === 'E' && $vaga->horario > 6) {
            $mensagem = 'O horário máximo para vagas do tipo Estágio é de 6 horas.';
        }

        if (!empty($mensagem)) {
            $mensagem = $this->validarStringUtf8($mensagem);
            return response()->json(['error' => $mensagem], 422);
        }

        return null;
    }
}
