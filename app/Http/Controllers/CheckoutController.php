<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitorlog;
use Session;
use Storage;
use DateTimeImmutable;

class CheckoutController extends Controller
{
    public function index()
    {
        $dailykey = date('Ymd');
        $visitdate = date('Y-m-d');
        $listvisitor = Visitorlog::select('*')
                ->where('visit_date', '=', $visitdate)
                ->where('visit_status', '=', 0)
                ->get();
                
        return view('checkoutlist', ['listvisitor' => $listvisitor]);
    }

    public function checkout($id)
    {
        $datacheckout = Visitorlog::select('*')
                    ->where('id', $id)
                    ->where('visit_status', '=', 0)
                    ->get();
        
        return view('checkout', ['datacheckout' => $datacheckout]);
    }

    public function actioncheckout(Request $request)
    {
        $checkout_time_at = date('Y-m-d H:i:s');
        $checkin_time_at = $request->checkin_time_at;
        $duration_datetime = date('Y-m-d H:i:s',strtotime($checkout_time_at)-strtotime($checkin_time_at));
        
        $checkin = new DateTimeImmutable($checkin_time_at);
        $checkout = new DateTimeImmutable($checkout_time_at);
        $interval = $checkin->diff($checkout);

        $duration_day = $interval->format('%a');
        $duration_hours = date('H',strtotime($duration_datetime));
        $duration_minutes = date('i',strtotime($duration_datetime));
        $duration_seconds = date('s',strtotime($duration_datetime));

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

        $visitorlog = Visitorlog::where('id', $request->id)
        ->update([
            'checkout_time_at' => $checkout_time_at,
            'checkout_image' => $filedb,
            'visit_status' => 1,
            'duration_datetime' => $duration_datetime,
            'duration_day' => $duration_day,
            'duration_hours' => $duration_hours,
            'duration_minutes' => $duration_minutes,
            'duration_seconds' => $duration_seconds
        ]);

        Session::flash('message', 'Checkout Berhasil.');
        return redirect('checkoutlist');
    }
}
