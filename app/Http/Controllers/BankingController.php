<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BankingController extends Controller {

    public function showunclearedpayments() {
        $unclearedpayments = $this->getUnClearedPayments();
        return view('clearpayments')->with('unclearedpayments', $unclearedpayments);
    }

    public function showclearedpayments() {
        $clearedpayments = $this->getClearedPayments();
        return view('allpayments')->with('clearedpayments', $clearedpayments);
    }

    
    public function showbankall() {

        return view('allpayments');
    }

    public function getUnClearedPayments() {


        $results = DB::table('inflows')->where('bank_payment', '=', "no")->get();
        return $results->toJson();
    }
    
     public function getClearedPayments() {


        $results = DB::table('cleared_payments_view')->get();
        return $results->toJson();
    }

    public function markpaymentsascleared(Request $request) {


        $data = $request->all();
        $bank_name = $data['bank'];
        $total_amount = $data['totalmount'];
        $deposited_by = $data['depositedby'];
        $payment_date = $data['paymentdate'];
        $scanned_url = "";
        $bank_code = $this->clearpayments($bank_name, $total_amount, $deposited_by, $payment_date, $scanned_url);
//        if ($bank_code == 0) {
//            return '1';
//        }
        $inflowsids = $data['inflows'];
        $this->updatepaymentsascleared($bank_code, $inflowsids);
        return $bank_code;
    }

    public function clearpayments($bank_name, $total_amount, $deposited_by, $payment_date, $scanned_url) {

        $code = $this->unquecodeGenerator(8);
        $bank_code = 'BNK' . $code;
        $createdby =  Session::get('userid');

         DB::insert('insert into cleared_payments (bank_code,bank_name,total_amount, deposited_by,payment_date,scanned_url,created_by) values (?, ?,?,?,?,?,?)', ["$bank_code", "$bank_name", "$total_amount", "$deposited_by", "$payment_date", "$scanned_url",$createdby]);

         return $bank_code;
       
    }

    public function updatepaymentsascleared($bank_code, $paymentsids) {

        DB::statement('update inflows set bank_payment = "yes" , bank_code= "' . $bank_code . '" where id in(' . $paymentsids . ')');
    }

    public function unquecodeGenerator($length) {
        $chars = "1234567890";
        $clen = strlen($chars) - 1;
        $id = '';

        for ($i = 0; $i < $length; $i++) {
            $id .= $chars[mt_rand(0, $clen)];
        }
        return ($id);
    }

}
