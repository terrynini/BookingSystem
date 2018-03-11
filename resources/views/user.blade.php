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
            <table class="table" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">姓名</th>
                        <th scope="col">學號/身分證(非完整)</th>
                        <th scope="col">權限</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user['id']}}</th>
                            <td>{{$user['name']}}</td>
                            <td>{{$user['identity_code']}}</td>
                            <td>{{$user['privilege'] > 1 ? '管理員':'工讀生'}}</td>
                            <td>
                                <button class="btn btn-danger deleteUser" data-id="{{$user['id']}}" data-token="{{ csrf_token() }}" {{App\Userinfo::find($user['id'])->privilege <= App\Userinfo::user()->privilege ? '' : 'disabled'}}><i class="fa fa-trash" aria-hidden="true"></i>刪除</button>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>#</td>
                        {!! Form::open(array('url' => 'user', 'id' => 'addUserForm')) !!}
                            <td>
                            {!! Form::text('name' ,'' , ['class' => 'form-control', 'placeholder' => '姓名']) !!}
                            </td>
                            <td>
                                {!! Form::text('identity_code' ,'' , ['class' => 'form-control', 'placeholder' => '學號/身分證字號']) !!}
                            </td>
                            <td>
                                {!! Form::select('privilege',[1=>"工讀生",2=>"管理員"],'' , ['class' => 'form-control']) !!}
                            </td>
                            <td>
                                <button class="btn btn-success" type="submit" ><i class="fa fa-plus" aria-hidden="true"></i>新增</button>
                            </td>
                        {!! Form::close()!!}
                    </tr>
                </tbody>
            </table>
            <div class="col-12 text-center">
                
            </div>
        </div>
    </div>
</div>

@stop

@section('script')
var fmr = $("#addUserForm");
fmr.submit(function (e) {

    e.preventDefault();

    $.ajax({
        type: fmr.attr('method'),
        url: fmr.attr('action'),
        data: fmr.serialize(),
        success: function (data) {
            if(data.status == "success")
            {
               window.location.href = "{{url("user")}}";
            }
            else
                toastr.warning(data.status,"創建失敗",
                {
                    closeButton: true,
                    positionClass: "toast-bottom-center",
                    preventDuplicates: true,
                });

        },
        error: function(data){
            console.log("fail");
            document.write(data.responseText);
        }
    });
});

$(".deleteUser").click(function(){
    var id = $(this).data("id");
    var $ele = $(this).parent().parent();
    var token = $(this).data("token");

    toastr.warning("確認降級該使用者？<br /><br /><button type='button' id='confirmationYes' class='btn btn-light'>是</button>",
    '降級使用者',
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
            url: "user/"+id,
            type: 'POST',
            dataType: "JSON",
            data: {
                "_method": 'DELETE',
                "_token": token,
            },
            success: function( msg ) {
                if ( msg.status === 'success' ) {
                    window.location.href = "{{url("user")}}";
                }
            }
        });
    }
});

@stop