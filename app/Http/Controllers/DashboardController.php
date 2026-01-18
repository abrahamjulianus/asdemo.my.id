<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitorlog;

class DashboardController extends Controller
{
    public function index()
    {
        $dailykey = date('Ymd');
        $visitdate = date('Y-m-d');
        $allvisitor = Visitorlog::select('*')
                ->where('visit_date', '=', $visitdate)
                ->count();

        $visitorcheckout = Visitorlog::select('*')
                ->where('visit_date', '=', $visitdate)
                ->where('visit_status', '=', 1)
                ->count();

        $visitorstay = Visitorlog::select('*')
        ->where('visit_date', '=', $visitdate)
        ->where('visit_status', '=', 0)
        ->count();

        return view('dashboard', ['allvisitor' => $allvisitor,'visitorcheckout' => $visitorcheckout,'visitorstay' => $visitorstay]);
    }
}
