<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Nusa Indah Jaya Utama</title>
    <!--library-->
    <link rel="stylesheet" href="{{ url('forntend/libraries/bootstrap2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('forntend/style/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Assistant:200,400,700&&display=swap"
      rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
	<img class="wave" src="{{ url('forntend/images/login/editan wave.png')}}">
	<div class="container">
		<div class="img">
			<img src="{{ url('forntend/images/login/document.png')}}">
		</div>
		
		@yield('content')
		
    </div>
    <script type="text/javascript" src="{{ url('forntend/script/js/main.js')}}"></script>
</body>
</html>
