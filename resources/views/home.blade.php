<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dive Master </title>
    @vite(['resources/css/dm-home.css'])
    <!-- Swiper.js CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/imgs/DiveMaster-Fav.png">

</head>

<body>
    <section>
        <div class="container">
            <div class="dm-header">
                <div class="dm-col dm-left-col">
                    <div class="dm-logo-container">
                        <img src="{{ asset('imgs/dive-master-logo.png') }}" alt="Dive Master Logo" class="dm-logo">
                    </div>
                    <div class="dm-menu-container">
                        <nav class="dm-menu navbar navbar-expand-lg navbar-light bg-light">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link active" href="#">Home</a>
                                <a class="nav-item nav-link" href="#">About Us</a>
                                <a class="nav-item nav-link" href="#">Courses</a>
                                <a class="nav-item nav-link" href="#">Services</a>
                                <a class="nav-item nav-link" href="#">Authorities</a>
                                <a class="nav-item nav-link" href="#">Shop</a>
                                <a class="nav-item nav-link" href="#">Contact</a>

                            </div>
                        </nav>
                    </div>
                </div>
                <div class="dm-col dm-right-col">
                    <div class="dm-header-btn">
                        <button class="dm-book-now-button button btn"> Book Now</button>
                    </div>
                    <div class="dm-register-now-btn dm-header-btn">
                        <button class="dm-register-now-button button btn"> <img src="{{ asset('imgs/diver-icon.png') }}"
                                alt="Diver Icon" class="dm-diver-icon"> Sign In </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dm-hero-section">
        <div class="container">
            <div class="swiper-container dm-home-hero-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('imgs/swiper-slide-1.jpg') }}" alt="Slide 1">
                        <div class="dm-hero-content">
                            <h1>Explore the Depths</h1>
                            <p>Discover the beauty of the underwater world with expert divers.</p>
                            <a href="#" class="dm-btn">Get Started</a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('imgs/swiper-slide-2.jpg') }}" alt="Slide 2">
                        <div class="dm-hero-content">
                            <h1>Master Your Diving Skills</h1>
                            <p>Join our advanced diving courses and become a certified diver.</p>
                            <a href="#" class="dm-btn">Learn More</a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('imgs/swiper-slide-3.jpg') }}" alt="Slide 3">
                        <div class="dm-hero-content">
                            <h1>Unforgettable Adventures Await</h1>
                            <p>Experience thrilling underwater adventures at stunning dive sites.</p>
                            <a href="#" class="dm-btn">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="dm-card-container">
            <div class="card card-1">
                <div class="icon-box">
                    <img src="{{ asset('imgs/snorkeling.png') }}" alt="Diver Icon" width="60" class="dm-diver-icon">
                    <h3>Snorkeling & Scuba Diving</h3>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ducimus atque dignissimos, impedit
                    nulla quos! Excepturi, voluptates veniam hic laudantium quasi aliquam ipsa. Doloribus minus tempora
                    earum, alias reprehenderit quos?</p>
                <a href="#">View More<span class="turtle-img"
                        style="content: url('{{ asset('imgs/sea-turtle-white.png') }}'); position:relative; position: relative; display: block; width: 24px;"></span></a>
            </div>
            <div class="card card-2">
                <div class="icon-box">
                    <img src="{{ asset('imgs/fints.png') }}" alt="Diver Icon" width="60" class="dm-diver-icon">
                    <h3>Rental Equipment </h3>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ducimus atque dignissimos, impedit
                    nulla quos! Excepturi, voluptates veniam hic laudantium quasi aliquam ipsa. Doloribus minus tempora
                    earum, alias reprehenderit quos?</p>
                <a href="#">View More<span class="turtle-img"
                        style="content: url('{{ asset('imgs/sea-turtle-white.png') }}'); position:relative; position: relative; display: block; width: 24px;"></span></a>
            </div>
            <div class="card card-3">
                <div class="icon-box">
                    <img src="{{ asset('imgs/dive-certificate.png') }}" alt="Diver Icon" width="60"
                        class="dm-diver-icon">
                    <h3>Certification Courses</h3>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ducimus atque dignissimos, impedit
                    nulla quos! Excepturi, voluptates veniam hic laudantium quasi aliquam ipsa. Doloribus minus tempora
                    earum, alias reprehenderit quos?</p>
                <a href="#">View More<span class="turtle-img"
                        style="content: url('{{ asset('imgs/sea-turtle-white.png') }}'); position:relative; position: relative; display: block; width: 24px;"></span></a>
            </div>
        </div>
    </section>



    <section style="background:#f2f2f4;  padding: 60px 0px;">
        <div class="dm-container dm-home-abt-us">
            <div class="dm-col left-col">
                <img src="{{ asset('imgs/dive-abt-us.jpg') }}" alt="Slide 3">
            </div>
            <div class="dm-col right-col">
                <h2>Waiting for adventures? Don't miss them! </h2>
                <span class="wave-img"
                    style="content: url('{{ asset('imgs/wave.png') }}'); position:relative; position: relative; display: block; width: 40px;"></span>

                <p>If diving has always been your dream, then you are in the right place! We will help your dreams come
                    true by opening the wonderful underwater world!</p>
                <button class="dm-regular-btn">
                    Read More
                </button>
            </div>

        </div>
    </section>

    <section class="dm-home-video-section">
        <!-- Background video -->
        <video class="video-background" autoplay loop muted playsinline>
            <source src="{{ asset('imgs/dive-video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Overlay to darken/color the video -->
        <div class="overlay"></div>
        <div class="video-section-content">
            <div class="content">
                <h2>Let us make your diving experience unforgettable</h2>
                <p>Our equipment consists of the highest-quality diving sets with BCD's and sophisticated computers!</p>
                <button class="dm-regular-btn">Equipment Rental</button>
            </div>
        </div>
    </section>
    <section style="background:#f2f2f4;  padding: 60px 0px;">

        <div class="dm-container dm-home-authorities">
            <div class="dm-col left-col">
                <img src="{{ asset('imgs/trusted-authorities/padi.png') }}" alt="padi">
            </div>
            <div class="dm-col left-col">
                <img src="{{ asset('imgs/trusted-authorities/dive-guru.png') }}" alt="padi">
            </div>
            <div class="dm-col left-col">
                <img src="{{ asset('imgs/trusted-authorities/ssi.svg.png') }}" alt="padi">
            </div>
            <div class="dm-col left-col">
                <img src="{{ asset('imgs/trusted-authorities/ecd.png') }}" alt="padi">
            </div>

        </div>
    </section>


    <section style="background:##fffff;">
        <div class="dm-2-col-container">
            <div class="col left-col">
                <h2>Waiting for adventures? Don't miss them! </h2>
                <span class="wave-img"
                    style="content: url('{{ asset('imgs/wave.png') }}'); position:relative; position: relative; display: block; width: 40px;"></span>

                <p>If diving has always been your dream, then you are in the right place! We will help your dreams come
                    true by opening the wonderful underwater world!</p>
                <button class="dm-regular-btn">
                    Read More
                </button>
            </div>
            <div class="col right-col">
                <img src="{{ asset('imgs/fish.jpg') }}" alt="Fish" class="dm-diver-icon">
            </div>
        </div>
    </section>
    <section style="background:##fffff;">
        <div class="dm-2-col-container">
            <div class="col right-col">
                <img src="{{ asset('imgs/dive-crew.jpg') }}" alt="Fish" class="dm-diver-icon">
            </div>
            <div class="col left-col ">
                <h2>The way the world learns to dive.</h2>
                <span class="wave-img"
                    style="content: url('{{ asset('imgs/wave.png') }}'); position:relative; position: relative; display: block; width: 40px;"></span>
                <p>We want all our tourists to experience the thrill of riding and diving on crystal clear waters,
                    discover the beautiful underwater world at the top sites or simply unwind with a glass of champagne
                    on a luxury boat.</p>
                <button class="dm-regular-btn">
                    Contact Us
                </button>
            </div>
        </div>
    </section>

    <section>
        <div class="dm-container dm-prodcut-container">
            <div class="shop-title col left-col ">
                <h2>Shop</h2>
                <span class="wave-img"
                    style="content: url('{{ asset('imgs/wave.png') }}'); position:relative; position: relative; display: block; width: 40px;"></span>
                <p>We want all our tourists to experience the thrill of riding and diving on crystal clear waters,
                    discover the beautiful underwater world at the top sites or simply unwind with a glass of champagne
                    on a luxury boat.</p>
            </div>

            <div class="product-list">
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('imgs/products/googles.jpg') }}" alt="Fish" class="dm-product-image">
                    </div>
                    <div class="product-price">
                        43.99$
                    </div>
                    <div class="product-rescription">
                        <h3 class="product-title">Snorkeling Scuba Diving Mask</h3>
                        <button class="dm-regular-btn">Buy Now</button>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('imgs/products/fints.jpg') }}" alt="Fish" class="dm-product-image">
                    </div>
                    <div class="product-price">
                        45.99$
                    </div>
                    <div class="product-rescription">
                        <h3 class="product-title">Dive Rite Scuba RTS Fins</h3>
                        <button class="dm-regular-btn">Buy Now</button>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('imgs/products/snokling-mask.jpg') }}" alt="Fish" class="dm-product-image">
                    </div>
                    <div class="product-price">
                        49.99$
                    </div>
                    <div class="product-rescription">
                        <h3 class="product-title">Scubapro Solo Dive Mask</h3>
                        <button class="dm-regular-btn">Buy Now</button>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('imgs/products/watch.jpg') }}" alt="Fish" class="dm-product-image">
                    </div>
                    <div class="product-price">
                        270.99$
                    </div>
                    <div class="product-rescription">
                        <h3 class="product-title">Wrist Dive Computer Watch</h3>
                        <button class="dm-regular-btn">Buy Now</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section style="background:#191d32;">
        <div class="dm-insta-head">
            <h2> Instagram</h2>
            <p> <span class="wave-img"
            style="content: url('{{ asset('imgs/wave.png') }}'); position:relative; position: relative; display: block; width: 40px;"></span> Follow us on instagram</p>
        </div>
    </section>
    <section>
        <div class="dm-instagram-container">
            <div class="image-container">
                <img src="{{ asset('imgs/insta/insta-1.jpg') }}" alt="Insta Image" class="insta-image">
                <img src="{{ asset('imgs/insta/insta-2.jpg') }}" alt="Insta Image" class="insta-image">
                <img src="{{ asset('imgs/insta/insta-3.jpg') }}" alt="Insta Image" class="insta-image">
                <img src="{{ asset('imgs/insta/insta-4.jpg') }}" alt="Insta Image" class="insta-image">
                <img src="{{ asset('imgs/insta/insta-5.jpg') }}" alt="Insta Image" class="insta-image">
                <img src="{{ asset('imgs/insta/insta-6.jpg') }}" alt="Insta Image" class="insta-image">
             
            </div>
        </div>
    </section>
    <section style="background:#191d32;">
        <div class="dm-footer">
            <div class="dm-col">
                <p class="dm-copyright">DiveMaster © 2025. All Rights Reserved.</p>
            </div>
            <div class="dm-col">
                <div class="dm-social-icons">
                <img src="{{ asset('imgs/social/facebook.png') }}" alt="Social Image" class="Social-image" width="24">
                <img src="{{ asset('imgs/social/instagram.png') }}" alt="Social Image" class="Social-image" width="24">
                <img src="{{ asset('imgs/social/youtube.png') }}" alt="Social Image" class="Social-image" width="24">
                <img src="{{ asset('imgs/social/tiktok.png') }}" alt="Social Image" class="Social-image" width="24">
         
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var swiper = new Swiper(".dm-home-hero-slider", {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                speed: 3000,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                allowTouchMove: false,
                freeMode: true,
                freeModeMomentum: false,
            });

            var swiper = new Swiper('.dm-home-testi-slider', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
            });
        });
    </script>

</body>

</html>