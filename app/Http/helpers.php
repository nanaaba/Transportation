<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Illuminate\Support\Facades\DB;

function checkPermission($permission) {
    $userAccess = getUserPermissions(auth()->user()->usergroup);

    if (in_array($permission, $userAccess)) {
        return true;
    }

    return false;
}

function getUserPermissions($id) {

    $permissions = DB::table('permissions_and_roles')
                    ->where('user_group_id', '=', $id)->get()->pluck('perm_keyword');
    return $permissions->toArray();
}


function checkifuserisauthentcated() {
    if (Session::has('userid')) {
        return true;
    } else {
        return false;
    }
}