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
