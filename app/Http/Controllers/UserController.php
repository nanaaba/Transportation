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
use App\User;

class UserController extends Controller {

    var $response = array();

    public function shownewuser() {

        return view('newuser');
    }

    public function showusers() {

        $users = User::all();


        return view('users')->with('users', $users);
    }

    public function registerUser(Request $request) {

        $data = $request->all();
        $new = new App\User;
        $new->name = $data['name'];
        $new->email = $data['name'];
        $new->password = $data['name'];
        $new->usergroup = $data['name'];
        $new->contactno = $data['name'];
        $new->createdby = $data['name'];
        $saved = $new->save();
        if ($saved) {
            return 0;
        }
        return 1;
    }

}
