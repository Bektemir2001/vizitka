<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vizitka</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
	<div class="container">
		<form action="{{route('service.user.update', $user->id)}}" method="POST">
			@csrf
			<h4 class="text-center mt-4">Edit profil</h4>
		    <div class="mb-3 col-12">
			    <label for="exampleInputEmail1" class="form-label">
			    	Image
			    </label>
			    <div class="mb-3">
			    	<img src="{{asset($user->image)}}" style="width: 200px; height: 200px;">
			    </div>
			    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="image">
			    @error('image')
			    <p class="text-danger">{{$message}}</p>
			    @enderror
			</div>
			<div class="mb-3 col-12">
			    <label for="exampleInputPassword1" class="form-label">
			    	First name
			    </label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="first_name" value="{{$user->first_name}}">
			    @error('first_name')
			    <p class="text-danger">{{$message}}</p>
			    @enderror
			</div>
			<div class="mb-3 col-12">
			    <label for="exampleInputPassword1" class="form-label">
			    	Last name
			    </label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="last_name" value="{{$user->last_name}}">
			    @error('last_name')
			    <p class="text-danger">{{$message}}</p>
			    @enderror
			</div>
			<div class="mb-3 col-12">
			    <label for="exampleInputPassword1" class="form-label">
			    	Subject
			    </label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="subject" value="{{$user->subject}}">
			    @error('subject')
			    <p class="text-danger">{{$message}}</p>
			    @enderror
			</div>
			<div class="mb-3 col-12">
			    <label for="exampleInputPassword1" class="form-label">
			    	Email
			    </label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="email" value="{{$user->email}}">
			    @error('email')
			    <p class="text-danger">{{$message}}</p>
			    @enderror
			</div>
			<div class="mb-3 col-12">
			    <label for="exampleInputPassword1" class="form-label">
			    	Phone number
			    </label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="phone_number" value="{{$user->phone_number}}">
			    @error('phone_number')
			    <p class="text-danger">{{$message}}</p>
			    @enderror
			</div>
			<div class="mb-3 col-12">
			    <label for="exampleInputPassword1" class="form-label">
			    	Link to youtube
			    </label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="link_to_youtube" value="{{$user->link_to_youtube}}">
			    @error('link_to_youtube')
			    <p class="text-danger">{{$message}}</p>
			    @enderror
			</div>
			<div class="mb-3 col-12">
			    <label for="exampleInputPassword1" class="form-label">
			    	Link to instagram
			    </label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="link_to_instagram" value="{{$user->link_to_instagram}}">
			    @error('link_to_instagram')
			    <p class="text-danger">{{$message}}</p>
			    @enderror
			</div>
			<div class="mb-3 col-12">
			    <label for="exampleInputPassword1" class="form-label">
			    	Link to linkedin
			    </label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="link_to_linkedin" value="{{$user->link_to_linkedin}}">
			    @error('link_to_linkedin')
			    <p class="text-danger">{{$message}}</p>
			    @enderror
			</div>
			<div class="mb-3 col-12">
			    <label for="exampleInputPassword1" class="form-label">
			    	Link to telegram
			    </label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="link_to_telegram" value="{{$user->link_to_telegram}}">
			    @error('link_to_telegram')
			    <p class="text-danger">{{$message}}</p>
			    @enderror
			</div>
			<div class="mb-3 col-12">
			    <label for="exampleInputPassword1" class="form-label">
			    	Description
			    </label>
			    <textarea class="form-control" name="description">{{$user->description}}</textarea>
			    @error('description')
			    <p class="text-danger">{{$message}}</p>
			    @enderror	
			</div>
			<button type="submit" class="btn btn-primary">
				Submit
			</button>
		</form>
	</div>
</body>
</html>