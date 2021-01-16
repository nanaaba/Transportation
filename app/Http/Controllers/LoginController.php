<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\PermissionsRoles;
use App\Http\Controllers\AccountController;
use Illuminate\Database\Eloquent;

class LoginController extends Controller {

    public function authenticateUser(Request $request) {

        $data = $request->all();
        $email = $data['email'];
        $password = md5($data['password']);

        $check = User::where([['email', '=', $email], ['password', '=', $password]])->count();


        $request->session()->regenerate();


        if ($check == 0) {
            return '1';
        } else {
            $users = User::where([['email', '=', $email], ['password', '=', $password]])->get();

            $email = $users[0]['email'];
            $name = $users[0]['name'];
            $role = $users[0]['usergroup'];
            $userid = $users[0]['id'];

            $permissions = $this->getGroupPermissions($role);

            $request->session()->put('email', $email);
            $request->session()->put('name', $name);
            $request->session()->put('role', $role);
            $request->session()->put('userid', $userid);
            $request->session()->put('permissions', $permissions);
            $request->session()->put('companyid', 1);
          //  session(['companyid' => 1]);

            return '0';
        }
    }

    public function getGroupPermissions($id) {
        $permissions = PermissionsRoles::where('user_group_id', $id)->pluck('perm_keyword')->toArray();
        return $permissions;
    }

    public function updatePassword(Request $request) {

        $id = $request->session()->get('id');

        $data = $request->all();
        $password = $data['password'];
        $update = Users::find($id);
        $update->password = md5($password);
        $update->first_login = "NO";
        $save = $update->save();
        if (!$save) {
            return '1';
        } else {
            return '0';
        }
    }

}
