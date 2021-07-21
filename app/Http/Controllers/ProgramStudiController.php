<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function index()
    {
        return view('program-studi');
    }
}
