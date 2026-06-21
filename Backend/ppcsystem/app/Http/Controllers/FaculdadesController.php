<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faculdades;

class FaculdadesController extends Controller
{
    //
    // LISTAR TODOS
    public function index()
    {
        return response()->json(Faculdades::all());
    }

    // CRIAR
    public function store(Request $request)
    {
        $ppc = Faculdades::create($request->all());

        return response()->json($ppc, 201);
    }

    // MOSTRAR UM
    public function show($id)
    {
        $ppc = Faculdades::findOrFail($id);

        return response()->json($ppc);
    }

    // ATUALIZAR
    public function update(Request $request, $id)
    {
        $ppc = Faculdades::findOrFail($id);
        $ppc->update($request->all());

        return response()->json($ppc);
    }

    // DELETAR
    public function destroy($id)
    {
        $ppc = Faculdades::findOrFail($id);
        $ppc->delete();

        return response()->json(['message' => 'Deletado com sucesso']);
    }
}
