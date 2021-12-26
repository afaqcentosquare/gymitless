@extends('admin.master')
@section('title')
    <title>Gymitless | Calender</title>
@endsection
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Notice-->
                <div class="card card-custom gutter-b">
                    
                </div>
                @if(session('success'))
                <div class="p-7">
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ session('success') }}
                    </div>
                </div>
                @endif
                @if(session('error'))
                <div class="p-7">
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ session('error') }}
                    </div>
                </div>
                @endif
                <!--end::Notice-->
                <!--begin::Example-->
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Calendar</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-light-primary btn-pill font-weight-bold" data-toggle="modal"
                                data-target="#add_event">
                                <i class="ki ki-calendar icon-md mr-2"></i>Add Event</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="kt_calendar_user"></div>
                    </div>
                </div>
                <!--end::Card-->
                <!--end::Example-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

    <!-- Add Event Modal -->
    <div class="modal fade" id="add_event" tabindex="-1" role="dialog" aria-labelledby="addnote" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Event into the Calendar:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form method="post" action="{{route('admin.calender.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Event Name:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Please enter your event name"
                                        name="event_name" />
                                    @if ($errors->has('event_name'))
                                        <span class="form-text">{{ $errors->first('event_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Event Type:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter the type"
                                        name="event_type" />
                                        @if ($errors->has('event_type'))
                                        <span class="form-text">{{ $errors->first('event_type') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Event Date:</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" placeholder="" name="event_date" />
                                    @if ($errors->has('event_date'))
                                        <span class="form-text">{{ $errors->first('event_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Event Start Time:</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" placeholder="" name="event_start_time" />
                                    @if ($errors->has('event_start_time'))
                                        <span class="form-text">{{ $errors->first('event_start_time') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Event End Time:</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" placeholder="" name="event_end_time" />
                                    @if ($errors->has('event_end_time'))
                                    <span class="form-text">{{ $errors->first('event_end_time') }}</span>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>Event Description:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="abcd" name="description" />
                                    @if ($errors->has('description'))
                                    <span class="form-text">{{ $errors->first('description') }}</span>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-dark font-weight-bold"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn  btn-light-success font-weight-bold">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal Add event-->
@endsection

@section("calendar_data")
<?php foreach ($events as $key => $val) { ?> {
    title: '<?php echo $val->event_name; ?>',
    start: '<?php echo $val->event_date; ?>',
    description: '<?php echo $val->state; ?>',
    className: "fc-event-danger fc-event-solid-success"
},
<?php } ?>
@endsection
