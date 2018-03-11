@extends('layouts.guest')
@section('style')
.card-columns {
    column-count: 1;
}
@stop
@section('content')	
<div class='container'>
    <div class='row'>
        <div class ="col-7">
            <div id='calendar'>
            </div>
            <div class="card ">
                <div class="card-body">
                    <ul>
                        <li><span style="color:green">綠色：可預約</span>、
                            <span style="color:red">紅色：已被預約</span>、
                            <span style="color:orange">橘色：尚未開放預約</span>
                        </li>
                        <li>預約完成後至預約紀錄查看</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class = "col-5 container">
            <div class="card-columns ">
               <div class="card">
                   <div class="card-header text-center">預約及使用說明</div> 
                   <div class="card-body">
                       <ol>
                           <li>請自行攜帶隨身碟或拍照存取檢測資料</li>
                           <li>每個場次只開放一人預約</li>
                           <li>每人每月只能預約一次(可取消後改場次)</li>
                           <li>不能預約當天的場次</li>
                           <li>往前半年內有三次未到紀錄，將暫時無法報名</li>
                           <li>請提早在活動兩天前取消，活動前一天將無法取消</li>
                       </ol>
                   </div>
               </div>
               @include('partials.userinfo')
               @include('partials.form') 
            </div>
        </div>
    </div>
</div>

@stop

@section('script')
$("#login").click(function() { window.location.href = "{{url("/auth")}}";});
$("#logout").click(function() { window.location.href = "{{url("/logout")}}";});

var fmr = $("#reservationForm");
fmr.submit(function (e) {

    e.preventDefault();

    $.ajax({
        type: fmr.attr('method'),
        url: fmr.attr('action'),
        data: fmr.serialize(),
        success: function (data) {
            if(data.status == "success")
            {
                toastr.success("","預約成功",
                {
                    closeButton: true,
                    positionClass: "toast-bottom-center",
                    preventDuplicates: true,
                });
                $('#calendar').fullCalendar('refetchEvents');
            }
            else
                toastr.warning(data.status,"預約失敗",
                {
                    closeButton: true,
                    positionClass: "toast-bottom-center",
                    preventDuplicates: true,
                });

        }
    });
});

$.getJSON("/ioi/events/",function(data) {
            $('#event_id').find('option').remove();
            $.each(data, function(){
                $("#event_id").append('<option value="'+ this.value +'">'+ this.name +'</option>')
            });
});
@stop

