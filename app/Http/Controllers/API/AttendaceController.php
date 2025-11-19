<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendaceController extends Controller
{
    //checkin
    public function checkin(Request $request)
    {
        //validate latlong_in and latlong_out
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        //save new attendance
       $attendance = new Attendance;
        $attendance->user_id = $request->user()->id;
        $attendance->date = date('Y-m-d');
        $attendance->time_in = date('H:i:s');
        $attendance->latlong_in = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return response([
            'message' => 'Checkin successful',
            'attendance' => $attendance
        ], 200);
    }

    //checkout
    public function checkout(Request $request)
    {
    //validate latlong_out
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        //find attendance by user_id and date
        $attendance = Attendance::where('user_id', $request->user()->id)
            ->where('date', date('Y-m-d'))
            ->first();

        //if attendance not found
        if (!$attendance) {
            return response([
                'message' => 'Attendance not found'
            ], 404);
        }

        //update attendance / checkout
        $attendance->time_out = date('H:i:s');
        $attendance->latlong_out = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return response([
            'message' => 'Checkout successful',
            'attendance' => $attendance
        ], 200);
    }

    //is checked in
    public function isCheckedIn(Request $request)
    {
        //find attendance by user_id and date
        $attendance = Attendance::where('user_id', $request->user()->id)
            ->where('date', date('Y-m-d'))
            ->first();

        return response([
            'checked_in' => $attendance ? true : false,
         ], 200);
    }
}
