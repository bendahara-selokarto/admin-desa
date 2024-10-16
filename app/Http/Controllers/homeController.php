<?php

namespace App\Http\Controllers;

use App\Models\Penyedia;
use App\Models\PPh21;
use App\Models\PPh22;
use App\Models\PPh23;
use App\Models\PPN;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $data = Penyedia::select('rekening')->get();
        return view('vendor', ['data' => $data]);
    }
    public function ppn()
    {
        $data = PPN::get();
        return view('pajak', ['data' => $data]);
    }
    public function pph21()
    {
        $data = PPh21::get();
        return view('pajak', ['data' => $data]);
    }
    public function pph22()
    {
        $data = PPh22::get();
        return view('pajak', ['data' => $data]);
    }
    public function pph23()
    {
        $data = PPh23::get();
        return view('pajak', ['data' => $data]);
    }
}
