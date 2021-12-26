@extends('admin.master')
@section("title")
<title>Gymitless | Lead List</title>
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
						<h3 class="card-label">Leads Table
							<!-- <span class="d-block text-muted pt-2 font-size-sm">scrollable datatable with fixed height</span> -->
						</h3>
					</div>
					<div class="card-toolbar">
						<!--begin::Button-->
						<a href="{{route('admin.leads.add')}}" class="btn font-weight-bold btn-pill btn-light-primary">
							<span class="svg-icon svg-icon-primary svg-icon-2x"><i class="ki ki-plus"></i></span>Add a Lead</a>
						<!--end::Button-->
					</div>
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
						<thead>
							<tr>
								<th>Company Name</th>
								<th>Contact</th>
								<th>Email</th>
								<th>Phone</th>
								<th>City</th>
								<th>State</th>
								<th>Zip Code</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($leads as $lead)
							<tr>
								<td>{{$lead->company_name}}</td>
								<td>{{$lead->contact}}</td>
								<td>{{$lead->email}}</td>
								<td><a href="tel:{{$lead->number}}">{{$lead->number}}</a></td>
								<td>{{$lead->city}}</td>
								<td>{{$lead->state}}</td>
								<td>{{$lead->zip_code}}</td>
								<td>
									<a href="{{route('admin.leads.show',$lead->id)}}" class="btn btn-sm btn-clean btn-icon" title="View Lead">
										<span class="svg-icon svg-icon-md">
											<i class="ki ki-eye"></i>
										</span>
									</a>
									<a href="{{route('admin.leads.edit',$lead->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit Lead">
										<span class="svg-icon svg-icon-md">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" \ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
													<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />
												</g>
											</svg>
										</span>
									</a>
									<a href="{{route('admin.leads.destroy',$lead->id)}}" class="btn btn-sm btn-clean btn-icon" title="Delete">
										<span class="svg-icon svg-icon-md">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
													<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
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
