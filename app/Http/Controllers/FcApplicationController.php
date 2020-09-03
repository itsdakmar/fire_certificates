<?php

namespace App\Http\Controllers;

use App\FcApplication;
use App\Http\Requests\ApprovingApplicationRequest;
use App\Notice;
use App\PremiseDetail;

use Carbon\Carbon;
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
        return view('fcapplication.index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fcapplications = FcApplication::create([
            'apply_date' => $request->apply_date,
            'type' => $request->type,
            'expiry_date' => $request->expiry_date,
            'status' => $request->status,
            'no_siri' => $request->no_siri,
            'premise_detail_id' => $request->premise_detail_id
        ]);

        foreach ($request->file('documents') as $document) {
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approving($fc_application_id)
    {
        if (!$fc_application_id) {
            return abort('404', 'Application did\'nt found ');
        }

        $fc_application = FcApplication::findOrFail($fc_application_id)->with('premiseDetail')->get()->first();
        return view('fcapplication.approving', compact('fc_application'));
    }

    public function approved(ApprovingApplicationRequest $request, $fc_application_id)
    {
        $fc_application = FcApplication::findOrFail($fc_application_id);
        $approved_date = Carbon::parse($request->approved_date__submit);
        $expired_date = $approved_date->copy()->addYear();
        $now = Carbon::now()->timezone('Asia/Kuala_Lumpur')->toDateTimeString();

        $fc_application->update([
            'status' => 4,
            'approved_date' => $approved_date,
            'expiry_date' => $expired_date
        ]);

        $threeMonthBefore = $expired_date->copy()->subMonths('3');
        $oneMonthBefore = $expired_date->copy()->subMonths('1');

        Notice::where('fc_application_id', $fc_application_id)->delete();

        Notice::insert([
            [
                'notice_date' => $threeMonthBefore,
                'fc_application_id' => $fc_application_id,
                'total_payment' => '0',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'notice_date' => $oneMonthBefore,
                'fc_application_id' => $fc_application_id,
                'total_payment' => '0',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'notice_date' => $expired_date,
                'fc_application_id' => $fc_application_id,
                'total_payment' => '0',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);


        return redirect()->route('application.index')->withStatus('Permohonan berjaya diluluskan!');
    }

    public function data(Request $request)
    {
        if (!$request->ajax()) {
            return abort('404');
        }

        $data = FcApplication::with('premiseDetail')->latest()->get();

        return DataTables::of($data)
            ->addColumn('action', function ($datum) {
                return '<a
                        href="#"
                        class="text-success mr-2">
                        <i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                        <a
                        href="#"
                        class="text-success mr-2">
                        <i class="nav-icon i-Check font-weight-bold"></i></a>
                        <a
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Lulus permohonan"
                        href="' . route('application.approving', $datum->id) . '"
                        class="text-success mr-2">
                        <i class="nav-icon i-Checked-User font-weight-bold"></i></a>';

            })
            ->rawColumns(['action'])
            ->make(true);
    }

}
