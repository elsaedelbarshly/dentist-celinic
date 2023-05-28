<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\storeRequest;
use App\Http\Requests\Patient\updateRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Traits\ApiTrait;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::all();
        return ApiTrait::data(compact('patients'));
    }
    public function create()
    {
        //code
    }
    public function store(storeRequest $request)
    {
        try{
            $patients = Patient::create([
                'name_en'=>$request->name_en,
                'name_ar'=>$request->name_ar,
                'gender'=>$request->gender,
                'age'=>$request->age,
                'address'=>$request->address,
                'viste_type'=>$request->viste_type,
                'phone'=>$request->phone,
            ]);
            return ApiTrait::successMessage("Patient Created Successfully");
        }catch(\Exception $e){
            return ApiTrait::errorMessage([],'Something went wrong',500);
        }
    }

    public function edit($id)
    {
        //code
    }

    public function update(updateRequest $request,$id)
    {
        try{
            $patients = Patient::findOrfail($id);
        }catch(\Exception $e)
        {
            return ApiTrait::erorrMessage(["id" => "The Given Id Is Invalid"],'Unprocessable content');
        }
        Patient::where('id',$id)->update($patients);
        return ApiTrait::successMessage('Patient Updated Successfully');
    }
    
    public function destroy($id)
    {
        try{
            $patients = Patient::findOrFail($id);
        }catch(\Exception $e)
        {
            return ApiTrait::erorrMessage(["id" => "The Given Id Is Invalid"],'Unprocessable content');
        }
        $patients->delete();
        return ApiTrait::successMessage("Patient Delete Successfully");
    }
}
