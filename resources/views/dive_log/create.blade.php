<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dive Master | Log Dive Details</title>
    @vite(['resources/css/dm-dashboard.css'])
    @vite(['resources/css/dm-tables.css'])
    @vite(['resources/css/dm-main.css'])
    @vite(['resources/js/scripts/dm-dashboard-chart.js'])
    @vite(['resources/js/scripts/dashboard-table.js'])
    <!-- Swiper.js CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/imgs/DiveMaster-Fav.png">
    <style>
        /* Additional styles for dive log form */
        .dive-log-form {
            background-color: white;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 24px;
        }

        .dive-log-form h3 {
            color: #0c5460;
            margin-bottom: 24px;
            font-weight: 600;
        }

        .form-section {
            margin-bottom: 30px;
        }
        

        .form-section h4 {
            color: #0c5460;
            font-size: 18px;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e0e0e0;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 24px -15px;
        }

        .form-group {
            flex: 0 0 50%;
            max-width: 50%;
            padding-right: 15px;
            padding-left: 15px;
            margin-bottom: 15px;
        }

        @media (max-width: 992px) {
            .form-group {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media (max-width: 768px) {
            .form-group {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #495057;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        select.form-control {
            height: 42px;
        }

        .diver-section {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .submit-btn {
            box-shadow: 0px 1px 2px 0px #1018280d;
            background: #101828;
            color: var(--white-color);
            border-radius: 8px;
            padding-top: 12px;
            padding-right: 24px;
            padding-bottom: 12px;
            padding-left: 24px;
            margin-right: 15px;
            border: none;
            gap: 8px;
        }

        .submit-btn:hover {
            background-color: #0a4650;
        }

        hr.divider {
            margin: 30px 0;
            border-top: 1px solid #e0e0e0;
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }
    </style>
</head>

<body>
    <div class="trp-mx-w trp-main-wrapper">
        <aside class="trp-left-col trp-sidebar">
            <img class="mb-4" src="{{ asset('imgs/dive-master-logo-white.png') }}" width="120" alt="" />
            <ul class="trp-sidebar-links">
                <li>
                    <a href="/dashboard">
                        <span><img src="{{ asset('imgs/dm-dashboard.png') }}" width="24" height="24" alt="" /></span>
                        Dashboard
                    </a>
                </li>
                <li class="active">
                    <a href="/bookings">
                        <span><img src="{{ asset('imgs/dm-bookings.png') }}" width="24" height="24" alt="" /></span>
                        Booking Requests
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span><img src="{{ asset('imgs/dm-office.png') }}" width="24" height="24" alt="" /></span>
                        Certification Authorities
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span><img src="{{ asset('imgs/dm-equipments.png') }}" width="24" height="24" alt="" /></span>
                        Equipments Management
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span><img src="{{ asset('imgs/dm-cogwheel.png') }}" width="24" height="24" alt="" /></span>
                        Settings
                    </a>
                </li>
            </ul>

            <div class="trp-sidebar-bottom">
                <div class="trp-sidebar-bottom__info">
                    <img class="trp-sidebar-bottom__info__user" src="{{ asset('imgs/Avatar.svg') }}" alt="" />
                    <div>
                        <h5>Dulanjaya</h5>
                        <h6>dulanjaya@divemaster.com</h6>
                    </div>
                    <img class="trp-sidebar-bottom__info__user__logout" src="{{ asset('imgs/user-logout.svg') }}"
                        alt="" />
                </div>
            </div>
        </aside>

        <div class="trp-right-col trp-container" style="max-height: 100vh; overflow: auto;">
            <div class="trp-right-col-top">
                <div class="trp-col left" style="margin-bottom: 24px;">
                    <h2 class="trp-h2 trp-dashboard-title">Log Dive Details</h2>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="dive-log-form">
                    <form method="POST" action="{{ route('diveLog.store') }}" class="needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="booking_id" value="{{ $booking_id }}" />

                        <!-- Common Details Section -->
                        <div class="form-section">
                            <h4>Environmental Conditions</h4>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="visibility">Visibility:</label>
                                    <select id="visibility" name="visibility" class="form-control">
                                        <option value="Good" {{ old('visibility') == 'Good' ? 'selected' : '' }}>Good</option>
                                        <option value="Fair" {{ old('visibility') == 'Fair' ? 'selected' : '' }}>Fair</option>
                                        <option value="Poor" {{ old('visibility') == 'Poor' ? 'selected' : '' }}>Poor</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="weather_conditions">Weather Conditions:</label>
                                    <select id="weather_conditions" name="weather_conditions" class="form-control">
                                        <option value="Sunny" {{ old('weather_conditions') == 'Sunny' ? 'selected' : '' }}>Sunny</option>
                                        <option value="Cloudy" {{ old('weather_conditions') == 'Cloudy' ? 'selected' : '' }}>Cloudy</option>
                                        <option value="Rainy" {{ old('weather_conditions') == 'Rainy' ? 'selected' : '' }}>Rainy</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="dive_site_conditions">Dive Site Conditions:</label>
                                    <select id="dive_site_conditions" name="dive_site_conditions" class="form-control">
                                        <option value="Calm" {{ old('dive_site_conditions') == 'Calm' ? 'selected' : '' }}>Calm</option>
                                        <option value="Moderate" {{ old('dive_site_conditions') == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                                        <option value="Rough" {{ old('dive_site_conditions') == 'Rough' ? 'selected' : '' }}>Rough</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr class="divider">

                        <!-- Diver-specific Details -->
                        @foreach($divers as $index => $diver)
                            <div class="diver-section">
                                <h4>Diver {{ $index + 1 }}: {{ $diver->name }}</h4>
                                <input type="hidden" name="divers[{{ $index }}][diver_id]" value="{{ $diver->id }}" />

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="depth_{{ $diver->id }}">Depth (m):</label>
                                        <input type="number" id="depth_{{ $diver->id }}" name="divers[{{ $index }}][depth]"
                                            value="{{ old('divers.' . $index . '.depth') }}" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="duration_{{ $diver->id }}">Duration (minutes):</label>
                                        <input type="number" id="duration_{{ $diver->id }}"
                                            name="divers[{{ $index }}][duration]"
                                            value="{{ old('divers.' . $index . '.duration') }}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="dive_type_{{ $diver->id }}">Dive Type:</label>
                                        <select id="dive_type_{{ $diver->id }}" name="divers[{{ $index }}][dive_type]"
                                            class="form-control" required>
                                            <option value="Recreational" {{ old('divers.' . $index . '.dive_type') == 'Recreational' ? 'selected' : '' }}>
                                                Recreational
                                            </option>
                                            <option value="Deep Dive" {{ old('divers.' . $index . '.dive_type') == 'Deep Dive' ? 'selected' : '' }}>
                                                Deep Dive
                                            </option>
                                            <option value="Wreck Dive" {{ old('divers.' . $index . '.dive_type') == 'Wreck Dive' ? 'selected' : '' }}>
                                                Wreck Dive
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="air_consumption_{{ $diver->id }}">Air Consumption (PSI/bar):</label>
                                        <input type="number" id="air_consumption_{{ $diver->id }}"
                                            name="divers[{{ $index }}][air_consumption]"
                                            value="{{ old('divers.' . $index . '.air_consumption') }}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="flex: 0 0 100%; max-width: 100%;">
                                        <label for="notes_{{ $diver->id }}">Additional Notes:</label>
                                        <textarea id="notes_{{ $diver->id }}" name="divers[{{ $index }}][notes]"
                                            class="form-control">{{ old('divers.' . $index . '.notes') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="form-row" style="justify-content: flex-end; margin-top: 20px;">
                            <button type="submit" class="submit-btn">Submit Dive Logs</button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="trp-right-col-bottom">
                <p>© 2025, Dive Master. All Rights Reserved.</p>
            </div>
        </div>
    </div>

    <!-- scripts start -->
    <script>
        // Form validation
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
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
