<?php

namespace App\Http\Controllers;

use App\Models\PPN;
use App\Models\PPh21;
use App\Models\PPh22;
use App\Models\PPh23;
use App\Models\Penyedia;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Riskihajar\Terbilang\Facades\Terbilang;

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
    public function pdfStream()
    {
        $terbilang = Terbilang::class;
        $data = PPh23::get();
        $pdf = Pdf::loadView('pajak', ['data' => $data])->with;
        return $pdf->stream();
    }
}
