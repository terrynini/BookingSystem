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
            </div>
            <div class="card chi">
                <div class="card-header text-center">新增場次</div>
                <div class="card-body">
                    {!! Form::open(['url' => '/ioi/events']) !!}
                        <div class="form-group">
                            {!! Form::label('begin_at','日期:') !!}
                            {!! Form::input('datetime-local', 'begin_at', date('Y-m-d\TH:i'), ['class' => 'form-control']) !!}
                        </div>
                        <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-check"></i> Submit</button>
                    {!! Form::close() !!}
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

