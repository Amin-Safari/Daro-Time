<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usersingup');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }


}
