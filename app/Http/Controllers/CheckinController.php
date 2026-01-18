<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitorlog;
use Session;
use Storage;

class CheckinController extends Controller
{
    public function index()
    {
        return view('checkin');
    }
    
    public function actioncheckin(Request $request)
    {
        $dailykey = date('Ymd');
        $visitdate = date('Y-m-d');
        $checkin_time_at = date('Y-m-d H:i:s');

        $img = $request->image;
        $folderPath = "public/";
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        $filedb = "storage/" . $fileName;
        Storage::put($file, $image_base64);

        $dailylist = Visitorlog::where('visit_date', '=', $visitdate)->get();
        $dailyCount = $dailylist->count();
        $nextnumberdaily = $dailyCount+1;

        //dd("jumlah : ".$nextnumberdaily);
                
        $visitorlog = Visitorlog::create([
            'daily_key' => $dailykey,
            'daily_no' => $nextnumberdaily,
            'visit_date' => $visitdate,
            'visitor_name' => $request->visitor_name,
            'visitor_company' => $request->visitor_company,
            'visitor_telp' => $request->visitor_telp,
            'visitor_email' => $request->visitor_email,
            'pic_name' => $request->pic_name,
            'pic_department' => $request->pic_department,
            'purpose' => $request->purpose,
            'checkin_time_at' => $checkin_time_at,
            'checkin_image' => $filedb,
            'checkout_time_at' => null,
            'checkout_image' => null,
            'visit_status' => 0,
            'remember_token' => $request->_token
        ]);

        Session::flash('message', 'Checkin Berhasil. Mohon lakukan checkout setelah aktivitas selesai.');
        return redirect('checkin');
    }
}
