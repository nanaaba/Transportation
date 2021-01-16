<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\User;
use App\UserGroups;
use App\Permission;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller {

    public function showusergroups() {


        $permissions = Session::get('permissions');



        if (!in_array("VIEW_USERGROUPS", $permissions)) {
            return redirect('logout');
        }


        $usergroups = $this->getUserGroups();
        return view('usergroups')->with('usergroups', $usergroups);
    }

    public function showpermissions() {


        $permissions = $this->getPermissions();
        return view('permissions')->with('permissions', $permissions);
    }

    public function showassignpermissions() {

        $permissions = Session::get('permissions');


        if (!in_array("ASSIGN_PERMISSIONS", $permissions)) {
            return redirect('logout');
        }

        $usergroups = $this->getUserGroups();
        $permission = $this->getPermissions();

        return view('assignpermissions')->with('permissions', $permission)
                        ->with('usergroups', $usergroups);
    }

    public function showusers() {

//        $permissions = Session::get('permissions');
//
//
//        if (!in_array("VIEW_USERS", $permissions)) {
//            return redirect('logout');
//        }


        $users = $this->getUsers();
        $usergroups = $this->getUserGroups();
        return view('users')->with('users', $users)->with('usergroups', $usergroups);
    }

    public function getUserGroups() {

        $permissions = Session::get('permissions');


        if (!in_array("VIEW_USERGROUPS", $permissions)) {
            return redirect('logout');
        }


        return UserGroups::where('active', '0')->get()->toJson();
    }

    public function getUsers() {

//        $permissions = Session::get('permissions');
//
//
//        if (!in_array("VIEW_USERS", $permissions)) {
//            return redirect('logout');
//        }

        $users = DB::table('users_view')->where('active', '=', 0)->get();
        return $users->toJson();
    }

    public function getPermissions() {


        return Permission::all()->toJson();
    }

    public function saveUserGroup(Request $request) {

        $data = $request->all();
        $new = new UserGroups;
        $new->name = $data['name'];
        $new->createdBy = $request->session()->get('userid');

        $new->save();
    }

    public function savePermission(Request $request) {

        $data = $request->all();
        $new = new Permission;
        $new->perm_keyword = $data['name'];
        $new->save();
    }

    public function deleteUserGroup($id) {

        $update = UserGroups::find($id);
        $update->active = '1';
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function updateUserGroup(Request $request) {

        $usergroupid = $request['usergroupid'];
        $name = $request['name'];

        $update = UserGroups::find($usergroupid);
        $update->name = $name;
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function deletePermission($id) {

        $new = Permission::find($id);
        $new->delete();
    }

    public function deleteUser($id) {



        $update = User::find($id);
        $update->active = '1';
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function saveUser(Request $request) {


        $usergroupid = $request['usergroup'];
        $name = $request['name'];
        $email = $request['email'];
        $phoneno = $request['contactno'];
        $password = md5('123456');
        $createdby = $request->session()->get('userid');
        $result = $this->checkEmailExistence($email);
        if ($result == 0) {
            $new = new User;
            $new->name = $name;
            $new->email = $email;
            $new->usergroup = $usergroupid;
            $new->contactno = $phoneno;
            $new->createdby = $createdby;
            $new->password = $password;

            $saved = $new->save();

            if (!$saved) {
                return '1';
            } else {
                return '0';
            }
        }
        return '1';
    }

    public function updateUser(Request $request) {


        $userid = $request['userid'];
        $usergroupid = $request['usergroup'];
        $name = $request['name'];
        $email = $request['email'];
        $phoneno = $request['phoneno'];

        $update = User::find($userid);

        $update->name = $name;
        $update->email = $email;
        $update->usergroup = $usergroupid;
        $update->contactno = $phoneno;

        $saved = $update->save();

        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function getUserInformation($id) {
        $results = User::where('id', $id)
                ->first();
        return $results->toJson();
    }

    public function getUserGroupPermissions($id) {
        //permissions_and_roles

        $result = DB::table('permissions_and_roles')->where('user_group_id', '=', $id)->get();
        return $result->toJson();
    }

    public function saveUserGroupPermisions(Request $request) {


        $usergroup = $request['usergroup'];
        $permissions = $request['permissions'];
        $createdby = $request->session()->get('userid');
        $sqls = array();
        foreach ($permissions as $perm) {

            $sql['perm_keyword'] = $perm;
            $sql['user_group_id'] = $usergroup;
            $sql['createdby'] = $createdby;

            $sqls[] = $sql;
        }

        DB::table('permissions_and_roles')->where('user_group_id', '=', $usergroup)->delete();


        $saved = DB::table('permissions_and_roles')->insert($sqls);

        if (!$saved) {
            return '1';
        }

        return '0';
    }

    public function checkEmailExistence($email) {

        $check = User::where('email', '=', $email)->count();
        if ($check == 0) {
            //it doesnt exist 
            return '0';
        } else {
            //its exists
            return '1';
        }
    }

}
