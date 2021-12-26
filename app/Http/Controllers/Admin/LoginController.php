<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Admin can login
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        try {
            $user = User::where("email", $request->email)->where("password", $request->password)->first();
            if ($user) {
                session([
                    'user_id' => $user->id,
                    'profile_avatar' => $user->profile_avatar,
                    'role' => $user->user_group,
                    'user_name' => $user->name
                ]);
                return redirect()->route('admin.leads.index')->withSuccess("Welcome ".$user->name." !")->withInput();
            } else {
                return back()->withError("Wrong Credentials !")->withInput();
            }
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    public function logout(Request $request)
    {
        Session::flush();

        return redirect()->route('admin.login');
    }

}
