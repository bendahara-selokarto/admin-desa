<?php

namespace App\Http\Controllers;

use App\Models\Penyedia;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $data = Penyedia::select('rekening')->get();
        return view('vendor', ['data' => $data]);
    }
}
