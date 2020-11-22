<?php

namespace App\Http\Controllers;

use App\Http\Requests\PremiseRequest;
use App\Imports\PremiseImport;
use App\Office;
use App\PremiseCategory;
use App\PremiseDetail;
use App\PremiseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class PremiseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('premise.index');
    }

    public function create()
    {
        $premisedetails = PremiseDetail::all();
        $premisecategories = PremiseCategory::all();
        $premisetypes = PremiseType::all();
        $offices = Office::all();
        return view ('premise.create', compact('premisedetails', 'premisecategories', 'premisetypes', 'offices'));
    }

    public function store(PremiseRequest $request)
    {
            PremiseDetail::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'fax_number' => $request->fax_number,
                'ert' => $request->ert,
                'pic_name' => $request->pic_name,
                'pic_phone' => $request->pic_phone,
                'fc_name' => $request->fc_name,
                'fc_phone' => $request->fc_phone,
                'premise_type_id' => $request->premise_type_id,
                'premise_category_id' => $request->premise_category_id,
                'office_id' => $request->office_id

            ]);


        return redirect()->route('premise.index')->with('status', 'Premis Baru Berjaya Di Tambah!');

        }

    public function excel()
    {
        return view('premise.upload-excel');
    }

    public function upload(Request $request)
    {
        $imports = (new PremiseImport)->import($request->file('premise'));
        return redirect()->route('premise.index')->with('status', 'Muat Naik Maklumat Premis Berjaya!');

    }

    public function data(Request $request)
    {
        if(!$request->ajax()){
            return abort('404');
        }

        $data = PremiseDetail::with('office','premiseCategory','premiseType')->latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('ert', function ($datum)
            {
                if ($datum->ert == '1') {
                    return 'ADA';
                }
                else
                {
                    return 'TIADA';
                }
            })
            ->addColumn('action', function($data) {
                return '<a href="' . route('premise.show', $data->id) . '"><i class="i-File-Horizontal-Text text-20 mr-2 text-muted"></i></a>';
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

    public function notify(){
        Artisan::call('email:notify');

        return back()->with('status','Emel Berjaya di hantar!');
    }

    public function show($id){
        $premiseDetail =  PremiseDetail::with('premiseCategory', 'premiseType', 'office')->findOrFail($id);
        return view('premise.show', compact('premiseDetail'));
    }
}
