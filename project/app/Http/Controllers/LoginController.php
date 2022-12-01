<?php

namespace App\Http\Controllers;

session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function userLogin(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $users = DB::select("
            SELECT adminID as userID, CONCAT(f_Name, ' ', l_Name) as name, email, password, roleID, admissionStatus FROM admin UNION 
            SELECT superID as userID, CONCAT(f_Name, ' ', l_Name) as name, email, password, roleID, admissionStatus FROM supervisor UNION 
            SELECT doctorID as userID, CONCAT(f_Name, ' ', l_Name) as name, email, password, roleID, admissionStatus FROM doctor UNION 
            SELECT caregiverID as userID, CONCAT(f_Name, ' ', l_Name) as name, email, password, roleID, admissionStatus FROM caregiver UNION 
            SELECT patientID as userID, CONCAT(f_Name, ' ', l_Name) as name, email, password, roleID, admissionStatus FROM patient UNION 
            SELECT patient_FM_ID as userID, CONCAT(f_Name, ' ', l_Name) as name, email, password, roleID, admissionStatus FROM patientfm
        ");

        foreach($users as $user) {
            if($user->email == $fields['email'] && $user->password == $fields['password'] && $user->admissionStatus == "Approved") {
                $access = DB::select("select accessLevel from role where roleID = " . $user->roleID);
                $_SESSION['userID'] = $user->userID;
                $_SESSION["currentUser"] = $user->name;
                $_SESSION["accessLevel"] = $access[0]->accessLevel;
                return view('home');
            }
        }
        return redirect('login');
    }
}
