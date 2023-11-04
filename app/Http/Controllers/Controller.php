<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('inicio');
    }

    public function contactanos()
    {
        return view('contactanos');
    }

    public function pago()
    {
        return view('formadepago');
    }
    public function conocenos()
    {
        return view('conocenos');
    }
    public function registro()
    {
        return view('registro');
    }



    public function login()
    {
        return view('login');
    }
    public function inicio()
    {
        return view('inicio');
    }

    public function carrito()
    {
        return view('carrito');
    }

    public function registro2()
    {
        return view('registro2');
    }
}
