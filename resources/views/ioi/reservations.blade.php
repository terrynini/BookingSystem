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
                        <th scope="col">場次</th>
                        <th scope="col">開始時間</th>
                        <th scope="col">狀態</th>
                        @if (App\Userinfo::MatchAdmin()->count())
                            <th scope="col">預約人</th>
                        @endif
                        <th scope="col">預約創建於</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                        <tr>
                            <th scope="row">{{$record['event_id']}}</th>
                            <td>{{$record['begin_at']}}</td>
                            <td>reserve</td>
                            @if (App\Userinfo::MatchAdmin()->count())
                                <th>{{  $record['userinfo']['name']."/".$record['userinfo']['identity_code'] }}</th>
                            @endif
                            <td>{{$record['created_at']}}</td>
                            <td>
                            <button class="btn btn-danger deleteReservation" data-id="{{$record['id']}}" data-event = "{{$record['event_id']}}" data-token="{{ csrf_token() }}" {{App\IOIEvent::find($record['event_id'])->begin_at->gt(Carbon\Carbon::now()) ? '' : 'disabled'}}>Delete</button>
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
$(".deleteReservation").click(function(){
    var id = $(this).data("id");
    var event_id = $(this).data("event");
    var $ele = $(this).parent().parent();
    var token = $(this).data("token");

    toastr.warning("確認刪除第"+event_id+"場次的預約？<br /><br /><button type='button' id='confirmationYes' class='btn btn-light'>是</button>",
    '刪除預約',
    {
        closeButton: true,
        allowHtml: true,
        positionClass: "toast-bottom-center",
        preventDuplicates: true,
        onShown: function (toast) {
            $("#confirmationYes").click(deleteConfirm);
        }
    });

    function deleteConfirm()
    {
        $.ajax(
        {
            url: "reservations/"+id,
            type: 'POST',
            dataType: "JSON",
            data: {
                "_method": 'DELETE',
                "_token": token,
            },
            success: function( msg ) {
                if ( msg.status === 'success' ) {
                    $ele.fadeOut().remove();
                }
            }
        });
    }
});

@stop