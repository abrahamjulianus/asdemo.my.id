<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitorlog;
use Session;
use Storage;

class ReportController extends Controller
{
    public function index()
    {
        $dailykey = date('Ymd');
        $visitdate = date('Y-m-d');
        $listvisitor = Visitorlog::select('*')
                ->where('visit_date', '=', $visitdate)
                ->get();
                
        return view('report', ['listvisitor' => $listvisitor]);
    }
}
