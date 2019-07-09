@extends('template.header')

@section('content')   
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                            <button class="btn btn-primary waves-effect waves-light m-b-5 pull-right" data-toggle="modal" data-target="#add"> <i class="fa fa-plus"></i> <span>Add Category</span> </button>

                        <h4 class="header-title m-t-0 m-b-30">Article Category</h4>

                        <table id="datatable" style="width: 100%;" class="table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 35%;">Name</th>
                                    <th style="width: 35%;">Slug</th>
                                    <th style="width: 25%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                    <tr>
                                        <td> {{ ($key + 1) }} </td>
                                        <td> {{ $value->name }} </td>
                                        <td> {{ $value->slug }} </td>
                                        <td>
                                                <button class="btn btn-icon waves-effect waves-light btn-warning m-b-5 edit" data-id="{{ $value->id }}"> <i class="fa fa-pencil"></i> </button>
                                                {!! Form::open(['url' => 'category/'. $value->id]) !!}
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"> <i class="fa fa-trash"></i> </button>                                        
                                                {!! Form::close() !!}                                                
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- end col -->
            </div>

        </div> <!-- container -->

    </div> <!-- content -->
</div>
@include('category.form_add')
@include('category.form_edit')
@include('category.script')
@endsection
