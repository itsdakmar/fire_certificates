<?php

namespace App\Http\Controllers;

use App\Imports\PremiseImport;
use App\PremiseDetail;
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
        if(!$request->ajax()){
            return abort('404');
        }

        $data = PremiseDetail::latest()->get();
        return DataTables::of($data)
            ->addColumn('action', function($data){
                $button = '<button type="button" id="'.$data->id.'" class="btn btn-primary ripple m-1">Primary</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


}
