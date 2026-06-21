<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PppcsCriados;

class PpcsCriadosController extends Controller
{
    //
    // LISTAR TODOS
    public function index()
    {
        return response()->json(PppcsCriados::all());
    }

    // CRIAR
    public function store(Request $request)
    {
        $ppc = PppcsCriados::create($request->all());

        return response()->json($ppc, 201);
    }

    // MOSTRAR UM
    public function show($id)
    {
        $ppc = PppcsCriados::findOrFail($id);

        return response()->json($ppc);
    }

    // ATUALIZAR
    public function update(Request $request, $id)
    {
        $ppc = PppcsCriados::findOrFail($id);
        $ppc->update($request->all());

        return response()->json($ppc);
    }

    // DELETAR
    public function destroy($id)
    {
        $ppc = PppcsCriados::findOrFail($id);
        $ppc->delete();

        return response()->json(['message' => 'Deletado com sucesso']);
    }
}
