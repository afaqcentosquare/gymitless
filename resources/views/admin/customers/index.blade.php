@extends('admin.master')
@section("title")
<title>Gymitless | Customer List</title>
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
			<div class="card card-custom gutter-b">

			</div>
			<!--end::Notice-->
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
						<h3 class="card-label">Customer Table
							<!-- <span class="d-block text-muted pt-2 font-size-sm">scrollable datatable with fixed height</span> -->
						</h3>
					</div>
					<div class="card-toolbar">
						<!--begin::Button-->
						<a href="{{route('admin.customer.add')}}" class="btn font-weight-bold btn-pill btn-light-primary">
							<span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24"></polygon>
										<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
										<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
									</g>
								</svg>
                            </span>Add Customer</a>
						<!--end::Button-->
					</div>
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
						<thead>
							<tr>
								<th>Account Number</th>
								<th>Company Name</th>
								<th>Contact</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach ($customers as $customer)
							<tr>
								<td>{{$customer->id}}</td>
								<td>{{$customer->company_name}}</td>
								<td>{{$customer->contact}}</td>
								<td>{{$customer->email}}</td>
								<td><a href="tel:{{$customer->number}}">{{$customer->number}}</a></td>
								<td>
									<a href="{{route('admin.customer.show',$customer->id)}}" class="btn btn-sm btn-clean btn-icon" title="View Lead">
										<span class="svg-icon svg-icon-md">
											<i class="ki ki-eye"></i>
										</span>
									</a>
								</td>
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
