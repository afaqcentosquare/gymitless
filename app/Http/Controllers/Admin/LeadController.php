<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\LeadNote;
use App\Models\State;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::select("leads.*", "states.state")->join("states", "states.id", "leads.state")->get();
        return view('admin.leads.index')->with("leads", $leads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('admin.leads.add')->with('states', $states);
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
            'company_name' => 'required',
            'contact' => 'required',
            'number' => 'required',
            'email' => 'required|email',
            // 'primary_address' => 'required',
            'addressline1' => 'required',
            // 'addressline2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ]);
        try {

            $lead = new Lead();
            $lead->company_name = $request->company_name;
            $lead->contact = $request->contact;
            $lead->number = $request->number;
            $lead->email = $request->email;
            // $lead->primary_address = $request->primary_address;
            $lead->addressline1 = $request->addressline1;
            // $lead->addressline2 = $request->addressline2;
            $lead->city = $request->city;
            $lead->state = $request->state;
            $lead->zip_code = $request->zip_code;
            if($lead->save()){
                return redirect()->route('admin.leads.index')->withSuccess("Lead Added Successfully")->withInput();
            }else{
                return redirect()->route('admin.leads.index')->withError("Something went wrong")->withInput();
            }

        } catch (Exception $ex) {
            return redirect()->route('admin.leads.index')->withError($ex->getMessage())->withInput();
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
        
        $lead = Lead::where('id', $id)->with("leadNotes")->first();
        return view('admin.leads.view')->with("lead", $lead);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lead = Lead::where('id', $id)->first();
        $states = State::all();

      // return response()->json(["states" => $states, "lead" => $lead]);
        return view('admin.leads.edit')->with("lead", $lead)->with('states', $states);
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
            'company_name' => 'required',
            'contact' => 'required',
            'number' => 'required',
            'email' => 'required|email',
            // 'primary_address' => 'required',
            'addressline1' => 'required',
            // 'addressline2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ]);
        try {

            $lead = Lead::where('id', $id)->first();
            $lead->company_name = $request->company_name;
            $lead->contact = $request->contact;
            $lead->number = $request->number;
            $lead->email = $request->email;
            $lead->primary_address = $request->primary_address;
            $lead->addressline1 = $request->addressline1;
            $lead->addressline2 = $request->addressline2;
            $lead->city = $request->city;
            $lead->state = $request->state;
            $lead->zip_code = $request->zip_code;
            if($lead->save()){
                return redirect()->route('admin.leads.show',$id)->withSuccess("Lead Updated Successfully")->withInput();
            }else{
                return redirect()->route('admin.edit.index')->withError("Something went wrong")->withInput();
            }

        } catch (Exception $ex) {
            return redirect()->route('admin.edit.index')->withError($ex->getMessage())->withInput();
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

            $contact = Lead::where("id", $id)->delete();
            if($contact){
                return redirect()->route('admin.leads.index')->withSuccess("Lead Successfully Deleted")->withInput();
            }else{
                return redirect()->route('admin.leads.index')->withError("Something went wrong")->withInput();
            }

        } catch (Exception $ex) {
            return redirect()->route('admin.leads.index')->withError($ex->getMessage())->withInput();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNote(Request $request,$lead_id)
    {
        $request->validate([
            'note_type' => 'required',
        ]);
        try {

            if($request->note_type == "note"){
                $request->validate([
                    'note' => 'required',
                ]);
                $lead_note = new LeadNote();
                $lead_note->lead_id = $lead_id;
                $lead_note->note_type = $request->note_type;
                $lead_note->note = $request->note;
                $lead_note->status = 1;
                if($lead_note->save()){
                    return redirect()->route('admin.leads.show',$lead_id)->withSuccess("Note Added Successfully")->withInput();
                }else{
                    return redirect()->route('admin.leads.show',$lead_id)->withError("Something went wrong")->withInput();
                }
            }else{
                $request->validate([
                    'note' => 'required',
                    'datetime' => 'required',
                    'type' => 'required',
                ]);
                $lead_note = new LeadNote();
                $lead_note->lead_id = $lead_id;
                $lead_note->note_type = $request->note_type;
                $lead_note->note = $request->note;
                $lead_note->datetime = $request->datetime;
                $lead_note->type = $request->type;
                $lead_note->status = 0;
                if($lead_note->save()){
                    return redirect()->route('admin.leads.show',$lead_id)->withSuccess("Task Added Successfully")->withInput();
                }else{
                    return redirect()->route('admin.leads.show',$lead_id)->withError("Something went wrong")->withInput();
                }
            }
            

        } catch (Exception $ex) {
            return redirect()->route('admin.leads.show',$lead_id)->withError($ex->getMessage())->withInput();
        }
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateNote(Request $request,$id)
    {
        try {
                $request->validate([
                    'note' => 'required',
                    'datetime' => 'required',
                    'type' => 'required',
                ]);
                $lead_note = LeadNote::where("id", $request->note_id)->first();
                $lead_note->note = $request->note;
                $lead_note->datetime = $request->datetime;
                $lead_note->type = $request->type;
                if($lead_note->save()){
                    return back()->withSuccess("Task Updated Successfully")->withInput();
                }else{
                    return back()->withError("Something went wrong")->withInput();
                }
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateNoteStatus(Request $request,$id)
    {
        try {

                $current_datetime = Carbon::now();
                $lead_note = LeadNote::where("id", $id)->first();
                $lead_note->status = 1;
                $lead_note->datetime = $current_datetime->toDateTimeString();
                if($lead_note->save()){
                    return back()->withSuccess("Task Updated Successfully")->withInput();
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
    public function destroyNote($id)
    {
        try {

            $note = LeadNote::where("id", $id)->delete();
            if($note){
                return back()->withSuccess("Successfully Deleted")->withInput();
            }else{
                return back()->withError("Something went wrong")->withInput();
            }

        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }




}
