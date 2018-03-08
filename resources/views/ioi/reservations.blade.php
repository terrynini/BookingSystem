@extends('layouts.guest')
@section('style')
.card-columns {
    column-count: 1;
}
@stop
@section('content')	
<div class='container'>
    <div class='row'>
        <div class ="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">event_id</th>
                        <th scope="col">status</th>
                        <th scope="col">created_at</th>
                        <th scope="col">button</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{$record['event_id']}}</td>
                            <td>reserve</td>
                            <td>{{$record['created_at']}}</td>
                            <td>{{ Form::open(['url' => 'ioi/reservations/'.$record['event_id'], 'onsubmit' => 'return ConfirmDelete('.$record['event_id'].')']) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop

@section('script')
function ConfirmDelete(id)
{
    var x = confirm("是否要刪除場次 "+id+" 的預約");
    if (x)
      return true;
    else
      return false;
}
@stop