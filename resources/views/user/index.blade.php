@extends('layouts.user_main')
@section('content')
				<div class=" image d-flex flex-column justify-content-center align-items-center"> 
					<button class="btn btn-secondary"> 
						<img src="{{asset($user->image)}}" height="100" width="100" />
					</button> 
					<span class="name mt-3">
						{{$user->first_name}} {{$user->last_name}}
					</span> 
					<span class="idd">
						{{$user->email}}
					</span> 
					<div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
						<span class="idd">
							{{$user->phone_number}}
						</span> 
					</div> 
					<div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
						<span class="number">
							{{$user->subject}}
						</span> 
					</div> 
					<div class="d-flex mt-2" id="EditProfilButtonId"> 
						<a href="{{route('user.edit', $user->id)}}" class="btn btn-dark" style="height: 35px;">
							Edit Profile
						</a>
					</div>
					<div class="d-flex mt-2" id="BookingAdminId">

						<a href="{{route('user.bookings', $user->id)}}" class="btn btn-dark" style="height: 35px;">
							Booking
						</a>
					</div>
					<div class="d-flex mt-2" id="BookingClientId">

						<button type="button" class="btn btn-dark" style="height: 35px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
							booking
						</button>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h1 class="modal-title fs-5" id="exampleModalLabel">Booking</h1>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
						      <div class="modal-body">
						      	<form>
						      	<label class="form-label">Name</label>
						      	<input type="text" id="b_name" class="form-control mb-4">
						      	<p class="text-danger" id="b_neme_message"></p>
						      	<label class="form-label">Phone number</label>
						      	<input type="text" id="b_phone" class="form-control mb-4">
						      	<p class="text-danger" id="b_phone_message"></p>
						      	<label class="form-label">Time</label>
						      	<select class="form-select mb-4" id="b_time">
						      		@foreach($working_times as $time)
						      			<option value="{{$time->id}}">{{$time->time}}</option>
						      		@endforeach
						      	</select>
						      	<p class="text-danger" id="b_time_message"></p>
						        <input type="text" class="form-control" id="pick-date" placeholder="Pick A Date">
						        <p class="text-danger" id="b_date_message"></p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="height: 35px;" id="closeButtonId">Close</button>
						        <button type="button" class="btn btn-primary" style="height: 35px;" onclick="doBooking()">Save changes</button>
						      </div>

					    </div>
					  </div>
					</div>
					<div class="text-center mt-3 ml-2 mr-2"> 
						<p style="width:330px;">
							{{$user->description}}
						</p> 
					</div> 
				<div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
					@if($user->link_to_telegram)
					<span>
						<a href="{{$user->link_to_telegram}}">
							<i class="fa fa-telegram"></i>
						</a>

					</span> 
					@endif
					@if($user->link_to_youtube)
					<span>
						<a href="{{$user->link_to_youtube}}">
							<i class="fa fa-youtube"></i>
						</a>
					</span> 
					@endif
					@if($user->link_to_instagram)
					<span>
						<a href="{{$user->link_to_instagram}}">
							<i class="fa fa-instagram"></i>
						</a>
					</span> 
					@endif
					@if($user->link_to_linkedin)
					<span>
						<a href="{{$user->link_to_linkedin">
							<i class="fa fa-linkedin"></i>
						</a>
					</span> 
					@endif
				</div> 
				<div class=" px-2 rounded mt-4 date "> 
					<span class="join">
						Joined May,2021
					</span>
				</div> 


@endsection
