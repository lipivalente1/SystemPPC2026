<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PpcsCriados;

class PpcsCriadosController extends Controller
{
    //
    // LISTAR TODOS
    public function all()
    {
        return PpcsCriados::all();
    }

    public function index(Request $request)
    {
            $query = PpcsCriados::query();

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
        $ppc = PpcsCriados::create($request->all());

        return response()->json($ppc, 201);
    }

    // MOSTRAR UM
    public function show($id)
    {
        $ppc = PpcsCriados::findOrFail($id);

        return response()->json($ppc);
    }

    // ATUALIZAR
    public function update(Request $request, $id)
    {
        $ppc = PpcsCriados::findOrFail($id);
        $ppc->update($request->all());

        return response()->json($ppc);
    }

    // DELETAR
    public function destroy($id)
    {
        $ppc = PpcsCriados::findOrFail($id);
        $ppc->delete();

        return response()->json(['message' => 'Deletado com sucesso']);
    }
}
