@extends('template.header')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <a href="{{ route('user.create') }}"
                            class="btn btn-primary waves-effect waves-light m-b-5 pull-right"> <i
                                class="fa fa-plus"></i> <span>Add User</span> </a>
                        <h4 class="header-title m-t-0 m-b-30">Users List</h4>

                        <table id="datatable" style="width: 100%;" class="table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 35%;">Full Name</th>
                                    <th style="width: 35%;">Email</th>
                                    <th style="width: 35%;">Avatar</th>
                                    <th style="width: 25%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                <tr>
                                    <td> {{ ($key + 1) }} </td>
                                    <td> {{ $value->name }} </td>
                                    <td> {{ $value->email }} </td>
                                    <td>
                                        @if ( $value->avatar)
                                            @if (File::exists('images/'. $value->avatar))
                                                @php
                                                    $avatar = asset('images/'. $value->avatar);
                                                @endphp
                                            @else
                                                @php
                                                    $avatar =  $value->avatar;
                                                @endphp
                                            @endif
                                        @else
                                            @php
                                                $avatar = 'admin/images/users/avatar-1.jpg';
                                            @endphp
                                        @endif                                        
                                        <img src="{{ $avatar }}"
                                        style="max-width: 100%; max-height: 100%;" alt="{{ $value->name }}">
                                    </td>
                                    <td>
                                        <a href="{{ url('user/'. $value->id .'/edit') }}"
                                            class="btn btn-icon waves-effect waves-light btn-warning m-b-5"> <i
                                                class="fa fa-pencil"></i> </a>

                                        {!! Form::open(['url' => 'user/'. $value->id]) !!}
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-icon waves-effect waves-light btn-danger m-b-5"> <i
                                                class="fa fa-trash"></i> </button>
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
