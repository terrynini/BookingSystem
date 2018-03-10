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