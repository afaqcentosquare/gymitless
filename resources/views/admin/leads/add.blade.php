@extends('admin.master')
@section("title")
<title>Gymitless | Insert Lead</title>
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
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">New Lead</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                <!--end::Separator-->
            </div>
            <!--end::Details-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom card-transparent">
                <div class="card-body p-0">
                    <!--begin::Wizard-->
                    <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
                        <!--begin::Wizard Nav-->

                        <!--end::Wizard Nav-->
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                        <form class="form" method="post" action="{{route('admin.leads.store')}}">
                                            @csrf
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                        <h5 class="text-dark font-weight-bold mb-10">Lead Details:</h5>
                                                        <!--begin::Group-->
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Company Name <span class="required">*</span></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="company_name" type="text"  placeholder="Company Name" value="{{old('company_name')}}"  />
                                                                @if($errors->has('company_name'))
                                                                <span class="form-text">{{ $errors->first('company_name') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Contact <span class="required">*</span></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="contact" type="text" placeholder="Contact" value="{{old('contact')}}"/>
                                                                @if($errors->has('contact'))
                                                                <span class="form-text">{{ $errors->first('contact') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Phone Number <span class="required">*</span></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="number" id="userNumber"  onkeypress="return numberPressed(event);" value="{{old('number')}}" placeholder="(123) 123 - 1234" type="text" />
                                                                @if($errors->has('number'))
                                                                <span class="form-text">{{ $errors->first('number') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Email Address<span class="required">*</span></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="input-group input-group-solid input-group-lg">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-at"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="email" placeholder="Email Address" value="{{old('email')}}"/>
                                                                    
                                                                </div>
                                                                @if($errors->has('email'))
                                                                    <span class="form-text">{{ $errors->first('email') }}</span>
                                                                    @endif
                                                                <!-- <span class="form-text text-muted">Enter valid US phone number(e.g: 5678967456).</span> -->
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        {{-- <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Primary Address <span class="required">*</span></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="input-group input-group-solid input-group-lg">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-home"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="primary_address" placeholder="Primary Address" value="{{old('primary_address')}}"/>
                                                                    
                                                                </div>
                                                                @if($errors->has('primary_address'))
                                                                  <span class="form-text">{{ $errors->first('primary_address') }}</span>
                                                                @endif
                                                            </div>
                                                        </div> --}}
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Address Line 1 <span class="required">*</span></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="input-group input-group-solid input-group-lg">
                                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="addressline1" placeholder="Address Line 1" value="{{old('addressline1')}}"/>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">.</span>
                                                                    </div>
                                                                </div>
                                                                @if($errors->has('addressline1'))
                                                                <span class="form-text">{{ $errors->first('addressline1') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        {{-- <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Address Line 2</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="input-group input-group-solid input-group-lg">
                                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="addressline2" placeholder="Address Line 2" value="{{old('addressline2')}}"/>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">.</span>
                                                                    </div>
                                                                </div>
                                                                @if($errors->has('addressline2'))
                                                                <span class="form-text">{{ $errors->first('addressline2') }}</span>
                                                                @endif
                                                            </div>
                                                        </div> --}}
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">City <span class="required">*</span></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="input-group input-group-solid input-group-lg">
                                                                    <input type="text" class="form-control form-control-solid form-control-lg"  name="city" placeholder="City" value="{{old('city')}}"/>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">.</span>
                                                                    </div>
                                                                </div>
                                                                @if($errors->has('city'))
                                                                <span class="form-text">{{ $errors->first('city') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">State <span class="required">*</span></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <!-- <div class="input-group input-group-solid input-group-lg">
                                                                    <input type="text" class="form-control form-control-solid form-control-lg" required="" name="state" placeholder="State" />
                                                                </div> -->
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
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Zip Code <span class="required">*</span></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="input-group input-group-solid input-group-lg">
                                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="zip_code" placeholder="Zip Code" maxlength="5" value="{{old('zip_code')}}"/>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">.</span>
                                                                    </div>
                                                                </div>
                                                                @if($errors->has('zip_code'))
                                                                <span class="form-text">{{ $errors->first('zip_code') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="float: right;">
                                                <input type="submit" class="btn btn-primary" value="submit">
                                            </div>
                                        </form>
                                        <!--end::Wizard Form-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Wizard-->
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

@section('bottom_links')

	<!-- phone number format -->
	<script>
		// Format the phone number as the user types it
		document.getElementById('phoneNumber').addEventListener('keyup', function(evt) {
			var phoneNumber = document.getElementById('phoneNumber');
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			phoneNumber.value = phoneFormat(phoneNumber.value);
		});

		// We need to manually format the phone number on page load
		document.getElementById('phoneNumber').value = phoneFormat(document.getElementById('phoneNumber').value);

		// A function to determine if the pressed key is an integer
		function numberPressed(evt) {
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 36 || charCode > 40)) {
				return false;
			}
			return true;
		}

		// A function to format text to look like a phone number
		function phoneFormat(input) {
			// Strip all characters from the input except digits
			input = input.replace(/\D/g, '');

			// Trim the remaining input to ten characters, to preserve phone number format
			input = input.substring(0, 10);

			// Based upon the length of the string, we add formatting as necessary
			var size = input.length;
			if (size == 0) {
				input = input;
			} else if (size < 4) {
				input = '(' + input;
			} else if (size < 7) {
				input = '(' + input.substring(0, 3) + ') ' + input.substring(3, 6);
			} else {
				input = '(' + input.substring(0, 3) + ') ' + input.substring(3, 6) + ' - ' + input.substring(6, 10);
			}
			return input;
		}
	</script>
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('assets/js/pages/features/datatables/basic/scrollable.js')}}"></script>

<script src="{{asset('assets/backend/js/pages/features/ktdatatable/base/html-table.js')}}"></script>
<!--end::Page Scripts-->
@endsection