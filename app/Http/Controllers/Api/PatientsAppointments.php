<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PatientsInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientsAppointments extends Controller
{
    public function index(){
        $appointments = PatientsInfo::latest()->get();
        return response()->json($appointments);
    }
    public function store(Request $request){
        $appointment = new PatientsInfo;
        $appointment->appointment_id = $request->input('appointment_id');
        $appointment->appointment_date = $request->input('appointment_date');
        $appointment->schedule_time  = $request->input('schedule_time');
        $appointment->first_name = $request->input('first_name');
        $appointment->last_name = $request->input('last_name');
        $appointment->age = $request->input('age');
        $appointment->gender = $request->input('gender');
        $appointment->contact_number = $request->input('contact_number');
        $appointment->email_address = $request->input('email_address');
        $appointment->address = $request->input('address');
        $appointment->medical_concern = $request->input('medical_concern');
        $appointment->save();
        return response()->json(['success'=>'Appointment Created']);
    }

    public function delete($id){
        DB::table('appointments')->where('appointment_id', $id)->delete();
        return response()->json(['message' => 'Appointment deleted successfully']);
    }
}
