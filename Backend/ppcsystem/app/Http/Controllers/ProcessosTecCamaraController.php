<?php

namespace App\Http\Controllers;

use App\Models\ProcessosTecCamara;
use Illuminate\Http\Request;

class ProcessosTecCamaraController extends Controller
{
    ///
    // LISTAR TODOS
      public function index(Request $request)
    {
            $query = ProcessosTecCamara::query();

        if ($request->filled('ppc_id')) {
            $query->where('ppc_id', $request->ppc_id);
        }

        return response()->json($query->get());
    }

    // CRIAR
    public function store(Request $request)
    {
        $ppc = ProcessosTecCamara::create($request->all());

        return response()->json($ppc, 201);
    }

    // MOSTRAR UM
    public function show($id)
    {
        $ppc = ProcessosTecCamara::findOrFail($id);

        return response()->json($ppc);
    }

    // ATUALIZAR
    public function update(Request $request, $id)
    {
        $ppc = ProcessosTecCamara::findOrFail($id);
        $ppc->update($request->all());

        return response()->json($ppc);
    }

    // DELETAR
    public function destroy($id)
    {
        $ppc = ProcessosTecCamara::findOrFail($id);
        $ppc->delete();

        return response()->json(['message' => 'Deletado com sucesso']);
    }
}
