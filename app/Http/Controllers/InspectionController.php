<?php

namespace App\Http\Controllers;

use App\FcApplication;
use App\Inspection;
use App\PremiseDetail;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    public function create ($applicationId) {
        $fc_application = FcApplication::findOrFail($applicationId);
        return view ('inspection.create', compact('fc_application'));
    }

    public function store() {

    }
}
