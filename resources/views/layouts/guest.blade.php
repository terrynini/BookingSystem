<!DOCTYPE html>
<html>
    <head>
        <title>身體組成分析儀預約</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="/css/all.css" >
    <script src='/js/all.js'></script>
    <style  type="text/css">
    @font-face {
        font-family:'NotoSans';
        src: url('fonts/NotoSansCJKtc-Black.otf');
    }
    @font-face{
        font-family:"YaHei";
        src: url('fonts/Microsoft YaHei.ttf');
    }
    @media (max-width: @screen-xs) {
        body{font-size: 10px;}
    }
    @media (max-width: @screen-sm) {
        body{font-size: 14px;}
    }
    .chi{
        font-family: 'YaHei', Arial, "sans-serif";
    }
    @yield('style')
    </style>
    </head>
    <body>
	    <div class="container" style="padding:0 0 1.5rem">
		    <div class="navbar" style="background-color:green" >
			    <a href="#" style="text-decoration:none;font-size:30px; color:white ">身體組成分析儀預約</a>
            </div>
        </div>
        
        @if (App\Admin::isadmin()->count())
            @include('partials.admin_nav')
        @else
            @include('partials.user_nav')
        @endif

        @yield('content')
        <script type="text/javascript">
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                defaultView: 'month',
                events :  '/ioi/events/all',
                timeFormat: 'H:mm',
            });
        });
        @yield('script')
        </script>
    </body>
</html>
