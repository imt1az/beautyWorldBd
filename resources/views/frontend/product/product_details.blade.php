@extends('frontend.home_dashboard')

@section('home')
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">HOME</a></li>
                <li>PRODUCT MODULE</li>
            </ol>
            <h2>{{ $product->news_title }}</h2>

        </div>
    </section><!-- End Breadcrumbs -->
    <style>
        .img-fluid {
            max-width: 56% !important;
        }
    </style>
    <!-- ======= Portfolio Details Section ======= -->

    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img text-center">
                            <img src="{{asset($product->image)}}"
                                class="img-fluid" alt="">
                        </div>



                        <div class="entry-content">
                            <p>
                            <p style="text-align: justify;"> {!! $product->news_details !!}</p>


                        </div>

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">PRODUCTS</h3>
                        <hr>
                        <div class="sidebar-item recent-posts">
                            
                        @foreach ($products as $item)
                        <div class="post-item clearfix">
                            <img src="{{asset($item->image)}}"
                                alt="">
                            <h4><a href="{{ route('product.details',$item->id) }}">{{ $item->news_title }}</a></h4>
                        </div>
                        @endforeach

                            
                          
                        </div><!-- End sidebar recent posts-->

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->
@endsection
