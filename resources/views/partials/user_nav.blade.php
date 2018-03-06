<div class="container" style="padding:0 0 1.5rem">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('ioi') ? 'active' : '' }}" href="{{url("/ioi/events/create")}}">活動行事曆</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">預約記錄</a>
            </li>
        </ul>
</div>