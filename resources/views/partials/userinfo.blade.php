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