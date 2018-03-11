<div class="card chi">
    <div class="card-header text-center">登入狀態</div>
    <div class="card-body">
        @if (session('access_token') == null)
            <p class="card-text text-center">尚未登入</p>
            <div class="text-center">
                <button id="login" type="button" class="btn btn-primary"> Log in </button>
            </div>
        @else
            <p class="card-text">你好 {{session("name")}}</p>
            <p class="card-text">學號/身分證字號：{{session("id")}}</p>
            <p class="card-text">系所/單位：{{session("unit")}} {{session("group")==NULL? session("title"): session("group")}}</p>
            <p class="card-text">身份：
        @if(App\Userinfo::MatchSuAdmin()->count())
            管理員
        @elseif(App\Userinfo::MatchAdmin()->count())
            工讀生
        @elseif(session("type") === "FACULTY")
            教職員
        @else
            學生
        @endif
            </p>
            <div class="text-center">
                <button id="logout" type="button" class="btn btn-danger "> Log out </button>
            </div>
        @endif 
    </div>
</div>