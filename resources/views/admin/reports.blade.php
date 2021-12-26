@extends('admin.master')
@section("title")
<title>Gymitless | Reports</title>
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Notice-->
            <div class="card card-custom gutter-b"></div>
            <!--end::Notice-->
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Reports Table
                            <!-- <span class="d-block text-muted pt-2 font-size-sm">scrollable datatable with fixed height</span> -->
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary btn-pill font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                    <i class="flaticon-squares"></i>
                                    <!--end::Svg Icon-->
                                </span>Choose</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                <!--begin::Navigation-->
                                <ul class="navi flex-column navi-hover py-2">
                                    <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                                    <li class="navi-item" id="click_new_customer">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-print"></i>
                                            </span>
                                            <span class="navi-text">New Customers Accounts</span>
                                        </a>
                                    </li>
                                    <li class="navi-item" id="click_closed_account">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-copy"></i>
                                            </span>
                                            <span class="navi-text">Closed Accounts</span>
                                        </a>
                                    </li>
                                    <li class="navi-item" id="click_new_location">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-excel-o"></i>
                                            </span>
                                            <span class="navi-text">New Locations</span>
                                        </a>
                                    </li>
                                    <li class="navi-item" id="click_ninty_day">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-text-o"></i>
                                            </span>
                                            <span class="navi-text">90 Day Outs</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <!-- <a href="#" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>New Record</a> -->
                        <!--end::Button-->
                    </div>
                </div>

                <!-- New Customers Accounts Table -->
                
                <div class="card-body" id="new_customer">
                    <!--begin: Datatable-->
                    <h4><i class="flaticon2-next"></i> New Customers Account</h4>
                    <hr>
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable11">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($new_customers as $new_customer)
                            <tr>
                                <td>{{$new_customer->id}}</td>
                                <td>{{$new_customer->company_name}}</td>
                                <td>{{$new_customer->email}}</td>
                                <td>{{$new_customer->contact}}</td>
                                <td><a href="tel:{{$new_customer->number}}">{{$new_customer->number}}</a></td>
                                @if($new_customer->account_status == 0 )
                                <td><span class="label label-lg font-weight-bold label-light-success label-inline">Active</span></td>
                                @else
                                <td><span class="label label-lg font-weight-bold label-light-danger label-inline">Closed</span></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
                <!-- Closed Accounts Table -->
                <div class="card-body" style="display: none;" id="closed_account">
                    <!--begin: Datatable-->
                    <h4><i class="flaticon2-next"></i> Closed Accounts</h4>
                    <hr>
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable12">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Phone</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($close_accounts as $close_account)
                            <tr>
                                <td>{{$close_account->id}}</td>
                                <td>{{$close_account->company_name}}</td>
                                <td>{{$close_account->email}}</td>
                                <td>{{$close_account->contact}}</td>
                                <td><a href="tel:{{$close_account->number}}">{{$close_account->number}}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>

                <!-- New Locations Table -->

                <div class="card-body" style="display: none;" id="new_location">
                    <!--begin: Datatable-->
                    <h4><i class="flaticon2-next"></i> New Locations</h4>
                    <hr>
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable13">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Location Name</th>
                                <th>Location Type</th>
                                <th>Address</th>
                                <th>Zip Code</th>
                                <th>City</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($new_locations as $new_location)
                            <tr>
                                <td>{{$new_location->id}}</td>
                                <td>{{$new_location->location_name}}</td>
                                @if($new_location->location_type == "primary" )
                                <td><span class="label label-lg font-weight-bold label-light-success label-inline">Primary</span></td>
                                @else
                                <td><span class="label label-lg font-weight-bold label-light-info label-inline">Secondary</span></td>
                                @endif
                                <td>{{$new_location->addressline1}}</td>
                                <td>{{$new_location->zip_code}}</td>
                                <td>{{$new_location->city}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>



                <!-- 90 Day Outs Table -->
                <div class="card-body" style="display:none;" id="ninty_day">
                    <!--begin: Datatable-->
                    <h4><i class="flaticon2-next"></i> 90 Days Out</h4>
                    <hr>
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable14">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ninty_days_out as $ninty_day)
                            <tr>
                                <td>{{$ninty_day->id}}</td>
                                <td>{{$ninty_day->company_name}}</td>
                                <td>{{$ninty_day->email}}</td>
                                <td>{{$ninty_day->contact}}</td>
                                <td><a href="tel:{{$ninty_day->number}}">{{$ninty_day->number}}</a></td>
                                @if($ninty_day->account_status == 0 )
                                <td><span class="label label-lg font-weight-bold label-light-success label-inline">Active</span></td>
                                @else
                                <td><span class="label label-lg font-weight-bold label-light-danger label-inline">Closed</span></td>
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
    <!--end::Entry-->
</div>
@endsection
