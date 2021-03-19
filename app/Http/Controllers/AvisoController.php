<?php

namespace App\Http\Controllers;

use App\Aviso;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $avisos = Aviso::latest()->paginate(5);

        return view('avisos.index',compact('avisos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('avisos.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'detalle' => 'required',
            'Grupo'     => 'required',


   ]);



        Aviso::create($request->all());
        return redirect()->route('avisos.index')
            ->with('success','Aviso creado.');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function show(Aviso $aviso)
    {
        //return view('avisos.show',compact('aviso'));

        return $aviso;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function edit(Aviso $aviso)
    {
        return view('avisos.edit',compact('aviso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aviso $aviso)
    {
        $request->validate([
            'titulo' => 'required',
            'detalle' => 'required',
            'Grupo'=> 'required',

        ]);

        $aviso->update($request->all());

        return redirect()->route('avisos.index')
            ->with('success','Aviso actualizado');
    }

        public function pdf(){
            $avisos = Aviso::latest()->paginate(5);

            $pdf = PDF::loadView('avisos.pdf',compact('avisos'));


            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('TablaDeAsistencias.pdf');

        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aviso $aviso)
    {
        $aviso->delete();

        return redirect()->route('avisos.index')
            ->with('success','Aviso eliminado');
    }

    public function eliminar(){
        DB::table('avisos')->truncate();

        return redirect()->route('avisos.index')
            ->with('success','Avisos eliminados');
    }



}
