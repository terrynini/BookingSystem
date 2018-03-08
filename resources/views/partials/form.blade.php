<div class="card chi">
       <div class="card-header text-center">預約表單</div>
       @if (session('access_token') == null)
       @else
            <div class="card-body">
                {!! Form::open(array('url' => '/ioi/reservations')) !!}
                    <div class ="form-group">
                        {!! Form::label('phone','連絡電話')!!}
                        {!! Form::text('phone' , '' , array('placeholder' => 'Contact Phone' , 'class' => 'form-control' )) !!}
                    </div>
                    <div class ="form-group">
                        {!! Form::label('event_id','預約場次')!!}
                        {!! Form::select('event_id' , [1=>1,2=>2,3=>3],'' , array( 'class' => 'form-control' )) !!}
                    </div>
                    <div class ="form-group">
                        <button class="btn btn-primary " type="submit"><i class="fa fa-check"></i>Submit</button>
                    </div>
                {!! Form::close() !!}
            </div>
        @endif
</div>