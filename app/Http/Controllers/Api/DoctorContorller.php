<?php

namespace App\Http\Controllers\Api;

use App\Models\Doctor;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorContorller extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return ApiTrait::data(compact('doctors'));
    }

    public function select($id)
    {
        $doctors = Doctor::select('id')->get();
        return ApiTrait::data(compact('doctors'));
    }

    public function update()
    {
        
    }

    public function delete()
    {

    }
}
