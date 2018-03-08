<div class="container" style="padding:0 0 1.5rem">
    <ul class="nav nav-pills">
        <li class="nav-item">
        <a class="nav-link {{ Request::is('ioi/events/create') ? 'active' : '' }}" href="{{url("/ioi/events/create")}}">建立場次</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('ioi/reservations')? 'active' :''}}" href="{{url("ioi/reservations")}}">預約記錄</a>
        </li>
    </ul>
</div>