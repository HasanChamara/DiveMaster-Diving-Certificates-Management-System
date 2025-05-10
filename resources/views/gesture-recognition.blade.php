<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dive Master | Booking Management</title>
    @vite(['resources/css/dm-dashboard.css'])
    @vite(['resources/css/dm-tables.css'])
    @vite(['resources/css/dm-main.css'])
    @vite(['resources/css/gestire-recognition.css'])
    @vite(['resources/js/scripts/dm-dashboard-chart.js'])
    @vite(['resources/js/scripts/dashboard-table.js'])
    <!-- Swiper.js CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/imgs/DiveMaster-Fav.png">

</head>

<body>
    <div class="trp-main-wrapper dm-hand-gesture-recognition-container">

        <div class="trp-right-col trp-container" style="">
            <div class="trp-right-col-top">
                @if(session('success'))
                    <div class="success-message">{{ session('success') }}</div>
                @endif

                <div class="dm-gr-wrapper">
                    <div class="trp-col left" style="margin-bottom: 16px;">
                        <h2 class="trp-h2 trp-dashboard-title">Underwater Hand Signal Recognition</h2>
                    </div>
                    <div class="gr-inner">
                        <div class="verification-container">
                            <!-- Left Card - Face Scanning -->
                            <div class="face-scan-card pink-bg">
                                <div class="scan-container">
                                
                                    <div class="video-container">
                                        <img id="videoFeed" class="videoFeed" src="{{ asset('imgs/hand-gesture-recognition.webp') }}" style="object-fit: cover;  height: 100%; width: 100%; border-radius: 12px;">
                                    </div>
                                </div>
                            </div>
                            <!-- Right Card - Verification Details -->
                            <div class="face-scan-card white-bg">
                                <div class="right-card-content">
                                    <div class="header-dots">
                                    <img class="loader-gif" src="{{ asset('imgs/infinity.gif') }}" style="width:100px; height:100px;">
                                    </div>

                                    <h2 class="biometric-title">Current Prediction </h2>
                                    <p class="biometric-subtitle">Place your hand directly into the camera, and we'll
                                        scan
                                        it.
                                    </p>

                                    <div class="profile-section-2" style="margin-top:24px; ">
                                    <p class="biometric-subtitle" style="font-size:18px;">Signal : <span class="signal-name">OK</span></p>
                                    </div>

                                    <div class="profile-section" style="margin-top:16px; ">
                                    <p class="biometric-subtitle" style="font-size:18px;">Confidence : <span class="signal-name">99%</span></p>
                                    </div>


                                    <button class="continue-btn">Back to course</button>

                                    <div class="footer">
                                        <span>Contact support</span>
                                        <span>© 2025, Dive Master. All Rights Reserved.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>

        <!-- scripts start -->
        <script>



        </script>
        <script type="module" src="./dashboard.js"></script>
        <script type="module" src="./detailed_dashboard.js"></script>
        <script type="module" src="./trp-table-script.js"></script>
        <script type="module" src="./customer-management.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
        <!-- scripts end -->
</body>

</html>