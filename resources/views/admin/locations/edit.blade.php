@extends('admin.master')
@section("title")
<title>Gymitless | Edit Customer</title>
@endsection
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Details-->
			<div class="d-flex align-items-center flex-wrap mr-2">
				<!--begin::Title-->
				<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Edit Location</h5>
				<!--end::Title-->
				<!--begin::Separator-->
				<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
				<!--end::Separator-->
				<!--begin::Search Form-->
				<div class="d-flex align-items-center" id="kt_subheader_search">
					<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Enter Location details and submit</span>
				</div>
				<!--end::Search Form-->
			</div>
			<!--end::Details-->
			<!--end::Toolbar-->
		</div>
	</div>
	<!--end::Subheader-->
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
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
			@if ($errors->any())
			<div class="p-7">
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					{{ $error }}
					<br>
					@endforeach
				</div>
			</div>
			
			@endif
			<!--begin::Card-->
			<div class="card card-custom card-transparent">
				<div class="card-body p-0">
					<!--begin::Card-->
					<div class="card card-custom card-shadowless rounded-top-0">
						<!--begin::Body-->
						<div class="card-body p-0">
							<div class="col-xl-12 col-xxl-10">
								<!--begin::Wizard Form-->
								<form method="post" action="{{route('admin.customer.updatelocation', $location->id)}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label>Zip Code: <span class="required">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="enter zip code" 
                                                        name="zip_code" value="{{old('zip_code',$location->zip_code)}}"/>
                                                </div>
                                                @if($errors->has('zip_code'))
                                                <span class="form-text">{{ $errors->first('zip_code') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Location Name: <span class="required">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="enter location name"
                                                        name="location_name" value="{{old('location_name',$location->location_name)}}"/>
                                                </div>
                                                @if($errors->has('location_name'))
                                                <span class="form-text">{{ $errors->first('location_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Address Line: <span class="required">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="addressline1" value="{{old('addressline1',$location->addressline1)}}" id="autocomplete" placeholder="Please enter your Address" />
                                                </div>
                                                @if($errors->has('addressline1'))
                                                <span class="form-text">{{ $errors->first('addressline1') }}</span>
                                                @endif
                                                <div class="form-group" id="lat_area">
                                                    <label for="latitude"> Latitude </label>
                                                    <input type="text" name="latitude" id="latitude" value="{{old('latitude', $location->latitude)}}" class="form-control">
                                                </div>
                        
                                                <div class="form-group" id="long_area">
                                                    <label for="latitude"> Longitude </label>
                                                    <input type="text" name="longitude" id="longitude" value="{{old('longitude', $location->longitude)}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label>State: <span class="required">*</span></label>
                                                <select name="state" class="form-control">
                                                    <option value="">Select State</option>
                                                        @foreach ($states as $state)
                                                        @if ($location->state_id == $state->id)
                                                            <option value="{{ $state->id }}" {{ 'selected' }}>{{ $state->state }}</option>
                                                        @else
                                                            <option value="{{ $state->id }}" @if (old('state') == $state->id) {{ 'selected' }} @endif>{{ $state->state }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                                @if($errors->has('state'))
                                                <span class="form-text">{{ $errors->first('state') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-lg-4">
                                                <label>Website:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="enter website here"
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
                                                <input type="text" value="{{$location->timings[0]["id"]}}" name="monday_id" hidden>
                                                <label>Staffed hours - Open Time:</label>
                                                <select name="monday_opentime" id="monday_opentime" class="form-control">
                                                    <option value="close" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "close") {{ 'selected' }} @endif>Close</option>
                                                    <option value="12:00 AM" @if (old('monday_opentime' , $location->timings[0]["open_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('monday_opentime', $location->timings[0]["open_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                @if($errors->has('monday_opentime'))
                                                    <span class="form-text">{{ $errors->first('monday_opentime') }}</span>
                                                @endif
                                                {{-- <input type="time" name="monday_opentime" value="{{old('monday_opentime')}}" class="form-control" placeholder="Please Update your Open timings" /> --}}
                                            </div>
                                            @if ($location->timings[0]["open_time"] != "close")
                                            <div class="col-lg-4" id="monday_close_time">
                                                <label>Staffed hours - Close Time:</label>
                                                <select name="monday_closetime" id="monday_closetime" class="form-control">
                                                    <option value="12:00 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('monday_closetime', $location->timings[0]["close_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                @if($errors->has('monday_closetime'))
                                                    <span class="form-text">{{ $errors->first('monday_closetime') }}</span>
                                                @endif
                                                {{-- <input type="time" name="monday_closetime" value="{{old('monday_closetime')}}" class="form-control" placeholder="Please Update your Close timings" /> --}}
                                            </div>
                                            @endif
                                            
                                            
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
                                                <input type="text" value="{{$location->timings[1]["id"]}}" name="tuesday_id" hidden>
                                                <label>Staffed hours - Open Time:</label>
                                                <select name="tuesday_opentime" id="tuesday_opentime" class="form-control">
                                                    <option value="close" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "close") {{ 'selected' }} @endif>Close</option>
                                                    <option value="12:00 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('tuesday_opentime', $location->timings[1]["open_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                {{-- <input type="time" name="tuesday_opentime" value="{{old('tuesday_opentime')}}" class="form-control" placeholder="Please Update your Open timings" /> --}}
                                                @if($errors->has('tuesday_opentime'))
                                                    <span class="form-text">{{ $errors->first('tuesday_opentime') }}</span>
                                                @endif
                                            </div>

                                            @if ($location->timings[1]["open_time"] != "close")
                                            <div class="col-lg-4" id="tuesday_closetime">
                                                <label>Staffed hours - Close Time:</label>
                                                <select name="tuesday_closetime" id="tuesday_closetime" class="form-control">
                                                    <option value="12:00 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('tuesday_closetime', $location->timings[1]["close_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                {{-- <input type="time" name="tuesday_closetime" value="{{old('tuesday_closetime')}}" class="form-control" placeholder="Please Update your Close timings" /> --}}
                                                @if($errors->has('tuesday_closetime'))
                                                    <span class="form-text">{{ $errors->first('tuesday_closetime') }}</span>
                                                @endif
                                            </div>
                                            @endif
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
                                                <input type="text" value="{{$location->timings[2]["id"]}}" name="wednesday_id" hidden>
                                                <label>Staffed hours - Open Time:</label>
                                                <select name="wednesday_opentime" id="wednesday_opentime" class="form-control">
                                                    <option value="close" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "close") {{ 'selected' }} @endif>Close</option>
                                                    <option value="12:00 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('wednesday_opentime', $location->timings[2]["open_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                {{-- <input type="time" name="wednesday_opentime" value="{{old('wednesday_opentime')}}"  class="form-control" placeholder="Please Update your Open timings" /> --}}
                                                @if($errors->has('wednesday_opentime'))
                                                    <span class="form-text">{{ $errors->first('wednesday_opentime') }}</span>
                                                @endif
                                            </div>
                                            @if($location->timings[2]["open_time"] != "close")
                                            <div class="col-lg-4" id="wednesday_closetime">
                                                <label>Staffed hours - Close Time:</label>
                                                <select name="wednesday_closetime" id="wednesday_closetime" class="form-control">
                                                    <option value="12:00 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('wednesday_closetime', $location->timings[2]["close_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                {{-- <input type="time" name="wednesday_closetime" value="{{old('wednesday_closetime')}}" class="form-control" placeholder="Please Update your Close timings" /> --}}
                                                @if($errors->has('wednesday_closetime'))
                                                    <span class="form-text">{{ $errors->first('wednesday_closetime') }}</span>
                                                @endif
                                            </div>
                                            @endif
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
                                                <input type="text" value="{{$location->timings[3]["id"]}}" name="thursday_id" hidden>
                                                <label>Staffed hours - Open Time:</label>
                                                <select name="thursday_opentime" id="thursday_opentime" class="form-control">
                                                    <option value="close" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "close") {{ 'selected' }} @endif>Close</option>
                                                    <option value="12:00 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('thursday_opentime', $location->timings[3]["open_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                {{-- <input type="time" name="thursday_opentime" value="{{old('thursday_opentime')}}"  class="form-control" placeholder="Please Update your Open timings" /> --}}
                                                @if($errors->has('thursday_opentime'))
                                                    <span class="form-text">{{ $errors->first('thursday_opentime') }}</span>
                                                @endif
                                            </div>
                                            @if ($location->timings[3]["open_time"] != "close")
                                            <div class="col-lg-4" id="thursday_closetime">
                                                <label>Staffed hours - Close Time:</label>
                                                <select name="thursday_closetime" id="thursday_closetime" class="form-control">
                                                    <option value="12:00 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('thursday_closetime', $location->timings[3]["close_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                {{-- <input type="time" name="thursday_closetime" value="{{old('thursday_closetime')}}"  class="form-control" placeholder="Please Update your Close timings" /> --}}
                                                @if($errors->has('thursday_closetime'))
                                                    <span class="form-text">{{ $errors->first('thursday_closetime') }}</span>
                                                @endif
                                            </div>
                                            @endif
                                            
                                            
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
                                                <input type="text" value="{{$location->timings[4]["id"]}}" name="friday_id" hidden>
                                                <label>Staffed hours - Open Time: <span class="required">*</span></label>
                                                <select name="friday_opentime" id="friday_opentime" class="form-control">
                                                    <option value="close" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "close") {{ 'selected' }} @endif>Close</option>
                                                    <option value="12:00 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('friday_opentime', $location->timings[4]["open_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                {{-- <input type="time" name="friday_opentime" class="form-control" value="{{old('friday_opentime')}}"  placeholder="Please Update your Open timings" /> --}}
                                                @if($errors->has('friday_opentime'))
                                                    <span class="form-text">{{ $errors->first('friday_opentime') }}</span>
                                                @endif
                                            </div>

                                            @if ($location->timings[4]["open_time"] != "close")
                                            <div class="col-lg-4" id="friday_closetime">
                                                <label>Staffed hours - Close Time: <span class="required">*</span></label>
                                                <select name="friday_closetime" id="friday_closetime" class="form-control">
                                                    <option value="12:00 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('friday_closetime', $location->timings[4]["close_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                {{-- <input type="time" name="friday_closetime" class="form-control" value="{{old('friday_closetime')}}"  placeholder="Please Update your Close timings" /> --}}
                                                @if($errors->has('friday_closetime'))
                                                    <span class="form-text">{{ $errors->first('friday_closetime') }}</span>
                                                @endif
                                            </div>
                                            @endif
                                            
                                            
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
                                                <input type="text" value="{{$location->timings[5]["id"]}}" name="saturday_id" hidden>
                                                <label>Staffed hours - Open Time:</label>
                                                <select name="saturday_opentime" id="saturday_opentime" class="form-control">
                                                    <option value="close" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "close") {{ 'selected' }} @endif>Close</option>
                                                    <option value="12:00 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('saturday_opentime', $location->timings[5]["open_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                {{-- <input type="time" name="saturday_opentime" class="form-control" value="{{old('saturday_opentime')}}"  placeholder="Please Update your Open timings" /> --}}
                                                @if($errors->has('saturday_opentime'))
                                                    <span class="form-text">{{ $errors->first('saturday_opentime') }}</span>
                                                @endif
                                            </div>

                                            @if ($location->timings[5]["open_time"] != "close")
                                            <div class="col-lg-4" id="saturday_closetime">
                                                <label>Staffed hours - Close Time:</label>
                                                <select name="saturday_closetime" id="saturday_closetime" class="form-control">
                                                    <option value="12:00 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('saturday_closetime', $location->timings[5]["close_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                {{-- <input type="time" name="saturday_closetime" class="form-control" value="{{old('saturday_closetime')}}"  placeholder="Please Update your Close timings" /> --}}
                                                @if($errors->has('saturday_closetime'))
                                                    <span class="form-text">{{ $errors->first('saturday_closetime') }}</span>
                                                @endif
                                            </div>
                                            @endif
                                            
                                            
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
                                                <input type="text" value="{{$location->timings[6]["id"]}}" name="sunday_id" hidden>
                                                <label>Staffed hours - Open Time:</label>
                                                <select name="sunday_opentime" id="sunday_opentime" class="form-control">
                                                    <option value="close" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "close") {{ 'selected' }} @endif>Close</option>
                                                    <option value="12:00 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('sunday_opentime', $location->timings[6]["open_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                {{-- <input type="time" name="sunday_opentime" class="form-control" value="{{old('sunday_opentime')}}"  placeholder="Please Update your Open timings" /> --}}
                                                @if($errors->has('sunday_opentime'))
                                                    <span class="form-text">{{ $errors->first('sunday_opentime') }}</span>
                                                @endif
                                            </div>

                                            @if ($location->timings[6]["open_time"] != "close")
                                            <div class="col-lg-4" id="sunday_closetime">
                                                <label>Staffed hours - Close Time:</label>
                                                <select name="sunday_closetime" id="sunday_closetime" class="form-control">
                                                    <option value="12:00 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "12:00 AM") {{ 'selected' }} @endif>12:00 AM</option>
                                                    <option value="12:30 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "12:30 AM") {{ 'selected' }} @endif>12:30 AM</option>
                                                    <option value="1:00 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "1:00 AM") {{ 'selected' }} @endif>1:00 AM</option>
                                                    <option value="1:30 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "1:30 AM") {{ 'selected' }} @endif>1:30 AM</option>
                                                    <option value="2:00 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "2:00 AM") {{ 'selected' }} @endif>2:00 AM</option>
                                                    <option value="2:30 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "2:30 AM") {{ 'selected' }} @endif>2:30 AM</option>
                                                    <option value="3:00 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "3:00 AM") {{ 'selected' }} @endif>3:00 AM</option>
                                                    <option value="3:30 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "3:30 AM") {{ 'selected' }} @endif>3:30 AM</option>
                                                    <option value="4:00 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "4:00 AM") {{ 'selected' }} @endif>4:00 AM</option>
                                                    <option value="4:30 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "4:30 AM") {{ 'selected' }} @endif>4:30 AM</option>
                                                    <option value="5:00 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "5:00 AM") {{ 'selected' }} @endif>5:00 AM</option>
                                                    <option value="5:30 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "5:30 AM") {{ 'selected' }} @endif>5:30 AM</option>
                                                    <option value="6:00 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "6:00 AM") {{ 'selected' }} @endif>6:00 AM</option>
                                                    <option value="6:30 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "6:30 AM") {{ 'selected' }} @endif>6:30 AM</option>
                                                    <option value="7:00 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "7:00 AM") {{ 'selected' }} @endif>7:00 AM</option>
                                                    <option value="7:30 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "7:30 AM") {{ 'selected' }} @endif>7:30 AM</option>
                                                    <option value="8:00 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "8:00 AM") {{ 'selected' }} @endif>8:00 AM</option>
                                                    <option value="8:30 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "8:30 AM") {{ 'selected' }} @endif>8:30 AM</option>
                                                    <option value="9:00 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "9:00 AM") {{ 'selected' }} @endif>9:00 AM</option>
                                                    <option value="9:30 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "9:30 AM") {{ 'selected' }} @endif>9:30 AM</option>
                                                    <option value="10:00 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "10:00 AM") {{ 'selected' }} @endif>10:00 AM</option>
                                                    <option value="10:30 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "10:30 AM") {{ 'selected' }} @endif>10:30 AM</option>
                                                    <option value="11:00 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "11:00 AM") {{ 'selected' }} @endif>11:00 AM</option>
                                                    <option value="11:30 AM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "11:30 AM") {{ 'selected' }} @endif>11:30 AM</option>
                                                    <option value="12:00 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "12:00 PM") {{ 'selected' }} @endif>12:00 PM</option>
                                                    <option value="12:30 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "12:30 PM") {{ 'selected' }} @endif>12:30 PM</option>
                                                    <option value="1:00 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "1:00 PM") {{ 'selected' }} @endif>1:00 PM</option>
                                                    <option value="1:30 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "1:30 PM") {{ 'selected' }} @endif>1:30 PM</option>
                                                    <option value="2:00 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "2:00 PM") {{ 'selected' }} @endif>2:00 PM</option>
                                                    <option value="2:30 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "2:30 PM") {{ 'selected' }} @endif>2:30 PM</option>
                                                    <option value="3:00 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "3:00 PM") {{ 'selected' }} @endif>3:00 PM</option>
                                                    <option value="3:30 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "3:30 PM") {{ 'selected' }} @endif>3:30 PM</option>
                                                    <option value="4:00 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "4:00 PM") {{ 'selected' }} @endif>4:00 PM</option>
                                                    <option value="4:30 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "4:30 PM") {{ 'selected' }} @endif>4:30 PM</option>
                                                    <option value="5:00 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "5:00 PM") {{ 'selected' }} @endif>5:00 PM</option>
                                                    <option value="5:30 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "5:30 PM") {{ 'selected' }} @endif>5:30 PM</option>
                                                    <option value="6:00 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "6:00 PM") {{ 'selected' }} @endif>6:00 PM</option>
                                                    <option value="6:30 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "6:30 PM") {{ 'selected' }} @endif>6:30 PM</option>
                                                    <option value="7:00 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "7:00 PM") {{ 'selected' }} @endif>7:00 PM</option>
                                                    <option value="7:30 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "7:30 PM") {{ 'selected' }} @endif>7:30 PM</option>
                                                    <option value="8:00 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "8:00 PM") {{ 'selected' }} @endif>8:00 PM</option>
                                                    <option value="8:30 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "8:30 PM") {{ 'selected' }} @endif>8:30 PM</option>
                                                    <option value="9:00 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "9:00 PM") {{ 'selected' }} @endif>9:00 PM</option>
                                                    <option value="9:30 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "9:30 PM") {{ 'selected' }} @endif>9:30 PM</option>
                                                    <option value="10:00 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "10:00 PM") {{ 'selected' }} @endif>10:00 PM</option>
                                                    <option value="10:30 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "10:30 PM") {{ 'selected' }} @endif>10:30 PM</option>
                                                    <option value="11:00 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "11:00 PM") {{ 'selected' }} @endif>11:00 PM</option>
                                                    <option value="11:30 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "11:30 PM") {{ 'selected' }} @endif>11:30 PM</option>
                                                    <option value="11:59 PM" @if (old('sunday_closetime', $location->timings[6]["close_time"]) == "11:59 PM") {{ 'selected' }} @endif>11:59 PM</option>
                                                </select>
                                                {{-- <input type="time" name="sunday_closetime" class="form-control" value="{{old('sunday_closetime')}}" placeholder="Please Update your Close timings" /> --}}
                                                @if($errors->has('sunday_closetime'))
                                                    <span class="form-text">{{ $errors->first('sunday_closetime') }}</span>
                                                @endif
                                            </div>
                                            @endif
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="pull-right" style="float: right;">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                                    <br><br>
                            </div>
                            </form>
								<!--end::Wizard Form-->
							</div>
						</div>
						<!--end::Body-->
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
<!--end::Content-->
@endsection