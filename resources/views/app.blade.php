<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap 3.3.2 -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	<title></title>
	
</head>
<body>
	<div class="container">
        {{--@include('partials.flash')--}}
        @include('flash::message')
        
		@yield('content')

	</div>
	
	<div class="footer">
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <script>
            $('#flash-overlay-modal').modal();
//            $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>

		@yield('footer')
	</div>


</body>


</html>