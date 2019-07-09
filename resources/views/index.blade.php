@extends('website.template')

@section('banner')
<div class="dev-revslider">
    <div id="dev-fullwidthslider" class="rev_slider" data-version="5.0">
        <ul>
            <li data-transition="fade">
                <!-- MAIN IMAGE -->
                <img src="http://placehold.it/1920x600" alt="" width="1920" height="600">

                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-resizme dev-underline-title" data-x="['center','center','center','center']"
                    data-hoffset="['0', '0', '0', '0']" data-y="['center','center','center','center']"
                    data-voffset="['-95', '-95', '-95', '-95']" data-whitespace="nowrap" data-transform_idle="o:1;"
                    data-transform_in="y:50px;opacity:0;s:2000;e:Power3.easeOut;"
                    data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                    data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500"
                    style="z-index: 5; white-space: nowrap;">Industry Business Theme</div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizme dev-large-title" data-x="['center','center','center','center']"
                    data-hoffset="['0', '0', '0', '0']" data-y="['center','center','center','center']"
                    data-voffset="['0', '0', '0', '0']" data-whitespace="nowrap" data-transform_idle="o:1;"
                    data-transform_in="y:50px;opacity:0;s:2000;e:Power3.easeOut;"
                    data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                    data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000"
                    style="z-index: 5; white-space: nowrap;">
                    Create your digital <span>INDUSTRIAL</span> <br> <span>WEBSITE</span> professionally.</div>

                <!-- LAYER NR. 3 -->
                <a class="tp-caption tp-resizeme dev-capbtn" href="#" target="_self" id="dev-fullwidthslider-layer-3"
                    data-x="['center','center','center','center']" data-hoffset="['0', '0', '0', '0']"
                    data-y="['center','center','center','center']" data-voffset="['100', '100', '100', '100']"
                    data-whitespace="nowrap" data-transform_idle="o:1;"
                    data-transform_in="y:50px;opacity:0;s:2000;e:Power3.easeOut;"
                    data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                    data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1500"
                    style="z-index: 5; white-space: nowrap;">Free Consultation
                </a>
            </li>
        </ul>
    </div><!-- END REVOLUTION SLIDER -->
</div>
@endsection

@section('content')
<div class="wrapper clearfix">
    <!-- What we offer -->
    <section class="padding paddv-100 we-offer-section">
        <div class="container section-row">
            <div class="row">
                <div class="col-md-12">
                    <div class="we-offer-box clearfix">
                        <div class="left">
                            <img src="http://placehold.it/536x620" alt="Example Photo">
                            <div class="img-content">
                                <div class="content">
                                    <h2 data-animation-name="fadeInLeft" data-animation-delay="1500"
                                        data-animation-duration="1000">
                                        <span>TOP REASONS TO WORK</span>
                                        Reasons to work with us
                                        <span class="linner"></span>
                                    </h2>

                                    <p data-animation-name="fadeInLeft" data-animation-delay="2000"
                                        data-animation-duration="1000">Consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut...</p>

                                    <a data-animation-name="fadeInLeft" data-animation-delay="2500"
                                        data-animation-duration="1000" href="#" class="devbtn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <ul class="box-offers clearfix">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-heartbeat" aria-hidden="true"></i>
                                    </a>
                                    <h2>
                                        <span>We Always do</span>
                                        Quality Work
                                    </h2>
                                    <p>
                                        Areas tackled in the most fundamental parts of medical research include cellular
                                        and molecular biology medical genetics, immunology. and psychology.
                                    </p>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-cubes" aria-hidden="true"></i>
                                    </a>
                                    <h2>
                                        <span>WE DEAL WITH</span>
                                        Multi Projects
                                    </h2>
                                    <p>
                                        Areas tackled in the most fundamental parts of medical research include cellular
                                        and molecular biology medical genetics, immunology. and psychology.
                                    </p>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-area-chart" aria-hidden="true"></i>
                                    </a>
                                    <h2>
                                        <span>We Always use</span>
                                        Updated Tech
                                    </h2>
                                    <p>
                                        Areas tackled in the most fundamental parts of medical research include cellular
                                        and molecular biology medical genetics, immunology. and psychology.
                                    </p>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                                    </a>
                                    <h2>
                                        <span>Client happy with</span>
                                        Client Support
                                    </h2>
                                    <p>
                                        Areas tackled in the most fundamental parts of medical research include cellular
                                        and molecular biology medical genetics, immunology. and psychology.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End What we offer -->
    <section class="padding paddv-100 projects">
        <div class="container section-row">
            <h1 class="section-title">
                <span class="sub-title">Sag Digital Studio</span>
                Instagram Posts
                <span class="linner"></span>
            </h1>
            <div class="projects-content">
                <div class="container">
                    <ul class="projects-four project-items clearfix">
						@foreach ($ig as $item)
                        <li class="">
                            <div class="project-item">
                                <div class="thumb">
                                    <img src="{{ $item['url_image'] }}" style="width: 280px; height: 260px;" alt="Water Projects">
                                    <div class="hover">
                                        <a class="open-popup" href="{{ $item['link'] }}"><i
                                                class="dev_project_icon"></i></a>
                                    </div>
                                </div>
                                <div class="content">
                                    <h2>{{ $item['caption'] }}</h2>
									<a href="{{ $item['link'] }}">View Details</a>
                                </div>
                            </div>
						</li>
						@endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Target -->
    <section class="padding paddv-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="section-title section-title-center">
                        News Article
                        <span class="linner"></span>
                    </h1>
                </div>
            </div>

            <div class="row">
                @foreach ($article as $item)


                <div class="col-md-4">
                    <div class="industry-post">
                        <div class="thumb">
                            <img src="http://placehold.it/360x200" alt="">
                        </div>
                        <div class="content">
                            <h2> {{ $item->title }} </h2>
                            <ul class="meta">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{ date('d/m/Y', strtotime($item->created_at)) }}
                                    </a>
                                </li>
                            </ul>

                            <p> {{ Str::limit($item->content, 75, '...') }} </p>
                            <a href="{{ route('read', $item->slug) }}" class="read-more">Continue Reading</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Our Target -->

</div>
@endsection
