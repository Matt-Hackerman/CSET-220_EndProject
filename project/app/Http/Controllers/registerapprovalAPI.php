<?php
 
namespace App\Http\Controllers;
use App\Models\supervisor;
use App\Models\admin;
use App\Models\caregiver;
use App\Models\doctor;
use App\Models\patient;
use App\Models\patientfm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
session_start();
class registerapprovalAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $_SESSION['admin'] = DB::select('select concat(f_Name, " ", l_Name) from admin where admissionStatus="Pending"');
        $_SESSION['doctor'] = DB::select('select concat(f_Name, " ", l_Name) from doctor where admissionStatus="Pending"');
        $_SESSION['patient'] = DB::select('select concat(f_Name, " ", l_Name) from patient where admissionStatus="Pending"');
        $_SESSION['patientfm'] = DB::select('select concat(f_Name, " ", l_Name) from patientfm where admissionStatus="Pending"');
        $_SESSION['supervisor'] = DB::select('select concat(f_Name, " ", l_Name) from supervisor where admissionStatus="Pending"');
        $_SESSION['caregiver'] = DB::select('select concat(f_Name, " ", l_Name) from caregiver where admissionStatus="Pending"');
        $_SESSION['adminID'] = DB::select('select adminID from admin where admissionStatus="Pending"');
        $_SESSION['doctorID'] = DB::select('select doctorID from doctor where admissionStatus="Pending"');
        $_SESSION['patientID'] = DB::select('select patientID from patient where admissionStatus="Pending"');
        $_SESSION['patientfmID'] = DB::select('select patient_FM_ID from patientfm where admissionStatus="Pending"');
        $_SESSION['supervisorID'] = DB::select('select superID from supervisor where admissionStatus="Pending"');
        $_SESSION['caregiverID'] = DB::select('select caregiverID from caregiver where admissionStatus="Pending"');
        return view('registrationapproval');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        if($request->has('Yes')){
        admin::where('adminID',$request->input('theirid'))->update(['admissionStatus' => 'Approved']);
        doctor::where('doctorID',$request->input('theirid'))->update(['admissionStatus' => 'Approved']);
        patient::where('patientID',$request->input('theirid'))->update(['admissionStatus' => 'Approved']);
        patientfm::where('patient_FM_ID',$request->input('theirid'))->update(['admissionStatus' => 'Approved']);
        supervisor::where('superID',$request->input('theirid'))->update(['admissionStatus' => 'Approved']);
        caregiver::where('caregiverID',$request->input('theirid'))->update(['admissionStatus' => 'Approved']);
        }
        else if($request->has('No')){
            admin::where('adminID',$request->input('theirid'))->delete();
            doctor::where('doctorID',$request->input('theirid'))->delete();
            patient::where('patientID',$request->input('theirid'))->delete();
            patientfm::where('patient_FM_ID',$request->input('theirid'))->delete();
            supervisor::where('superID',$request->input('theirid'))->delete();
            caregiver::where('caregiverID',$request->input('theirid'))->delete();
            }
}
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
 
