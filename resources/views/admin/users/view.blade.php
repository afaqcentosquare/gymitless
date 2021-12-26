@extends('admin.master')
@section('title')
    <title>Gymitless | Show User</title>
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
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">View User
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="" method="">
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Name:</label>
                                    <input type="text" class="form-control notedit" placeholder="Please enter your name"
                                        name="name" value="{{ $user->name }}" readonly="readonly">
                                    {{-- <span class="form-text text-muted">Please enter your name</span> --}}
                                </div>
                                <div class="col-lg-4">
                                    <label>Email:</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control notedit"
                                            placeholder="Please enter your Email" name="email" value="{{ $user->email }}"
                                            readonly="readonly">
                                        <div class="input-group-append"><span class="input-group-text"><i
                                                    class="flaticon-multimedia"></i></span></div>
                                    </div>
                                    {{-- <span class="form-text text-muted">Please enter your Email</span> --}}
                                </div>
                                <div class="col-lg-4">
                                    <label>Recovery Email:</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control notedit"
                                            placeholder="Please enter your Recovery Email" name="email_recovery"
                                            value="{{ $user->email_recovery }}" readonly="readonly">
                                        <div class="input-group-append"><span class="input-group-text"><i
                                                    class="flaticon-multimedia"></i></span></div>
                                    </div>
                                    {{-- <span class="form-text text-muted">Please enter your Recovery Email</span> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label>Phone Number:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control notedit" placeholder="(000) 000-0000"
                                            name="number" value="{{ $user->number }}" readonly="readonly">
                                        <div class="input-group-append"><span class="input-group-text"><i
                                                    class="la la-phone"></i></span></div>
                                    </div>
                                    {{-- <span class="form-text text-muted">Please enter your Phone Number</span> --}}
                                </div>
                                <div class="col-lg-1">
                                    <label>Ext. :</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control notedit" placeholder="(000) 000-0000"
                                            name="ext_number" value="{{ $user->ext_number }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Address Line 1:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control notedit"
                                            placeholder="Enter your address line 1" name="addressline1"
                                            value="{{ $user->addressline1 }}" readonly="readonly">
                                        <div class="input-group-append"></div>
                                    </div>
                                    {{-- <span class="form-text text-muted">Please enter your Address Line 1</span> --}}
                                </div>
                                <div class="col-lg-4">
                                    <label>Address Line 2:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control notedit"
                                            placeholder="Enter your address line 2" name="addressline2"
                                            value="{{ $user->addressline2 }}" readonly="readonly">
                                        <div class="input-group-append"></div>
                                    </div>
                                    {{-- <span class="form-text text-muted">Please enter your Address Line 2</span> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>City:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control notedit" placeholder="Enter your city"
                                            name="city" value="{{ $user->city }}" readonly="readonly">
                                        <div class="input-group-append"></div>
                                    </div>
                                    {{-- <span class="form-text text-muted">Please enter your city</span> --}}
                                </div>
                                <div class="col-lg-4">
                                    <label>State:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control notedit" placeholder="Enter your State"
                                            name="state" value="{{ $user->state }}" readonly="readonly">
                                        <div class="input-group-append"></div>
                                    </div>
                                    {{-- <span class="form-text text-muted">Please enter your State</span> --}}
                                </div>
                                <div class="col-lg-4">
                                    <label>Zip Code:</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control notedit" placeholder="Enter your Zip Code"
                                            name="zipcode" value="{{ $user->zipcode }}" readonly="readonly">
                                        <div class="input-group-append"></div>
                                    </div>
                                    {{-- <span class="form-text text-muted">Please enter your Zip Code</span> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Password:</label>
                                    <input type="password" class="form-control notedit" name="password"
                                        value="{{ $user->password }}" readonly="readonly">
                                    {{-- <span class="form-text text-muted">Please select user group</span> --}}
                                </div>
                                <div class="col-lg-4">
                                    <label>User Group:</label>
                                   
                                    @if ($user->user_group == 'super_user')
                                        <input type="text" class="form-control notedit" name="user_group" value="Super User"
                                            readonly="readonly">
                                    @elseif ($user->user_group == "administator")
                                        <input type="text" class="form-control notedit" name="user_group"
                                            value="Administator" readonly="readonly">
                                    @elseif ($user->user_group == "account_manager")
                                        <input type="text" class="form-control notedit" name="user_group"
                                            value="Account Manager" readonly="readonly">
                                    @elseif ($user->user_group == "customer_service")
                                        <input type="text" class="form-control notedit" name="user_group"
                                            value="Customer Service" readonly="readonly">
                                    @elseif ($user->user_group == "technical_support")
                                        <input type="text" class="form-control notedit" name="user_group"
                                            value="Technical Support" readonly="readonly">
                                    @endif

                                    {{-- <span class="form-text text-muted">Please select user group</span> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-4">Photo</label>
                                <div class="col-12">
                                    <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar"
                                        style="background-image: url({{ asset($user->profile_avatar) }})">
                                        <div class="image-input-wrapper"></div>

                                        <span
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="cancel" data-toggle="tooltip" title=""
                                            data-original-title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                        <span
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="remove" data-toggle="tooltip" title=""
                                            data-original-title="Remove avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </form>
                        <!--end::Card-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
        </div>
    </div>
@endsection
