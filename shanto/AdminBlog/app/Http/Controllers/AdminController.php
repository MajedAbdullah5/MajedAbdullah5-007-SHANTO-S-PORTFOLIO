<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminTableMigration;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function adminLoginPage()
    {
        return view('content/AdminLogin');
    }

    function login(Request $request)
    {
        $user = $request->input('user');
        $pass = $request->input('pass');
        $result = AdminTableMigration::where('username', '=', $user)->where('password', '=', $pass)->count();
        if ($result == 1) {
            $request->session()->put('user', $user);
            return 1;
        } else {
            return 0;
        }
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/adminLoginPage');
    }

    //forgot password
    function forgotPassword()
    {
        return view('/content/resetForm');
    }

    function resetPass(Request $request)
    {
        $adminEmail = $request->input('adminEmail');
        $adminPass = $request->input('adminPass');
        $result = DB::table('admin_table')->where('email', '=', $adminEmail)->update(
            [
                'password' => $adminPass
            ]

        );
        if ($result == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    function changePassword()
    {
        return view('/content/changePassword');
    }

    function changeAdminPassword(Request $request)
    {
        $oldPassword = $request->input('oldPassword');
        $newUsername = $request->input('newUsername');
        $newEmail = $request->input('newEmail');
        $newPassword =  $request->input('newPassword');
        $result = DB::table('admin_table')->where('password', '=', $oldPassword)->update(
            [
                'username' => $newUsername,
                'email' => $newEmail,
                'password' => $newPassword
            ]

        );
        if ($result == 1) {
            return 1;
        } else {
            return 0;
        }
    }

}

