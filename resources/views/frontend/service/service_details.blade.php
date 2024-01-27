@extends('frontend.home_dashboard')

@section('home')
    <style>
        .blog .sidebar .recent-posts h4 {
            margin-left: 0px !important;
        }
    </style>

    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="https://shanguinfotech.com">HOME</a></li>
                <li>SERVICE</li>
            </ol>
            <h5>{{ $service->title }}</h5>

        </div>
    </section>

    <!-- ======= Hero Section ======= -->
    <style>
        section {
            padding: 20px 0 !important;
        }

        .swiper-pagination-bullet-active {
            color: #015754 !important;
            background: #015754 !important;
        }
    </style>

    <section id="blog" class="blog">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single text-center">



                        <h2 class="entry-title">
                            <a href="javascript:void(0)">{{ $service->title }}</a>
                        </h2>

                        <div class="entry-content">
                            <p>
                            </p>
                            <p style="text-align: justify;">{!! $service->description !!}</p>
                           

                            
                        </div>

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">OTHER SERVICES</h3>
                        <hr>
                        <div class="sidebar-item recent-posts">
                            @php
                            $services = App\Models\Service::latest()->get();
                       @endphp

                       @foreach ($services as $item)
                       <div class="post-item">
                        <ul>
                            <li>
                                <h4><a href="{{ route('sevice.details',$item->id) }}">{{ $item->title }}</a></h4>
                            </li>
                        </ul>

                    </div>
                       @endforeach
                           
                            

                        </div><!-- End sidebar recent posts-->

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section>
@endsection
