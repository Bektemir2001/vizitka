<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vizitka</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<h3 class="text-center mt-4">
			<a href="#" class="navbar-brand text-primary" onclick="booking()">Books</a>
			<a href="#" class="navbar-brand text-success" onclick="workingTime()">Working Time</a>
		</h3>
		<div class="row" id="booksId">
			@foreach($books as $book)
			  	<div class="col-sm-6" style="color: {{$book->status == 1 ? 'black':'red'}};" id="{{'blockBooking'.$book->id}}">
				    <div class="card">
				      <div class="card-body">
				        <h5 class="card-title">Name => {{$book->name}}</h5>
				        <p class="card-text">Phone number => {{$book->phone_number}}</p>
				        <p class="card-text">Date => {{$book->date}}</p>
				        @if($book->status == 0)
				        <p class="d-none" id="{{'bookingTime'.$book->id}}">time => {{$book->time->time}}</p>
				        <button class="btn btn-primary" onclick="showTime({{$book->id}})" id="{{'showTimeButton'.$book->id}}">time</button>
				        @else
				        <p class="card-text">{{$book->time->time}}</p>
				        @endif
				        <button class="btn btn-danger" onclick="deleteBooking({{$book->id}})">delete</button>
				      </div>
				    </div>
			  	</div>
		  	@endforeach
		</div>


<!-- Working Time -->

		<div id="workingId" class="d-none">
			<button class="btn btn-primary mt-4 mb-4" id="buttonAddTime" onclick="addTime()">Add time</button>
			<div class="d-none" id="addTimeId">
				<div class="card-body mt-4 mb-4">
					<h3 class="text-center">Add Time</h3>
					<label class="form-label">Time</label>
					<input type="text" class="form-control" id="Time">
					<p class="text-danger" id="messageId"></p>
					<button class="btn btn-primary mt-4" onclick="addWorkingTime()">Submit</button>
					<button class="btn btn-secondary mt-4" onclick="cancelAddTime()" >Cancel</button>
				</div>
			</div>
			<div id="TimesId">
				
				  
				
				@foreach($working_times as $t)
				<div class="card mt-4" id="{{'working_t'.$t->id}}">
				  <div class="card-body">
				    <div style="float: left; display: block; width:60%;" id="{{'working_t_v'.$t->id}}">{{$t->time}}</div>
				    <div style="float: left; display: block; width:40%;">
				    	<button class="btn btn-primary" onclick="editTime({{$t->id}})">edit</button>
				    	<button class="btn btn-danger" onclick="deleteTime({{$t->id}})">delete</button>
					</div>
				  </div>
				</div>
				@endforeach
			</div>
		</div>

	</div>
<!-- Books scripts -->
<script type="text/javascript">
	

	
</script>

<!-- Working times scripts -->
<script type="text/javascript">

	function workingTime(){
		var blok = document.getElementById('booksId');
		var workingTime = document.getElementById('workingId');
		blok.className = "d-none";
		workingTime.className = "";
	}

	function booking(){
		var blok = document.getElementById('booksId');
		var workingTime = document.getElementById('workingId');
		blok.className = "row";
		workingTime.className = "d-none";
	}
	function addTime(){
		var button = document.getElementById('buttonAddTime');
		var blok = document.getElementById('addTimeId');
		button.className = "d-none";
		blok.className = "";
	}
	function cancelAddTime(){
		var button = document.getElementById('buttonAddTime');
		var blok = document.getElementById('addTimeId');
		var message = document.getElementById('messageId');
		button.className = "btn btn-primary mt-4 mb-4";
		blok.className = "d-none";
		message.innerHTML = "";

	}
	function addWorkingTime(){
		var time = document.getElementById('Time');
		if(time.value){
			$.ajax({ 
				url:"{{route('user.workingtime.store', ['_token' => 'csrf_token'])}}",
				data:{user_id:{{$user->id}}, time:time.value},
				success:function(response){
					if(response.message){
						var message = document.getElementById('messageId');
						message.innerHTML = response.message;
					}
					else{
						var times = document.getElementById('TimesId');
						var button = document.getElementById('buttonAddTime');
						var blok = document.getElementById('addTimeId');
						res = "";
						response.forEach((item)=> {
							st = '<div class="card mt-4" id="working_t'+item.id+'"><div class="card-body"><div style="float: left; display: block; width:60%;"id="working_t_v'+item.id+'">'+item.time+'</div><div style="float: left; display: block; width:40%;"><button class="btn btn-primary" onclick="editTime('+item.id+')">edit</button><button class="btn btn-danger" onclick="deleteTime('+item.id+')">delete</button></div></div></div>';
							res += st;
						});
						times.innerHTML = res;
						button.className = "btn btn-primary mt-4 mb-4";
						blok.className = "d-none";
						alert("the working time added successfully");

					}
				}
			});
		}
		
	}

	function editTime(id){
		var time = document.getElementById('working_t_v'+id).innerHTML;
		var blok = document.getElementById('working_t'+id);
		var form = '<div class="card-body"><div style="float: left; display: block; width:60%;" id=""><input type="text" id="inputVal'+id+'" value="'+time+'" class="form-control col-6"><p class="text-danger" id="messageInputId'+id+'"></p></div><div style="float: left; display: block; width:40%;"><button class="btn btn-success" onclick="updateTime('+id+')">update</button><button class="btn btn-secondary" onclick="cancelUpdateTime('+id+')">cancel</button></div></div>';
		blok.innerHTML = form;
		localStorage.setItem('inputVal'+id, time);
	}

	function deleteTime(id){
		time = document.getElementById('working_t'+id);
		$.ajax({
			url:"{{route('user.workingtime.delete', ['_token' => 'csrf_token'])}}",
			data:{time:id},
			success:function(response){
				alert(response.message);
				time.outerHTML = "";
			}
		});
	}

	function cancelUpdateTime(id){
		var blok = document.getElementById('working_t'+id);
		var time = localStorage.getItem('inputVal'+id);
		localStorage.removeItem('inputVal'+id);
		blok.innerHTML = '<div class="card-body"><div style="float: left; display: block; width:60%;" id="working_t_v'+id+'">'+time+'</div><div style="float: left; display: block; width:40%;"><button class="btn btn-primary" onclick="editTime('+id+')">edit</button><button class="btn btn-danger" onclick="deleteTime('+id+')">delete</button></div></div>';
	}

	function updateTime(id){
		var input = document.getElementById('inputVal'+id);
		var blok = document.getElementById('working_t'+id);
		var old_data = localStorage.getItem('inputVal'+id);

		if(input.value != null && input.value != old_data){
			$.ajax({
				url:"{{route('user.workingtime.update', ['_token' => 'csrf_token'])}}",
				data:{time:input.value, time_id:id, user_id:{{$user->id}}},
				success:function(response){

					if(response.message){
						var message = document.getElementById('messageInputId'+id);
						message.innerHTML = response.message;
					}

					else{
						localStorage.removeItem('inputVal'+id);
						res = '<div class="card-body"><div style="float: left; display: block; width:60%;">'+response.time+'</div><div style="float: left; display: block; width:40%;"><button class="btn btn-primary" onclick="editTime('+response.id+')">edit</button><button class="btn btn-danger" onclick="deleteTime('+response.id+')">delete</button></div></div>';
						blok.innerHTML = res;
						alert('time updatet successfully');
					}
					
				}
			});
		}
	}

	function showTime(id){
		var time = document.getElementById('bookingTime'+id);
		var button = document.getElementById('showTimeButton'+id);
		var blok = document.getElementById('blockBooking'+id);
		$.ajax({
			url:"{{route('user.booking.changestatus', ['_token' => 'csrf_token'])}}",
			data:{id:id},
			success:function(response){
				console.log(response);
				button.outerHTML = "";
				time.className = "card-text";
				blok.style = '';
				blok.className = 'col-sm-6 text-black';
			}
		});

	}

	function deleteBooking(id){
		var block = document.getElementById('blockBooking'+id);
		$.ajax({
			url:"{{route('user.booking.delete', ['_token' => 'csrf_token'])}}",
			data:{id:id},
			success:function(response){
				console.log(response);
				alert(response.message);
				block.outerHTML = "";
			}
		});
	}
</script>
</body>
</html>