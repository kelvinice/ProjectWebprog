@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/doRegister" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Role</label>
                                    <div class="col-md-6">
                                        <div>
                                            <select class="form-control" id="role" name="role">
                                                <option value="admin">Admin</option>
                                                <option value="member">Member</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                </div>

                            </div>

                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Phone</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" >
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <textarea name="address" id="address" cols="10" rows="5" class="form-control" name="address">{{old('address')}}</textarea>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('birthday') ? ' has-error' : '' }}">
                                <label for="birthday" class="col-md-4 control-label">Birthday</label>

                                <div class="col-md-6">
                                    <input id="birthday" type="text" class="form-control" name="birthday" placeholder="mm/dd/yyyy" value="{{ old('birthday') }}">
                                    @if ($errors->has('birthday'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    <input id="genderM" type="radio" name="gender" value="male"> <label for="genderM">Male</label>
                                    <input id="genderF" type="radio" name="gender" value="female"> <label for="genderF">Female</label>
                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group {{ $errors->has('profile') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Photo</label>

                                <div class="col-md-6">
                                    <input id="profile" type="file" class="form-control" name="profile">
                                    @if ($errors->has('profile'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('profile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label"><input id="agree" type="checkbox" name="agree"></label>
                                <div class="col-md-6 ">
                                    <label @if($errors->has('agree'))style="color: red" @endif>By Registering to this Website. i Agree term and condition.</label>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                            @if ($errors->any())
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first() }}</strong>
                            </span>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection