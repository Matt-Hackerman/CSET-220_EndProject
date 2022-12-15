<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

if(!isset($_SESSION)){
    session_start();
}

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
                $access = DB::select("select accessLevel, role from role where roleID = " . $user->roleID);
                $_SESSION['userID'] = $user->userID;
                $_SESSION["currentUser"] = $user->name;
                $_SESSION["accessLevel"] = $access[0]->accessLevel;
                $_SESSION["role"] = $access[0]->role;
                $_SESSION["familyViewCL"] = [];
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
        $al = $_SESSION['accessLevel'];

        if($al == 2) {
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

            $_SESSION["list"] = $checkList;

            return view('patienthome');
        }
    }

    public function patientCheckList(Request $request) {
        $newDay = $request->input('date');

        $prevCheckList = DB::select("
            SELECT CONCAT(doctor.f_Name, \" \", doctor.l_Name) as doctor, patientchecklist.doctorAppoint, 
            CONCAT(caregiver.f_Name, \" \", caregiver.l_Name) as caregiver, patientchecklist.morningMeds, 
            patientchecklist.afternoonMeds, patientchecklist.nightMeds, patientchecklist.breakfast, 
            patientchecklist.lunch, patientchecklist.dinner 
            FROM patientchecklist 
            JOIN patient ON patient.patientID = patientchecklist.patientID 
            JOIN doctor ON patientchecklist.doctorID = doctor.doctorID 
            JOIN caregiver ON patientchecklist.caregiverID = caregiver.caregiverID 
            WHERE patientchecklist.patientID = \"" . $_SESSION["userID"] . "\"" . " 
            AND patientchecklist.date = \"" . $newDay . "\""
        );

         $_SESSION["list"] = $prevCheckList;

        return view('patienthome');
    }

    public function patientCare() {
        $getPatients = DB::select("
            SELECT patient.patientID, CONCAT(patient.f_Name, \" \", patient.l_Name) as patient, 
            morningMeds, afternoonMeds, nightMeds, breakfast, lunch, dinner
            FROM patientchecklist
            JOIN patient ON patient.patientID = patientchecklist.patientID
            WHERE patientchecklist.caregiverID = \"" . $_SESSION["userID"] . "\"" . " 
            AND patientchecklist.date = \"" . date("Y-m-d") . "\""
        );

        $_SESSION["patientList"] = $getPatients;

        return view('caregiverhome');
    }

    public function updateCheckList(Request $request) {
        $patientID = $request->input('PID');
        $morningMed = $request->input('mm');
        $afternoonMed = $request->input('am');
        $nightMed = $request->input('nm');
        $breakfast = $request->input('breakfast');
        $lunch = $request->input('lunch');
        $dinner = $request->input('dinner');

        DB::update("
            UPDATE patientchecklist
            SET morningMeds = $morningMed,
                afternoonMeds = $afternoonMed,
                nightMeds = $nightMed,
                breakfast = $breakfast,
                lunch = $lunch,
                dinner = $dinner
            WHERE patientID = \"" . $patientID . "\""
        );

        $this->patientCare();

        return view('caregiverhome');
    }

    public function doctorHome() {
        $oldAppoint = DB::select("

            SELECT patient.patientID, CONCAT(patient.f_Name, \" \", patient.l_Name) as name, appointmentDate, prescription.comment, morningMed, 
            afternoonMed, nightMed 
            FROM prescription 
            JOIN patient ON prescription.patientID = patient.patientID 
            JOIN doctorappointments ON doctorappointments.doctorID = prescription.doctorID 
            WHERE appointmentDate = prescription.date 
            AND appointmentDate < \"" . date("Y-m-d") . "\"" . "
            AND doctorappointments.doctorID = \"" . $_SESSION["userID"] . "\""
        );

        $currentAppoint = DB::select("
            SELECT CONCAT(patient.f_Name, \" \", patient.l_Name) as name, appointmentDate 
            FROM patient 
            JOIN doctorappointments ON patient.patientID = doctorappointments.patientID 
            WHERE appointmentDate >= \"" . date("Y-m-d") . "\"" . "
            AND doctorID = \"" . $_SESSION["userID"] . "\""
        );

        $_SESSION["oldAppointments"] = $oldAppoint;
        $_SESSION["appointments"] = $currentAppoint;

        return view("doctorhome");
    }

    public function familyLoad() {
        $_SESSION["count"] = 0;
        return view("patientFMhome");
    }

    public function familyHome(Request $request) {
        $familyPatientView = DB::select("
            SELECT patientID, familyCode FROM patient
        ");

        $patientID = $request->input('patientID');
        $patientFC = $request->input('familyCode');
        foreach ($familyPatientView as $patient) {
            if ($patient->patientID == $patientID && $patient->familyCode == $patientFC) {
                $familyViewList = DB::select("
                    SELECT CONCAT(doctor.f_Name, \" \", doctor.l_Name) as doctor, patientchecklist.doctorAppoint, 
                    CONCAT(caregiver.f_Name, \" \", caregiver.l_Name) as caregiver, patientchecklist.morningMeds, 
                    patientchecklist.afternoonMeds, patientchecklist.nightMeds, patientchecklist.breakfast, 
                    patientchecklist.lunch, patientchecklist.dinner 
                    FROM patientchecklist 
                    JOIN patient ON patient.patientID = patientchecklist.patientID 
                    JOIN doctor ON patientchecklist.doctorID = doctor.doctorID 
                    JOIN caregiver ON patientchecklist.caregiverID = caregiver.caregiverID 
                    WHERE patientchecklist.patientID = \"" . $patientID . "\"" . " 
                    AND patientchecklist.date = \"" . date("Y-m-d") . "\""
                );
                $_SESSION["count"] += 1;
                $_SESSION["familyViewCL"] = $familyViewList;
            }
        }
        return view('patientFMhome');
    } 

    public function newPage(Request $request) {
        $_SESSION['pid'] = $request->input('patientID');
        return view('patientDoctor');

    }
}
