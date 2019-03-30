<!DOCTYPE html>
<html lang="en">
<head>
	<title>B-tronic Coming Soon </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('frontend/comming-soon/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/comming-soon/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/comming-soon/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/comming-soon/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/comming-soon/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/comming-soon/vendor/countdowntime/flipclock.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/comming-soon/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/comming-soon/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="bg-img1 size1 overlay1 p-t-24" style="background-image: url('{{ asset('frontend/comming-soon/images/bg01.jpg') }}');">
		<div class="flex-w flex-sb-m p-l-80 p-r-74 p-b-175 respon5">
			<div class="wrappic1 m-r-30 m-t-10 m-b-10">
				<div style="font-size:30px; color:white; font-family:calibri;"><strong>B</strong>-tronic</div>
			</div>

			<div class="flex-w m-t-10 m-b-10">
				@if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" style="color:white; font-size:18px">Home</a>
                    @else
                        <a href="{{ route('login') }}" style="color:white; font-size:18px">Login</a>
						&nbsp &nbsp
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="color:white; font-size:18px">Register</a>
                        @endif
                    @endauth
                </div>
				@endif
			</div>
		</div>

		<div class="flex-w flex-sa p-r-200 respon1">
			<div class="p-t-34 p-b-60 respon3">
				<p class="l1-txt1 p-b-10 respon2">
					Our website is
				</p>

				<h3 class="l1-txt2 p-b-45 respon2 respon4">
					Coming Soon
				</h3>

				<div class="cd100"></div>

			</div>

			
		</div>
	</div>



	

<!--===============================================================================================-->	
	<script src="{{ asset('frontend/comming-soon/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('frontend/comming-soon/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('frontend/comming-soon/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('frontend/comming-soon/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('frontend/comming-soon/vendor/countdowntime/flipclock.min.js') }}"></script>
	<script src="{{ asset('frontend/comming-soon/vendor/countdowntime/moment.min.js') }}"></script>
	<script src="{{ asset('frontend/comming-soon/vendor/countdowntime/moment-timezone.min.js') }}"></script>
	<script src="{{ asset('frontend/comming-soon/vendor/countdowntime/moment-timezone-with-data.min.js') }}"></script>
	<script src="{{ asset('frontend/comming-soon/vendor/countdowntime/countdowntime.js') }}"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 18,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});

		
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('frontend/comming-soon/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('frontend/comming-soon/js/main.js') }}"></script>

</body>
</html>