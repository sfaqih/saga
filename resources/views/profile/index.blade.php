@extends('template.header')
@section('content')
<link href="{{ asset('admin/plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        {!! Form::open( ['route' => 'profile.update', 'files' => true, 'class' => 'form-horizontal'] )
                        !!}
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Full Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name"
                                            class="form-control {{ $errors->has('name') ? ' parsley-error' : '' }}"
                                            value="{{ Auth::user()->name }}" required>

                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="text" name="email"
                                            class="form-control {{ $errors->has('email') ? ' parsley-error' : '' }}"
                                            value="{{ Auth::user()->email }}" readonly required>

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @if (Auth::user()->provider_id == "")
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Current Password</label>
                                        <div class="col-md-10">
                                            <input type="password" name="old_password"
                                                class="form-control {{ $errors->has('old_password') ? ' parsley-error' : '' }}">

                                            @if ($errors->has('old_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('old_password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">New Password</label>
                                        <div class="col-md-10">
                                            <input type="password" name="new_password"
                                                class="form-control {{ $errors->has('new_password') ? ' parsley-error' : '' }}">
                                                
                                            @if ($errors->has('new_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('new_password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Password Confirmation</label>
                                        <div class="col-md-10">
                                            <input type="password" name="password_confirmation"
                                                class="form-control {{ $errors->has('password_confirmation') ? ' parsley-error' : '' }}">
                                                
                                            @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div> 
                                @endif                                                                                                                               
                            </div>
                            <div class="col-md-6">
                                    @if (Auth::user()->avatar)
                                        @if (File::exists('images/'.Auth::user()->avatar))
                                            @php
                                                $avatar = asset('images/'.Auth::user()->avatar);
                                            @endphp
                                        @else
                                            @php
                                                $avatar = Auth::user()->avatar;
                                            @endphp
                                        @endif
                                    @else
                                        @php
                                            $avatar = 'admin/images/users/avatar-1.jpg';
                                        @endphp
                                    @endif                                
                                    <input type="file" name="avatar" class="dropify" data-max-file-size="5M" data-height="140" data-default-file="{{ $avatar }}" value="{{ $data->banner_originial }}" />
                            </div>                            
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-default waves-effect">Back</button>
                        <button type="button" class="btn btn-info waves-effect waves-light"
                            onclick="javascript:$('form').submit();">Save</button>
                    </div>
                </div><!-- end col -->
            </div>
        </div> <!-- container -->
    </div> <!-- content -->
</div>
@include('profile.script')
@endsection
