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
                        <h4 class="header-title m-t-0 m-b-30">Add New Article</h4>

                        {!! Form::open( ['route' => 'article.store', 'files' => true, 'class' => 'form-horizontal'] )
                        !!}
                        @csrf

                        <div class="form-group">
                            <label class="col-md-2 control-label">Title</label>
                            <div class="col-md-10">
                                <input type="text" name="title"
                                    class="form-control {{ $errors->has('title') ? ' parsley-error' : '' }}"
                                    value="{{ old('title') }}" required>

                                    @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-email">Article Category</label>
                            <div class="col-md-10">
                                {!! Form::select('category', $category, old('category'), ['class' => "form-control select2"]) !!}

                                @if ($errors->has('category'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                            @endif                                   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Slug</label>
                            <div class="col-md-10">
                                <input type="text" name="slug"
                                    class="form-control {{ $errors->has('slug') ? ' parsley-error' : '' }}"
                                    value="{{ old('slug') }}" required>

                                    @if ($errors->has('slug'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                        </span>
                                    @endif                                   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Banner</label>
                            <div class="col-md-10">
                                <input type="file" name="banner" class="dropify" data-max-file-size="5M" data-height="140" />

                                @if ($errors->has('banner'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('banner') }}</strong>
                                </span>
                            @endif                                   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Content</label>
                            <div class="col-md-10">
                                <div id="test">
                                    <textarea name="content">{{ old('content') }}</textarea>
                                    
                                    @if ($errors->has('content'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif                                       
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="pull-right">
                            <button type="button" class="btn btn-default waves-effect">Back</button>
                            <button type="button" class="btn btn-info waves-effect waves-light" onclick="javascript:$('form').submit();">Save</button>                        
                    </div>
                </div><!-- end col -->
            </div>
        </div> <!-- container -->
    </div> <!-- content -->
</div>
@include('article.script')
@endsection
