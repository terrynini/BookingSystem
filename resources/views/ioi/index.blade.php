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
        </div>
        <div class = "col-5 container">
            <div class="card-columns ">
                <div class="card chi">
                    <div class="card-header text-center">登入狀態</div>
                    <div class="card-body">
                        @if (session('access_token') == null)
                            <p class="card-text">尚未登入</p>
                            <button id="login" type="button" class="btn btn-primary"> Log in </button>
                        @else
                            <p class="card-text">你好 {{session("name")}}</p>
                            <p class="card-text">學號/身分證字號：{{session("id")}}</p>
                            <p class="card-text">系所/單位：{{session("unit")}} {{session("group")}}</p>
                            <button id="logout" type="button" class="btn btn-danger"> Log out </button>
                        @endif 
                    </div>
                </div>
            </div>
            <div class="alert alert-warning">
                <strong>預約及使用說明：</strong>
                <ul>
                    <li>請自行攜帶隨身碟或拍照存取檢測資料</li>
                    <li>每個場次只能一人預約</li>
                    <li>每人每月只能預約一次(可取消後改場次)</li>
                    <li>不能預約當天或當天之前的場次</li>
                    <li>三個月內有三次未到場紀錄的，將半年內無法報名</li>
                </ul>
            </div>
            <div class="alert alert-info">
                <strong>系統說明：</strong>
                <ul>
                    <li>上方顏色方塊表示有場次的日期</li>
                    <li>每個顏色方塊內表達的為: 開始時間、場次編號、預約狀況</li>
                    <li>預約完成會有信件通知，當中附有取消用連結</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@stop

@section('script')
$("#login").click(function() { window.location.href = "{{url("/auth")}}";});
$("#logout").click(function() { window.location.href = "{{url("/logout")}}";});
@stop

