


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dive Master | Booking Management</title>
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
                @if(Auth::user()->role === 'Admin')
                    <li>
                        <a href="/bookings">
                            <span><img src="{{ asset('imgs/dm-bookings.png') }}" width="24" height="24" alt="" /></span>
                            Booking Requests
                        </a>
                    </li>
                @endif

                @if(Auth::user()->role === 'Instructor')
                    <li>
                        <a href="#">
                            <span><img src="{{ asset('imgs/dm-bookings.png') }}" width="24" height="24" alt="" /></span>
                            Dive Schedule
                        </a>
                    </li>
                @endif

                @if(in_array(Auth::user()->role, ['Admin', 'Instructor']))
                    <li>
                        <a href="#">
                            <span><img src="{{ asset('imgs/dm-office.png') }}" width="24" height="24" alt="" /></span>
                            Certifications
                        </a>
                    </li>
                @endif

                @if(in_array(Auth::user()->role, ['Admin', 'Instructor']))

                    <li>
                        <a href="#">
                            <span><img src="{{ asset('imgs/exam.svg') }}" width="24" height="24" alt="" /></span>
                            Assignments
                        </a>
                    </li>
                @endif
                @if(in_array(Auth::user()->role, ['Admin', 'Instructor']))
                    <li class="active">

                        <a href="/manage-dive-logs">
                            <span><img src="{{ asset('imgs/dive-logs.png') }}" width="24" height="24" alt="" /></span>
                            Dive Logs
                        </a>
                    </li>
                @endif
                @if(Auth::user()->role === 'Admin')
                    <li>
                        <a href="#">
                            <span><img src="{{ asset('imgs/dm-equipments.png') }}" width="24" height="24" alt="" /></span>
                            Equipments Management
                        </a>
                    </li>
                @endif
                @if(Auth::user()->role === 'Admin')
                    <li>
                        <a href="/admin/users">
                            <span><img src="{{ asset('imgs/users.png') }}" width="24" height="24" alt="" /></span>
                            Users
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('profile.edit') }}">
                        <span><img src="{{ asset('imgs/dm-cogwheel.png') }}" width="24" height="24" alt="" /></span>
                        Settings
                    </a>
                </li>
            </ul>
            <div class="trp-sidebar-bottom">
                <div class="trp-sidebar-bottom__info">
                    <!-- <img class="trp-sidebar-bottom__info__user" src="{{ asset('imgs/Avatar.svg') }}" alt="" />
               <div>
                  <h5>{{ auth()->user()->name }}</h5>
                  <h6>{{ auth()->user()->email }}</h6>
               </div> -->
                    <a href="{{ route('profile.edit') }}" style="text-decoration: none; color: inherit;">
                        <div style="display: flex; align-items: center;">
                        <img class="trp-sidebar-bottom__info__user" src="{{ asset(path: 'imgs/diver.png') }}" style="width: 40px;" width="40" alt="" />
                        <div style="margin-left: 10px;">
                                <h5>{{ auth()->user()->name }}</h5>
                                <h6>{{ auth()->user()->email }}</h6>
                            </div>
                        </div>
                    </a>
                    <a href="/logout">
                        <img class="trp-sidebar-bottom__info__user__logout" src="{{ asset('imgs/user-logout.svg') }}"
                            alt="" />
                    </a>
                </div>
            </div>
        </aside>

        <div class="trp-right-col trp-container" style="max-height: 100vh; overflow: auto;">
            <div class="trp-right-col-top">
                <div class="trp-col left" style="margin-bottom: 24px;">
                    <h2 class="trp-h2 trp-dashboard-title">Dive Logs</h2>
                </div>

                @if(session('success'))
                    <div class="success-message">{{ session('success') }}</div>
                @endif

                <!-- <h4 class="dashboard-table-heading" style="padding-bottom: 12px;">Manage Bookings</h4> -->

                <div class="tab-pane fade show active" id="pills-b2c" role="tabpanel" aria-labelledby="pills-b2c-tab">
                    <div
                        class="trp-section trp-cus-mgmnt trp-search-form-bar d-flex align-items-center justify-content-between">
                        <form method="" action="">
                            <div class="trp-search-container">
                                <input type="text" class="trp-search" name="customer-search"
                                    placeholder="Search By Name, Mobile, Email, NIC Number" />
                            </div>
                        </form>
                        <div id="trp-cus-filter-by" class="trp-cus-filter-by">
                            <button
                                class="btn btn-primary trp-button trp-filter-date-btn light d-flex align-items-center justify-content-center"
                                type="button">Filter By Date</button>
                        </div>
                    </div>


                    <div class="trp-section trp-cus-mgmnt trp-table-container">
                        <table class="table trp-table" id="trDataTableBookings">
                            <thead>
                                <tr>
                                    <th>Diver's Name</th>
                                    <th>Diver's NIC</th>
                                   
                                    <th>Dive Date</th>
                                    <th style="text-align: center;">Depth</th>
                                    <th>Duration</th>
                                    <th style="text-align: center;">Visibility</th>
                                    <th style="text-align: center;">Weather</th>
                                    <th>Site Conditions</th>
                                    <th>Dive Type</th>
                                    <th>Air Consumption</th>
                                    <th>Special Notes</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($diveLogs as $log)
                                    <tr>
                                        <td>{{ $log->diver->name }}</td>
                                        <td>NIC</td>
                                        <td>Date</td>
                                        <td>{{ $log->depth }}m</td>
                                        <td>{{ $log->duration }} minutes</td>
                                        <td>{{ $log->visibility }}</td>
                                        <td style="text-align: center;">{{ $log->weather_conditions }}</td>
                                        <td>{{ $log->dive_site_conditions }}</td>
                                        <td>{{ $log->dive_type }}</td>
                                        <td>{{ $log->air_consumption }} PSI/bar</td>
                                        <td>{{ $log->notes }}</td>
                                        <td>
                                        <a href="{{ route('editDiveLog', ['id' => $log->id, 'diver_id' => $log->diver_id]) }}">
                                            <button type="submit" class="btn"><img src="{{ asset('imgs/edit-icon.svg') }}" alt="Update" /></button>
                                        </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <nav class="trp-table-pagination-container">
                            <ul class="pagination d-flex align-items-center justify-content-between m-0"
                                id="paginationBookings">
                                <div class="trp-prev-arrow">
                                    <li class="page-item"><a class="page-link trp-previous" href="#"
                                            id="trBookings_prev">Previous</a></li>
                                </div>
                                <div class="trp-page-numbers trBookings d-flex"></div>
                                <div class="trp-next-arrow">
                                    <li class="page-item"><a class="page-link trp-next" href="#"
                                            id="trBookings_next">Next</a></li>
                                </div>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Popup Modal for Accepted Bookings -->
                <div id="popupModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Additional Booking Details</h2>
                        <form action="#" method="POST" id="bookingDetailsForm">
                            @csrf
                            <input type="hidden" name="booking_id" id="modalBookingId">
                            <div>
                                <label for="names_of_buddies">Names of Buddies:</label>
                                <input type="text" name="names_of_buddies" required>
                            </div>
                            <div>
                                <label for="boat_number">Boat Number:</label>
                                <input type="text" name="boat_number">
                            </div>
                            <div>
                                <label for="required_equipment">Required Equipment:</label>
                                <input type="text" name="required_equipment">
                            </div>
                            <div>
                                <button type="submit">Save Details</button>
                                <button type="button" class="close-btn">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="trp-right-col-bottom">
                <p>© 2025, Dive Master. All Rights Reserved.</p>
            </div>
        </div>
    </div>

    <!-- scripts start -->
    <script>
        // Function to handle status change and show popup for Accepted bookings
        function checkStatus(bookingId, selectElement) {
            if (selectElement.value === 'Accepted') {
                // Show the popup when status is Accepted
                const modal = document.getElementById('popupModal');
                modal.style.display = "block";

                // Set the booking ID in the hidden field
                document.getElementById('modalBookingId').value = bookingId;

                // Update the form action with the correct booking ID
                const detailsForm = document.getElementById('bookingDetailsForm');
                detailsForm.action = `/bookings/${bookingId}/details`;
            }
        }

        // Close the modal when the user clicks the "x" or Cancel button
        document.querySelector('.close').onclick = function () {
            document.getElementById('popupModal').style.display = "none";
        }

        document.querySelector('.close-btn').onclick = function () {
            document.getElementById('popupModal').style.display = "none";
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function (event) {
            if (event.target == document.getElementById('popupModal')) {
                document.getElementById('popupModal').style.display = "none";
            }
        }

        // Initialize pagination for the bookings table
        document.addEventListener('DOMContentLoaded', function () {
            // Assuming the dashboard-table.js has pagination functions
            if (typeof initTablePagination === 'function') {
                initTablePagination('trDataTableBookings', 'trBookings');
            }
        });
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