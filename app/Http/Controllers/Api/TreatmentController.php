<?php

namespace App\Http\Controllers\Api;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Treatment;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Treatment\storRequest;
use App\Http\Requests\Treatment\updateRequest;

class TreatmentController extends Controller
{
    
    public function index()
    {
        $treatmeants = Treatment::all();
        return ApiTrait::data(compact('treatmeants'));
    }

    public function create()
    {
        $services = Service::all();
        $doctors = Doctor::select('id','name')->get();
        $patients = Patient::select('id','name')->get();
        return ApiTrait::data(compact('services','doctors','patients'));
    }

    public function store(storRequest $request)
    {
        $treatmeants = Treatment::create()->all();
    }

    public function edit($id)
    {
        $treatmeants = Treatment::findOrFail($id);
    }
    
    public function update(updateRequest $request ,$id)
    {
        $treatmeants = Treatment::findOrFail($id);
    }

    public function destory($id)
    {

    }
}
