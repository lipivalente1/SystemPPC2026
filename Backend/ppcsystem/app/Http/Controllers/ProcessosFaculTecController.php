<?php

namespace App\Http\Controllers;

use App\Models\ProcessosFaculTec;
use Illuminate\Http\Request;

class ProcessosFaculTecController extends Controller
{
    ///
    // LISTAR TODOS
    public function index()
    {
        return response()->json(ProcessosFaculTec::all());
    }

    // CRIAR
    public function store(Request $request)
    {
        $ppc = ProcessosFaculTec::create($request->all());

        return response()->json($ppc, 201);
    }

    // MOSTRAR UM
    public function show($id)
    {
        $ppc = ProcessosFaculTec::findOrFail($id);

        return response()->json($ppc);
    }

    // ATUALIZAR
    public function update(Request $request, $id)
    {
        $ppc = ProcessosFaculTec::findOrFail($id);
        $ppc->update($request->all());

        return response()->json($ppc);
    }

    // DELETAR
    public function destroy($id)
    {
        $ppc = ProcessosFaculTec::findOrFail($id);
        $ppc->delete();

        return response()->json(['message' => 'Deletado com sucesso']);
    }
}
