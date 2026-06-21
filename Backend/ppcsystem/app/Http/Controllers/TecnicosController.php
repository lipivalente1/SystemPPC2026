<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tecnicos;

class TecnicosController extends Controller
{
    //
    // LISTAR TODOS
    public function index()
    {
        return response()->json(Tecnicos::all());
    }

    // CRIAR
    public function store(Request $request)
    {
        $ppc = Tecnicos::create($request->all());

        return response()->json($ppc, 201);
    }

    // MOSTRAR UM
    public function show($id)
    {
        $ppc = Tecnicos::findOrFail($id);

        return response()->json($ppc);
    }

    // ATUALIZAR
    public function update(Request $request, $id)
    {
        $ppc = Tecnicos::findOrFail($id);
        $ppc->update($request->all());

        return response()->json($ppc);
    }

    // DELETAR
    public function destroy($id)
    {
        $ppc = Tecnicos::findOrFail($id);
        $ppc->delete();

        return response()->json(['message' => 'Deletado com sucesso']);
    }
}
