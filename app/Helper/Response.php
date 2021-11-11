<?
function response($code, $message, $data = [])
{
    $response = [
        'code' => $code,
        'message' => $message,
        'data' => $data
    ];
    return $response;
}
function success($message, $data = [])
{
    return response(200, $message, $data);
}

function error($message, $data = [])
{
    return response(400, $message, $data);
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
