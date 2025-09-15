<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsuarioResource;
use App\Http\Requests\StoreUsuarioRequest;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return UsuarioResource::collection($usuarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $usuario = Usuario::create($request->validated());

        return new UsuarioResource($usuario, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUsuarioRequest $request, Usuario $usuario)
    {
        $usuario->update($request->validated());
        return new UsuarioResource($usuario, 201);
    }

    public function show(Usuario $usuario)
    {
        return new UsuarioResource($usuario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json(null, 204);
    }

    public function search(Request $request) {
        
        $query = Usuario::query();

        if($request->has('nome')) {
            $query->where('nome', 'like', '%'.$request->input('nome').'%');
        }

        if($request->has('email')) {
            $query->where('email', 'like', '%'.$request->input('email').'%');
        }

        if($request->has('cpf')) {
            $query->where('cpf', 'like', '%'.$request->input('cpf').'%');
        }

        $usuarios = $query->get();
        foreach($usuarios as $usuario) {
            $usuario->idade = $usuario->idade();
            $usuario->vagasCandidatas = $usuario->vagasCandidatas();
        }

        return UsuarioResource::collection($usuarios);
    }

}
