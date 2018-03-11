<div class="card chi">
       <div class="card-header text-center">預約</div>
       @if (session('access_token') == null)
       @else
            <div class="card-body">
                {!! Form::open(array('url' => '/ioi/reservations', 'id' => 'reservationForm')) !!}
                    <div class ="form-group">
                        {!! Form::label('event_id','預約場次')!!}
                        {!! Form::select('event_id' , [] ,'' , ['class' => 'form-control']) !!}
                    </div>
                    <div class ="form-group text-center">
                        <button class="btn btn-primary " type="submit"><i class="fa fa-check"></i>Submit</button>
                    </div>
                {!! Form::close() !!}
            </div>
        @endif
</div>