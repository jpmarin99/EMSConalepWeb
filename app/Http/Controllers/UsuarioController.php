<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Grupo;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
$usuarios = Usuario::latest()->paginate(5);

return view('usuarios.index',compact('usuarios'))
->with('i', (request()->input('page', 1) - 1) * 5);
}

    public function create()
    {
        return view('usuarios.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'Apellidos' => 'required',
            'Correo' => 'required',
            'Grupo' => 'required',
            'Matricula' => 'required',
            'Rol' => 'required',
        ]);


        Usuario::create($request->all());
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado.');
    }

        public function show(Usuario $usuario, Grupo $Nomenclatura)
    {
        return view('usuarios.show',compact('usuario','Nomenclatura'));
    }

    public function edit(Usuario $usuario, Grupo $Nomenclatura)
    {
        return view('usuarios.edit',compact('usuario','Nomenclatura'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Usuario $usuario )
    {
        $request->validate([
            'Nombre' => 'required',
            'Apellidos' => 'required',
            'Correo' => 'required',
            'Grupo' => 'required',
            'Matricula' => 'required',
            'Rol' => 'required',

        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')
            ->with('success','Usuario actualizado');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success','Usuario eliminado');
    }

}
