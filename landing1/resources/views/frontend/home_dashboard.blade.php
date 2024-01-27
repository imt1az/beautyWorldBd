<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>WORLD BRAND BD</title>
    <meta content="This is shangu info tech" name="description">
    <meta name="csrf-token" content="Vc0Itt2kagVDmPt9hPPO5g69eyvoddrjhOjrs3hB" />
    <meta content="shangu,info,shangutex,shanguinfo" name="keywords">

    <!-- Favicons -->
    <link href="https://shanguinfotech.com/public/assets/web/img/favicon.png" rel="icon">
    <link href="https://shanguinfotech.com/public/assets/web/img/apple-icon-57x57.png" rel="apple-touch-icon">

    <!-- Google Fonts -->


    <!-- Vendor CSS Files -->
  
    <link href=" {{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href=" {{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
        rel="stylesheet">
    <link href=" {{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="https://shanguinfotech.com/public/assets/web/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href=" {{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet" property="stylesheet"
        type="text/css" media="all">

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;1,200&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googl eapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

    <!-- Template Main CSS File -->
  
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">

    <link rel="canonical" href="https://shangutexbd.com/">
    <link rel="shortlink" href="https://shangutexbd.com/">

    <style>
        @media (max-width: 600px) {
            .header .logo span {
                font-size: clamp(16px, 6vw, 18px);
            }

            .footer .footer-top .footer-info .logo span {
                font-size: clamp(16px, 6vw, 18px);
            }

            .videoButton {
                margin-top: 10px;
            }
        }


        .header .logo img {
            max-height: 28px;
        }
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <style>
        #topbar {
            background: #015754;
            font-size: 15px;
            height: 40px;
            padding: 0;
            color: rgba(255, 255, 255, 0.6);
        }

        .header {
            margin-top: 40px;
            background: #f2f5fc;
        }

        .header.header-scrolled {
            background: #f2f5fc !important;
            margin-top: 0px !important;
        }
    </style>
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope-fill"></i>&nbsp;worldbrand@gmail.com
                <i class="bi bi-phone-fill phone-icon"></i>&nbsp;09611-677517
            </div>
            <div class="social-links d-none d-md-block">

                <a href="https://www.twitter.com/ShanguInfotech" target="_blank" class="twitter"><i
                        class="bi bi-twitter"></i></a>
                <a href="https://www.facebook.com/ShanguInfotech" target="_blank" class="facebook"><i
                        class="bi bi-facebook"></i></a>
                <a href="https://www.youtube.com/channel/UCRIYU5tdVIy2MRRyzwij-lA" target="_blank" class="instagram"><i
                        class="bi bi-youtube"></i></a>
                <a href="https://www.linkedin.com/company/shangu-infotech" target="_blank" class="linkedin"><i
                        class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </section>



    @include('frontend.body.header')

    <!-- End Header -->

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
  

  @yield('home')

    <!-- ======= Footer ======= -->
   @include('frontend.body.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://shanguinfotech.com/public/assets/web/vendor/purecounter/purecounter.js"></script>
    <script src="{{ asset('frontend/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>


    <!-- Template Main JS File -->
  
    <script src="{{ asset('frontend/assets/js/main.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $('#saveButton').click(function() {
            let name = $('#name').val();
            let email = $('#email').val();
            let subject = $('#subject').val();
            let message = $('#message').val();



            // alert(message);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "https://shanguinfotech.com/home/form_submit",
                data: {
                    name: name,
                    email: email,
                    subject: subject,
                    message: message,
                },
                success: function(res) {
                    // console.log(res.status);
                    $('.php-email-form').trigger("reset");

                    if (res.status == 'success') {
                        $('.sent-message').show();
                        setTimeout(() => {
                            $('.sent-message').hide();
                        }, 3000);
                    } else {
                        $('.sent-message').hide();
                    }
                }
            });
        });



        // $( ".php-email-form" ).submit(function( event ) {
        //   alert( "Handler for .submit() called." );
        //   event.preventDefault();
        // });
    </script>

</body>

</html>
