<div class="container" style="padding:0 0 1.5rem">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('ioi') ? 'active' : '' }}" href="{{url("/ioi")}}">預約</a>
        </li>
        @if(session('access_token') != NULL)
            <li class="nav-item">
                <a class="nav-link {{ Request::is('ioi/reservations') ? 'active' : ''}}" href="{{url("/ioi/reservations")}}">預約記錄</a>
            </li>
        @endif
    </ul>
</div>