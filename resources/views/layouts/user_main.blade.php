<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Vizitka</title>
		<script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('css/classic.css')}}">
    <link rel="stylesheet" href="{{asset('css/classic.date.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
			<div class="card p-4"> 
				@yield('content')
			</div>
		</div>

	</div>
    <script type="text/javascript">

        var edit_profil = document.getElementById("EditProfilButtonId");
        var admin_booking = document.getElementById("BookingAdminId");
        var client_booking = document.getElementById("BookingClientId");

        var admin_token = localStorage.getItem('vizitkaToken');
        var token = "{{$user->token}}";
        if(admin_token == token){
            client_booking.outerHTML = "";
        }
        else{
            edit_profil.outerHTML = "";
            admin_booking.outerHTML = "";
        }


    </script>
    <script type="text/javascript">
    function doBooking(){
        var name = document.getElementById('b_name').value;
        var phone = document.getElementById('b_phone').value;
        var time = document.getElementById('b_time').value;
        var date = document.getElementById('pick-date').value;

        if(name && phone && time && date){
            $.ajax({
                url:"{{route('user.booking.store', ['_token' => 'csrf_token'])}}",
                data:{user_id:{{$user->id}}, phone_number:phone, time_id:time, date:date, name:name},
                success:function(response){
                    if(response.error_message){
                        alert(response.error_message);
                    }
                    else{
                        alert(response.message);
                        document.getElementById('closeButtonId').click();
                    }
                }
            });
        }
    }
</script>
	<script src="{{asset('js/popper.min.js')}}"></script>
    
    <script src="{{asset('js/picker.js')}}"></script>
    <script src="{{asset('js/picker.date.js')}}"></script>

    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>