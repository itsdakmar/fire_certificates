<?php

namespace App\Http\Controllers;

use App\FcApplication;
use App\PremiseDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class FcApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $fcapplications = FcApplication::all();
        return view('fcapplication.index', compact('fcapplications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $premisedetails = PremiseDetail::all();
        $fcapplications = FcApplication::all();
        return view('fcapplication.create', compact('fcapplications', 'premisedetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

      $fcapplications = FcApplication::create([
          'apply_date' => $request->apply_date,
          'type' => $request->type,
          'expiry_date' => $request->expiry_date,
          'status' => $request->status,
          'no_siri' => $request->no_siri,
          'premis_detail_id' => $request->premis_detail_id
      ]);

      foreach ($request->file('documents') as $document){
          $file = Storage::put('documents', $document);

          $fcapplications->documents()->create([
              'description' => $request->description,
              'doc_path' => $file,
              'type' => $request->doctype,
              'fc_application_id' => $fcapplications->id
          ]);
      }

        return redirect()->route('application.index')->with('status', 'Pendafataran Premis Baharu Berjaya!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
