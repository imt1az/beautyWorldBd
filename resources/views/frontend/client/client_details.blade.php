@extends('frontend.home_dashboard')

@section('home')
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">HOME</a></li>
                <li>CLIENT</li>
            </ol>


        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="{{ asset($client->image) }}"
                                    alt="">
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="portfolio-description">
                        <h2>{{$client->name}}</h2>
                        <p>
                        {!! $client->details !!}

                        </p>
                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
