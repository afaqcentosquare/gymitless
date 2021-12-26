<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Customer;
use App\Models\Location;
use App\Models\Timing;
use App\Models\Lead;
use App\Models\CustomerNote;
use App\Models\Member;
use Carbon\Carbon;
use App\Models\LeadNote;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index')->with("customers", $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('admin.customers.add')->with("states", $states);
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
            'email' => 'required|email',
            'password' => 'required',
            'zip_code' => 'required',
            'location_name' => 'required',
            'contact' => 'required',
            'number' => 'required',
            'addressline1' => 'required',
            'state' => 'required',
            'website' => 'required',
            'payment_method' => 'required',
        ]);
        try {

            $customer = new Customer();
            $customer->user_id = session('user_id');
            $customer->company_name = $request->company_name;
            $customer->email = $request->email;
            $customer->password = $request->password;
            $customer->contact = $request->contact;
            $customer->number = $request->number;

            if($request->is_same_physical_address == "on"){
                $customer->mailing_addressline1 = $request->addressline1;
                $customer->mailing_addressline2 = $request->addressline2;
                $customer->mailing_city = $request->city;
                $customer->mailing_state_id = $request->state;
                $customer->mailing_zip_code = $request->zip_code;
            }else{
                $customer->mailing_addressline1 = $request->mailing_addressline1;
                $customer->mailing_addressline2 = $request->mailing_addressline2;
                $customer->mailing_city = $request->mailing_city;
                $customer->mailing_state_id = $request->mailing_state;
                $customer->mailing_zip_code = $request->mailing_zip_code;
            }

            $customer->payment_method = $request->payment_method;
            $customer->bank_routing_number = $request->bank_routing_number;
            $customer->bank_account_number = $request->bank_account_number;
            $customer->card_type = $request->card_type;
            $customer->card_number = $request->card_number;
            $customer->card_expiration_month = $request->card_expiration_month;
            $customer->card_expiration_year = $request->card_expiration_year;
            $customer->card_cvv = $request->card_cvv;
            $customer->save();

            $location = new Location();
            $location->customer_id = $customer->id;
            $location->location_type = "primary";
            $location->zip_code = $request->zip_code;
            $location->location_name = $request->location_name;
            $location->latitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->addressline1 = $request->addressline1;
            $location->addressline2 = $request->addressline2;
            $location->city = $request->city;
            $location->state_id = $request->state;
            $location->website = $request->website;
            $location->save();


            $monday_timing = new Timing();
            $monday_timing->customer_id = $customer->id;
            $monday_timing->location_id = $location->id;
            $monday_timing->day = $request->monday;
            $monday_timing->open_time = $request->monday_opentime;
            $monday_timing->close_time = $request->monday_closetime;
            $monday_timing->save();

            $tuesday_timing = new Timing();
            $tuesday_timing->customer_id = $customer->id;
            $tuesday_timing->location_id = $location->id;
            $tuesday_timing->day = $request->tuesday;
            $tuesday_timing->open_time = $request->tuesday_opentime;
            $tuesday_timing->close_time = $request->tuesday_closetime;
            $tuesday_timing->save();

            $wednesday_timing = new Timing();
            $wednesday_timing->customer_id = $customer->id;
            $wednesday_timing->location_id = $location->id;
            $wednesday_timing->day = $request->wednesday;
            $wednesday_timing->open_time = $request->wednesday_opentime;
            $wednesday_timing->close_time = $request->wednesday_closetime;
            $wednesday_timing->save();

            $thursday_timing = new Timing();
            $thursday_timing->customer_id = $customer->id;
            $thursday_timing->location_id = $location->id;
            $thursday_timing->day = $request->thursday;
            $thursday_timing->open_time = $request->thursday_opentime;
            $thursday_timing->close_time = $request->thursday_closetime;
            $thursday_timing->save();

            $friday_timing = new Timing();
            $friday_timing->customer_id = $customer->id;
            $friday_timing->location_id = $location->id;
            $friday_timing->day = $request->friday;
            $friday_timing->open_time = $request->friday_opentime;
            $friday_timing->close_time = $request->friday_closetime;
            $friday_timing->save();

            $saturday_timing = new Timing();
            $saturday_timing->customer_id = $customer->id;
            $saturday_timing->location_id = $location->id;
            $saturday_timing->day = $request->saturday;
            $saturday_timing->open_time = $request->saturday_opentime;
            $saturday_timing->close_time = $request->saturday_closetime;
            $saturday_timing->save();

            $sunday_timing = new Timing();
            $sunday_timing->customer_id = $customer->id;
            $sunday_timing->location_id = $location->id;
            $sunday_timing->day = $request->sunday;
            $sunday_timing->open_time = $request->sunday_opentime;
            $sunday_timing->close_time = $request->sunday_closetime;
            $sunday_timing->save();

            return redirect()->route('admin.customers.index')->withSuccess("Customer Added Successfully")->withInput();
            

        } catch (Exception $ex) {
            return redirect()->route('admin.customers.index')->withError($ex->getMessage())->withInput();
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
        $states = State::all();
        $customer = Customer::where("customers.id", $id)->join('locations', 'locations.customer_id', 'customers.id')
                            ->where('locations.location_type', "primary")->join("users",'users.id',"customers.user_id")->first();
        
        $secondary_locations_count = Location::where("customer_id", $id)->where("location_type", "secondary")->count();

        $tax_calculated = Location::where("customer_id", $id)->join("states", "states.id", "locations.state_id")->sum("tax");
        
        $locations = Location::where("customer_id", $id)->with(["timings"])->get();

        if($customer->payment_method == "credit_card"){
            $is_credit_card = ( 99.95 + $secondary_locations_count + $tax_calculated ) * 0.03;
            }else{
            $is_credit_card = 0;
            }
        $totalRC = 99.95 + $secondary_locations_count + $tax_calculated  + $is_credit_card ;

        $customerNotes = LeadNote::where("customer_id", $id)->get();
        $members = Member::where("customer_id", $id)->get();
        // return response()->json($customer);
        return view('admin.customers.view')->with("customer", $customer)
                                        ->with("states", $states)
                                        ->with("totalRC", $totalRC)
                                        ->with("tax_calculated", $tax_calculated)
                                        ->with("customerNotes", $customerNotes)
                                        ->with("members",$members)
                                        ->with("locations", $locations);
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
            'company_name' => 'required',
            'contact' => 'required',
            'number' => 'required',
            'password' => 'required',
            'addressline1' => 'required',
            // 'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ]);
        try {

           
            $customer = Customer::where("id", $id)->first();
            $customer->company_name = $request->company_name;
            // $customer->email = $request->email;
            $customer->password = $request->password;
            $customer->contact = $request->contact;
            $customer->number = $request->number;
            $customer->mailing_addressline1 = $request->mailing_addressline1;
            $customer->mailing_addressline2 = $request->mailing_addressline2;
            $customer->mailing_city = $request->mailing_city;
            $customer->mailing_state_id = $request->mailing_state;
            $customer->mailing_zip_code = $request->mailing_zip_code;
            $customer->save();

            $location = Location::where('customer_id', $id)->where('location_type', 'primary')->first();
            $location->zip_code = $request->zip_code;
            $location->addressline1 = $request->addressline1;
            $location->addressline2 = $request->addressline2;
            $location->city = $request->city;
            $location->state_id = $request->state;
            $location->save();


            return redirect()->route('admin.customer.show',$id)->withSuccess("Customer Updated Successfully")->withInput();
            

        } catch (Exception $ex) {
            return redirect()->route('admin.customer.show',$id)->withError($ex->getMessage())->withInput();
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNote(Request $request,$id)
    {
        $request->validate([
            'customer_note_type' => 'required',
        ]);
        try {

            if($request->customer_note_type == "note"){
                $request->validate([
                    'note' => 'required',
                ]);
                $customer_note = new LeadNote();
                $customer_note->customer_id = $id;
                $customer_note->note_type = $request->customer_note_type;
                $customer_note->note = $request->note;
                $customer_note->status = 1;
                if($customer_note->save()){
                    return redirect()->route('admin.customer.show',$id)->withSuccess("Note Added Successfully")->withInput();
                }else{
                    return redirect()->route('admin.customer.show',$id)->withError("Something went wrong")->withInput();
                }
            }else{
                $request->validate([
                    'note' => 'required',
                    'datetime' => 'required',
                    'type' => 'required',
                ]);
                $customer_note = new LeadNote();
                $customer_note->customer_id = $id;
                $customer_note->note_type = $request->customer_note_type;
                $customer_note->note = $request->note;
                $customer_note->datetime = $request->datetime;
                $customer_note->type = $request->type;
                $customer_note->status = 0;
                if($customer_note->save()){
                    return redirect()->route('admin.customer.show',$id)->withSuccess("Task Added Successfully")->withInput();
                }else{
                    return redirect()->route('admin.customer.show',$id)->withError("Something went wrong")->withInput();
                }
            }
            

        } catch (Exception $ex) {
            return redirect()->route('admin.customer.show',$id)->withError($ex->getMessage())->withInput();
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
                $customer_note = LeadNote::where("id", $request->note_id)->first();
                
                $customer_note->note = $request->note;
                $customer_note->datetime = $request->datetime;
                $customer_note->type = $request->type;
                if($customer_note->save()){
                    return redirect()->route('admin.tasks.index')->withSuccess("Task Updated Successfully")->withInput();
                }else{
                    return redirect()->route('admin.tasks.index')->withError("Something went wrong")->withInput();
                }
        } catch (Exception $ex) {
            return redirect()->route('admin.tasks.index')->withError($ex->getMessage())->withInput();
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
                $customer_note = LeadNote::where("id", $id)->first();
                $customer_note->status = 1;
                $customer_note->datetime = Carbon::now();
                if($customer_note->save()){
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


    public function addLocation(Request $request,$id)
    {
        $request->validate([
            'zip_code' => 'required',
            'location_name' => 'required',
            'addressline1' => 'required',
            'state' => 'required',
            'website' => 'required',
        ]);
        try {


            $location = new Location();
            $location->customer_id = $id;
            $location->location_type = "secondary";
            $location->zip_code = $request->zip_code;
            $location->location_name = $request->location_name;
            $location->latitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->addressline1 = $request->addressline1;
            $location->addressline2 = $request->addressline2;
            $location->city = $request->city;
            $location->state_id = $request->state;
            $location->website = $request->website;
            $location->save();


            $monday_timing = new Timing();
            $monday_timing->customer_id = $id;
            $monday_timing->location_id = $location->id;
            $monday_timing->day = $request->monday;
            $monday_timing->open_time = $request->monday_opentime;
            $monday_timing->close_time = $request->monday_closetime;
            $monday_timing->save();

            $tuesday_timing = new Timing();
            $tuesday_timing->customer_id = $id;
            $tuesday_timing->location_id = $location->id;
            $tuesday_timing->day = $request->tuesday;
            $tuesday_timing->open_time = $request->tuesday_opentime;
            $tuesday_timing->close_time = $request->tuesday_closetime;
            $tuesday_timing->save();

            $wednesday_timing = new Timing();
            $wednesday_timing->customer_id = $id;
            $wednesday_timing->location_id = $location->id;
            $wednesday_timing->day = $request->wednesday;
            $wednesday_timing->open_time = $request->wednesday_opentime;
            $wednesday_timing->close_time = $request->wednesday_closetime;
            $wednesday_timing->save();

            $thursday_timing = new Timing();
            $thursday_timing->customer_id = $id;
            $thursday_timing->location_id = $location->id;
            $thursday_timing->day = $request->thursday;
            $thursday_timing->open_time = $request->thursday_opentime;
            $thursday_timing->close_time = $request->thursday_closetime;
            $thursday_timing->save();

            $friday_timing = new Timing();
            $friday_timing->customer_id = $id;
            $friday_timing->location_id = $location->id;
            $friday_timing->day = $request->friday;
            $friday_timing->open_time = $request->friday_opentime;
            $friday_timing->close_time = $request->friday_closetime;
            $friday_timing->save();

            $saturday_timing = new Timing();
            $saturday_timing->customer_id = $id;
            $saturday_timing->location_id = $location->id;
            $saturday_timing->day = $request->saturday;
            $saturday_timing->open_time = $request->saturday_opentime;
            $saturday_timing->close_time = $request->saturday_closetime;
            $saturday_timing->save();

            $sunday_timing = new Timing();
            $sunday_timing->customer_id = $id;
            $sunday_timing->location_id = $location->id;
            $sunday_timing->day = $request->sunday;
            $sunday_timing->open_time = $request->sunday_opentime;
            $sunday_timing->close_time = $request->sunday_closetime;
            $sunday_timing->save();

            return redirect()->route('admin.customer.show', $id)->withSuccess("Location Added Successfully")->withInput();
            

        } catch (Exception $ex) {
            return redirect()->route('admin.customer.show', $id)->withError($ex->getMessage())->withInput();
        }
    }

    public function editLocation($id)
    {
        $states = State::all();
        $location = Location::where("id", $id)->with(["timings"])->first();

       // return response()->json($location);
        return view('admin.locations.edit')->with('states', $states)->with('location', $location);
    }


    public function updateLocation(Request $request,$id)
    {
        $request->validate([
            'zip_code' => 'required',
            'location_name' => 'required',
            'addressline1' => 'required',
            'state' => 'required',
            'website' => 'required',
        ]);
        try {


            $location = Location::where("id", $id)->first();
            $location->zip_code = $request->zip_code;
            $location->location_name = $request->location_name;
            $location->latitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->addressline1 = $request->addressline1;
            $location->addressline2 = $request->addressline2;
            // $location->city = $request->city;
            $location->state_id = $request->state;
            $location->website = $request->website;
            $location->save();

            if($request->monday_opentime == "close"){
                $request->monday_closetime = "close";
            }

            $monday_timing = Timing::where("id", $request->monday_id)->first();
            $monday_timing->customer_id = $id;
            $monday_timing->location_id = $location->id;
            $monday_timing->day = $request->monday;
            $monday_timing->open_time = $request->monday_opentime;
            $monday_timing->close_time = $request->monday_closetime;
            $monday_timing->save();

            if($request->tuesday_opentime == "close"){
                $request->tuesday_closetime = "close";
            }

            $tuesday_timing = Timing::where("id", $request->tuesday_id)->first();
            $tuesday_timing->customer_id = $id;
            $tuesday_timing->location_id = $location->id;
            $tuesday_timing->day = $request->tuesday;
            $tuesday_timing->open_time = $request->tuesday_opentime;
            $tuesday_timing->close_time = $request->tuesday_closetime;
            $tuesday_timing->save();


            if($request->wednesday_opentime == "close"){
                $request->wednesday_closetime = "close";
            }

            $wednesday_timing = Timing::where("id", $request->wednesday_id)->first();
            $wednesday_timing->customer_id = $id;
            $wednesday_timing->location_id = $location->id;
            $wednesday_timing->day = $request->wednesday;
            $wednesday_timing->open_time = $request->wednesday_opentime;
            $wednesday_timing->close_time = $request->wednesday_closetime;
            $wednesday_timing->save();

            if($request->thursday_opentime == "close"){
                $request->thursday_closetime = "close";
            }

            $thursday_timing = Timing::where("id", $request->thursday_id)->first();
            $thursday_timing->customer_id = $id;
            $thursday_timing->location_id = $location->id;
            $thursday_timing->day = $request->thursday;
            $thursday_timing->open_time = $request->thursday_opentime;
            $thursday_timing->close_time = $request->thursday_closetime;
            $thursday_timing->save();

            if($request->friday_opentime == "close"){
                $request->friday_closetime = "close";
            }

            $friday_timing = Timing::where("id", $request->friday_id)->first();
            $friday_timing->customer_id = $id;
            $friday_timing->location_id = $location->id;
            $friday_timing->day = $request->friday;
            $friday_timing->open_time = $request->friday_opentime;
            $friday_timing->close_time = $request->friday_closetime;
            $friday_timing->save();

            if($request->saturday_opentime == "close"){
                $request->saturday_closetime = "close";
            }

            $saturday_timing = Timing::where("id", $request->saturday_id)->first();
            $saturday_timing->customer_id = $id;
            $saturday_timing->location_id = $location->id;
            $saturday_timing->day = $request->saturday;
            $saturday_timing->open_time = $request->saturday_opentime;
            $saturday_timing->close_time = $request->saturday_closetime;
            $saturday_timing->save();

            if($request->sunday_opentime == "close"){
                $request->sunday_closetime = "close";
            }

            $sunday_timing = Timing::where("id", $request->sunday_id)->first();
            $sunday_timing->customer_id = $id;
            $sunday_timing->location_id = $location->id;
            $sunday_timing->day = $request->sunday;
            $sunday_timing->open_time = $request->sunday_opentime;
            $sunday_timing->close_time = $request->sunday_closetime;
            $sunday_timing->save();

            return redirect()->route('admin.customer.show', $location->customer_id)->withSuccess("Location Updated Successfully")->withInput();
            

        } catch (Exception $ex) {
            return redirect()->route('admin.customer.show', $location->customer_id)->withError($ex->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyLocation($id)
    {
        try {

            $location = Location::where("id", $id)->delete();
            $timings = Timing::where("location_id", $id)->delete();
            if($location && $timings){
                return back()->withSuccess("Successfully Deleted")->withInput();
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
    public function storeMember(Request $request, $id)
    {
        
        $request->validate([
            'member_name' => 'required',
            'location_name' => 'required',
        ]);
        try {
            $member = new Member();
            $member->customer_id = $id;
            $member->member_name = $request->member_name;
            $member->location_name = $request->location_name;
            $member->save();
            return redirect()->route('admin.customer.show', $id)->withSuccess("Member Added Successfully")->withInput();
        } catch (Exception $ex) {
            return redirect()->route('admin.customer.show', $id)->withError($ex->getMessage())->withInput();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateMember(Request $request, $id)
    {
        
        $request->validate([
            'member_name' => 'required',
            'location_name' => 'required',
        ]);
        try {
            $member = Member::where("id", $id)->first();
            $member->member_name = $request->member_name;
            $member->location_name = $request->location_name;
            $member->save();
            return back()->withSuccess("Member Updated Successfully")->withInput();
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
    public function destroyMember($id)
    {
        try {

            $member = Member::where("id", $id)->delete();
            if($member){
                return back()->withSuccess("Successfully Deleted")->withInput();
            }else{
                return back()->withError("Something went wrong")->withInput();
            }

        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    public function closeAccount($id)
    {
        try {

            $customer = Customer::where("id", $id)->first();
            $customer->account_status = 1;
            if($customer->save()){
                return redirect()->route('admin.customer.show',$id)->withSuccess("Successfully Account Closed")->withInput();
            }else{
                return redirect()->route('admin.customer.show',$id)->withError("Something went wrong")->withInput();
            }

        } catch (Exception $ex) {
            return redirect()->route('admin.customer.show',$id)->withError($ex->getMessage())->withInput();
        }
    }
}
