<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view("admin.contacts.index")->with("contacts", $contacts);
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
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'title' => 'required',
            'email' => 'required|email',
            'number' => 'required',
        ]);
        try {

            $contact = new Contact();
            $contact->name = $request->name;
            $contact->company = $request->company;
            $contact->title = $request->title;
            $contact->email = $request->email;
            $contact->number = $request->number;
            $contact->ext = $request->ext;
            if($contact->save()){
                return redirect()->route('admin.contacts.index')->withSuccess("Successfully Added")->withInput();
            }else{
                return redirect()->route('admin.contacts.index')->withError("Something went wrong")->withInput();
            }

        } catch (Exception $ex) {
            return redirect()->route('admin.contacts.index')->withError($ex->getMessage())->withInput();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'title' => 'required',
            'email' => 'required|email',
            'number' => 'required',
        ]);
        try {

            $contact = Contact::where("id", $id)->first();
            $contact->name = $request->name;
            $contact->company = $request->company;
            $contact->title = $request->title;
            $contact->email = $request->email;
            $contact->number = $request->number;
            $contact->ext = $request->ext;
            if($contact->save()){
                return redirect()->route('admin.contacts.index')->withSuccess("Successfully Updated")->withInput();
            }else{
                return redirect()->route('admin.contacts.index')->withError("Something went wrong")->withInput();
            }

        } catch (Exception $ex) {
            return redirect()->route('admin.contacts.index')->withError($ex->getMessage())->withInput();
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
        try {

            $contact = Contact::where("id", $id)->delete();
            if($contact){
                return redirect()->route('admin.contacts.index')->withSuccess("Successfully Deleted")->withInput();
            }else{
                return redirect()->route('admin.contacts.index')->withError("Something went wrong")->withInput();
            }

        } catch (Exception $ex) {
            return redirect()->route('admin.contacts.index')->withError($ex->getMessage())->withInput();
        }
    }
}
