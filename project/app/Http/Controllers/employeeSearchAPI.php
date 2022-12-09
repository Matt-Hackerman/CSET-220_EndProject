<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class employeeSearchAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $_SESSION['employeeSearch'] = DB::select('select adminID as ID, concat(admin.f_Name, " ", admin.l_Name) as name,
        role, salary from admin join role on admin.roleID=role.roleID
        join salary on admin.salaryID=salary.salaryID
        union
        select caregiverID as ID, concat(caregiver.f_Name, " ", caregiver.l_Name) as name,
        role, salary from caregiver join role on caregiver.roleID=role.roleID
        join salary on caregiver.salaryID=salary.salaryID
        union
        select doctorID as ID, concat(doctor.f_Name, " ", doctor.l_Name) as name,
        role, salary from doctor join role on doctor.roleID=role.roleID
        join salary on doctor.salaryID=salary.salaryID
        union
        select superID as ID, concat(supervisor.f_Name, " ", supervisor.l_Name) as name,
        role, salary from supervisor join role on supervisor.roleID=role.roleID
        join salary on supervisor.salaryID=salary.salaryID');

        return view('Employee_search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = strtoupper($request->input('empID'));

        if(substr($id, 0, 2) == "AD"){
            DB::table('admin')
            ->where('adminID', $request->input('empID'))
            ->update(['salaryID' => $request->input('newSalary')]);
            $this->index();
            return view("Employee_search");
        } else if(substr($id, 0, 2) == "CG"){
            DB::table('caregiver')
            ->where('caregiverID', $request->input('empID'))
            ->update(['salaryID' => $request->input('newSalary')]);
            $this->index();
            return view("Employee_search");
        } else if(substr($id, 0, 2) == "SV"){
            DB::table('supervisor')
            ->where('superID', $request->input('empID'))
            ->update(['salaryID' => $request->input('newSalary')]);
            $this->index();
            return view("Employee_search");
        } else if(substr($id, 0, 2) == "DR"){
            DB::table('doctor')
            ->where('doctorID', $request->input('empID'))
            ->update(['salaryID' => $request->input('newSalary')]);
            $this->index();
            return view("Employee_search");
        }
        return view('Employee_search');
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
