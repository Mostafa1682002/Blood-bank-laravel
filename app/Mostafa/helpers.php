<?php


function apiResponse($status, $message, $data = null)
{
    $arr = [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
    return response()->json($arr);
}
