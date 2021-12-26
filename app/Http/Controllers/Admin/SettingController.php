<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where("id", session("user_id"))->first();
        return view("admin.settings")->with("user", $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.session("user_id"),
            'number' => 'required',
        ]);
        try {
            $profile_avatar = $request->file('profile_avatar');
            if (isset($profile_avatar)) {
                $image_name = $profile_avatar->getClientOriginalName();
                $image_name = str_replace(" ", "_", time() . $image_name);
                $image_path = 'upload/profile_avatar/';
                $profile_avatar->move($image_path, $image_name);
                $profile_image = $image_path.$image_name; 
            } else {
                $profile_image = $request->previous_image;
            }

            $user = User::where("id", session("user_id"))->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->number = $request->number;
            $user->profile_avatar = $profile_image;
            if($user->save()){
                return back()->withSuccess("Successfully Updated")->withInput();
            }else{
                return back()->withError("Something went wrong")->withInput();
            }

        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        
        try {
            $user = User::where("id", session("user_id"))->where("password", $request->current_password)->first();
            if($user){
                if($request->password == $request->verify_password){
                    $user->password = $request->password;
                    if($user->save()){
                        return back()->withSuccess("Successfully Updated")->withInput();
                    }else{
                        return back()->withError("Something went wrong")->withInput();
                    }
                }else{
                    return back()->withError("Verify Password does not match !")->withInput();
                }
               
            }else{
                return back()->withError("Current Password does not match !")->withInput();
            }
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
