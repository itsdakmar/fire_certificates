<?php

namespace App\Http\Controllers;

use App\Imports\PremiseImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class PremiseController extends Controller
{
    public function index()
    {
        return view('premise.index');
    }

    public function excel()
    {
        return view('premise.upload-excel');
    }

    public function upload(Request $request)
    {
        Excel::import(new PremiseImport, $request->file('premise'));
        return route('premise.index')->withStatus('Successfully import premise');
    }

    public function data(Request $request)
    {
        if($request->ajax()){

        }

        return abort('404');
    }
}
