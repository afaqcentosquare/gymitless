@extends('admin.master')
@section('title')
    <title>Gymitless | View Lead</title>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <br>
                <!--begin::Card-->
                <div class="card card-custom gutter-b">

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

                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">View Lead
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Company Name:</label>
                                <div class="input-group">
                                    <p class="text-data">{{ $lead->company_name }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Contact:</label>
                                <div class="input-group">
                                    <p class="text-data">{{ $lead->contact }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Phone Number:</label>
                                <div class="input-group">
                                    <p class="text-data">{{ $lead->number }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Email Address:</label>
                                <div class="input-group">
                                    <p class="text-data">{{ $lead->email }}</p>
                                </div>
                            </div>
                            {{-- <div class="col-lg-4">
                                <label>Primary Address:</label>
                                <div class="input-group">
                                    <p class="text-data">{{ $lead->primary_address }}</p>
                                </div>
                            </div> --}}
                            <div class="col-lg-4">
                                <label>Address Line 1:</label>
                                <div class="input-group">
                                    <p class="text-data">{{ $lead->addressline1 }}</p>
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>City:</label>
                                <div class="input-group">
                                    <p class="text-data">{{ $lead->city }}</p>
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <div class="col-lg-4">
                                <label>Address Line 2:</label>
                                <div class="input-group">
                                    <p class="text-data">{{ $lead->addressline2 }}</p>
                                    <div class="input-group-append"></div>
                                </div>
                            </div> --}}
                            
                            <div class="col-lg-4">
                                <label>State:</label>
                                <div class="input-group">
                                    <p class="text-data">{{ $lead->state }}</p>
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Zip Code:</label>
                                <div class="input-group">
                                    <p class="text-data">{{ $lead->zip_code }}</p>
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            

                        </div> --}}
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>
                                    Notes:
                                    <a data-toggle="modal" data-target="#addnote"
                                        class="btn ml-2 font-weight-bold btn-pill btn-sm btn-light-primary">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><i
                                                class="flaticon-notes"></i></span>Add Notes</a>
                                </label>



                                {{-- <a data-toggle="modal" data-target="#addtask"
                                        class="btn ml-2 font-weight-bold btn-pill btn-sm btn-light-primary">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><i
                                                class="flaticon-notes"></i></span>Add Task</a> --}}


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
                                                action="{{ route('admin.leads.storenote', $lead->id) }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <div class="col-lg-4">
                                                            <label>Choose:</label>
                                                            <div class="radio-inline" id="notes_choice">
                                                                <label class="radio radio-solid">
                                                                    <input type="radio" name="note_type" checked="checked"
                                                                        value="note" />
                                                                    <span></span>
                                                                    Notes
                                                                </label>
                                                                <label class="radio radio-solid">
                                                                    <input type="radio" name="note_type" value="task" />
                                                                    <span></span>
                                                                    Task
                                                                </label>
                                                            </div>
                                                            <span class="form-text text-muted">Please select notes or
                                                                task</span>
                                                        </div>
                                                        <div class="col-lg-4 task_notes" style="display: none;">
                                                            <label>Date and Time Picker:</label>
                                                            <div class="input-group">
                                                                <input type="datetime-local" name="datetime"
                                                                    class="form-control" placeholder="00-00-00" />
                                                            </div>
                                                            <span class="form-text text-muted">Please select Date and
                                                                time</span>
                                                        </div>
                                                        <div class="col-lg-4 task_notes" style="display: none;">
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

                                            @foreach ($lead->leadNotes as $lead_note)
                                                <tr data-toggle="modal" data-target="#view_note{{ $lead_note->id }}">

                                                    @if ($lead_note->note_type == 'note')
                                                        <td>{{ $lead_note->lead_id }}</td>
                                                        <td width="15%">
                                                            {{ date_format(date_create($lead_note->datetime), 'm-d-Y') }}
                                                        </td>
                                                        <td width="50%">{{ $lead_note->note }}</td>
                                                        <td>Note</td>
                                                        <td>Completed</td>
                                                    @else
                                                        <td>{{ $lead_note->lead_id }}</td>
                                                        <td width="15%">
                                                            {{ date_format(date_create($lead_note->datetime), 'm-d-Y') }}
                                                        </td>
                                                        <td width="50%">{{ $lead_note->note }}</td>
                                                        <td>{{ $lead_note->type }}</td>
                                                        @if ($lead_note->status == 0)
                                                            <td>Not Completed</td>
                                                        @else
                                                            <td>Completed</td>
                                                        @endif
                                                    @endif
                                                </tr>


                                                <!--begin::Modal View Note-->
                                                <form id="update_task_form{{ $lead_note->id }}"
                                                    action="{{ route('admin.leads.updatenote',$lead->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="modal fade" id="view_note{{ $lead_note->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="addnote"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg"
                                                            role="document">
                                                            <!-- TASK VIEW CONDITION -->
                                                            <input name="note_id" value="{{$lead_note->id}}" hidden/>
                                                            @if ($lead_note->note_type == 'task')
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

                                                                        @if ($lead_note->status == 0)
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-4">
                                                                                    <label>Date and Time Picker:</label>
                                                                                    <div class="input-group">
                                                                                        <input type="datetime-local"
                                                                                            name="datetime"
                                                                                            class="form-control"
                                                                                            placeholder="00-00-00"
                                                                                            value="{{ $lead_note->datetime }}" />
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
                                                                                        <option value="General" @if (old('type', $lead_note->type) == 'General') {{ 'selected' }} @endif>General
                                                                                        </option>
                                                                                        <option value="Email" @if (old('type', $lead_note->type) == 'Email') {{ 'selected' }} @endif>Email</option>
                                                                                        <option value="Call" @if (old('type', $lead_note->type) == 'Call') {{ 'selected' }} @endif>Call</option>
                                                                                        <option value="Meeting" @if (old('type', $lead_note->type) == 'Meeting') {{ 'selected' }} @endif>Meeting
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
                                                                                            rows="3">{{ $lead_note->note }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <a href="{{route('admin.leads.destroynote',$lead_note->id)}}"
                                                                                class="btn font-weight-bold btn-pill btn-light-danger float-right mr-2"
                                                                                onclick="return confirm('Are you sure you want to delete this note?');">
                                                                                <i class="flaticon-close"></i> Delete
                                                                            </a>
                                                                            <a href="{{route('admin.leads.updatenotestatus', $lead_note->id)}}"
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
                                                                                            value="{{ $lead_note->datetime }}" />
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
                                                                                            <option value="General" @if (old('type', $lead_note->type) == 'General') {{ 'selected' }} @endif>General
                                                                                            </option>
                                                                                            <option value="Email" @if (old('type', $lead_note->type) == 'Email') {{ 'selected' }} @endif>Email
                                                                                            </option>
                                                                                            <option value="Call" @if (old('type', $lead_note->type) == 'Call') {{ 'selected' }} @endif>Call
                                                                                            </option>
                                                                                            <option value="Meeting" @if (old('type', $lead_note->type) == 'Meeting') {{ 'selected' }} @endif>Meeting
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
                                                                                            rows="3">{{ $lead_note->note }}</textarea>
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
                                                                        @if ($lead_note->status == 0)
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
                                                                        rows="3">{{$lead_note->note}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                </div>
                            </div>

                            <!--end::Modal View Note-->



                            @endforeach
                            </tbody>
                            </table>
                        </div>




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
@endsection
