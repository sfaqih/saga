@extends('template.header')

@section('content')   
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <a href="{{ route('article.create') }}" class="btn btn-primary waves-effect waves-light m-b-5 pull-right"> <i class="fa fa-plus"></i> <span>Add Article</span> </a>

                        <h4 class="header-title m-t-0 m-b-30">Article</h4>

                        <table id="datatable" style="width: 100%;" class="table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 15%;">Title</th>
                                    <th style="width: 25%;">Slug</th>
                                    <th style="width: 25%;">Content</th>
                                    <th style="width: 25%;">Banner</th>
                                    <th style="width: 5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                    <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $value->title }} </td>
                                            <td> {{ $value->slug }} </td>
                                            <td> {!! $value->content !!} </td>
                                            <td>
                                                @if ($value->banner_original)
                                                    @if (File::exists('images/'.$value->banner_original))
                                                        @php
                                                            $banner = asset('images/'.$value->banner_original);
                                                        @endphp
                                                    @else
                                                        @php
                                                            $banner = $value->banner_original;
                                                        @endphp
                                                    @endif
                                                @else
                                                    @php
                                                        $banner = 'images/noimagefound.png';
                                                    @endphp
                                                @endif                                                                                                    
                                                <img src="{{ $banner }}" style="max-width: 100%; max-height: 100%;" alt="{{ $value->title }}">
                                            </td>
                                            <td> 
                                                    <a href="{{ url('article/'. $value->id .'/edit') }}" class="btn btn-icon waves-effect waves-light btn-warning m-b-5"> <i class="fa fa-pencil"></i> </a>

                                                    {!! Form::open(['url' => 'article/'. $value->id]) !!}
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
@endsection
