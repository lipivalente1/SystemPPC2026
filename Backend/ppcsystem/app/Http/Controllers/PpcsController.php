<?php

namespace App\Http\Controllers;

use App\Models\Ppcs;
use Illuminate\Http\Request;

class PpcsController extends Controller
{
    ///
    // LISTAR TODOS
    public function index(Request $request)
    {
        $query = Ppcs::query();

        if ($request->filled('faculdade_id')) {
            $query->where('faculdade_id', $request->faculdade_id);
        }

        if ($request->filled('tecnico_id')) {
            $query->where('tecnico_id', $request->tecnico_id);
        }

        return response()->json($query->get());
    }

    // CRIAR
    public function store(Request $request)
    {
        $ppc = Ppcs::create($request->all());

        return response()->json($ppc, 201);
    }

    // MOSTRAR UM
    public function show($id)
    {
        $ppc = Ppcs::findOrFail($id);

        return response()->json($ppc);
    }

    // ATUALIZAR
    public function update(Request $request, $id)
    {
        $ppc = Ppcs::findOrFail($id);
        $ppc->update($request->all());

        return response()->json($ppc);
    }

    // DELETAR
    public function destroy($id)
    {
        $ppc = Ppcs::findOrFail($id);
        $ppc->delete();

        return response()->json(['message' => 'Deletado com sucesso']);
    }
}
