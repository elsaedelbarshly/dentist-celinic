<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Prescripton\updateRequest;
use App\Http\Requests\Prescripton\storeRequest;
use App\Models\Patient;
use App\Models\Prescription;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Loader\Configurator\Traits\AddTrait;

class PrescriptionController extends Controller
{
    use ApiTrait;
    public function index(Request $request)
    {
        $prescriptions = Prescription::all();
        return ApiTrait::data(compact('prescriptions'));
    }

    public function create()
    {
        $patient = Patient::select('id')->get();
        return ApiTrait::data(compact('patient'));
    }

    public function store(storeRequest $request)
    {
        try
        {
            $prescriptions = Prescription::create([
                'medicien_name'=>$request->medicien_name,
                'dosage'=>$request->dosage,
                'patient_id'=>$request->patient_id
            ]);
            return ApiTrait::successMessage('Prescription Created Successfully');
        }catch(\Exception $e)
        {
            return ApiTrait::erorrMessage([],'Something went wrong',500);
        }
    }

    public function edit($id)
    {
        try{
            $prescriptions = Prescription::findOrFail($id);
        }catch(\Exception $e)
        {
            return ApiTrait::errorMessage(['id'=>'The Given Id Is Invalid'],'Unprocessable content',422);
        }
        $patient = Patient::select('id')->get();
        return ApiTrait::data(compact('patient','prescriptions'));
    }

    public function update(updateRequest $request,$id)
    {
        try{
            $prescriptions = Prescription::findOrFail($id);
        }catch(\Exception $e)
        {
            return ApiTrait::errorMessage(['id'=>'The Given Id Is Invalid'],'Unprocessable content',422);
        }
        Prescription::where('id',$id)->update($prescriptions);
        return ApiTrait::successMessage('Prescription Updated Successfully');
    }

    public function destroy($id)
    {
        try{
            $prescriptions = Prescription::findOrFail($id);
        }catch(\Exception $e)
        {
            return ApiTrait::erorrMessage(["id" => "The Given Id Is Invalid"],'Unprocessable content');
        }
            return ApiTrait::successMessage('Prescription Deleted Successfully');
    }
}
