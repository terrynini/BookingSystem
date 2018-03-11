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
                        @if ($admin)
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
                            <td>{{$record['status']}}
                                @if ($admin && $record['status']=="未簽到") 
                                    <button class='btn btn-primary checkReservation' data-id="{{$record['id']}}" data-token="{{csrf_token()}}" ><i class='fa fa-check' aria-hidden='true'></i></button>
                                @endif
                            </td>
                            @if ($admin)
                                <th>{{  $record['userinfo']['name']."/".$record['userinfo']['identity_code'] }}</th>
                            @endif
                            <td>{{$record['created_at']}}</td>
                            <td>
                            <button class="btn btn-danger deleteReservation" data-id="{{$record['id']}}" 
                            data-event = "{{$record['event_id']}}" data-token="{{ csrf_token() }}"
                             {{ $record['disabled']? 'disabled' : ''}}><i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{$records->links()}}
            </div>
        </div>
    </div>
</div>

@stop

@section('script')
$(".checkReservation").click(function(){
    var id = $(this).data("id");
    var token = $(this).data("token");

        $.ajax(
        {
            url: "reservations/"+id,
            type: 'PATCH',
            dataType: "JSON",
            data: {
                "_method": 'PUT',
                "_token": token,
            },
            success: function( msg ) {
                window.location.href = "{{url("ioi/reservations")}}";
            }
        });
});

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
                    toastr.info("","刪除成功",{positionClass: "toast-bottom-center"});
                    $ele.fadeOut().remove();
                }
                else
                    toastr.error("", msg.status,{positionClass: "toast-bottom-center"}); 
            },
            error: function(msg){
                    document.write(msg.responseText)
                    toastr.error("","無效的操作",{positionClass: "toast-bottom-center"});

            }
        });
    }
});

@stop