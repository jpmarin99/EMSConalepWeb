<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::latest()->paginate(5);

        return view('grupos.index',compact('grupos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('grupos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'Nomenclatura' => 'required',
            'Carrera' => 'required',
            'Turno' => 'required',
            'Cuatrimestre' => 'required',
            'Grupo' => 'required',
        ]);


        Grupo::create($request->all());
        return redirect()->route('grupos.index')
            ->with('success', 'Grupo creado.');
    }

    public function show(Grupo $grupo)
    {
        return view('grupos.show',compact('grupo'));
    }

    public function edit(Grupo $grupo)
    {
        return view('grupos.edit',compact('grupo'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Grupo $grupo)
    {
        $request->validate([
            'Nomenclatura' => 'required',
            'Carrera' => 'required',
            'Turno' => 'required',
            'Cuatrimestre' => 'required',
            'Grupo' => 'required',

        ]);

        $grupo->update($request->all());

        return redirect()->route('grupos.index')
            ->with('success','Grupo actualizado');
    }

    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()->route('grupos.index')
            ->with('success','Grupo eliminado');
    }

}
