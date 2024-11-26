<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('menu');  // Asegúrate de que esta vista existe en resources/views/menu.blade.php
    }
}
