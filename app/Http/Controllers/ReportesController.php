<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ReportesController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'email' => 'required|email|max:255',
            'url' => 'required',
            'dispositivo' => 'required',
            'descripcion' => 'required'
        ]);

        // Check validation failure
        if ($validator->fails()) {
            return redirect()->back()->with('errors', 'Error al enviar reporte: <br>' .$validator->messages()->all()[0])->withInput();
        }

        //dd($request);

        Mail::send('emails.sendReport', ['request' => $request], function($message) use ($request){
            $message->to('gonxxamd@gmail.com')
            ->subject('NUEVO REPORTE');
        });



        toast('El reporte ha sido enviado correctamente. Se informará por correo electrónico la respuesta.','success')->timerProgressBar();
        return redirect()->back();
    }
}
