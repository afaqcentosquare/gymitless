@extends('admin.master')
@section("title")
<title>Gymitless | Add Customer</title>
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
				<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Add Customer</h5>
				<!--end::Title-->
				<!--begin::Separator-->
				<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
				<!--end::Separator-->
				<!--begin::Search Form-->
				<div class="d-flex align-items-center" id="kt_subheader_search">
					<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Enter customer details and submit</span>
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
								<form class="form" method="post" action="{{route('admin.customer.store')}}">
									@csrf
									<div class="card-body mt-5">
										<div class="form-group row">
											
											<div class="col-lg-4">
												<label>Company Name <span class="required">*</span></label>
												<input type="text" name="company_name" class="form-control" placeholder="Please enter your company name" value="{{old('company_name')}}" />
												@if($errors->has('company_name'))
                                                    <span class="form-text">{{ $errors->first('company_name') }}</span>
                                                @endif
											</div>
											<div class="col-lg-4">
												<label>Email <span class="required">*</span></label>
												<input type="text" name="email" class="form-control" placeholder="Please enter your email" value="{{old('email')}}" />
												@if($errors->has('email'))
                                                    <span class="form-text">{{ $errors->first('email') }}</span>
                                                @endif
											</div>
											<div class="col-lg-4">
												<label>Password <span class="required">*</span></label>
												<input type="password" name="password" class="form-control" placeholder="Please enter your Password" value="{{old('password')}}" />
												@if($errors->has('password'))
                                                    <span class="form-text">{{ $errors->first('password') }}</span>
                                                @endif
											</div>
										</div>
										<div class="form-group row">
											<div class="col-lg-4">
												<label>Zip Code: <span class="required">*</span></label>
												<input type="text" name="zip_code" value="{{old('zip_code')}}" id="kt_maxlength_1" maxlength="5" class="form-control" placeholder="Please enter your Zip Code" />
												@if($errors->has('zip_code'))
                                                    <span class="form-text">{{ $errors->first('zip_code') }}</span>
                                                @endif
											</div>
											<div class="col-lg-4">
												<label>Location Name: <span class="required">*</span></label>
												<input type="text" name="location_name" value="{{old('location_name')}}" class="form-control" placeholder="Please enter your Location name" />
												@if($errors->has('location_name'))
                                                    <span class="form-text">{{ $errors->first('location_name') }}</span>
                                                @endif
											</div>
                                            <div class="form-group" id="lat_area">
                                                <label for="latitude"> Latitude </label>
                                                <input type="text" name="latitude" id="latitude" value="{{old('latitude')}}" class="form-control">
                                            </div>
                    
                                            <div class="form-group" id="long_area">
                                                <label for="latitude"> Longitude </label>
                                                <input type="text" name="longitude" id="longitude" value="{{old('longitude')}}" class="form-control">
                                            </div>
											<div class="col-lg-4">
												<label>Contact: <span class="required">*</span></label>
												<input type="text" class="form-control" name="contact" value="{{old('contact')}}" placeholder="Enter your Contact Name" />
												@if($errors->has('contact'))
                                                    <span class="form-text">{{ $errors->first('contact') }}</span>
                                                @endif
											</div>
										</div>
										<div class="form-group row">
											<div class="col-lg-4">
												<label>Number: <span class="required">*</span></label>
												<input type="text" name="number" value="{{old('number')}}" class="form-control"  id="userNumber" onkeypress="return numberPressed(event);" placeholder="(123) 123 - 1234" />
												@if($errors->has('number'))
                                                    <span class="form-text">{{ $errors->first('number') }}</span>
                                                @endif
											</div>
											<div class="col-lg-4">
												<label>Address Line: <span class="required">*</span></label>
												<input type="text" class="form-control" name="addressline1" value="{{old('addressline1')}}" id="autocomplete" placeholder="Please enter your Address" />
												@if($errors->has('addressline1'))
                                                    <span class="form-text">{{ $errors->first('addressline1') }}</span>
                                                @endif
											</div>
											<div class="col-lg-4">
												<label>Website:</label>
												<input type="text" class="form-control" name="website" value="{{old('website')}}" placeholder="Enter your Website." />
												@if($errors->has('website'))
                                                    <span class="form-text">{{ $errors->first('website') }}</span>
                                                @endif
											</div>
											{{-- <div class="col-lg-4">
												<label>Address Line 2:</label>
												<input type="text" class="form-control" name="addressline2" value="{{old('addressline2')}}" placeholder="Enter your Address" />
												@if($errors->has('addressline2'))
                                                    <span class="form-text">{{ $errors->first('addressline2') }}</span>
                                                @endif
											</div> --}}
										</div>
										<div class="form-group row">
											{{-- <div class="col-lg-4">
												<label>City: <span class="required">*</span></label>
												<input type="text" name="city"  value="{{old('city')}}" class="form-control"  placeholder="Please enter your City name" />
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
												<label>Staffed hours - Open Time: <span class="required">*</span></label>
												<input type="time" name="staffopentime" class="form-control" placeholder="Please enter your Open timings" />
											</div>
											<div class="col-lg-4">
												<label>Staffed hours - Close Time: <span class="required">*</span></label>
												<input type="time" name="staffclosetime" class="form-control" placeholder="Please enter your Close timings" />
											</div>
											<div class="col-lg-4">
												<label>Days: <span class="required">*</span></label>
												<!-- <input type="text" class="form-control" name="website" placeholder="Enter your Website." /> -->
												<div class="dropdown bootstrap-select form-control">
													<select class="form-control selectpicker" name="days" data-size="4" tabindex="null">
														<option>Monday</option>
														<option>Tuesday</option>
														<option>Wednesday</option>
														<option>Thursday</option>
														<option>Friday</option>
														<option>Saturday</option>
														<option>Sunday</option>
													</select>
												</div>
											</div>
										</div> --}}
										<div class="form-group row">
											<div class="col-lg-12">
												<label>Mailing Address: <span class="required">*</span></label>
												<div class="checkbox-inline">
													<label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary mb-2">
														<input type="checkbox" id="mailingAddressCheckbox" name="is_same_physical_address" checked="checked">
														<span></span>
														Mailing address same as physical address.
													</label>
												</div>
												<!-- IF NOT -->
												<label>If not, then fill out the details please: <span class="required">*</span></label>
												<hr>
											</div>
										</div>
										<div class="mailing_address_div" style="display: none;">
											<div class="form-group row">
												<div class="col-lg-6">
													<label>Address Line 1:</label>
													<input type="text" name="mailing_addressline1" value="{{old('mailing_addressline1')}}" class="form-control disable" placeholder="Please enter your Address Line 1." />
													@if($errors->has('mailing_addressline1'))
                                                    <span class="form-text">{{ $errors->first('mailing_addressline1') }}</span>
                                                	@endif
												</div>
												<div class="col-lg-6">
													<label>Address Line 2:</label>
													<input type="text" name="mailing_addressline2" value="{{old('mailing_addressline2')}}" class="form-control disable" placeholder="Please enter your Address Line 2." />
													@if($errors->has('mailing_addressline2'))
                                                    <span class="form-text">{{ $errors->first('mailing_addressline2') }}</span>
                                                	@endif
												</div>
											</div>
											<div class="form-group row">
												<div class="col-lg-4">
													<label>City:</label>
													<input type="text" name="mailing_city" value="{{old('mailing_city')}}" class="form-control disable" placeholder="Please enter your City." />
													@if($errors->has('mailing_city'))
                                                    <span class="form-text">{{ $errors->first('mailing_city') }}</span>
                                                	@endif
												</div>
												<div class="col-lg-4">
													<label>State:</label>
													<select name="mailing_state" class="form-control">
														<option value="0">Select State</option>
														
														@foreach ($states as $state)
														<option value="{{$state->id}}" @if (old('mailing_state') == $state->id) {{ 'selected' }} @endif>{{$state->state}}</option>
														@endforeach
														
													</select>
													@if($errors->has('mailing_state'))
                                                    <span class="form-text">{{ $errors->first('mailing_state') }}</span>
                                                	@endif
												</div>
												<div class="col-lg-4">
													<label>Zip Code:</label>
													<input type="text" name="mailing_zip_code" value="{{old('mailing_zip_code')}}" class="form-control disable" maxlength="5" placeholder="Please enter yourZip Code." />
													@if($errors->has('mailing_zip_code'))
                                                    <span class="form-text">{{ $errors->first('mailing_zip_code') }}</span>
                                                	@endif
												</div>
											</div>
											<hr>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label>Payment Method: <span class="required">*</span></label>
												<div class="dropdown bootstrap-select form-control">
													<select class="form-control selectpicker" name="payment_method" data-size="4" tabindex="null" id="payment_method">
														<option value="">Select Payment Method</option>
														<option value="bank_account" @if (old('payment_method') == "bank_account") {{ 'selected' }} @endif>Bank Account</option>
														<option value="credit_card" @if (old('payment_method') == "credit_card") {{ 'selected' }} @endif>Credit Card</option>
													</select>
													@if($errors->has('payment_method'))
                                                    <span class="form-text">{{ $errors->first('payment_method') }}</span>
                                                	@endif
												</div>
											</div>
										</div>
										<div class="form-group row bank_account" style="display: none;">
											<div class="col-lg-4">
												<label>Routing Number: <span class="required">*</span></label>
												<input type="number" name="bank_routing_number" value="{{old('bank_routing_number')}}" class="form-control" id="kt_maxlength_1" maxlength="9" placeholder="Please enter your Routing Number" />
												@if($errors->has('bank_routing_number'))
                                                    <span class="form-text">{{ $errors->first('bank_routing_number') }}</span>
                                                @endif
											</div>
											<div class="col-lg-4">
												<label>Account Number: <span class="required">*</span></label>
												<input type="number" name="bank_account_number" value="{{old('bank_account_number')}}" class="form-control" placeholder="Please enter your Account Number" />
												@if($errors->has('bank_account_number'))
                                                    <span class="form-text">{{ $errors->first('bank_account_number') }}</span>
                                                @endif
											</div>
										</div>

										<div class="form-group row credit_card" style="display: none;">
											<div class="col-lg-4">
												<label>Card Type: <span class="required">*</span></label>
												<div class="dropdown bootstrap-select form-control">
													<select class="form-control selectpicker" name="card_type" onchange="changeValue(this);" data-size="4" tabindex="null">
														<option value="VISA" @if (old('card_type') == "VISA") {{ 'selected' }} @endif>VISA</option>
														<option value="MAST" @if (old('card_type') == "MAST") {{ 'selected' }} @endif>Mastercard</option>
														<option value="AMEX" @if (old('card_type') == "AMEX") {{ 'selected' }} @endif>American Express</option>
														<option value="DISC" @if (old('card_type') == "DISC") {{ 'selected' }} @endif>Discover</option>
													</select>
													@if($errors->has('card_type'))
                                                    <span class="form-text">{{ $errors->first('card_type') }}</span>
                                                	@endif
												</div>
											</div>
											<div class="col-lg-4">
												<label>Card Number: <span class="required">*</span></label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" name="card_number" id="card_number" value="{{old('card_number')}}" id="kt_maxlength_1" maxlength="16" class="form-control" placeholder="Please enter your Card Number" />
													@if($errors->has('card_number'))
                                                    <span class="form-text">{{ $errors->first('card_number') }}</span>
                                                	@endif
												</div>
											</div>
											<div class="col-lg-4">
												<label>Expiration Month: <span class="required">*</span></label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" name="card_expiration_month" value="{{old('card_expiration_month')}}" id="kt_maxlength_1" maxlength="2" class="form-control" placeholder="Please enter your Expiration Month" />
													@if($errors->has('card_expiration_month'))
                                                    <span class="form-text">{{ $errors->first('card_expiration_month') }}</span>
                                                	@endif
												</div>
											</div>
										</div>

										<div class="form-group row credit_card" style="display: none;">
											<div class="col-lg-4">
												<label>Expiration Year: <span class="required">*</span></label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" name="card_expiration_year" value="{{old('card_expiration_year')}}" id="kt_maxlength_1" maxlength="4" class="form-control" placeholder="Please enter your Expiration Year" />
													@if($errors->has('card_expiration_year'))
                                                    <span class="form-text">{{ $errors->first('card_expiration_year') }}</span>
                                                	@endif
												</div>
											</div>
											<div class="col-lg-4">
												<label>CVV: <span class="required">*</span></label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" name="card_cvv" value="{{old('card_cvv')}}" id="cvv" id="kt_maxlength_1" maxlength="4" class="form-control" placeholder="Please enter your CVV" />
													@if($errors->has('card_cvv'))
                                                    <span class="form-text">{{ $errors->first('card_cvv') }}</span>
                                                	@endif
												</div>
											</div>
										</div>
										<hr>

										<!-- Explanation of Recurring Charges -->
										<div class="form-group row">
											<div class="col-lg-12">
												<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Explanation of Recurring Charges</h5>
												<br>
											</div>
											<div class="col-lg-4">
												<label># of Locations:</label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" disabled="disabled" name="no_Of_Locations" id="no_Of_Locations" class="form-control" value="">
												</div>
											</div>
											<div class="col-lg-4">
												<label>Monthly RC Subtotal:</label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" disabled="disabled" name="monthly_rc_subtotal" id="monthly_rc_subtotal" class="form-control" value="">
												</div>
											</div>
											<div class="col-lg-4">
												<label>Processing Fee:</label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" disabled="disabled" name="Processing_Fee" id="Processing_Fee" class="form-control" value="">
												</div>
											</div>
											<div class="col-lg-4">
												<label>Taxes:</label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" disabled="disabled" name="taxes_of_state" id="taxes_of_state" class="form-control" value="">
												</div>
											</div>
											<div class="col-lg-4">
												<label>Total Monthly RC:</label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" disabled="disabled" name="total_monthly_rc" id="total_monthly_rc" class="form-control" value="">
												</div>
											</div>
										</div>

										<!-- Explanation of One Time Charges  -->
										<div class="form-group row">
											<div class="col-lg-12">
												<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Explanation of One Time Charges</h5>
												<br>
											</div>
											<div class="col-lg-4">
												<label># of Locations:</label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" disabled="disabled" name="no_Of_Locations" id="no_Of_Locations" class="form-control" value="">
												</div>
											</div>
											<div class="col-lg-4">
												<label>One Time Charges Subtotal:</label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" disabled="disabled" name="One_Time_Charges_Subtotal" id="One_Time_Charges_Subtotal" class="form-control" value="">
												</div>
											</div>
											<div class="col-lg-4">
												<label>Processing Fee:</label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" disabled="disabled" name="Processing_Fee" id="Processing_Fee" class="form-control" value="">
												</div>
											</div>
											<div class="col-lg-4">
												<label>Taxes:</label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" disabled="disabled" name="taxes_of_state" id="taxes_of_state" class="form-control" value="">
												</div>
											</div>
											<div class="col-lg-4">
												<label>Total One Time Charges:</label>
												<div class="dropdown bootstrap-select form-control">
													<input type="text" disabled="disabled" name="Total_One_Time_Charges" id="Total_One_Time_Charges" class="form-control" value="">
												</div>
											</div>
										</div>


									</div>

									<!-- footer START -->
									<div class="card-footer">
										<div class="row">
											<div class="col-lg-6">
												<button type="submit" class="btn btn-primary mr-2">Save</button>
												<button type="reset" class="btn btn-secondary">Cancel</button>
											</div>
										</div>
									</div>
									<!-- footer END -->
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
