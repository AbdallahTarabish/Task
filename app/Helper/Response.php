<?php


function success($message, $data = [])
{
    return response()->json([
        "message"=> $message,
        "code"=>200,
            "data"=>$data
    ]);

}

function error($message, $data = [])
{
    return response()->json([
        "message"=> $message,
        "code"=>402,
        "data"=>$data
    ]);
}

function notFound($message = 'Not Found')
{
    return response(404, $message);
}

function responseWithToken($token)
{
    $data = [
        'access_token' => $token,
        'token_type' => 'bearer',
    ];

    return response()->json([
        "data" => $data,
        "meta_response" => [
            'status' => true,
            'http_code' => 200,
            'message' => [],
        ]
    ]);
}
