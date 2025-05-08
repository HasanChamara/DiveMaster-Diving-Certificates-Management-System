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
    <style>
        /* Additional styles for booking management */
        .status-select {
            padding: 6px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        /* Popup Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 24px;
            border-radius: 8px;
            width: 50%;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-content form div {
            margin-bottom: 16px;
        }

        .modal-content label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
        }

        .modal-content input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .modal-content button {
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .modal-content button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
        }

        .modal-content button.close-btn {
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            margin-left: 10px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 16px;
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
                    <h2 class="trp-h2 trp-dashboard-title">New Booking Requests</h2>
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
                                    <th>Customer Name</th>
                                    <th style="text-align: center;">NIC</th>
                                    <th>Booking Date</th>
                                    <th>Activity</th>
                                    <th style="text-align: center;">Location</th>
                                    <th style="text-align: center;" colspan="2">People</th>
                                    <th>Status</th>
                                    <th>Instructor</th>
                                    <th>Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->nic }}</td>
                                        <td>{{ $booking->date }}</td>
                                        <td>{{ $booking->activity ?? 'Scuba Dive' }}</td>
                                        <td>{{ $booking->location ?? 'Hikkaduwa' }}</td>
                                        <td style="text-align: center;">{{ $booking->number_of_divers }}</td>
                                        <td style="text-align: center;"><a href="/booking/{{ $booking->id }}/dive-log/create" id="diver-detail-popup" class="diver-detail-popup btn"><img src="{{ asset('imgs/edit-icon.svg') }}"
                                        alt="Update" /></a></td>
                                        <td>
                                            <form action="{{ route('bookings.update', $booking->id) }}" method="POST"
                                                class="booking-form" data-booking-id="{{ $booking->id }}">
                                                @csrf
                                                <select name="status" required class="status-select"
                                                    onchange="checkStatus({{ $booking->id }}, this)">
                                                    <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="Accepted" {{ $booking->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                                </select>
                                        </td>
                                        <td>
                                            <input type="text" name="instructor" value="{{ $booking->instructor }}"
                                                placeholder="Enter instructor name" class="status-select">
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a><br>
                                            {{ $booking->phone ?? '+94XXXXXXXX' }}
                                        </td>
                                        <td>
                                            <button type="submit" class="btn"><img src="{{ asset('imgs/edit-icon.svg') }}"
                                                    alt="Update" /></button>
                                            </form>
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