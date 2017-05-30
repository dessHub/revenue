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

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                 <select class="form-control" id="cat" name="category" required="true" value="{{ old('location') }}" style="background-color : inherit">
                                     <option  value="">Select Category</option>
                                      <option  value="Business">Business services</option>
                                      <option  value="Property">Property</option>
                                 </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}">
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                                <input class="form-control" type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}"/>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('registration') ? ' has-error' : '' }}">
                            <label for="registration" class="col-md-4 control-label">Plot No/Business Reg No:</label>

                            <div class="col-md-6">
                                <input id="registration" type="text" class="form-control" name="registration" value="{{ old('registration') }}">
                                @if ($errors->has('registration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('registration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address No:</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                            <label for="town" class="col-md-4 control-label">Town:</label>

                            <div class="col-md-6">
                                <input id="town" type="text" class="form-control" name="town" value="{{ old('town') }}">
                                @if ($errors->has('town'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
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
