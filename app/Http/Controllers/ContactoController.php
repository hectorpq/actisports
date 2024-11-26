<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    // app/Http/Controllers/ContactoController.php
public function index() {
    return view('contacto');
}

public function enviar(Request $request) {
    // Valida los datos del formulario
    $request->validate([
        'nombre' => 'required',
        'email' => 'required|email',
        'mensaje' => 'required',
    ]);

    // Lógica para enviar el mensaje (por ejemplo, enviar un correo)
    return back()->with('success', 'Mensaje enviado con éxito');
}

}
