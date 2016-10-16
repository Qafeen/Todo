@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form id="aadhaarLogin" class="form-horizontal" role="form" method="POST"
                          action="{{ url('/aadhaar/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('aadhaarId') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Aadhaar Id</label>

                            <div class="col-md-6">
                                <input id="aadhaarId" type="text" class="form-control" name="aadhaarId"
                                       value="{{ old('aadhaarId') }}" required autofocus>

                                @if ($errors->has('aadhaarId'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aadhaarId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if (session('otpGenerated'))
                            <div class="form-group{{ $errors->has('otp') ? ' has-error' : '' }}">
                                <label for="otp" class="col-md-4 control-label">OTP</label>

                                <div class="col-md-6">
                                    <input id="otp" type="text" class="form-control" name="otp"
                                           value="" required autofocus>

                                    @if ($errors->has('otp'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('otp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
