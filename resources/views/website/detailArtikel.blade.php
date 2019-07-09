@extends('website.template')

@section('banner')
<div class="page-title mini-page-title" data-background="http://placehold.it/1920x200" data-mode="none">
    <div class="container">
        <div class="dev-breadcrumb">
            <ul class="clearfix">
                <li><a href="./index.html">Home</a></li>
                <li><a class="none-link" href="./industry-detail.html">Article</a></li>
            </ul>
        </div>
        <div class="page-meta">
            <h2>{{ $data->title }}</h2>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="wrapper clearfix">
    <!-- Single Post Content -->
    <section class="padding paddv-100">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <!-- Single Post Content -->
                    <div class="single-post">
                        <!-- Featured Image -->
                        <div class="featured-image">
                            @if (!empty($data->banner_original) && File::exists('images/'. $data->banner_original))
                                <img alt="{{ $data->title }}" src="{{ asset('images/'. $data->banner_origina) }}">                                
                            
                            @endif
                        </div>
                        <!-- End Featured Image -->

                        <!-- Post Title -->
                        <h1 class="post-title">{{ $data->title }}</h1>
                        <!-- End Post Title -->

                        <!-- Post Meta -->
                        <div class="post-meta">
                            <ul class="clearfix">
                                <li class="post-date"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{ date('d/m/Y', strtotime($data->created_at)) }} </a></li>
                                <li class="post-view"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25600</a>
                                </li>
                                <li class="post-commented"><a href="#"><i class="fa fa-commenting-o"
                                            aria-hidden="true"></i> 56</a></li>
                            </ul>
                        </div>
                        <!-- End Post Meta -->

                        <!-- Post Content -->
                        <div class="content">
                            {!! $data->content  !!}
                        </div>
                        <!-- End Post Content -->

                        <!-- Post Meta -->
                        <div class="meta-tags clearfix">
                            <div class="tags">
                                <span>Tags: </span>
                                <ul>
                                    <li><a href="#">Industry</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Factory</a></li>
                                </ul>
                            </div>
                            <div class="social-share">
                                <span>Share: </span>
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"
                                                aria-hidden="true"></i></a></li>
                                    <li><a class="share" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Post Meta -->

                        <!-- About Author -->
                        <div class="about-author">
                            <a href="#" class="author-pic">
                                <img src="http://placehold.it/90x90" alt="Author Avatare">
                            </a>
                            <div class="author-content">
                                <h2><span>Author: </span>John Snow</h2>
                                <p>Its about the news author John snow with that. Hey, tell me something. You’ve got all
                                    this money. How come you always dress like you’re doing your laundry? Explain that.
                                    Leela, Bender, we’re going grave robbing.</p>
                            </div>
                        </div>
                        <!-- End About Author -->
                    </div>
                    <!-- End Single Post Content -->


                </div>
                <div class="col-md-3">
                    <div class="sidebar">
                        <!-- Search Widget -->
                        <div class="widgets widget-search">
                            <form action="industry-detail.html" method="POST" accept-charset="utf-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i
                                                class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- End Search Widget -->
                        <!-- Recent Posts Widget -->
                        <div class="widgets widget-recentposts">
                            <h2>Recents Posts</h2>
                            <ul>
                                @foreach ($recent as $item)
                                    @if (!empty($item->banner_small) && File::exists('images/'. $item->banner_small))
                                        @php
                                            $banner = $item->banner_small;
                                        @endphp
                                    @elseif(!empty($item->banner_original) && File::exists('images/'. $item->banner_original))
                                        @php
                                            $banner = $item->banner_original;
                                        @endphp
                                    @else
                                        @php
                                            $banner = 'http://placehold.it/250x200';
                                        @endphp
                                    @endif
                                <li>
                                    <a href="{{ route('read', $item->slug) }}"><img src="{{ $banner }}" alt=""></a>
                                    <h2><a href="{{ route('read', $item->slug) }}"> {{ Str::limit($item->title, 30, '') }} </a></h2>
                                    <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> {{ date('d/m/Y', strtotime($item->created_at)) }} </span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Recent Posts Widget -->

                        <!-- Tag Cloud Widget -->
                        <div class="widgets widget-tagcloud">
                            <h2>Tags Cloud</h2>
                            <ul class="clearfix">
                                <li><a href="#">Industry</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Factory</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Top Projects</a></li>
                                <li><a href="#">Factory</a></li>
                                <li><a href="#">Industry News</a></li>
                            </ul>
                        </div>
                        <!-- End Tag Cloud Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Single Post Content -->
</div>
@endsection
