@extends('layouts.app')

@section('content')

 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mathematical Operation With Roman Numerals</div>
                <div class="panel-body">
                    
                    For Example enter that type Roman Numerals in textBox XL + X or C - I
                    <form class="form-horizontal" role="form" method="POST" action="{{URL::to('roman') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Roman Numerals</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="roman" placeholder="XL + X" required autofocus>

                               
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>

                               
                            </div>
                        </div>
                    </form>
                    
                    @if(isset($finalResult) && !empty($finalResult))
                    Result= {{$finalResult}}
                    @else
                     
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



@endsection