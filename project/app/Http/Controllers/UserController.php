<?php

namespace App\Http\Controllers;

session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
                $this->dates();
                return view('home');
            }
        }
        return redirect('login');
    }

    public function userLogout() {
        session_destroy();
        return redirect('login');
    }

    public function dates() {
        $dates = DB::select("
            SELECT date FROM patientchecklist WHERE patientID = \"" . $_SESSION["userID"] . "\""
        );

        $_SESSION["dates"] = $dates;

        $checkList = DB::select("
            SELECT CONCAT(doctor.f_Name, \" \", doctor.l_Name) as doctor, patientchecklist.doctorAppoint, 
            CONCAT(caregiver.f_Name, \" \", caregiver.l_Name) as caregiver, patientchecklist.morningMeds, 
            patientchecklist.afternoonMeds, patientchecklist.nightMeds, patientchecklist.breakfast, 
            patientchecklist.lunch, patientchecklist.dinner 
            FROM patientchecklist 
            JOIN patient ON patient.patientID = patientchecklist.patientID 
            JOIN doctor ON patientchecklist.doctorID = doctor.doctorID 
            JOIN caregiver ON patientchecklist.caregiverID = caregiver.caregiverID 
            WHERE patientchecklist.patientID = \"" . $_SESSION["userID"] . "\"" . " 
            AND patientchecklist.date = \"" . date("Y-m-d") . "\""
        );

        if ($checkList === []) {
            $CLID = "CL" . random_int(100000, 999999);
            $userID = $_SESSION["userID"];
            $date = date("Y-m-d");
            $emptyList = DB::insert("
                INSERT INTO patientchecklist
                VALUES (
                    \"$CLID\",
                    \"$userID\",
                    \"DR000000\",
                    \"CG000000\",
                    \"$date\",
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0
                )
            ");

            $_SESSION["list"] = $emptyList;
        }
        else {
            $_SESSION["list"] = $checkList;
        }
    }

    public function patientCheckList(Request $request) {
        $fields = $request->validate([
            'date' => 'required|string'
        ]);
    }
}
