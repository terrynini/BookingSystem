<!DOCTYPE html>
<html>
    <head>
        <title>心肺復甦術訓練預約</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    
    <link rel='stylesheet' href='bower_components/fullcalendar/dist/fullcalendar.css' />
    <script src='bower_components/jquery/dist/jquery.min.js'></script>
    <script src='bower_components/moment/min/moment.min.js'></script>
    <script src='bower_components/fullcalendar/dist/fullcalendar.js'></script>
    </head>

    <body>
	    <div class="container">
		    <div class="navbar navbar-default bg" style="background-color:green" role="navigation">
		
			    <div class="navbar-collapse collapse">	
			    <a  href="" style="text-decoration:none;font-size:30px; color:white ">心肺復甦術訓練預約</a>
			    </div>
		    </div>
	    </div>
        @yield('content')
        <script type="text/javascript">
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                weekends : false,
                events :  '/eventlist',
                timeFormat: 'H:mm'
            });
        });
        $("#login").click(function() { window.location.href = "<?php echo $OAuth_url ?>";});
        </script>
    </body>
</html>
