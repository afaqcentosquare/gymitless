@extends('admin.master')
@section("title")
<title>Gymitless | Edit User</title>
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
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Edit User <span class="form-text text-muted">Edit and save your Information.</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" action="{{route('admin.users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Name:</label>
                                <input type="text" class="form-control" placeholder="Please enter your name" name="name" value="{{old("name",$user->name)}}" />
                                @if($errors->has('name'))
                                <span class="form-text text-muted">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label>Email:</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Please enter your Email" name="email" value="{{old("email",$user->email)}}" />
                                    <div class="input-group-append"><span class="input-group-text"><i class="flaticon-multimedia"></i></span></div>
                                </div>
                                @if($errors->has('email'))
                                <span class="form-text text-muted">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label>Recovery Email:</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Please enter your Recovery Email" name="email_recovery" value="{{old("email_recovery",$user->email_recovery)}}" />
                                    <div class="input-group-append"><span class="input-group-text"><i class="flaticon-multimedia"></i></span></div>
                                </div>
                                @if($errors->has('email_recovery'))
                                <span class="form-text text-muted">{{ $errors->first('email_recovery') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label>Phone Number:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="(000) 000-0000" name="number" id="userNumber" onkeypress="return numberPressed(event);" value="{{old("number",$user->number)}}" />
                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                </div>
                                @if($errors->has('number'))
                                <span class="form-text text-muted">{{ $errors->first('number') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-1">
                                <label>Ext. :</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="ext_number" value="{{old("ext_number",$user->ext_number)}}"/>
                                </div>
                                @if($errors->has('ext_number'))
                                <span class="form-text text-muted">{{ $errors->first('ext_number') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label>Address Line 1:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your address line 1" name="addressline1" value="{{old("addressline1",$user->addressline1)}}" />
                                    <div class="input-group-append"></div>
                                </div>
                                @if($errors->has('addressline1'))
                                <span class="form-text text-muted">{{ $errors->first('addressline1') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label>Address Line 2:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your address line 2" name="addressline2" value="{{old("addressline2",$user->addressline2)}}" />
                                    <div class="input-group-append"></div>
                                </div>
                                @if($errors->has('addressline2'))
                                <span class="form-text text-muted">{{ $errors->first('addressline2') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>City:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your city" name="city" value="{{old("city",$user->city)}}" />
                                    <div class="input-group-append"></div>
                                </div>
                                @if($errors->has('city'))
                                <span class="form-text text-muted">{{ $errors->first('city') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label>State:</label>
                                <div class="input-group">
                                    <select name="state" class="form-control">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                        @if ($user->state == $state->id)
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
                                @if($errors->has('state'))
                                <span class="form-text text-muted">{{ $errors->first('state') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label>Zip Code:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Enter your Zip Code" name="zipcode" value="{{old("zipcode",$user->zipcode)}}" />
                                    <div class="input-group-append"></div>
                                </div>
                                @if($errors->has('zipcode'))
                                <span class="form-text text-muted">{{ $errors->first('zipcode') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Password:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Enter your Password" name="password" value="{{old("password",$user->password)}}" />
                                    <div class="input-group-append"></div>
                                </div>
                                @if($errors->has('password'))
                                <span class="form-text text-muted">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label>User Group:</label>
                                    <select class="form-control" data-size="5" tabindex="null" name="user_group">
                                    <option value="super_user" @if (old('user_group',$user->user_group) == "super_user") {{ 'selected' }} @endif>SuperUser</option>
                                    <option value="administator" @if (old('user_group',$user->user_group) == "administator") {{ 'selected' }} @endif>Administrator</option>
                                    <option value="account_manager" @if (old('user_group',$user->user_group) == "account_manager") {{ 'selected' }} @endif>Account Manager</option>
                                    <option value="customer_service" @if (old('user_group',$user->user_group) == "customer_service") {{ 'selected' }} @endif>Customer Service</option>
                                    <option value="technical_support" @if (old('user_group',$user->user_group) == "technical_support") {{ 'selected' }} @endif>Technical Support</option>
                                    </select>
                                @if($errors->has('user_group'))
                                <span class="form-text text-muted">{{ $errors->first('user_group') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4">Photo</label>
                            <div class="col-12">
                                <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url({{ asset($user->profile_avatar) }})">
                                    <div class="image-input-wrapper"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="profile_avatar_remove" />
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <input name="previous_image" value="{{$user->profile_avatar}}" hidden/>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
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
