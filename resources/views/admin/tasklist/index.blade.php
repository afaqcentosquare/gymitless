@extends('admin.master')
@section("title")
<title>Gymitless | Tasks List</title>
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
						<h3 class="card-label">Tasks Table
							<!-- <span class="d-block text-muted pt-2 font-size-sm">scrollable datatable with fixed height</span> -->
						</h3>
					</div>
					
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
						<thead>
							<tr>
								<th>Id</th>
								<th>Task</th>
								<th>Type</th>
								<th>Date</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($lead_notes as $lead_note)
							<tr>
								<td>{{$lead_note->id}}</td>
								<td width="50%">{{$lead_note->note}}</td>
								<td>{{$lead_note->type}}</td>
								<td>{{ date_format(date_create($lead_note->datetime), 'm-d-Y') }}</td>
                                @if ($lead_note->status == 0)
                                <td>Not Completed</td>
                                @else
                                    <td>Completed</td>
                                @endif
								<td>
									<a href="#" class="btn btn-sm btn-clean btn-icon" title="Edit Lead" data-toggle="modal"
									data-target="#view_task{{ $lead_note->id }}">
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

@foreach ($lead_notes as $lead_note)
<form id="update_task_form{{ $lead_note->id }}"
	action="{{ route('admin.leads.updatenote',$lead_note->id) }}"
	method="post">
	@csrf
	<div class="modal fade" id="view_task{{ $lead_note->id }}"
		tabindex="-1" role="dialog" aria-labelledby="addnote"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg"
			role="document">
			<!-- TASK VIEW CONDITION -->
			<input name="note_id" value="{{$lead_note->id}}" hidden/>
			
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
								onclick="return confirm('Are you sure you want to delete this task?');">
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
										<input type="text"
											name="datetime"
											class="form-control"
											disabled="disabled"
											placeholder="00-00-00"
											value="{{ $lead_note->datetime}}" />
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
					@if ($lead_note->status == 0)
					<div class="modal-footer">
						
							<button type="button"
								class="btn btn-light-primary font-weight-bold"
								data-dismiss="modal">Close</button>
							<button type="submit"
								class="btn btn-primary font-weight-bold">Save
								changes</button>
					</div>
					@endif
				</div>
		</div>
	</div>
</form>
@endforeach
@endsection
