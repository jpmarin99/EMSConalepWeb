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

        $avisos = Aviso::latest()->paginate(15);

        $avisos->appends(['sort'=>'Grupo']);

        return view('avisos.index',compact('avisos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
       // $push_notifications = PushNotification::orderBy('created_at', 'desc')->get();



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
        $url = 'https://fcm.googleapis.com/fcm/send';
        $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => $request->id, 'status' => "done");
        $notification = array('title' => $request->titulo, 'text' => $request->detalle,  'sound' => 'default', 'badge' => '1',);
        $arrayToSend = array('to' => "/topics/all", 'notification' => $notification, 'data' => $dataArr, 'priority' => 'high');
        $fields = json_encode($arrayToSend);
        $headers = array(
            'Authorization: key=' .
            "AAAArAFPXOA:APA91bHmy0-G9Ak6m0GhM6yg1zI-phjv5DgxweFvFeJPArM_0OabL4dglTQ92mctAsyJZZkHnZ5lqSSIWW-WoIMhhaLD71qbBfl8j17j_gkh8kUDqAhnJQ5lDFT2b-gDDjnBSUSrJBXY",
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
        //var_dump($result);
        curl_close($ch);
        return redirect()->back()->with('success', 'Notification Send successfully');


        Aviso::create($request->all());
        /*return redirect()->route('avisos.index')
            ->with('success','Aviso creado.');*/



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
