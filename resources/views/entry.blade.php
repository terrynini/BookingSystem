<!DOCTYPE html>
<html style="height:100%;">
    <head>
        <title>中大衛保組預約系統</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <style type="text/css">
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
    p {
        font-family: 'NotoSans', Arial, "sans-serif";
    }
    .chi{
        font-family: 'YaHei', Arial, "sans-serif";
    }
    .card-columns {
        column-count: 1;
    }
    .btn {
        padding: 14px 24px;
        border: 0 none;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
    } 
    .btn:focus, .btn:active:focus, .btn.active:focus {
        outline: 0 none;
    }
    .btn-primary {
        background: #546de5;
        color: #ffffff;
    }
    .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
        background: #778beb;
    }
    .btn-primary:active, .btn-primary.active {
        background: #BBC6FD;
        box-shadow: none;
    }
    </style>
    </head>

    <body style="height:100%;">
        <div style="height:100%">
	        <div style="background:#63cdda;height:50%;">
                    <div class="mx-auto" style="width:200px;">
                        <img src="http://www.ncu.edu.tw/assets/thumbs/pic/df1dfaf0f9e30b8cc39505e1a5a63254.png"  />
                    </div>
                    <p  class="text-center" style="font-size:6em;color:white;" >衛生保健組預約系統</p>
            </div>
	        <div class="container-fluid" style="background:#f8a5c2;padding:80px 0 20px;height:50%">
                <div class="container">
                    <div class="card-columns">
                        <div class="card"  style="background:#f78fb3;color:#596275;border-color:#f78fb3;">
                            <div class="card" style="background:#f8a5c2;color:#596275;border-color:#f8a5c2;">
                                <div class="card-body">
                                    <h4 class="card-title chi">大一心肺復甦訓練</h4>
                                    <p class="card-text chi">畢業前須通過一次。</p>
                                    <div class="text-center">
                                        <a href="{{url("/cpr")}}" class="btn btn-primary">前往登記場次</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card"  style="background:#f78fb3;color:#596275;border-color:#f78fb3;">
                            <div class="card" style="background:#f8a5c2;color:#596275;border-color:#f8a5c2;">
                                <div class="card-body">
                                    <h4 class="card-title chi">身體組成分析儀</h4>
                                    <p class="card-text chi">身體組成分析儀是利用生物電阻抗(BIA)原理來檢測身體組成之醫學儀器。</p>
                                    <div class="text-center">
                                        <a href="{{url("/ioi")}}" class="btn btn-primary">前往登記場次</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	        </div>
        </div>
    </body>
</html>
