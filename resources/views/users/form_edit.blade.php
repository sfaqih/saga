@extends('template.header')

@section('content')
<link href="{{ asset('admin/plugins/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/plugins/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin/plugins/select2/dist/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin/plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Edit User</h4>

                        {!! Form::open( ['url' => 'user/'.$data->id, 'files' => true, 'class' => 'form-horizontal'] )
                        !!}
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Full Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name"
                                            class="form-control {{ $errors->has('name') ? ' parsley-error' : '' }}"
                                            value="{{ $data->name }}" required>

                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="example-email">Role</label>
                                    <div class="col-md-10">
                                        {!! Form::select('role', $role, $data->id_role, ['class' => "form-control
                                        select2"]) !!}

                                        @if ($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" name="email"
                                            class="form-control {{ $errors->has('email') ? ' parsley-error' : '' }}"
                                            value="{{ $data->email }}" readonly required>

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>                              
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Avatar</label>
                                        <div class="col-md-10">
                                            @if ( !empty($data->avatar) && File::exists('images/'. $data->avatar) )
                                                <input type="file" name="avatar" class="dropify" data-max-file-size="5M" data-height="140" data-default-file="{{ asset('images/'. $data->avatar) }}" value="{{ $data->avatar }}" />
                                            @else
                                                <input type="file" name="avatar" class="dropify" data-max-file-size="5M" data-height="140" />
                                            @endif                                            
            
                                            @if ($errors->has('avatar'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </span>
                                        @endif                                   
                                        </div>                                    
                                </div>
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
@include('users.script')
@endsection
