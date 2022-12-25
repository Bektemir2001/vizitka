@extends('layouts.activate_main')
@section('content')
				<div class=" image d-flex flex-column justify-content-center align-items-center"> 
					
					<span class="name mt-3">
						Аутентификация
					</span> 
					
					<div class="d-flex flex-row justify-content-center align-items-center gap-2" id="formId"> 
						<div>
							<div>
								<label class="form-label">
									Email
								</label>
								<input type="email" name="email" class="form-control" id="emailId">

								<label class="form-label">
									Password
								</label>
								<input type="password" name="password" class="form-control" id="passwordId">
							</div>
							<button class="btn btn-primary" onclick="sendData()" style="height: 40px;margin-top: 15px;" id="formButton">
								send
							</button>
						</div>
					</div> 
				</div>
<script type="text/javascript">
	function sendData(){
		var email = document.getElementById('emailId');
		var password = document.getElementById('passwordId');
		if(email.value && password.value){
			console.log(email.value, password.value);
			$.ajax({
				url: "{{route('service.user.activate', ['_token' => 'csrf_token'])}}",
				data: {email:email.value, password:password.value},
				success:function(response){
					if(response.message){
						alert(response.message);
					}
					else{
						localStorage.setItem('vizitkaToken', response.token);
						var form = document.getElementById('formId');
						var button = document.getElementById('formButton');
						form.outerHTML = "<h3 class='text-center text-success'>authentication successful</h3>";
						button = "";
					}
					
				}
			});
		}
		
	}
</script>
@endsection
