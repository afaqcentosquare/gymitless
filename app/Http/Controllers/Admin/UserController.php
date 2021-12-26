<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Validator;
use App\Models\State;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("admin.users.index")->with("users",$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view("admin.users.add")->with('states', $states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'number' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'user_group' => 'required',
            'addressline1' => 'required',
            'city' => 'required',
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
                $profile_image = null;
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->email_recovery = $request->email_recovery;
            $user->number = $request->number;
            $user->ext_number = $request->ext_number;
            $user->state = $request->state;
            $user->zipcode = $request->zipcode;
            $user->user_group = $request->user_group;
            $user->addressline1 = $request->addressline1;
            $user->addressline2 = $request->addressline2;
            $user->password = $request->password;
            $user->profile_avatar = $profile_image;
            $user->city = $request->city;
            if($user->save()){
                return redirect()->route('admin.users.index');
            }else{
                return back()->withError("Something went wrong")->withInput();
            }

        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where("id", $id)->first();
        return view("admin.users.view")->with("user", $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states = State::all();
        $user = User::where("id", $id)->first();
        return view("admin.users.edit")->with("user", $user)->with('states', $states);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'required',
            'number' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'user_group' => 'required',
            'addressline1' => 'required',
            'city' => 'required',
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

            $user = User::where("id", $id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->email_recovery = $request->email_recovery;
            $user->number = $request->number;
            $user->ext_number = $request->ext_number;
            $user->state = $request->state;
            $user->zipcode = $request->zipcode;
            $user->user_group = $request->user_group;
            $user->addressline1 = $request->addressline1;
            $user->addressline2 = $request->addressline2;
            $user->password = $request->password;
            $user->profile_avatar = $profile_image;
            $user->city = $request->city;
            if($user->save()){
                return redirect()->route('admin.users.index');
            }else{
                return back()->withError("Something went wrong")->withInput();
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
