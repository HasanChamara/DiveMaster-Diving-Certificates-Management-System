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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: none; /* Initially hidden */
        }

        /* Error message styles */
        .error-message {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: none; /* Initially hidden */
        }

        .error-list {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .error-list li {
            margin-bottom: 5px;
        }
    </style>
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
                        <button id="openBookFormPopup" class="dm-book-now-button button btn"> Book Now</button>
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
                    style="content: url('{{ asset('imgs/wave.png') }}'); position:relative; position: relative; display: block; width: 40px;"></span>
                Follow us on instagram</p>
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
                    <img src="{{ asset('imgs/social/facebook.png') }}" alt="Social Image" class="Social-image"
                        width="24">
                    <img src="{{ asset('imgs/social/instagram.png') }}" alt="Social Image" class="Social-image"
                        width="24">
                    <img src="{{ asset('imgs/social/youtube.png') }}" alt="Social Image" class="Social-image"
                        width="24">
                    <img src="{{ asset('imgs/social/tiktok.png') }}" alt="Social Image" class="Social-image" width="24">

                </div>
            </div>
        </div>
    </section>
<div class="booking-popup-overlay" id="BookingPopupOverlay">
    <div class="popup-content">
        <span class="close-booking-popup" id="closeBookingPopup">&times;</span>
        
        <!-- Success Message -->
        <div id="successMessage" class="success-message">
            Booking submitted successfully!
        </div>

        <!-- Error Message -->
        <div id="errorMessage" class="error-message">
            <ul id="errorList" class="error-list"></ul>
        </div>

        <h2 style="text-align:center;">Book Your Dive Session Now</h2>
        <form id="bookingForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="number">Contact Number:</label>
            <input type="tel" id="number" name="number" required>

            <label for="number">NIC/Passport Number:</label>
            <input type="text" id="nic" name="nic" required>

            <div class="form-row">
                <div class="form-group">
                    <label for="activity">Activity:</label>
                    <select id="activity" name="activity" required>
                        <option value="">-- Select Activity --</option>
                        <option value="Snorkeling">Snorkeling</option>
                        <option value="Scuba Diving">Scuba Diving</option>
                        <option value="Free Diving">Free Diving</option>
                        <option value="Dive Certification">Dive Certification</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <select id="location" name="location" required>
                        <option value="">-- Select Location --</option>
                        <option value="Hikkaduwa">Hikkaduwa</option>
                        <option value="Unawatuna">Unawatuna</option>
                        <option value="Trincomalee">Trincomalee</option>
                    </select>
                </div>
            </div>

            <label for="number_of_divers">Number of Divers (Including you):</label>
            <input type="number" id="headCount" name="number_of_divers" min="1" required>

            <!-- Dynamic section for divers' information in table format -->
            <table id="diversTable" style="display: none;">
                <thead>
                    <tr>
                        <th>Diver #</th>
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>Diving Status</th>
                    </tr>
                </thead>
                <tbody id="diversInfoContainer"></tbody>
            </table>

            <label for="message">Special Notes:</label>
            <textarea id="message" name="message" rows="4"></textarea>

            <div class="age-verification">
                <label>Are you 18+ years old?</label>
                <div style="display: flex; gap: 10px; align-items: center;">
                    <label style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                        <input type="radio" name="ageVerify" value="yes" required> Yes
                    </label>
                    <label style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                        <input type="radio" name="ageVerify" value="no"> No
                    </label>
                </div>
            </div>

            <button type="submit">Send Your Request</button>
        </form>
    </div>
</div>


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

        document.getElementById('openBookFormPopup').addEventListener('click', () => {
            document.getElementById('BookingPopupOverlay').style.display = 'flex';
        });

        document.getElementById('closeBookingPopup').addEventListener('click', () => {
            document.getElementById('BookingPopupOverlay').style.display = 'none';
        });
    </script>

    <script>
        // Function to generate the additional fields in a table format based on the number of divers
        document.getElementById("headCount").addEventListener("input", function() {
            const headCount = parseInt(this.value);
            const table = document.getElementById("diversTable");
            const container = document.getElementById("diversInfoContainer");

            // Show table when number is entered
            table.style.display = headCount > 0 ? "table" : "none";

            container.innerHTML = '';  // Clear existing fields

            if (headCount > 0) {
                for (let i = 1; i <= headCount; i++) {
                    const row = document.createElement("tr");

                    // Diver number
                    const diverCell = document.createElement("td");
                    diverCell.textContent = `Diver ${i}`;
                    row.appendChild(diverCell);

                    // Name input
                    const nameCell = document.createElement("td");
                    const nameInput = document.createElement("input");
                    nameInput.type = "text";
                    nameInput.name = `diver${i}_name`;
                    nameInput.required = true;
                    nameCell.appendChild(nameInput);
                    row.appendChild(nameCell);

                    // Birthday input
                    const dobCell = document.createElement("td");
                    const dobInput = document.createElement("input");
                    dobInput.type = "date";
                    dobInput.name = `diver${i}_birthday`;
                    dobInput.required = true;
                    dobCell.appendChild(dobInput);
                    row.appendChild(dobCell);

                    // Diving status input
                    const statusCell = document.createElement("td");
                    const statusSelect = document.createElement("select");
                    statusSelect.name = `diver${i}_status`;
                    statusSelect.required = true;
                    const options = ["-- Select Status --", "Beginner", "Intermediate", "Expert"];
                    options.forEach(option => {
                        const optionElement = document.createElement("option");
                        optionElement.value = option;
                        optionElement.textContent = option;
                        statusSelect.appendChild(optionElement);
                    });
                    statusCell.appendChild(statusSelect);
                    row.appendChild(statusCell);

                    container.appendChild(row);
                }
            }
        });

        // Handle form submission
        document.getElementById("bookingForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission
            
            const headCount = parseInt(document.getElementById("headCount").value);
            const divers = [];

            // Collect divers' data
            for (let i = 1; i <= headCount; i++) {
                const diver = {
                    name: document.querySelector(`input[name="diver${i}_name"]`).value,
                    birthday: document.querySelector(`input[name="diver${i}_birthday"]`).value,
                    diving_status: document.querySelector(`select[name="diver${i}_status"]`).value
                };
                divers.push(diver);
            }

            const bookingData = {
                name: document.getElementById("name").value,
                email: document.getElementById("email").value,
                contact_number: document.getElementById("number").value,
                nic: document.getElementById("nic").value,
                activity: document.getElementById("activity").value,
                date: document.getElementById("date").value,
                location: document.getElementById("location").value,
                number_of_divers: headCount,
                message: document.getElementById("message").value,
                age_verification: document.querySelector('input[name="ageVerify"]:checked').value,
                divers: divers
            };

            // Send data to the server via AJAX (fetch API)
            fetch('/submit-booking', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF Token
                },
                body: JSON.stringify(bookingData)
            })
            .then(response => response.json())
            .then(data => {
                // Show success message
                document.getElementById("successMessage").style.display = 'block';
                // Optionally, you can hide the form after success
                document.getElementById("bookingForm").reset();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error submitting your booking.');
            });
        });
    </script>

</body>

</html>