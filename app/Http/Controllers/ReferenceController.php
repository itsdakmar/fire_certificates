<?php

namespace App\Http\Controllers;

use App\Office;
use App\PremiseCategory;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function index()
    {
        $categories = PremiseCategory::all();
        $offices = Office::with('zone')->get();
        return view('references.index', compact('categories', 'offices'));
    }
}
