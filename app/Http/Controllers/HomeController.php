<?php

namespace App\Http\Controllers;

use App\FcApplication;
use App\PremiseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $countPremises = PremiseDetail::count();
        $countApplications = FcApplication::count();
        return view('dashboard.home', compact('countPremises', 'countApplications'));
    }
/*
    public function premiseCategory()
    {
        $data = DB::table('premise_details')
            ->join('premise_categories', 'premise_categories.id', '=', 'premise_details.premise_category_id')
            ->select(DB::raw('CATEGORY(premise_details.premise_category_id) category'), DB::raw('count(premise_details.id) as total'))
            ->groupBy('category')
            ->get();

        return response()->json($data);
    }*/

    public function applicationYearly()
    {
        $data = DB::table('fc_applications')
            ->select(DB::raw('MONTH(fc_applications.expiry_date) month'), DB::raw('count(fc_applications.id) as total'))
            ->groupBy('month')
            ->get()
            ->map(function ($el) {
                return [
                    'month' => $el->month,
                    'total' => $el->total
                ];
            });

        $array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        for ($i = 0; $i < 12; $i++) {

            if (isset($data[$i]['month'])) {
                $array[(int)$data[$i]['month'] - 1] += $data[$i]['total'];
            }
        }

        return response()->json($array);
    }

}
