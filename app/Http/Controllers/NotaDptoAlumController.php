<?php

namespace App\Http\Controllers;

use App\Models\NotaDptoAlum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NotaDptoAlumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotaDptoAlum  $notaDptoAlum
     * @return \Illuminate\Http\Response
     */
    public function show(NotaDptoAlum $notaDptoAlum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotaDptoAlum  $notaDptoAlum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotaDptoAlum $notaDptoAlum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotaDptoAlum  $notaDptoAlum
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotaDptoAlum $notaDptoAlum)
    {
        //
    }

    public function generar_pdf(Request $request)
    {
        dd('holaaaaaa');
        # valido ??
        $request->validate([
            'firma' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        # guardo la imagen
        $nombreFirma = time().'.'.$request->firma->extension();  
            
        $request->firma->move(public_path('images'), $nombreFirma);

        # Genero el pdf
        $data = [
            'contenido' => $request->contenido,
            'firma' => $nombreFirma
        ];

        $nombrePDF = 'nota_'.time().'.pdf';
        $pdf = app('dompdf.wrapper')->loadView('nota_dpt_alumno', ['datos'=>$data]);

        Storage::put('public/notas_dpto_alum/'.$nombrePDF, $pdf->output());

        # Guardo en Base de Datos
        NotaDptoAlum::create([
            'descripcion_dto_alum'   => 'que descripción va acá?',
            'url_pdf_nota_dpto_alum' => 'notas_dpto_alum/'.$nombrePDF
        ]);

        # Retorno resultado
        return view('ver_nota', ['nombrePDF' => $nombrePDF]);
    }
}