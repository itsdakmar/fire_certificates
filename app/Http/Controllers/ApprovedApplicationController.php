<?php

namespace App\Http\Controllers;

use App\FcApplication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApprovedApplicationController extends Controller
{
    public function index()
    {
        return view ('fcapplication.approved_application');
    }

    public function data(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $data = FcApplication::with('premiseDetail', 'premiseDetail.premiseCategory')
                    ->whereBetween('expiry_date', array($request->from_date, $request->to_date))
                    ->get();
            } else {
                $data = FcApplication::with('premiseDetail', 'premiseDetail.premiseCategory')
                    ->orderBy('expiry_date', 'ASC')
                    ->whereNotNull('approved_date')
                    ->get();
            }

            return DataTables::of($data)
                ->editColumn('expiry_date', function ($datum) {
                    return date('d F Y', strtotime($datum->expiry_date));
                })
                ->addColumn('countdown', function ($datum) {
                    $now = Carbon::now()->timezone('Asia/Kuala_Lumpur');
                    $expired_date = Carbon::parse($datum->expiry_date);

                    if ($now > $expired_date) {
                        return '0 - Telah Tamat Tempoh';
                    } else {
                        return ($now->diffInDays($expired_date) + 1) . ' Hari Lagi';
                    }
                })
                ->make(true);
        }
    }
}
