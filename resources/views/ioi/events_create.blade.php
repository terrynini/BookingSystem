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
                @include('partials.userinfo')
                <div class="card chi">
                    <div class="card-header text-center">新增場次</div>
                    <div class="card-body">
                        {!! Form::open(['url' => '/ioi/events']) !!}
                            <div class="form-group">
                                {!! Form::label('begin_at','場次日期:') !!}
                                {!! Form::input('datetime-local', 'begin_at', date('Y-m-d\TH:i'), ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('timer','開放報名時間:') !!}
                                {!! Form::input('datetime-local', 'timer', date('Y-m-d\TH:i'), ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('period','場次時間長度:') !!}
                                <div class="input-group">
                                    {!! Form::text('period', 20, ['class' => 'form-control']) !!}
                                    <span class="input-group-addon">分鐘</span>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('repeat','設定:') !!}
                                <div class="input-group">
                                    {!! Form::selectRange('repeat', 1, 20, 1,['class' => 'form-control']); !!}
                                    <span class="input-group-addon">場</span>
                                </div>
                                <div class="input-group">
                                    {!! Form::selectRange('repeat_day', 1, 20, 1,['class' => 'form-control']); !!}
                                    <span class="input-group-addon">天</span>
                                </div>
                                <div class="input-group">
                                    {!! Form::selectRange('repeat_week', 1, 20, 1,['class' => 'form-control']); !!}
                                    <span class="input-group-addon">週</span>
                                </div>                               
                            </div>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Submit</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('script')
$("#login").click(function() { window.location.href = "{{url("/auth")}}";});
$("#logout").click(function() { window.location.href = "{{url("/logout")}}";});
@stop

