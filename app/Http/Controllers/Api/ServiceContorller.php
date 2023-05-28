<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;


class ServiceContorller extends Controller
{
    public function index(){
        $services = Service::all();
        return response()->json(compact('services'));

    }
    public function create(Request $request)
    {
        $services = Service::select('id','name_en')->get();
        return response()->json(compact('services'));
    }
    public function store(Request $request){
        $rule = [
            'name_en'=>['required','string','between:3,255'],
            'name_er'=>['required','string','between:3,255'],
            'price'=>['required','numeric','max:99999.9','min:0.5']
        ];
        $request->validate($rule);
        $services = Service::create([
            'name_en'=>$request->name_en,
            'name_er'=>$request->name_er,
            'price'=>$request->price
        ]);
        return response()->json(['create successfuly'],200);
    }
    public function edit($id)
    {
        try{
            $services = Service::findOrFail($id);
        }catch(\Exception $e)
        {
            return response()->json([
                'message'=>'Unprocessable content',
                'id'=>'The Given Id Is Invalid',
            ], 422);
        }
        $services = Service::select('id','name_en')->get();
        return response()->json(compact('services'));

    }
    public function update($id)
    {
        try{
            $services = Service::findOrFail($id);
        }catch(\Exception $e)
        {
            return response()->json([
                'message'=>'Unprocessable content',
                'id'=>'The Given Id Is Invalid',
            ], 422);
        }
        Service::where('id',$id)->update($services);
        
    }
    public function delete($id)
    {
        try{
            $services = Service::findOrFail($id);
        }catch(\Exception $e)
        {
            return response()->json([
                'message'=>'Unprocessable content',
                'id'=>'The Given Id Is Invalid',
            ], 422);
        }
        $services->delete();
        return response()->json('Product Delete Successfully',200);
    }
}
