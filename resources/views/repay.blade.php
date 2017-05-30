@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Your Property/Business</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/property') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Year</label>

                            <div class="col-md-6">
                                 <select class="form-control" id="cat" name="category" required="true" value="{{ old('location') }}" style="background-color : inherit">
                                     <option  value="">Select Year</option>
                                      <option  value="Business">2016</option>
                                      <option  value="Property">2017</option>
                                 </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }}">
                            <label for="month" class="col-md-4 control-label">Month</label>

                            <div class="col-md-6">
                                <input id="month" type="text" class="form-control" name="month" value="{{ old('month') }}">
                                @if ($errors->has('month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('month') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
                            <label for="registration" class="col-md-4 control-label">Balance:</label>

                            <div class="col-md-6">
                                <input id="balance" type="text" class="form-control" name="balance" value="{{ old('balance') }}">
                                @if ($errors->has('balance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('balance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">MPESA CODE:</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}">
                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Checkout
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
