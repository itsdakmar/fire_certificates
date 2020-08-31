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

    public function getPremise(Request $request) {
        $search = $request->search;

        if($search == ''){
            $premisedetails = PremiseDetail::orderby('name','asc')->select('id','name')->limit(30)->get();
        }else{
            $premisedetails = PremiseDetail::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($premisedetails as $premisedetail){
            $response[] = array(
                "id"=>$premisedetail->id,
                "text"=>$premisedetail->name
            );
        }

        echo json_encode($response);
        exit;
    }


}
