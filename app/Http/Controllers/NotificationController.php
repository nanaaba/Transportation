<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Response;


class NotificationController extends Controller {

    public function Response($status, $message, $details=null) {

        $data = [
            "status" => $status,
            "message" => $message,
            "details" => $details
        ];

        return response()->json($data)
    ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

}
