<?php

namespace App\Http\Controllers;

use App\Models\Ppc;
use Illuminate\Http\Request;

class PpcController extends Controller
{
    ///
    // LISTAR TODOS
    public function index()
    {
        return response()->json(Ppc::all());
    }

    // CRIAR
    public function store(Request $request)
    {
        $ppc = Ppc::create($request->all());

        return response()->json($ppc, 201);
    }

    // MOSTRAR UM
    public function show($id)
    {
        $ppc = Ppc::findOrFail($id);

        return response()->json($ppc);
    }

    // ATUALIZAR
    public function update(Request $request, $id)
    {
        $ppc = Ppc::findOrFail($id);
        $ppc->update($request->all());

        return response()->json($ppc);
    }

    // DELETAR
    public function destroy($id)
    {
        $ppc = Ppc::findOrFail($id);
        $ppc->delete();

        return response()->json(['message' => 'Deletado com sucesso']);
    }
}
