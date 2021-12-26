@extends('admin.master')
@section('title')
    <title>Gymitless | Customer View</title>
@endsection


@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->

        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Notice-->
                <br>
                <div class="card card-custom gutter-b">
                    
                </div>
                @if (session('success'))
                    <div class="p-7">
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                @if (session('error'))
                    <div class="p-7">
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            {{ session('error') }}
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                <div class="p-7">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ $error }}
                        @endforeach
                    </div>
                </div>
                @endif

                @if ($customer->account_status == 1)
                <div class="p-7">
                    <div class="account_close">
                        Account was closed!!!!
                    </div>
                </div>
                @endif
                <!--end::Notice-->
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                       
                        <div class="card-title">
                            <h3 class="card-label">View Customer
                                <!-- <span class="d-block text-muted pt-2 font-size-sm">scrollable datatable with fixed height</span> -->
                            </h3>
                        </div>

                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Billing tab</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3">Locations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4">Members</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel"
                                aria-labelledby="kt_tab_pane_1">
                                @if($customer->account_status == 0)
                                <div class="card-title row">
                                    <div class="col-lg-12 text-right">
                                        <!-- <a href="http://localhost/gymitless/administrator/close_account/1" onclick="closeAccount(1);" class="btn font-weight-bold btn-pill btn-light-danger btn-sm float-right"> -->
                                            
                                        <a href="{{route('admin.customer.closeaccount',$customer->customer_id)}}"
                                            class="btn font-weight-bold btn-pill btn-light-danger btn-sm float-right">
                                            <i class="flaticon-close"></i> Close Account
                                        </a>


                                        <button
                                            class="editfields btn font-weight-bold mr-2 btn-pill btn-light-warning btn-sm float-right">
                                            <i class="flaticon-edit"></i> Edit Account
                                        </button>
                                        <button
                                            class="editfieldscancel btn font-weight-bold mr-2 btn-pill btn-light-warning btn-sm float-right">
                                            <i class="flaticon-edit"></i> Cancel Edit
                                        </button>

                                        <div class="row text-left">
                                            <div class="col-lg-12">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endif
                                <form class="form" id="edit_account_form" action="{{ route('admin.customer.update', $customer->customer_id) }}"
                                    method="post">
                                    @csrf
                                    <div class="card-body">
                                        <!-- <div class="form-group row">
                                                        <div class="col-lg-2 offset-10 text-right">
                                                            <a href="http://localhost/gymitless/administrator/edit_customer" class="btn font-weight-bold btn-pill btn-light-warning float-right">
                                                                <i class="flaticon-edit-1"></i> Edit
                                                            </a>
                                                        </div>
                                                    </div> -->
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label>Account Number:</label>
                                                <input type="number" class="form-control notedit" disabled="disabled"
                                                    placeholder="Please Update your Account Number" name="accountnumber"
                                                    value="{{ $customer->customer_id }}" />
                                                <span class="form-text text-muted">Please Update your Account Number</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Company Name:</label>
                                                <input type="text" class="form-control notedit"
                                                    placeholder="Please Update your Company name" name="company_name"
                                                    value="{{ old('company_name', $customer->company_name) }}" />
                                                <span class="form-text text-muted">Please Update your Company name</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Contact:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control notedit"
                                                        placeholder="Enter your Contact Name" name="contact"
                                                        value="{{ old('contact', $customer->contact) }}" />
                                                    <div class="input-group-append"><span class="input-group-text"><i
                                                                class="la la-user"></i></span></div>
                                                </div>
                                                <span class="form-text text-muted">Please Update Contact Name</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label>Phone Number:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control notedit" id="userNumber"
                                                        placeholder="(000) 000-0000" name="number"
                                                        value="{{ old('number', $customer->number) }}" />
                                                    <div class="input-group-append"><span class="input-group-text"><i
                                                                class="la la-phone"></i></span></div>
                                                </div>
                                                <span class="form-text text-muted">Please Update your Phone Number</span>
                                            </div>
                                            <!-- <div class="col-lg-4">
                                                            <label>Email:</label>
                                                            <div class="input-group">
                                                                <input  type="email" class="form-control notedit" placeholder="Please Update your Email" name="email" value="samody@mailinator.com" />
                                                                <div class="input-group-append"><span class="input-group-text"><i class="flaticon-multimedia"></i></span></div>
                                                            </div>
                                                            <span class="form-text text-muted">Please Update your Email address</span>
                                                        </div> -->
                                            <div class="col-lg-4">
                                                <label>Password:</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control notedit"
                                                        placeholder="Please Update your password" name="password"
                                                        value="{{ old('password', $customer->password) }}" />
                                                    <div class="input-group-append"><span class="input-group-text"><i
                                                                class="flaticon-multimedia"></i></span></div>
                                                </div>
                                                <span class="form-text text-muted">Please Update your Password</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Account Manager:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control notedit" disabled="disabled"
                                                        name="account_manager" placeholder="abcd"
                                                        value="{{$customer->name }}" />
                                                </div>
                                                <span class="form-text text-muted">Please Update your Account Manager</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label>Date Added:</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control notedit" disabled="disabled"
                                                        placeholder="(00/00/0000)" name="created_at"
                                                        value="{{ date('Y-m-d', strtotime($customer->created_at)) }}" />
                                                    <div class="input-group-append"><span class="input-group-text"><i
                                                                class="la la-calendar"></i></span></div>
                                                </div>
                                                <span class="form-text text-muted">Please Update your Date Added</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label># of Locations:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control notedit" disabled="disabled"
                                                        placeholder="# of Locations active" name="num_locations"
                                                        value="{{$locations->count()}}" />
                                                    <div class="input-group-append"><span class="input-group-text"><i
                                                                class="la la-map"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-label">Primary Address
                                            <hr>
                                        </h4>
                                        <div class="form-group row">
                                            <!-- <div class="col-lg-4">
                                                            <label>Primary Address:</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control notedit" placeholder="Enter your address" name="primary_address" value="" />
                                                                <div class="input-group-append"></div>
                                                            </div>
                                                            <span class="form-text text-muted">Please Update your Primary Address</span>
                                                        </div> -->
                                            <div class="col-lg-12">
                                                <label>Address Line:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control notedit"
                                                        placeholder="Enter your address line 1" name="addressline1"
                                                        value="{{ old('addressline1', $customer->addressline1) }}" />
                                                    <div class="input-group-append"></div>
                                                </div>
                                                <span class="form-text text-muted">Please Update your Address Line 1</span>
                                            </div>
                                        </div>
                                       
                                        {{-- <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label>Address Line 2:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control notedit"
                                                        placeholder="Enter your address line 2" name="addressline2"
                                                        value="{{ old('addressline2', $customer->addressline2) }}" />
                                                    <div class="input-group-append"></div>
                                                </div>
                                                <span class="form-text text-muted">Please Update your Address Line 2</span>
                                            </div>
                                        </div> --}}

                                        <div class="form-group row">
                                            {{-- <div class="col-lg-4">
                                                <label>City:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control notedit"
                                                        placeholder="Enter your city" name="city"
                                                        value="{{ old('city', $customer->city) }}" />
                                                    <div class="input-group-append"></div>
                                                </div>
                                                <span class="form-text text-muted">Please Update your city</span>
                                            </div> --}}
                                            <div class="col-lg-4">
                                                <label>State:</label>
                                                <div class="input-group">
                                                    <select name="state" class="form-control">
                                                        <option value="">Select State</option>
                                                        @foreach ($states as $state)
                                                            @if ($customer->state_id == $state->id)
                                                                <option value="{{ $state->id }}" {{ 'selected' }}>
                                                                    {{ $state->state }}</option>
                                                            @else
                                                                <option value="{{ $state->id }}" @if (old('state') == $state->id) {{ 'selected' }} @endif>
                                                                    {{ $state->state }}</option>
                                                            @endif
                                                        @endforeach
    
                                                    </select>
                                                    <div class="input-group-append"></div>
                                                </div>
                                                <span class="form-text text-muted">Please Update your State</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Zip Code:</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control notedit"
                                                        placeholder="Enter your Zip Code" name="zip_code"
                                                        value="{{ old('zip_code', $customer->zip_code) }}" />
                                                    <div class="input-group-append"></div>
                                                </div>
                                                <span class="form-text text-muted">Please Update your Zip Code</span>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label>Mailing Address: <span class="required">*</span></label>
                                                <div class="checkbox-inline">
                                                    <label
                                                        class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary mb-2">
                                                        <input type="checkbox" id="mailingAddressCheckbox"
                                                            checked="checked">
                                                        <span></span>
                                                        Mailing address same as physical address.
                                                    </label>
                                                </div>
                                                <!-- IF NOT -->
                                                <label>If not, then fill out the details please: <span
                                                        class="required">*</span></label>
                                                <hr>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="mailing_address_div">
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>Address Line 1:</label>
                                                    <input type="text" name="mailing_addressline1"
                                                        class="form-control notedit"
                                                        placeholder="Please enter your Address Line 1."
                                                        value="{{ old('mailing_addressline1', $customer->mailing_addressline1) }}" />
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Address Line 2:</label>
                                                    <input type="text" name="mailing_addressline2"
                                                        class="form-control notedit"
                                                        placeholder="Please enter your Address Line 2."
                                                        value="{{ old('mailing_addressline2', $customer->mailing_addressline2) }}" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-4">
                                                    <label>City:</label>
                                                    <input type="text" name="mailing_city" class="form-control notedit"
                                                        placeholder="Please enter your City."
                                                        value="{{ old('mailing_city', $customer->mailing_city) }}" />
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>State:</label>
                                                    <select name="mailing_state" class="form-control">
                                                        <option value="0">Select State</option>
                                                        @foreach ($states as $state)
                                                            @if ($customer->mailing_state_id == $state->id)
                                                                <option value="{{ $state->id }}" {{ 'selected' }}>
                                                                    {{ $state->state }}</option>
                                                            @else
                                                                <option value="{{ $state->id }}" @if (old('mailing_state') == $state->id) {{ 'selected' }} @endif>
                                                                    {{ $state->state }}</option>
                                                            @endif
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>Zip Code:</label>
                                                    <input type="text" name="mailing_zip_code" class="form-control notedit"
                                                        maxlength="5"
                                                        value="{{ old('mailing_zip_code', $customer->mailing_zip_code) }}"
                                                        placeholder="Please enter yourZip Code." />
                                                </div>
                                            </div>
                                            <hr>
                                        </div> --}}


                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label>Payment Method:</label>
                                                <div class="input-group">

                                                    <input type="text" class="form-control notedit" disabled="disabled"
                                                        placeholder="Current billing method" name="payment_method"
                                                        value="{{$customer->payment_method.substr($customer->bank_account_number, -4)}}" />

                                                    <!-- <input type="text" class="form-control notedit" placeholder="Current billing method" name="payment_method" value="credit_card" /> -->
                                                    <div class="input-group-append"></div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-4">
                                                            <label>Checking Account:</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control notedit" placeholder="ACCT1234" name="checking_account" value="" />
                                                                <div class="input-group-append"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label>Credit Cards:</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control notedit" placeholder="VISA, MAST, AMEX, DISC" name="cardtype" value="DISC" />
                                                                <div class="input-group-append"></div>
                                                            </div>
                                                        </div> -->
                                            <div class="col-lg-4">
                                                <label>Monthly RC:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control notedit" disabled="disabled"
                                                        placeholder="total Monthly Recurring Charges." name="monthly_rc"
                                                        value="{{$totalRC}}" />
                                                </div>
                                                <!-- <div class="input-group">
                                                                <input type="text" class="form-control text-muted notedit" placeholder="current total monthly recurring charges " name="rc_amount" value="" />
                                                                <div class="input-group-append"></div>
                                                            </div> -->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    Notes:
                                                    @if ($customer->account_status == 0)
                                                    <a data-toggle="modal" data-target="#addnote"
                                                        class="btn ml-2 font-weight-bold btn-pill btn-sm btn-light-primary">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><i
                                                                class="flaticon-notes"></i></span>Add Notes</a>
                                                    @endif
                                                </label>
                
                
                
                                                {{-- <a data-toggle="modal" data-target="#addtask"
                                                        class="btn ml-2 font-weight-bold btn-pill btn-sm btn-light-primary">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><i
                                                                class="flaticon-notes"></i></span>Add Task</a> --}}
                
                
                                             
                
                                                <!--begin::Modal add note-->
                                                {{-- <div class="modal fade" id="addnote" tabindex="-1" role="dialog"
                                                        aria-labelledby="addnote" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Add Note:</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <form method="post" action="#">
                                                                    <div class="modal-body">
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-12">
                                                                                <label>Notes:</label>
                                                                                <div class="input-group">
                                                                                    <textarea class="form-control" name="note" id=""
                                                                                        cols="150" rows="3"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light-primary font-weight-bold"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary font-weight-bold">Save
                                                                            changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                <!--end::Modal add note-->
                
                
                                                <!--begin::Modal add task-->
                                                {{-- <div class="modal fade" id="addtask" tabindex="-1" role="dialog"
                                                        aria-labelledby="addtask" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Add Task:</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <form method="post" action="#">
                                                                    <div class="modal-body">
                                                                        <div class="form-group row">
                                                                            
                                                                            <div class="col-lg-6 task_notes"">
                                                                                <label>Date and Time Picker:</label>
                                                                                <div class="input-group">
                                                                                    <input type="datetime-local" name="datetime"
                                                                                        class="form-control" placeholder="00-00-00" />
                                                                                </div>
                                                                                <span class="form-text text-muted">Please select Date and
                                                                                    time</span>
                                                                            </div>
                                                                            <div class="col-lg-6 task_notes"">
                                                                                <label>Type:</label>
                                                                                <div class="dropdown bootstrap-select form-control dropup">
                                                                                    <select class="form-control selectpicker"
                                                                                        tabindex="null" name="type">
                                                                                        <option value="General">General</option>
                                                                                        <option value="Email">Email</option>
                                                                                        <option value="Call">Call</option>
                                                                                        <option value="Meeting">Meeting</option>
                                                                                    </select>
                                                                                </div>
                                                                                
                                                                                <span class="form-text text-muted">Please select the
                                                                                    Type</span>
                                                                            </div>
                
                                                                            <div class="col-lg-12">
                                                                                <label>Notes:</label>
                                                                                <div class="input-group">
                                                                                    <textarea class="form-control" name="note" id=""
                                                                                        cols="150" rows="3"></textarea>
                                                                                </div>
                                                                            </div>
                                                                          
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light-primary font-weight-bold"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary font-weight-bold">Save
                                                                            changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                <!--end::Modal add task-->
                
                
                
                
                
                
                
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr data-toggle="modal" data-target="#view_note">
                                                                <th>Id</th>
                                                                <th>Note Date</th>
                                                                <th>Note</th>
                                                                <th>Type</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="cursor:pointer;">
                
                                                            @foreach ($customerNotes as $customer_note)
                                                                <tr data-toggle="modal" data-target="#view_note{{ $customer_note->id }}">
                
                                                                    @if ($customer_note->note_type == 'note')
                                                                    <td>{{ $customer_note->id }}</td>
                                                                        <td width="15%">
                                                                            {{ date_format(date_create($customer_note->datetime), 'm-d-Y') }}
                                                                        </td>
                                                                        <td width="50%">{{ $customer_note->note }}</td>
                                                                        <td>Note</td>
                                                                        
                                                                        <td>Completed</td>
                                                                    @else
                                                                    <td>{{ $customer_note->id }}</td>
                                                                        <td width="15%">
                                                                            {{ date_format(date_create($customer_note->datetime), 'm-d-Y') }}
                                                                        </td>
                                                                        <td width="50%">{{ $customer_note->note }}</td>
                                                                        <td>{{ $customer_note->type }}</td>
                                                                        
                                                                        @if ($customer_note->status == 0)
                                                                            <td>Not Completed</td>
                                                                        @else
                                                                            <td>Completed</td>
                                                                        @endif
                                                                    @endif
                                                                </tr>
                
                                                </div>
                                            </div>
                
                                            <!--end::Modal View Note-->
                
                
                
                                            @endforeach
                                            </tbody>
                                            </table>
                                        </div>


                                               

                   
                </div>
            </div>
            <!-- <div class="form-group row">
                                                        <div class="col-lg-4">
                                                            <label>User Group:</label>
                                                            <div class="radio-inline">
                                                                <label class="radio radio-solid">
                                                                    <input type="radio" name="user_group" checked="checked" value="1"  />
                                                                    <span></span>
                                                                    Sales Person
                                                                </label>
                                                                <label class="radio radio-solid">
                                                                    <input type="radio" name="user_group" value="2"  />
                                                                    <span></span>
                                                                    Customer
                                                                </label>
                                                            </div>
                                                            <span class="form-text text-muted">Please select user group</span>
                                                        </div>
                                                    </div> -->
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    <div class="editaction">
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

    </div>
    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
        @if ($customer->account_status == 0)
        <div class="form-group row">
            <div class="col-lg-12 text-right">
                <a href="javascript:;" class="btn font-weight-bold btn-pill btn-sm btn-light-info" data-toggle="modal"
                    data-target="#request_credit">
                    <i class="flaticon-edit-1"></i> Credit
                </a>
                <a href="javascript:;" class="btn font-weight-bold btn-pill btn-sm btn-light-warning mr-1"
                    data-toggle="modal" data-target="#edit_billing_tab">
                    <i class="flaticon-edit-1"></i> Edit Payment Method
                </a>
                <button class="editfields btn font-weight-bold mr-2 btn-pill btn-light-warning btn-sm float-right">
                    <i class="flaticon-edit"></i> Edit Billing
                </button>
                <button class="editfieldscancel btn font-weight-bold mr-2 btn-pill btn-light-warning btn-sm float-right">
                    <i class="flaticon-edit"></i> Cancel Edit
                </button>
            </div>
        </div>
        @endif
        
        <!--begin::Modal Credit an amount-->
        <div class="modal fade" id="request_credit" tabindex="-1" role="dialog" aria-labelledby="request_credit"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Request a Credit on the Account:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form action="#" method="post">

                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-lg-4 mb-3">
                                    <label for="Amount">Amount</label>
                                    <div class="input-group" style="border-radius: 5px;">
                                        <div class="input-group-append" style="opacity: 1;"><span class="input-group-text"
                                                style="border-radius: 5px 0 0 5px; margin-right: -1px;"><i
                                                    class="la la-dollar"></i></span></div>
                                        <input type="number" class="form-control" placeholder="100" name="amount" value="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label>Notes:</label>
                                    <div class="input-group">
                                        <textarea class="form-control" id="" name="credit_note" cols="150"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Modal Credit an amount-->

        <!--begin::Modal Edit Billing tab (Payment Method)-->
        <div class="modal fade" id="edit_billing_tab" tabindex="-1" role="dialog" aria-labelledby="edit_billing_tab"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Payment Method:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form method="post" action="#">
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Payment Method: <span class="required">*</span></label>
                                    <div class="dropdown bootstrap-select form-control notedit">
                                        <select class="form-control selectpicker" name="payment_method" data-size="4"
                                            tabindex="null" id="payment_method">
                                            <option value="select payment method">Select Payment Method</option>
                                            <option value="bank_account">Bank Account</option>
                                            <option value="credit_card">Credit Card</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row bank_account">
                                <div class="col-lg-4">
                                    <label>Routing Number: <span class="required">*</span></label>
                                    <input type="text" name="routingnumber" class="form-control" id="kt_maxlength_1"
                                        maxlength="9" placeholder="Please Update your Routing Number" value="" />
                                </div>
                                <div class="col-lg-4">
                                    <label>Account Number: <span class="required">*</span></label>
                                    <input type="number" name="accountnumber" class="form-control"
                                        placeholder="Please Update your Account Number" value="" />
                                </div>
                            </div>

                            <div class="form-group row credit_card">
                                <div class="col-lg-4">
                                    <label>Card Type: <span class="required">*</span></label>
                                    <div class="dropdown bootstrap-select form-control">
                                        <select class="form-control notedit selectpicker" name="cardtype" data-size="4"
                                            tabindex="null">
                                            <option>Select card type</option>
                                            <option value="VISA">VISA</option>
                                            <option value="MAST">Mastercard</option>
                                            <option value="AMEX">American Express</option>
                                            <option value="DISC">Discover</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Card Number: <span class="required">*</span></label>
                                    <div class="dropdown bootstrap-select form-control ">
                                        <input type="number" name="cardnumber" value="" class="form-control "
                                            placeholder="Please Update your Card Number" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Expiration Month: <span class="required">*</span></label>
                                    <div class="dropdown bootstrap-select form-control ">
                                        <input type="number" name="expirationmonth" value="" class="form-control "
                                            placeholder="Please Update your Expiration Month" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row credit_card">
                                <div class="col-lg-4">
                                    <label>Expiration Year: <span class="required">*</span></label>
                                    <div class="dropdown bootstrap-select form-control ">
                                        <input type="number" name="expirationyear" value="" class="form-control "
                                            placeholder="Please Update your Expiration Year" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>CVV: <span class="required">*</span></label>
                                    <div class="dropdown bootstrap-select form-control ">
                                        <input type="number" name="cvv" value="" class="form-control "
                                            placeholder="Please Update your CVV" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="customer_id" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success font-weight-bold">Save</button>
                        </div>
                </div>
            </div>
            </form>
        </div>
        <!--end::Modal Edit Billing tab (Payment Method)-->

        <form class="form" method="post" action="#">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Payment Method:</label>
                        <!-- <input type="text" class="form-control notedit" placeholder="ACCT1234 or VISA1234" name="payment_method" value="Credit Card" /> -->
                        <input type="text" class="form-control notedit" disabled="disabled"
                            placeholder="Current billing method" name="payment_method" value="DISC3123" />
                        <div class="input-group-append"></div>
                    </div>
                    <div class="col-lg-4">
                        <label># of Locations:</label>
                        <input type="text" class="form-control notedit" placeholder="#no of Locations" name="no_location"
                            value="{{$locations->count()}}" />
                    </div>
                    <div class="col-lg-4">
                        <label>Monthly RC:</label>
                        <div class="input-group">

                            <input type="text" class="form-control notedit" disabled="disabled"
                                placeholder="total Monthly Recurring Charges." name="monthly_rc" value="{{$totalRC}}" />
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Processing fee:</label>
                        <div class="input-group">
                            <input type="number" class="form-control notedit" disabled="disabled" placeholder="$11111"
                                name="processing_fee" value="" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Taxes:</label>
                        <div class="input-group">
                            <input type="number" class="form-control notedit" disabled="disabled" placeholder="$11111"
                                name="taxes" value="{{$tax_calculated}}" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Total:</label>
                        <div class="input-group">
                            <input type="text" class="form-control notedit" disabled="disabled" name="total"
                                placeholder="$99999" value="{{$totalRC}}" />
                        </div>
                    </div>
                </div>
                <input type="hidden" name="created_at" value="10-05-2021">
                <hr>
                <br>
                <h5>Billing Activity:</h5>
                <br>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Numbers</th>
                                        <th>Transactions</th>
                                        <th>Amount</th>
                                        <th>Approval Date & Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>dfgdfg</td>
                                        <td>dfgdfg</td>
                                        <td>dfgdfg</td>
                                        <td>dfgdfg</td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2"
                                                title="Edit details" data-toggle="modal" data-target="#updatemember">
                                                <span class="svg-icon svg-icon-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path
                                                                d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                fill="#000000" fill-rule="nonzero" \
                                                                transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15"
                                                                height="2" rx="1" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-clean btn-icon" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this member?');">
                                                <span class="svg-icon svg-icon-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path
                                                                d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                fill="#000000" fill-rule="nonzero" />
                                                            <path
                                                                d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="customer_id" value="1">

            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="editaction">
                            <button type="submit" class="btn btn-primary mr-2">Save</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3">

        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Notice-->

                <!--end::Notice-->
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">Locations Table</h3>
                        </div>
                        @if ($customer->account_status == 0)
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            
                            <a href="#" class="btn font-weight-bold btn-pill btn-light-info mr-1" data-toggle="modal"
                            data-target="#addlocation">
                            <span class="svg-icon svg-icon-md">
                                <i class="flaticon-map-location"></i>
                            </span>Add Location screen</a>
                            
                            <!--end::Button-->

                            <!--begin::Modal Add Location-->
                            <div class="modal fade" id="addlocation" tabindex="-1" role="dialog" aria-labelledby="addnote"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Location:</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <form method="post" action="{{route('admin.customer.addlocation', $customer->customer_id)}}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Zip Code: <span class="required">*</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="abcd"
                                                                name="zip_code" />
                                                        </div>
                                                        @if($errors->has('zip_code'))
                                                        <span class="form-text">{{ $errors->first('zip_code') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Location Name: <span class="required">*</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="abcd"
                                                                name="location_name" />
                                                        </div>
                                                        @if($errors->has('location_name'))
                                                        <span class="form-text">{{ $errors->first('location_name') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Address Line: <span class="required">*</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="addressline1" value="{{old('addressline1')}}" id="autocomplete" placeholder="Please enter your Address" />
                                                        </div>
                                                        @if($errors->has('addressline1'))
                                                        <span class="form-text">{{ $errors->first('addressline1') }}</span>
                                                        @endif
                                                        <div class="form-group" id="lat_area">
                                                            <label for="latitude"> Latitude </label>
                                                            <input type="text" name="latitude" id="latitude" value="{{old('latitude')}}" class="form-control">
                                                        </div>
                                
                                                        <div class="form-group" id="long_area">
                                                            <label for="latitude"> Longitude </label>
                                                            <input type="text" name="longitude" id="longitude" value="{{old('longitude')}}" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {{-- <div class="col-lg-4">
                                                        <label>Address Line 2:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="abcd"
                                                                name="addressline2" />
                                                        </div>
                                                        @if($errors->has('addressline2'))
                                                        <span class="form-text">{{ $errors->first('addressline2') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>City: <span class="required">*</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="abcd"
                                                                name="city" />
                                                        </div>
                                                        @if($errors->has('city'))
                                                        <span class="form-text">{{ $errors->first('city') }}</span>
                                                        @endif
                                                    </div> --}}
                                                    <div class="col-lg-4">
                                                        <label>State: <span class="required">*</span></label>
                                                        <select name="state" class="form-control">
                                                            <option value="">Select State</option>
                                                            @foreach ($states as $state)
                                                            <option value="{{$state->id}}" @if (old('state') == $state->id) {{ 'selected' }} @endif>{{$state->state}}</option>
                                                            @endforeach

                                                        </select>
                                                        @if($errors->has('state'))
                                                        <span class="form-text">{{ $errors->first('state') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label>Website:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="abcd"
                                                                name="website" />
                                                        </div>
                                                        @if($errors->has('website'))
                                                        <span class="form-text">{{ $errors->first('website') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Location Type:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="location_type" class="form-control" value="Secondary" placeholder="Please Update your Close timings" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="monday" value="monday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd" value="monday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time:</label>
                                                        <select name="monday_opentime" id="monday_opentime" class="form-control">
                                                            <option value="close" @if (old('monday_opentime') == "close") {{ 'selected' }} @endif>Close</option>
                                                            <option value="12:00 AM" @if (old('monday_opentime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('monday_opentime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('monday_opentime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('monday_opentime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('monday_opentime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('monday_opentime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('monday_opentime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('monday_opentime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('monday_opentime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('monday_opentime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('monday_opentime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('monday_opentime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('monday_opentime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('monday_opentime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('monday_opentime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('monday_opentime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('monday_opentime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('monday_opentime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('monday_opentime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('monday_opentime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('monday_opentime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('monday_opentime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('monday_opentime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('monday_opentime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('monday_opentime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('monday_opentime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('monday_opentime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('monday_opentime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('monday_opentime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('monday_opentime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('monday_opentime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('monday_opentime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('monday_opentime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('monday_opentime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('monday_opentime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('monday_opentime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('monday_opentime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('monday_opentime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('monday_opentime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('monday_opentime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('monday_opentime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('monday_opentime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('monday_opentime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('monday_opentime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('monday_opentime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('monday_opentime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('monday_opentime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('monday_opentime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('monday_opentime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        @if($errors->has('monday_opentime'))
                                                            <span class="form-text">{{ $errors->first('monday_opentime') }}</span>
                                                        @endif
                                                        {{-- <input type="time" name="monday_opentime" value="{{old('monday_opentime')}}" class="form-control" placeholder="Please Update your Open timings" /> --}}
                                                    </div>
                                                    <div class="col-lg-4" id="monday_close_time" style="display: none">
                                                        <label>Staffed hours - Close Time:</label>
                                                        <select name="monday_closetime" id="monday_closetime" class="form-control">
                                                            <option value="12:00 AM" @if (old('monday_closetime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('monday_closetime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('monday_closetime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('monday_closetime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('monday_closetime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('monday_closetime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('monday_closetime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('monday_closetime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('monday_closetime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('monday_closetime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('monday_closetime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('monday_closetime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('monday_closetime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('monday_closetime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('monday_closetime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('monday_closetime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('monday_closetime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('monday_closetime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('monday_closetime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('monday_closetime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('monday_closetime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('monday_closetime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('monday_closetime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('monday_closetime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('monday_closetime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('monday_closetime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('monday_closetime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('monday_closetime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('monday_closetime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('monday_closetime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('monday_closetime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('monday_closetime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('monday_closetime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('monday_closetime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('monday_closetime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('monday_closetime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('monday_closetime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('monday_closetime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('monday_closetime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('monday_closetime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('monday_closetime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('monday_closetime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('monday_closetime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('monday_closetime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('monday_closetime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('monday_closetime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('monday_closetime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('monday_closetime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('monday_closetime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        @if($errors->has('monday_closetime'))
                                                            <span class="form-text">{{ $errors->first('monday_closetime') }}</span>
                                                        @endif
                                                        {{-- <input type="time" name="monday_closetime" value="{{old('monday_closetime')}}" class="form-control" placeholder="Please Update your Close timings" /> --}}
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="tuesday" value="tuesday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd" value="tuesday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4" >
                                                        <label>Staffed hours - Open Time:</label>
                                                        <select name="tuesday_opentime" id="tuesday_opentime" class="form-control">
                                                            <option value="close" @if (old('tuesday_opentime') == "close") {{ 'selected' }} @endif>Close</option>
                                                            <option value="12:00 AM" @if (old('tuesday_opentime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('tuesday_opentime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('tuesday_opentime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('tuesday_opentime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('tuesday_opentime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('tuesday_opentime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('tuesday_opentime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('tuesday_opentime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('tuesday_opentime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('tuesday_opentime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('tuesday_opentime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('tuesday_opentime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('tuesday_opentime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('tuesday_opentime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('tuesday_opentime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('tuesday_opentime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('tuesday_opentime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('tuesday_opentime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('tuesday_opentime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('tuesday_opentime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('tuesday_opentime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('tuesday_opentime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('tuesday_opentime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('tuesday_opentime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('tuesday_opentime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('tuesday_opentime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('tuesday_opentime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('tuesday_opentime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('tuesday_opentime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('tuesday_opentime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('tuesday_opentime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('tuesday_opentime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('tuesday_opentime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('tuesday_opentime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('tuesday_opentime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('tuesday_opentime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('tuesday_opentime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('tuesday_opentime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('tuesday_opentime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('tuesday_opentime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('tuesday_opentime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('tuesday_opentime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('tuesday_opentime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('tuesday_opentime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('tuesday_opentime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('tuesday_opentime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('tuesday_opentime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('tuesday_opentime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('tuesday_opentime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        {{-- <input type="time" name="tuesday_opentime" value="{{old('tuesday_opentime')}}" class="form-control" placeholder="Please Update your Open timings" /> --}}
                                                        @if($errors->has('tuesday_opentime'))
                                                            <span class="form-text">{{ $errors->first('tuesday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4" id="tuesday_closetime" style="display: none">
                                                        <label>Staffed hours - Close Time:</label>
                                                        <select name="tuesday_closetime" id="tuesday_closetime" class="form-control">
                                                            <option value="12:00 AM" @if (old('tuesday_closetime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('tuesday_closetime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('tuesday_closetime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('tuesday_closetime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('tuesday_closetime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('tuesday_closetime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('tuesday_closetime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('tuesday_closetime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('tuesday_closetime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('tuesday_closetime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('tuesday_closetime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('tuesday_closetime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('tuesday_closetime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('tuesday_closetime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('tuesday_closetime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('tuesday_closetime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('tuesday_closetime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('tuesday_closetime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('tuesday_closetime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('tuesday_closetime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('tuesday_closetime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('tuesday_closetime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('tuesday_closetime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('tuesday_closetime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('tuesday_closetime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('tuesday_closetime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('tuesday_closetime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('tuesday_closetime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('tuesday_closetime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('tuesday_closetime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('tuesday_closetime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('tuesday_closetime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('tuesday_closetime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('tuesday_closetime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('tuesday_closetime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('tuesday_closetime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('tuesday_closetime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('tuesday_closetime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('tuesday_closetime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('tuesday_closetime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('tuesday_closetime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('tuesday_closetime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('tuesday_closetime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('tuesday_closetime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('tuesday_closetime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('tuesday_closetime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('tuesday_closetime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('tuesday_closetime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('tuesday_closetime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        {{-- <input type="time" name="tuesday_closetime" value="{{old('tuesday_closetime')}}" class="form-control" placeholder="Please Update your Close timings" /> --}}
                                                        @if($errors->has('tuesday_closetime'))
                                                            <span class="form-text">{{ $errors->first('tuesday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="wednesday" value="wednesday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd"  value="wednesday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time:</label>
                                                        <select name="wednesday_opentime" id="wednesday_opentime" class="form-control">
                                                            <option value="close" @if (old('wednesday_opentime') == "close") {{ 'selected' }} @endif>Close</option>
                                                            <option value="12:00 AM" @if (old('wednesday_opentime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('wednesday_opentime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('wednesday_opentime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('wednesday_opentime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('wednesday_opentime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('wednesday_opentime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('wednesday_opentime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('wednesday_opentime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('wednesday_opentime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('wednesday_opentime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('wednesday_opentime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('wednesday_opentime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('wednesday_opentime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('wednesday_opentime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('wednesday_opentime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('wednesday_opentime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('wednesday_opentime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('wednesday_opentime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('wednesday_opentime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('wednesday_opentime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('wednesday_opentime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('wednesday_opentime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('wednesday_opentime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('wednesday_opentime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('wednesday_opentime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('wednesday_opentime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('wednesday_opentime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('wednesday_opentime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('wednesday_opentime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('wednesday_opentime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('wednesday_opentime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('wednesday_opentime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('wednesday_opentime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('wednesday_opentime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('wednesday_opentime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('wednesday_opentime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('wednesday_opentime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('wednesday_opentime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('wednesday_opentime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('wednesday_opentime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('wednesday_opentime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('wednesday_opentime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('wednesday_opentime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('wednesday_opentime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('wednesday_opentime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('wednesday_opentime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('wednesday_opentime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('wednesday_opentime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('wednesday_opentime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        {{-- <input type="time" name="wednesday_opentime" value="{{old('wednesday_opentime')}}"  class="form-control" placeholder="Please Update your Open timings" /> --}}
                                                        @if($errors->has('wednesday_opentime'))
                                                            <span class="form-text">{{ $errors->first('wednesday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4" id="wednesday_closetime" style="display: none">
                                                        <label>Staffed hours - Close Time:</label>
                                                        <select name="wednesday_closetime" id="wednesday_closetime" class="form-control">
                                                            <option value="12:00 AM" @if (old('wednesday_closetime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('wednesday_closetime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('wednesday_closetime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('wednesday_closetime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('wednesday_closetime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('wednesday_closetime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('wednesday_closetime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('wednesday_closetime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('wednesday_closetime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('wednesday_closetime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('wednesday_closetime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('wednesday_closetime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('wednesday_closetime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('wednesday_closetime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('wednesday_closetime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('wednesday_closetime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('wednesday_closetime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('wednesday_closetime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('wednesday_closetime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('wednesday_closetime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('wednesday_closetime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('wednesday_closetime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('wednesday_closetime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('wednesday_closetime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('wednesday_closetime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('wednesday_closetime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('wednesday_closetime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('wednesday_closetime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('wednesday_closetime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('wednesday_closetime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('wednesday_closetime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('wednesday_closetime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('wednesday_closetime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('wednesday_closetime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('wednesday_closetime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('wednesday_closetime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('wednesday_closetime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('wednesday_closetime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('wednesday_closetime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('wednesday_closetime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('wednesday_closetime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('wednesday_closetime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('wednesday_closetime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('wednesday_closetime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('wednesday_closetime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('wednesday_closetime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('wednesday_closetime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('wednesday_closetime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('wednesday_closetime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        {{-- <input type="time" name="wednesday_closetime" value="{{old('wednesday_closetime')}}" class="form-control" placeholder="Please Update your Close timings" /> --}}
                                                        @if($errors->has('wednesday_closetime'))
                                                            <span class="form-text">{{ $errors->first('wednesday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="thursday" value="thursday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd"  value="thursday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time:</label>
                                                        <select name="thursday_opentime" id="thursday_opentime" class="form-control">
                                                            <option value="close" @if (old('thursday_opentime') == "close") {{ 'selected' }} @endif>Close</option>
                                                            <option value="12:00 AM" @if (old('thursday_opentime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('thursday_opentime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('thursday_opentime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('thursday_opentime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('thursday_opentime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('thursday_opentime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('thursday_opentime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('thursday_opentime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('thursday_opentime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('thursday_opentime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('thursday_opentime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('thursday_opentime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('thursday_opentime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('thursday_opentime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('thursday_opentime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('thursday_opentime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('thursday_opentime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('thursday_opentime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('thursday_opentime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('thursday_opentime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('thursday_opentime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('thursday_opentime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('thursday_opentime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('thursday_opentime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('thursday_opentime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('thursday_opentime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('thursday_opentime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('thursday_opentime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('thursday_opentime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('thursday_opentime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('thursday_opentime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('thursday_opentime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('thursday_opentime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('thursday_opentime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('thursday_opentime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('thursday_opentime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('thursday_opentime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('thursday_opentime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('thursday_opentime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('thursday_opentime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('thursday_opentime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('thursday_opentime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('thursday_opentime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('thursday_opentime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('thursday_opentime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('thursday_opentime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('thursday_opentime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('thursday_opentime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('thursday_opentime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        {{-- <input type="time" name="thursday_opentime" value="{{old('thursday_opentime')}}"  class="form-control" placeholder="Please Update your Open timings" /> --}}
                                                        @if($errors->has('thursday_opentime'))
                                                            <span class="form-text">{{ $errors->first('thursday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4" id="thursday_closetime" style="display: none">
                                                        <label>Staffed hours - Close Time:</label>
                                                        <select name="thursday_closetime" id="thursday_closetime" class="form-control">
                                                            <option value="12:00 AM" @if (old('thursday_closetime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('thursday_closetime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('thursday_closetime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('thursday_closetime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('thursday_closetime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('thursday_closetime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('thursday_closetime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('thursday_closetime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('thursday_closetime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('thursday_closetime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('thursday_closetime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('thursday_closetime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('thursday_closetime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('thursday_closetime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('thursday_closetime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('thursday_closetime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('thursday_closetime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('thursday_closetime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('thursday_closetime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('thursday_closetime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('thursday_closetime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('thursday_closetime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('thursday_closetime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('thursday_closetime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('thursday_closetime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('thursday_closetime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('thursday_closetime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('thursday_closetime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('thursday_closetime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('thursday_closetime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('thursday_closetime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('thursday_closetime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('thursday_closetime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('thursday_closetime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('thursday_closetime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('thursday_closetime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('thursday_closetime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('thursday_closetime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('thursday_closetime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('thursday_closetime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('thursday_closetime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('thursday_closetime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('thursday_closetime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('thursday_closetime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('thursday_closetime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('thursday_closetime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('thursday_closetime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('thursday_closetime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('thursday_closetime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        {{-- <input type="time" name="thursday_closetime" value="{{old('thursday_closetime')}}"  class="form-control" placeholder="Please Update your Close timings" /> --}}
                                                        @if($errors->has('thursday_closetime'))
                                                            <span class="form-text">{{ $errors->first('thursday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="friday" value="friday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd"  value="friday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time: <span class="required">*</span></label>
                                                        <select name="friday_opentime" id="friday_opentime" class="form-control">
                                                            <option value="close" @if (old('friday_opentime') == "close") {{ 'selected' }} @endif>Close</option>
                                                            <option value="12:00 AM" @if (old('friday_opentime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('friday_opentime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('friday_opentime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('friday_opentime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('friday_opentime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('friday_opentime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('friday_opentime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('friday_opentime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('friday_opentime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('friday_opentime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('friday_opentime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('friday_opentime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('friday_opentime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('friday_opentime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('friday_opentime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('friday_opentime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('friday_opentime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('friday_opentime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('friday_opentime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('friday_opentime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('friday_opentime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('friday_opentime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('friday_opentime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('friday_opentime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('friday_opentime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('friday_opentime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('friday_opentime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('friday_opentime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('friday_opentime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('friday_opentime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('friday_opentime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('friday_opentime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('friday_opentime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('friday_opentime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('friday_opentime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('friday_opentime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('friday_opentime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('friday_opentime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('friday_opentime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('friday_opentime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('friday_opentime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('friday_opentime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('friday_opentime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('friday_opentime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('friday_opentime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('friday_opentime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('friday_opentime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('friday_opentime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('friday_opentime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        {{-- <input type="time" name="friday_opentime" class="form-control" value="{{old('friday_opentime')}}"  placeholder="Please Update your Open timings" /> --}}
                                                        @if($errors->has('friday_opentime'))
                                                            <span class="form-text">{{ $errors->first('friday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4" id="friday_closetime" style="display: none">
                                                        <label>Staffed hours - Close Time: <span class="required">*</span></label>
                                                        <select name="friday_closetime" id="friday_closetime" class="form-control">
                                                            <option value="12:00 AM" @if (old('friday_closetime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('friday_closetime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('friday_closetime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('friday_closetime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('friday_closetime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('friday_closetime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('friday_closetime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('friday_closetime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('friday_closetime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('friday_closetime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('friday_closetime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('friday_closetime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('friday_closetime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('friday_closetime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('friday_closetime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('friday_closetime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('friday_closetime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('friday_closetime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('friday_closetime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('friday_closetime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('friday_closetime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('friday_closetime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('friday_closetime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('friday_closetime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('friday_closetime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('friday_closetime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('friday_closetime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('friday_closetime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('friday_closetime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('friday_closetime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('friday_closetime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('friday_closetime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('friday_closetime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('friday_closetime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('friday_closetime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('friday_closetime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('friday_closetime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('friday_closetime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('friday_closetime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('friday_closetime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('friday_closetime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('friday_closetime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('friday_closetime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('friday_closetime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('friday_closetime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('friday_closetime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('friday_closetime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('friday_closetime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('friday_closetime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        {{-- <input type="time" name="friday_closetime" class="form-control" value="{{old('friday_closetime')}}"  placeholder="Please Update your Close timings" /> --}}
                                                        @if($errors->has('friday_closetime'))
                                                            <span class="form-text">{{ $errors->first('friday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="saturday" value="saturday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd"  value="saturday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time:</label>
                                                        <select name="saturday_opentime" id="saturday_opentime" class="form-control">
                                                            <option value="close" @if (old('saturday_opentime') == "close") {{ 'selected' }} @endif>Close</option>
                                                            <option value="12:00 AM" @if (old('saturday_opentime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('saturday_opentime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('saturday_opentime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('saturday_opentime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('saturday_opentime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('saturday_opentime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('saturday_opentime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('saturday_opentime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('saturday_opentime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('saturday_opentime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('saturday_opentime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('saturday_opentime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('saturday_opentime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('saturday_opentime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('saturday_opentime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('saturday_opentime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('saturday_opentime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('saturday_opentime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('saturday_opentime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('saturday_opentime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('saturday_opentime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('saturday_opentime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('saturday_opentime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('saturday_opentime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('saturday_opentime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('saturday_opentime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('saturday_opentime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('saturday_opentime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('saturday_opentime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('saturday_opentime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('saturday_opentime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('saturday_opentime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('saturday_opentime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('saturday_opentime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('saturday_opentime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('saturday_opentime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('saturday_opentime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('saturday_opentime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('saturday_opentime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('saturday_opentime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('saturday_opentime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('saturday_opentime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('saturday_opentime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('saturday_opentime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('saturday_opentime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('saturday_opentime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('saturday_opentime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('saturday_opentime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('saturday_opentime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        {{-- <input type="time" name="saturday_opentime" class="form-control" value="{{old('saturday_opentime')}}"  placeholder="Please Update your Open timings" /> --}}
                                                        @if($errors->has('saturday_opentime'))
                                                            <span class="form-text">{{ $errors->first('saturday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4" id="saturday_closetime" style="display: none">
                                                        <label>Staffed hours - Close Time:</label>
                                                        <select name="saturday_closetime" id="saturday_closetime" class="form-control">
                                                            <option value="12:00 AM" @if (old('saturday_closetime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('saturday_closetime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('saturday_closetime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('saturday_closetime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('saturday_closetime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('saturday_closetime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('saturday_closetime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('saturday_closetime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('saturday_closetime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('saturday_closetime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('saturday_closetime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('saturday_closetime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('saturday_closetime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('saturday_closetime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('saturday_closetime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('saturday_closetime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('saturday_closetime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('saturday_closetime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('saturday_closetime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('saturday_closetime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('saturday_closetime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('saturday_closetime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('saturday_closetime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('saturday_closetime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('saturday_closetime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('saturday_closetime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('saturday_closetime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('saturday_closetime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('saturday_closetime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('saturday_closetime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('saturday_closetime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('saturday_closetime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('saturday_closetime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('saturday_closetime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('saturday_closetime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('saturday_closetime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('saturday_closetime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('saturday_closetime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('saturday_closetime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('saturday_closetime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('saturday_closetime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('saturday_closetime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('saturday_closetime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('saturday_closetime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('saturday_closetime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('saturday_closetime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('saturday_closetime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('saturday_closetime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('saturday_closetime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        {{-- <input type="time" name="saturday_closetime" class="form-control" value="{{old('saturday_closetime')}}"  placeholder="Please Update your Close timings" /> --}}
                                                        @if($errors->has('saturday_closetime'))
                                                            <span class="form-text">{{ $errors->first('saturday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="sunday" value="sunday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd"  value="sunday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time:</label>
                                                        <select name="sunday_opentime" id="sunday_opentime" class="form-control">
                                                            <option value="close" @if (old('sunday_opentime') == "close") {{ 'selected' }} @endif>Close</option>
                                                            <option value="12:00 AM" @if (old('sunday_opentime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('sunday_opentime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('sunday_opentime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('sunday_opentime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('sunday_opentime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('sunday_opentime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('sunday_opentime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('sunday_opentime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('sunday_opentime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('sunday_opentime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('sunday_opentime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('sunday_opentime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('sunday_opentime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('sunday_opentime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('sunday_opentime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('sunday_opentime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('sunday_opentime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('sunday_opentime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('sunday_opentime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('sunday_opentime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('sunday_opentime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('sunday_opentime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('sunday_opentime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('sunday_opentime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('sunday_opentime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('sunday_opentime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('sunday_opentime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('sunday_opentime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('sunday_opentime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('sunday_opentime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('sunday_opentime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('sunday_opentime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('sunday_opentime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('sunday_opentime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('sunday_opentime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('sunday_opentime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('sunday_opentime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('sunday_opentime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('sunday_opentime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('sunday_opentime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('sunday_opentime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('sunday_opentime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('sunday_opentime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('sunday_opentime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('sunday_opentime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('sunday_opentime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('sunday_opentime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('sunday_opentime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('sunday_opentime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        {{-- <input type="time" name="sunday_opentime" class="form-control" value="{{old('sunday_opentime')}}"  placeholder="Please Update your Open timings" /> --}}
                                                        @if($errors->has('sunday_opentime'))
                                                            <span class="form-text">{{ $errors->first('sunday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4" id="sunday_closetime" style="display: none">
                                                        <label>Staffed hours - Close Time:</label>
                                                        <select name="sunday_closetime" id="sunday_closetime" class="form-control">
                                                            <option value="12:00 AM" @if (old('sunday_closetime') == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                            <option value="12:30 AM" @if (old('sunday_closetime') == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                            <option value="1:00 AM" @if (old('sunday_closetime') == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                            <option value="1:30 AM" @if (old('sunday_closetime') == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                            <option value="2:00 AM" @if (old('sunday_closetime') == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                            <option value="2:30 AM" @if (old('sunday_closetime') == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                            <option value="3:00 AM" @if (old('sunday_closetime') == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                            <option value="3:30 AM" @if (old('sunday_closetime') == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                            <option value="4:00 AM" @if (old('sunday_closetime') == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                            <option value="4:30 AM" @if (old('sunday_closetime') == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                            <option value="5:00 AM" @if (old('sunday_closetime') == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                            <option value="5:30 AM" @if (old('sunday_closetime') == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                            <option value="6:00 AM" @if (old('sunday_closetime') == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                            <option value="6:30 AM" @if (old('sunday_closetime') == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                            <option value="7:00 AM" @if (old('sunday_closetime') == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                            <option value="7:30 AM" @if (old('sunday_closetime') == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                            <option value="8:00 AM" @if (old('sunday_closetime') == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                            <option value="8:30 AM" @if (old('sunday_closetime') == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                            <option value="9:00 AM" @if (old('sunday_closetime') == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                            <option value="9:30 AM" @if (old('sunday_closetime') == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                            <option value="10:00 AM" @if (old('sunday_closetime') == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                            <option value="10:30 AM" @if (old('sunday_closetime') == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                            <option value="11:00 AM" @if (old('sunday_closetime') == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                            <option value="11:30 AM" @if (old('sunday_closetime') == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                            <option value="12:00 PM" @if (old('sunday_closetime') == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                            <option value="12:30 PM" @if (old('sunday_closetime') == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                            <option value="1:00 PM" @if (old('sunday_closetime') == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                            <option value="1:30 PM" @if (old('sunday_closetime') == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                            <option value="2:00 PM" @if (old('sunday_closetime') == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                            <option value="2:30 PM" @if (old('sunday_closetime') == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                            <option value="3:00 PM" @if (old('sunday_closetime') == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                            <option value="3:30 PM" @if (old('sunday_closetime') == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                            <option value="4:00 PM" @if (old('sunday_closetime') == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                            <option value="4:30 PM" @if (old('sunday_closetime') == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                            <option value="5:00 PM" @if (old('sunday_closetime') == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                            <option value="5:30 PM" @if (old('sunday_closetime') == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                            <option value="6:00 PM" @if (old('sunday_closetime') == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                            <option value="6:30 PM" @if (old('sunday_closetime') == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                            <option value="7:00 PM" @if (old('sunday_closetime') == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                            <option value="7:30 PM" @if (old('sunday_closetime') == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                            <option value="8:00 PM" @if (old('sunday_closetime') == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                            <option value="8:30 PM" @if (old('sunday_closetime') == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                            <option value="9:00 PM" @if (old('sunday_closetime') == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                            <option value="9:30 PM" @if (old('sunday_closetime') == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                            <option value="10:00 PM" @if (old('sunday_closetime') == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                            <option value="10:30 PM" @if (old('sunday_closetime') == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                            <option value="11:00 PM" @if (old('sunday_closetime') == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                            <option value="11:30 PM" @if (old('sunday_closetime') == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                            <option value="11:59 PM" @if (old('sunday_closetime') == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                        </select>
                                                        {{-- <input type="time" name="sunday_closetime" class="form-control" value="{{old('sunday_closetime')}}" placeholder="Please Update your Close timings" /> --}}
                                                        @if($errors->has('sunday_closetime'))
                                                            <span class="form-text">{{ $errors->first('sunday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                {{-- <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="monday" value="monday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd" value="monday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time:</label>
                                                        <input type="time" name="monday_opentime" value="{{old('monday_opentime')}}" class="form-control" placeholder="Please Update your Open timings" />
                                                        @if($errors->has('monday_opentime'))
                                                        <span class="form-text">{{ $errors->first('monday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                   
                                                  
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Close Time:</label>
                                                        <input type="time" name="monday_closetime" value="{{old('monday_closetime')}}" class="form-control" placeholder="Please Update your Close timings" />
                                                        @if($errors->has('monday_closetime'))
                                                        <span class="form-text">{{ $errors->first('monday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="tuesday" value="tuesday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd" value="tuesday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time:</label>
                                                        <input type="time" name="tuesday_opentime" value="{{old('tuesday_opentime')}}" class="form-control" placeholder="Please Update your Open timings" />
                                                        @if($errors->has('tuesday_opentime'))
                                                            <span class="form-text">{{ $errors->first('tuesday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Close Time:</label>
                                                        <input type="time" name="tuesday_closetime" value="{{old('tuesday_closetime')}}" class="form-control" placeholder="Please Update your Close timings" />
                                                        @if($errors->has('tuesday_closetime'))
                                                            <span class="form-text">{{ $errors->first('tuesday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="wednesday" value="wednesday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd"  value="wednesday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time:</label>
                                                        <input type="time" name="wednesday_opentime" value="{{old('wednesday_opentime')}}"  class="form-control" placeholder="Please Update your Open timings" />
                                                        @if($errors->has('wednesday_opentime'))
                                                            <span class="form-text">{{ $errors->first('wednesday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Close Time:</label>
                                                        <input type="time" name="wednesday_closetime" value="{{old('wednesday_closetime')}}" class="form-control" placeholder="Please Update your Close timings" />
                                                        @if($errors->has('wednesday_closetime'))
                                                            <span class="form-text">{{ $errors->first('wednesday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="thursday" value="thursday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd"  value="thursday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time:</label>
                                                        <input type="time" name="thursday_opentime" value="{{old('thursday_opentime')}}"  class="form-control" placeholder="Please Update your Open timings" />
                                                        @if($errors->has('thursday_opentime'))
                                                            <span class="form-text">{{ $errors->first('thursday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Close Time:</label>
                                                        <input type="time" name="thursday_closetime" value="{{old('thursday_closetime')}}"  class="form-control" placeholder="Please Update your Close timings" />
                                                        @if($errors->has('thursday_closetime'))
                                                            <span class="form-text">{{ $errors->first('thursday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="friday" value="friday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd"  value="friday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time: <span class="required">*</span></label>
                                                        <input type="time" name="friday_opentime" class="form-control" value="{{old('friday_opentime')}}"  placeholder="Please Update your Open timings" />
                                                        @if($errors->has('friday_opentime'))
                                                            <span class="form-text">{{ $errors->first('friday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Close Time: <span class="required">*</span></label>
                                                        <input type="time" name="friday_closetime" class="form-control" value="{{old('friday_closetime')}}"  placeholder="Please Update your Close timings" />
                                                        @if($errors->has('friday_closetime'))
                                                            <span class="form-text">{{ $errors->first('friday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="saturday" value="saturday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd"  value="saturday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time:</label>
                                                        <input type="time" name="saturday_opentime" class="form-control" value="{{old('saturday_opentime')}}"  placeholder="Please Update your Open timings" />
                                                        @if($errors->has('saturday_opentime'))
                                                            <span class="form-text">{{ $errors->first('saturday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Close Time:</label>
                                                        <input type="time" name="saturday_closetime" class="form-control" value="{{old('saturday_closetime')}}"  placeholder="Please Update your Close timings" />
                                                        @if($errors->has('saturday_closetime'))
                                                            <span class="form-text">{{ $errors->first('saturday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label>Day:</label>
                                                        <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                        <div class="dropdown bootstrap-select form-control">
                                                            <input type="text" class="form-control" placeholder="abcd" name="sunday" value="sunday" hidden/>
                                                            <input type="text" class="form-control" placeholder="abcd"  value="sunday" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Open Time:</label>
                                                        <input type="time" name="sunday_opentime" class="form-control" value="{{old('sunday_opentime')}}"  placeholder="Please Update your Open timings" />
                                                        @if($errors->has('sunday_opentime'))
                                                            <span class="form-text">{{ $errors->first('sunday_opentime') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Staffed hours - Close Time:</label>
                                                        <input type="time" name="sunday_closetime" class="form-control" value="{{old('sunday_closetime')}}" placeholder="Please Update your Close timings" />
                                                        @if($errors->has('sunday_closetime'))
                                                            <span class="form-text">{{ $errors->first('sunday_closetime') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div> --}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-dark font-weight-bold"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit"
                                                    class="btn  btn-light-success font-weight-bold">Add</button>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!--end::Modal Add Location-->
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <!--begin: Search Form-->

                        <!--end: Search Form-->
                        <!--begin: Datatable-->
                        <table class="table table-hover" id="location">
                            <thead>
                                <tr>
                                    <th>Location Name</th>
                                    <th>Address Line</th>
                                    {{-- <th>City</th> --}}
                                    {{-- <th>State</th> --}}
                                    <th>Zip Code</th>
                                    <th>Location Type</th>
                                    @if ($customer->account_status == 0)
                                    <th>Actions</th> 
                                    @endif
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locations as $location)
                                <tr>
                                    <td>{{$location->location_name}}</td>
                                    <td>{{$location->addressline1}}</td>
                                    {{-- <td>{{$location->state}}</td> --}}
                                    {{-- <td>{{$location->city}}</td> --}}
                                    <td>{{$location->zip_code}}</td>
                                    <td>{{ucwords($location->location_type)}}</td>
                                    @if ($customer->account_status == 0)
                                    <td>
                                        <a href="{{route('admin.customer.editlocation',$location->id)}}" class="btn btn-sm btn-clean btn-icon mr-2">
                                            <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                            fill="#000000" fill-rule="nonzero" \
                                                            transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15"
                                                            height="2" rx="1" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>


                                        <!--begin::Modal Add Location-->
                                            {{-- <div class="modal fade" id="updatelocation{{$location->id}}" tabindex="-1" role="dialog" aria-labelledby="addnote"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Location:</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="{{route('admin.customer.updatelocation', $location->id)}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <div class="col-lg-4">
                                                                    <label>Zip Code: <span class="required">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="abcd"
                                                                            name="zip_code" value="{{old('zip_code',$location->zip_code)}}"/>
                                                                    </div>
                                                                    @if($errors->has('zip_code'))
                                                                    <span class="form-text">{{ $errors->first('zip_code') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Location Name: <span class="required">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="abcd"
                                                                            name="location_name" value="{{old('location_name',$location->location_name)}}"/>
                                                                    </div>
                                                                    @if($errors->has('location_name'))
                                                                    <span class="form-text">{{ $errors->first('location_name') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Address Line 1: <span class="required">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control autocomplete" name="addressline1" value="{{old('addressline1',$location->addressline1)}}" id="autocomplete" placeholder="Please enter your Address" />
                                                                    </div>
                                                                    @if($errors->has('addressline1'))
                                                                    <span class="form-text">{{ $errors->first('addressline1') }}</span>
                                                                    @endif
                                                                    <div class="form-group" id="lat_area" style="display: none">
                                                                        <label for="latitude"> Latitude </label>
                                                                        <input type="text" name="latitude" id="latitude" class="form-control">
                                                                    </div>
                                            
                                                                    <div class="form-group" id="long_area" style="display: none">
                                                                        <label for="latitude"> Longitude </label>
                                                                        <input type="text" name="longitude" id="longitude" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-4">
                                                                    <label>Address Line 2:</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="abcd"
                                                                            name="addressline2" value="{{old('addressline2',$location->addressline2)}}"/>
                                                                    </div>
                                                                    @if($errors->has('addressline2'))
                                                                    <span class="form-text">{{ $errors->first('addressline2') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>City: <span class="required">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="abcd"
                                                                            name="city" value="{{old('city',$location->city)}}"/>
                                                                    </div>
                                                                    @if($errors->has('city'))
                                                                    <span class="form-text">{{ $errors->first('city') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>State: <span class="required">*</span></label>
                                                                    <select name="state" class="form-control">
                                                                        <option value="">Select State</option>
                                                                        @foreach ($states as $state)
                                                                        @if ($location->state_id == $state->id)
                                                                            <option value="{{ $state->id }}" {{ 'selected' }}>
                                                                                {{ $state->state }}</option>
                                                                        @else
                                                                            <option value="{{ $state->id }}" @if (old('state') == $state->id) {{ 'selected' }} @endif>
                                                                                {{ $state->state }}</option>
                                                                        @endif
                                                                        @endforeach

                                                                    </select>
                                                                    @if($errors->has('state'))
                                                                    <span class="form-text">{{ $errors->first('state') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-4">
                                                                    <label>Day:</label>
                                                                    <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                                    <div class="dropdown bootstrap-select form-control">
                                                                        <input type="text" class="form-control" placeholder="abcd" name="monday" value="monday" hidden/>
                                                                        <input type="text" class="form-control" placeholder="abcd" value="monday" disabled/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Open Time:</label>
                                                                    <input type="text" value="{{$location->timings[0]["id"]}}" name="monday_id" hidden>
                                                                    <input type="time" name="monday_opentime" value="{{old('monday_opentime', $location->timings[0]["open_time"])}}" class="form-control" placeholder="Please Update your Open timings" />
                                                                    @if($errors->has('monday_opentime'))
                                                                    <span class="form-text">{{ $errors->first('monday_opentime') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            
                                                            
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Close Time:</label>
                                                                    
                                                                    <input type="time" name="monday_closetime" value="{{old('monday_closetime', $location->timings[0]["close_time"])}}" class="form-control" placeholder="Please Update your Close timings" />
                                                                    @if($errors->has('monday_closetime'))
                                                                    <span class="form-text">{{ $errors->first('monday_closetime') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-4">
                                                                    <label>Day:</label>
                                                                    <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                                    <div class="dropdown bootstrap-select form-control">
                                                                        <input type="text" class="form-control" placeholder="abcd" name="tuesday" value="tuesday" hidden/>
                                                                        <input type="text" class="form-control" placeholder="abcd" value="tuesday" disabled/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <input type="text" value="{{$location->timings[1]["id"]}}" name="tuesday_id" hidden>
                                                                    <label>Staffed hours - Open Time:</label>
                                                                    <input type="time" name="tuesday_opentime" value="{{old('tuesday_opentime', $location->timings[1]["open_time"])}}" class="form-control" placeholder="Please Update your Open timings" />
                                                                    @if($errors->has('tuesday_opentime'))
                                                                        <span class="form-text">{{ $errors->first('tuesday_opentime') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Close Time:</label>
                                                                    <input type="time" name="tuesday_closetime" value="{{old('tuesday_closetime', $location->timings[1]["close_time"])}}" class="form-control" placeholder="Please Update your Close timings" />
                                                                    @if($errors->has('tuesday_closetime'))
                                                                        <span class="form-text">{{ $errors->first('tuesday_closetime') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-4">
                                                                    <label>Day:</label>
                                                                    <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                                    <div class="dropdown bootstrap-select form-control">
                                                                        <input type="text" class="form-control" placeholder="abcd" name="wednesday" value="wednesday" hidden/>
                                                                        <input type="text" class="form-control" placeholder="abcd"  value="wednesday" disabled/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Open Time:</label>
                                                                    <input type="text" value="{{$location->timings[2]["id"]}}" name="wednesday_id" hidden>
                                                                    <input type="time" name="wednesday_opentime" value="{{old('wednesday_opentime', $location->timings[2]["open_time"])}}"  class="form-control" placeholder="Please Update your Open timings" />
                                                                    @if($errors->has('wednesday_opentime'))
                                                                        <span class="form-text">{{ $errors->first('wednesday_opentime') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Close Time:</label>
                                                                    <input type="time" name="wednesday_closetime" value="{{old('wednesday_closetime', $location->timings[2]["close_time"])}}" class="form-control" placeholder="Please Update your Close timings" />
                                                                    @if($errors->has('wednesday_closetime'))
                                                                        <span class="form-text">{{ $errors->first('wednesday_closetime') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-4">
                                                                    <label>Day:</label>
                                                                    <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                                    <div class="dropdown bootstrap-select form-control">
                                                                        <input type="text" class="form-control" placeholder="abcd" name="thursday" value="thursday" hidden/>
                                                                        <input type="text" class="form-control" placeholder="abcd"  value="thursday" disabled/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Open Time:</label>
                                                                    <input type="text" value="{{$location->timings[3]["id"]}}" name="thursday_id" hidden>
                                                                    <input type="time" name="thursday_opentime" value="{{old('thursday_opentime', $location->timings[3]["open_time"])}}"  class="form-control" placeholder="Please Update your Open timings" />
                                                                    @if($errors->has('thursday_opentime'))
                                                                        <span class="form-text">{{ $errors->first('thursday_opentime') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Close Time:</label>
                                                                    <input type="time" name="thursday_closetime" value="{{old('thursday_closetime', $location->timings[3]["close_time"])}}"  class="form-control" placeholder="Please Update your Close timings" />
                                                                    @if($errors->has('thursday_closetime'))
                                                                        <span class="form-text">{{ $errors->first('thursday_closetime') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-4">
                                                                    <label>Day:</label>
                                                                    <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                                    <div class="dropdown bootstrap-select form-control">
                                                                        <input type="text" class="form-control" placeholder="abcd" name="friday" value="friday" hidden/>
                                                                        <input type="text" class="form-control" placeholder="abcd"  value="friday" disabled/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Open Time: <span class="required">*</span></label>
                                                                    <input type="text" value="{{$location->timings[4]["id"]}}" name="friday_id" hidden>
                                                                    <input type="time" name="friday_opentime" class="form-control" value="{{old('friday_opentime', $location->timings[4]["open_time"])}}"  placeholder="Please Update your Open timings" />
                                                                    @if($errors->has('friday_opentime'))
                                                                        <span class="form-text">{{ $errors->first('friday_opentime') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Close Time: <span class="required">*</span></label>
                                                                    <input type="time" name="friday_closetime" class="form-control" value="{{old('friday_closetime', $location->timings[4]["close_time"])}}"  placeholder="Please Update your Close timings" />
                                                                    @if($errors->has('friday_closetime'))
                                                                        <span class="form-text">{{ $errors->first('friday_closetime') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-4">
                                                                    <label>Day:</label>
                                                                    <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                                    <div class="dropdown bootstrap-select form-control">
                                                                        <input type="text" class="form-control" placeholder="abcd" name="saturday" value="saturday" hidden/>
                                                                        <input type="text" class="form-control" placeholder="abcd"  value="saturday" disabled/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Open Time:</label>
                                                                    <input type="text" value="{{$location->timings[5]["id"]}}" name="saturday_id" hidden>
                                                                    <input type="time" name="saturday_opentime" class="form-control" value="{{old('saturday_opentime', $location->timings[5]["open_time"])}}"  placeholder="Please Update your Open timings" />
                                                                    @if($errors->has('saturday_opentime'))
                                                                        <span class="form-text">{{ $errors->first('saturday_opentime') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Close Time:</label>
                                                                    <input type="time" name="saturday_closetime" class="form-control" value="{{old('saturday_closetime', $location->timings[5]["close_time"])}}"  placeholder="Please Update your Close timings" />
                                                                    @if($errors->has('saturday_closetime'))
                                                                        <span class="form-text">{{ $errors->first('saturday_closetime') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-4">
                                                                    <label>Day:</label>
                                                                    <!-- <input  type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
                                                                    <div class="dropdown bootstrap-select form-control">
                                                                        <input type="text" class="form-control" placeholder="abcd" name="sunday" value="sunday" hidden/>
                                                                        <input type="text" class="form-control" placeholder="abcd"  value="sunday" disabled/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Open Time:</label>
                                                                    <input type="text" value="{{$location->timings[6]["id"]}}" name="sunday_id" hidden>
                                                                    <input type="time" name="sunday_opentime" class="form-control" value="{{old('sunday_opentime', $location->timings[6]["open_time"])}}"  placeholder="Please Update your Open timings" />
                                                                    @if($errors->has('sunday_opentime'))
                                                                        <span class="form-text">{{ $errors->first('sunday_opentime') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Staffed hours - Close Time:</label>
                                                                    <input type="time" name="sunday_closetime" class="form-control" value="{{old('sunday_closetime', $location->timings[6]["close_time"])}}" placeholder="Please Update your Close timings" />
                                                                    @if($errors->has('sunday_closetime'))
                                                                        <span class="form-text">{{ $errors->first('sunday_closetime') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-4">
                                                                    <label>Website:</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="abcd"
                                                                            name="website" value="{{old('website', $location->website)}}"/>
                                                                    </div>
                                                                    @if($errors->has('website'))
                                                                    <span class="form-text">{{ $errors->first('website') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label>Location Type:</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="location_type" class="form-control" value="Secondary" placeholder="Please Update your Close timings" disabled/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-dark font-weight-bold"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn  btn-light-success font-weight-bold">Add</button>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div> --}}
                                        <!--end::Modal Add Location-->

                                        <a href="{{route('admin.customer.destroylocation', $location->id)}}" class="btn btn-sm btn-clean btn-icon" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this member?');">
                                            <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                        <path
                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </td>
                                    @endif
                                    
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>

    </div>
    <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel" aria-labelledby="kt_tab_pane_4">
        <!--begin::Card-->
        <div class="card card-custom responsive">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Members Table
                </div>
                @if ($customer->account_status == 0)
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn font-weight-bold btn-pill btn-light-primary dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                            fill="#000000" opacity="0.3"></path>
                                        <path
                                            d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>Add members list</button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi flex-column navi-hover py-2">
                                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                    Choose an option:</li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon">
                                            <i class="la la-file-text-o"></i>
                                        </span>
                                        <span class="navi-text">Choose File</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon">
                                            <i class="la la-copy"></i>
                                        </span>
                                        <span class="navi-text">Replace list</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path
                                                        d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    <path
                                                        d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="navi-text">Add to list</span>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                        <!--end::Dropdown Menu-->
                    </div>
                    <a href="#" class="btn font-weight-bold btn-pill btn-light-warning" data-toggle="modal"
                        data-target="#add_member">
                        <span class="svg-icon svg-icon-md">
                            <i class="flaticon-map-location"></i>
                        </span>Add Member</a>

                         <!--begin::Modal Add a Member-->
                        <form method="post" action="{{route('admin.customer.storemember', $customer->id)}}">
                            @csrf
                            <div class="modal fade" id="add_member" tabindex="-1" role="dialog" aria-labelledby="addnote" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add a Member:</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label>Name:</label>
                                                    <div class="input-group">
                                                        <input type="text" name="member_name" class="form-control " placeholder="Please enter the name of the member" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label>Location</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="location_name">
                                                            @foreach ($customer->locations as $location)
                                                                <option value="{{$location->location_name}}">{{$location->location_name}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary font-weight-bold">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Modal Add a Member-->
                </div>
                @endif
               
            </div>
            <div class="card-body">
                <table class="table table-hover" id="example">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            @if ($customer->account_status == 0)
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <td>{{$member->member_name}}</td>
                                <td>{{$member->location_name}}</td>
                                @if ($customer->account_status == 0)
                                <td>
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details"
                                        data-toggle="modal" data-target="#updatemember{{$member->id}}">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero" \
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                        rx="1" />
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                   
                                        <div class="modal fade" id="updatemember{{$member->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="addnote" aria-hidden="true">
                                        <form action="{{route('admin.customer.updatemember', $member->id)}}" method="POST">
                                            @csrf
                                        <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Member:</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <div class="col-lg-12">
                                                            <label>Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" name="member_name" value="{{$member->member_name}}"
                                                                    class="form-control"
                                                                    placeholder="Please Update the name of the member" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label>Location</label>
                                                            <div class="input-group">
                                                                <select class="form-control" name="location_name">
                                                                    @foreach ($customer->locations as $location)
                                                                    @if ($location->location_name == $member->location_name)
                                                                        <option value="{{ $member->location_name }}" {{ 'selected' }}>
                                                                            {{ $member->location_name }}</option>
                                                                    @else
                                                                        <option value="{{ $member->location_name }}" @if (old('location_name') == $member->location_name) {{ 'selected' }} @endif>
                                                                            {{ $member->location_name }}</option>
                                                                    @endif
                                                                    @endforeach

                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-primary font-weight-bold">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                   
                                    
                                    <a href="{{route('admin.customer.destroymember', $member->id)}}" class="btn btn-sm btn-clean btn-icon" title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this member?');">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
        <!--end::Card-->
    </div>
    </div>
    <!--end::Card-->
    </div>
    <!--end::Container-->
    </div>
    <!--end::Entry-->
    </div>
    </div>
    </div>


       <!--begin::Modal add note-->
       <div class="modal fade" id="addnote" tabindex="-1" role="dialog" aria-labelledby="addnote"
       aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Add Notes:</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <i aria-hidden="true" class="ki ki-close"></i>
                   </button>
               </div>
               <form id="note_form" method="post"
                   action="{{ route('admin.customer.storenote', $customer->customer_id) }}">
                   @csrf
                   <div class="modal-body">
                       <div class="form-group row">
                           <div class="col-lg-4">
                               <label>Choose:</label>
                               <div class="radio-inline" id="customer_notes_choice">
                                   <label class="radio radio-solid">
                                       <input type="radio" name="customer_note_type" checked="checked"
                                           value="note" />
                                       <span></span>
                                       Notes
                                   </label>
                                   <label class="radio radio-solid">
                                       <input type="radio" name="customer_note_type" value="task" />
                                       <span></span>
                                       Task
                                   </label>
                               </div>
                               <span class="form-text text-muted">Please select notes or
                                   task</span>
                           </div>
                           <div class="col-lg-4 customer_task_notes" style="display: none;">
                               <label>Date and Time Picker:</label>
                               <div class="input-group">
                                   <input type="datetime-local" name="datetime"
                                       class="form-control" placeholder="00-00-00" />
                               </div>
                               <span class="form-text text-muted">Please select Date and
                                   time</span>
                           </div>
                           <div class="col-lg-4 customer_task_notes" style="display: none;">
                               <label>Type:</label>
                               <div class="dropdown bootstrap-select form-control dropup">
                                   <select class="form-control selectpicker" tabindex="null"
                                       name="type">
                                       <option value="General">General</option>
                                       <option value="Email">Email</option>
                                       <option value="Call">Call</option>
                                       <option value="Meeting">Meeting</option>
                                   </select>
                               </div>

                               <span class="form-text text-muted">Please select the
                                   Type</span>
                           </div>
                       </div>
                       <div class="form-group row">
                           <div class="col-lg-12">
                               <label>Notes:</label>
                               <div class="input-group">
                                   <textarea class="form-control" name="note" cols="150"
                                       rows="3"></textarea>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-light-primary font-weight-bold"
                           data-dismiss="modal">Close</button>
                       <button type="submit" class="btn btn-primary font-weight-bold">Save
                           changes</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
   <!--end::Modal add note-->

 <!--begin::Modal View Note-->
    @foreach ($customerNotes as $customer_note)
   
<form id="update_task_form{{ $customer_note->id }}"
  action="{{ route('admin.customer.updatenote',$customer->id) }}"
  method="post">
  @csrf
  <div class="modal fade" id="view_note{{ $customer_note->id }}"
      tabindex="-1" role="dialog" aria-labelledby="addnote"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg"
          role="document">
          <!-- TASK VIEW CONDITION -->
          <input name="note_id" value="{{$customer_note->id}}" hidden/>
          @if ($customer_note->note_type == 'task')
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">View
                          Task</h5>
                      <button type="button" class="close"
                          data-dismiss="modal" aria-label="Close">
                          <i aria-hidden="true" class="ki ki-close"></i>
                      </button>
                  </div>
                  <div class="modal-body">

                      @if ($customer_note->status == 0)
                          <div class="form-group row">
                              <div class="col-lg-4">
                                  <label>Date and Time Picker:</label>
                                  <div class="input-group">
                                      <input type="datetime-local"
                                          name="datetime"
                                          class="form-control"
                                          placeholder="00-00-00"
                                          value="{{ $customer_note->datetime }}" />
                                  </div>
                                  <span
                                      class="form-text text-muted">Please
                                      select Date and time</span>
                              </div>
                              <div class="col-lg-4">
                                  <label>Type:</label>
                                  <select class="form-control"
                                      tabindex="null" name="type"
                                      id="type_taskkk">
                                      <option value="General" @if (old('type', $customer_note->type) == 'General') {{ 'selected' }} @endif>General
                                      </option>
                                      <option value="Email" @if (old('type', $customer_note->type) == 'Email') {{ 'selected' }} @endif>Email</option>
                                      <option value="Call" @if (old('type', $customer_note->type) == 'Call') {{ 'selected' }} @endif>Call</option>
                                      <option value="Meeting" @if (old('type', $customer_note->type) == 'Meeting') {{ 'selected' }} @endif>Meeting
                                      </option>
                                  </select>
                                  <span
                                      class="form-text text-muted">Please
                                      select the Type</span>
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-lg-12">
                                  <label>Notes:</label>
                                  <div class="input-group">
                                      <textarea class="form-control"
                                          name="note" id="" cols="150"
                                          rows="3">{{ $customer_note->note }}</textarea>
                                  </div>
                              </div>
                          </div>
                          <a href="{{route('admin.customer.destroynote',$customer_note->id)}}"
                              class="btn font-weight-bold btn-pill btn-light-danger float-right mr-2"
                              onclick="return confirm('Are you sure you want to delete this note?');">
                              <i class="flaticon-close"></i> Delete
                          </a>
                          <a href="{{route('admin.customer.updatenotestatus', $customer_note->id)}}"
                              class="btn font-weight-bold btn-pill btn-light-success float-right mr-2">
                              <i class="flaticon2-checkmark"></i> Complete
                          </a>
                      @else
                          <div class="form-group row">
                              <div class="col-lg-4">
                                  <label>Date and Time Picker:</label>
                                  <div class="input-group">
                                      <input type="datetime-local"
                                          name="datetime"
                                          class="form-control"
                                          disabled="disabled"
                                          placeholder="00-00-00"
                                          value="{{ $customer_note->datetime }}" />
                                  </div>
                              </div>
                              <div class="col-lg-4">
                                  <label>Type:</label>
                                  <div
                                      class="dropdown bootstrap-select form-control dropup">
                                      <select
                                          class="form-control selectpicker"
                                          disabled="disabled"
                                          tabindex="null" name="type">
                                          <option value="General" @if (old('type', $customer_note->type) == 'General') {{ 'selected' }} @endif>General
                                          </option>
                                          <option value="Email" @if (old('type', $customer_note->type) == 'Email') {{ 'selected' }} @endif>Email
                                          </option>
                                          <option value="Call" @if (old('type', $customer_note->type) == 'Call') {{ 'selected' }} @endif>Call
                                          </option>
                                          <option value="Meeting" @if (old('type', $customer_note->type) == 'Meeting') {{ 'selected' }} @endif>Meeting
                                          </option>
                                      </select>
                                  </div>


                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-lg-12">
                                  <label>Notes:</label>
                                  <div class="input-group">
                                      <textarea class="form-control"
                                          disabled="disabled" name="note"
                                          id="" cols="150"
                                          rows="3">{{ $customer_note->note }}</textarea>
                                  </div>
                              </div>
                          </div>

                          <button type="button"
                              class="btn btn-light-primary btn-pill font-weight-bold float-right"
                              data-dismiss="modal">Close</button>
                          <a href=""
                              class="btn disabled font-weight-bold btn-pill btn-light-success float-right mr-2">
                              <i class="flaticon2-checkmark"></i>
                              Completed
                          </a>

                      @endif

                  </div>
                  <div class="modal-footer">
                      @if ($customer_note->status == 0)
                          <button type="button"
                              class="btn btn-light-primary font-weight-bold"
                              data-dismiss="modal">Close</button>
                          <button type="submit"
                              class="btn btn-primary font-weight-bold">Save
                              changes</button>
                      @endif

                  </div>
              </div>
</form>
<!-- NOTE VIEW CONDITION -->
@else
  <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View Note</h5>
              <button type="button" class="close" data-dismiss="modal"
                  aria-label="Close">
                  <i aria-hidden="true" class="ki ki-close"></i>
              </button>
          </div>
          <div class="modal-body">
              <div class="form-group row">
                  <div class="col-lg-12">
                      <label>Notes:</label>
                      <div class="input-group">
                          <textarea class="form-control" disabled="disabled"
                              name="note" id="" cols="150"
                              rows="3">{{$customer_note->note}}</textarea>
                      </div>
                  </div>
              </div>
          </div>
  </div>
@endif
</div>
</div>
@endforeach
 <!--end::Modal View Note-->



@endsection
