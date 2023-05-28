<?php
namespace App\Traits;

trait ApiTrait
{
    public static function successMessage(string $message = "",int $statusCode = 200)
    {
        return response()->json([
            "success"=>true,
            "message"=>$message,
            "data"=>(object)[],
            "erorr"=>(object)[]
        ],$statusCode);
    }

    public static function erorrMessage(array $erorr,string $message = "",int $statusCode = 407)
    {
        return response()->json([
            "success"=>false,
            "message"=>$message,
            "data"=>(object)[],
            "erorr"=>(object)$erorr
        ],$statusCode);
    }

    public static function data(array $data,string $message = "",int $statusCode = 201)
    {
        return response()->json([
            "success"=>true,
            "message"=>$message,
            "data"=>(object)$data,
            "erorr"=>(object)[]
        ],$statusCode);
    }
}