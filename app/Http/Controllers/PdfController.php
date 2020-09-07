<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class PdfController extends Controller
{
    public function test(){
        $pdf = PDF::loadView('pdf.head_fc6');
        return $pdf->stream();

//        return view('pdf.head_fc6');
    }
}
