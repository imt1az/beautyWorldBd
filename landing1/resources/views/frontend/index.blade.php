@extends('frontend.home_dashboard')


@section('home')
    @php
        $sliders = App\Models\SliderGallery::latest()->get();
    @endphp
    <section class="portfolio-detail d-flex align-items-center">
        <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
                @foreach ($sliders as $item)
                    <div class="swiper-slide" style="width:full;">
                        <img src="{{ $item->slider_gallery }}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                @endforeach


            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>



    <!-- End Hero -->

    <main id="main">




        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">

                            <h2>BRIEF OF COMPANY</h2>
                            <p>


                            <p style="text-align: justify;">Shangu Infotech is one of the fast growing software company
                                in Bangladesh. We started business operations from 2019. We provide Smart Enterprise
                                Business Solutions in Diversified Domain and Industrial Automation of your required
                                business processes as per demand. We support the preparation of our client&rsquo;s
                                strategic planning and the policy development by transfe...
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="https://shanguinfotech.com/home/aboutDetails"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>READ MORE</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                                <a href="javascript:void(0)"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center videoButton"
                                    onclick="aboutVideo()">
                                    <span>WATCH VIDEO</span>
                                    <i class="bi bi-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img id="aboutImage" src="https://shanguinfotech.com/public/assets/admin/images/20220325085337.jpg"
                            class="img-fluid" alt="">

                        <iframe id="aboutVideo" style="display: none" width="642" height="361"
                            src="https://www.youtube.com/embed/BwiNgoJr-vM" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>


            <script>
                function aboutVideo() {
                    var video = document.getElementById("aboutVideo");
                    var image = document.getElementById("aboutImage");
                    if (video.style.display === "none") {
                        video.style.display = "block";
                        image.style.display = "none";
                    } else {
                        video.style.display = "none";
                        image.style.display = "block";
                    }
                }
            </script>

        </section>
        <!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>OUR SERVICES</p>
                </header>

                @php
                    $services = App\Models\Service::latest()->get();
                @endphp


                <div class="row gy-4">
                    @foreach ($services as $item)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">

                            <div class="service-box blue">
                                <i class="ri-discuss-line icon"></i>
                                <h3>{{ $item->title }}</h3>
                                <p>
                                    @php
                                        $detail = Str::limit($item->description, 300);
                                    @endphp
                                <p style="text-align: justify;">{!! $detail !!}</p>
                               
                                <a href="{{ route('sevice.details', $item->id) }}" class="read-more">
                                    <span>READ
                                        MORE</span> <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach



                </div>

        </section> <!-- End Services Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <div>

                                <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1"
                                    data-purecounter-separator="true" class="purecounter"></span><span> % </span>

                                <p>Customer’s Satisfaction</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <div>

                                <span data-purecounter-start="0" data-purecounter-end="230" data-purecounter-duration="1"
                                    data-purecounter-separator="true" class="purecounter"></span><span> + </span>

                                <p>System Users</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <div>
                                <span>24/7</span>
                                <p>Support Hour</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <div>

                                <span data-purecounter-start="0" data-purecounter-end="5600" data-purecounter-duration="1"
                                    data-purecounter-separator="true" class="purecounter"></span><span> + </span>

                                <p>Employee&#039;s Payroll Process Monthly</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section> <!-- End Counts Section -->




        <!-- ======= Pricing Section ======= -->

        <!-- End Pricing Section -->


        <!-- ======= Portfolio Section ======= -->
        <section id="products" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>OUR PRODUCTS</p>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                       
                    </div>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-1">
                        <div class="portfolio-wrap">
                            <img src="{{ $item->image }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $item->news_title }}</h4>
                                <p>Beauty Wolrd</p>
                                <div class="portfolio-links">
                                    <a href="{{ $item->image }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox"
                                        title="BRIEF OF WISDOM ERP SOLUTION"><i class="bi bi-plus"></i></a>
                                    <a href="{{ route('product.details',$item->id) }}"
                                        title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                   
                  


                </div>

                {{-- <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-1">
                        <div class="portfolio-wrap">
                            <img src="https://shanguinfotech.com/public/assets/admin/images/product_module/20220314062955.png"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>BRIEF OF WISDOM ERP SOLUTION</h4>
                                <p>WISDOM ERP</p>
                                <div class="portfolio-links">
                                    <a href="https://shanguinfotech.com/public/assets/admin/images/product_module/20220314062955.png"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox"
                                        title="BRIEF OF WISDOM ERP SOLUTION"><i class="bi bi-plus"></i></a>
                                    <a href="https://shanguinfotech.com/home/product/module/details?id=4"
                                        title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-1">
                        <div class="portfolio-wrap">
                            <img src="https://shanguinfotech.com/public/assets/admin/images/product_module/20220325142927.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>WISDOM ERP I Garments Manufacturing</h4>
                                <p>WISDOM ERP</p>
                                <div class="portfolio-links">
                                    <a href="https://shanguinfotech.com/public/assets/admin/images/product_module/20220325142927.jpg"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox"
                                        title="WISDOM ERP I Garments Manufacturing"><i class="bi bi-plus"></i></a>
                                    <a href="https://shanguinfotech.com/home/product/module/details?id=10"
                                        title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-1">
                        <div class="portfolio-wrap">
                            <img src="https://shanguinfotech.com/public/assets/admin/images/product_module/20220325143014.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>WISDOM ERP I Trading Business</h4>
                                <p>WISDOM ERP</p>
                                <div class="portfolio-links">
                                    <a href="https://shanguinfotech.com/public/assets/admin/images/product_module/20220325143014.jpg"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox"
                                        title="WISDOM ERP I Trading Business"><i class="bi bi-plus"></i></a>
                                    <a href="https://shanguinfotech.com/home/product/module/details?id=12"
                                        title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-3">
                        <div class="portfolio-wrap">
                            <img src="https://shanguinfotech.com/public/assets/admin/images/product_module/20220325142253.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>WISDOM FINACC</h4>
                                <p>WISDOM FINACC</p>
                                <div class="portfolio-links">
                                    <a href="https://shanguinfotech.com/public/assets/admin/images/product_module/20220325142253.jpg"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox"
                                        title="WISDOM FINACC"><i class="bi bi-plus"></i></a>
                                    <a href="https://shanguinfotech.com/home/product/module/details?id=6"
                                        title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-4">
                        <div class="portfolio-wrap">
                            <img src="https://shanguinfotech.com/public/assets/admin/images/product_module/20220325142640.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>WISDOM HRPlanet</h4>
                                <p>WISDOM HRPlanet</p>
                                <div class="portfolio-links">
                                    <a href="https://shanguinfotech.com/public/assets/admin/images/product_module/20220325142640.jpg"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox"
                                        title="WISDOM HRPlanet"><i class="bi bi-plus"></i></a>
                                    <a href="https://shanguinfotech.com/home/product/module/details?id=8"
                                        title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-5">
                        <div class="portfolio-wrap">
                            <img src="https://shanguinfotech.com/public/assets/admin/images/product_module/20220325142827.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>WISDOM PROSOURCING</h4>
                                <p>WISDOM PROSOURCING</p>
                                <div class="portfolio-links">
                                    <a href="https://shanguinfotech.com/public/assets/admin/images/product_module/20220325142827.jpg"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox"
                                        title="WISDOM PROSOURCING"><i class="bi bi-plus"></i></a>
                                    <a href="https://shanguinfotech.com/home/product/module/details?id=9"
                                        title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div> --}}

            </div>

        </section> <!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>TESTIMONIALS</p>
                </header>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    We have seen many ERP software in the market and I think this is the best solution
                                    and a very user-friendly system for garments industries. We are using Wisdom ERP
                                    Solution for our garments industry. It works meticulously and additionally covers
                                    all aspects of our business process.

                                    Shangu Infotech has the capability to develop and solve difficult business processes
                                    for smooth business operations. I wish every success for Shangu Infotech.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="https://shanguinfotech.com/public/assets/admin/images/testimonial/20220314100534.jpg"
                                        class="testimonial-img" alt="">
                                    <h3>MS. ZAINAH AHMED (OISHI)</h3>
                                    <h4>Chief Executive, Interlink Dresses, Interlink Group</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    We have been using WISDOM ERP for the several years in our RMG units. It has
                                    increased the visibility of all our activities &amp; helped us to improve functions
                                    from order capturing to shipment thus increasing our efficiency. This is the best
                                    ERP System for Garments Industry. Best wishes for Shangu Infotech.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="https://shanguinfotech.com/public/assets/admin/images/testimonial/20230710064232.jpg"
                                        class="testimonial-img" alt="">
                                    <h3>MR. MEER SHAKHAWAT HOSSEN</h3>
                                    <h4>Chief Administrative Manager, Shangu Tex Ltd.</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section>
        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>OUR CLIENTS</p>
                </header>



                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide">
                            <a href="https://shanguinfotech.com/home/client/details?id=1">
                                <img src="https://shanguinfotech.com/public/assets/admin/images/client/20220324061905.jpg"
                                    class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="https://shanguinfotech.com/home/client/details?id=8">
                                <img src="https://shanguinfotech.com/public/assets/admin/images/client/20220324061954.jpg"
                                    class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="https://shanguinfotech.com/home/client/details?id=9">
                                <img src="https://shanguinfotech.com/public/assets/admin/images/client/20220324061926.jpg"
                                    class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="https://shanguinfotech.com/home/client/details?id=10">
                                <img src="https://shanguinfotech.com/public/assets/admin/images/client/20220524110627.png"
                                    class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </section> <!-- End Clients Section -->
        <!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>OUR TEAM</p>
                </header>

                <div class="row gy-4 text-center">
                    <div class="col-lg-1 col-md-6" style="margin-left: 45px;"></div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="https://shanguinfotech.com/public/assets/admin/images/team/20220324055959.jpg"
                                    class="img-fluid" alt="">
                                <div class="social">

                                </div>
                            </div>
                            <div class="member-info">
                                <h4>HASINA MANNAN</h4>
                                <span>CHAIRPERSON</span>
                                <p style="text-align: left;">Chairperson of the company</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="https://shanguinfotech.com/public/assets/admin/images/team/20220324060032.jpg"
                                    class="img-fluid" alt="">
                                <div class="social">

                                    <a href="https://www.linkedin.com/in/maheer-mannan" target="_blank"><i
                                            class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>MAHEER MANNAN</h4>
                                <span>MANAGING DIRECTOR &amp; CEO</span>
                                <p style="text-align: left;">Managing Director and Chief of Executive of the company
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="https://shanguinfotech.com/public/assets/admin/images/team/20220324062806.jpg"
                                    class="img-fluid" alt="">
                                <div class="social">

                                    <a href="https://www.linkedin.com/in/meer-shakhawat-hossen-89a89068"
                                        target="_blank"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>MEER SHAKHAWAT HOSSEN</h4>
                                <span>DIRECTOR</span>
                                <p style="text-align: left;">Director of the company</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section> <!-- End Team Section -->



        <!-- ======= Recent Blog Posts Section ======= -->

        <!-- End Recent Blog Posts Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>CONTACT US</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>Dusaid, Ashulia, Savar, Dhaka-1341</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    <p>09611-677517<br>01925304804 (WhatsApp)</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>shangu.infotech@gmail.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <iframe
                                    src=" https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.134448399781!2d90.30216251468023!3d23.884850684523208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c2737fa0d7a7%3A0x297d334209b25234!2sShangu%20Tex-2%20Limited!5e0!3m2!1sen!2sbd!4v1646738907060!5m2!1sen!2sbd"
                                    frameborder="0" style="border:0; width: 100%; height: 180px;"
                                    allowfullscreen></iframe>

                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="javascript:void(0)" method="post" class="php-email-form">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" id="message" placeholder="Message" required></textarea>
                                </div>


                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit" id="saveButton">SEND MESSAGE</button>
                            </div>

                    </div>
                    </form>

                </div>

            </div>

            </div>

        </section>

        <!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
