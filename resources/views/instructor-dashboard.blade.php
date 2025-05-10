


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
                    <li>

                        <a href="/manage-dive-logs">
                            <span><img src="{{ asset('imgs/dive-logs.png') }}" width="24" height="24" alt="" /></span>
                            Dive Logs
                        </a>
                    </li>
                @endif
                @if(in_array(Auth::user()->role, ['Instructor']))
                    <li class="active">
                        <a href="/instructor-bookings">
                            <span><img src="{{ asset('imgs/dive-logs.png') }}" width="24" height="24" alt="" /></span>
                            Assigned Bookings
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
                                    <th>Name</th>                                   
                                    <th>NIC</th>
                                    <th style="text-align: center;">Email</th>
                                    <th>Contact Number</th>
                                    <th style="text-align: center;">Activity</th>
                                    <th style="text-align: center;">Date</th>
                                    <th>Location</th>
                                    <th>No of Participants</th>
                                    <th>No of Buddies</th>
                                    <th>Boat Number</th>
                                    <th>Required Equipment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->nic }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->contact_number }}</td>
                                        <td>{{ $booking->activity }}</td>
                                        <td style="text-align: center;">{{ $booking->date }}</td>
                                        <td>{{ $booking->location }}</td>
                                        <td>{{ $booking->number_of_divers }}</td>
                                        <td>{{ $booking->number_of_buddies }}</td>
                                        <td>{{ $booking->boat_number }}</td>
                                        <td>{{ $booking->required_equipment }}</td>

                                        <!-- Action Dropdown with Status -->
                                        <td>
                                            <select class="form-control status-dropdown" data-booking-id="{{ $booking->id }}">
                                                <option value="Pending" {{ $booking->instructor_status == 'Pending' ? 'selected' : '' }} style="background-color: yellow;">Pending</option>
                                                <option value="Accepted" {{ $booking->instructor_status == 'Accepted' ? 'selected' : '' }} style="background-color: green; color: white;">Accepted</option>
                                                <option value="Rejected" {{ $booking->instructor_status == 'Rejected' ? 'selected' : '' }} style="background-color: red; color: white;">Rejected</option>
                                            </select>
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>

            <div class="trp-right-col-bottom">
                <p>© 2025, Dive Master. All Rights Reserved.</p>
            </div>
        </div>
    </div>

    <!-- scripts start -->
    <script>

    $(document).ready(function() {
        // Detect when the dropdown value changes
        $('.status-dropdown').change(function() {
            var status = $(this).val(); // Get selected status
            var bookingId = $(this).data('booking-id'); // Get related booking ID

            // Send AJAX request to update the status
            $.ajax({
                url: '/update-booking-status', // Make sure the route is correct
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF Token
                    booking_id: bookingId,
                    instructor_status: status
                },
                success: function(response) {
                    if (response.success) {
                        // Optionally show a success message or do something after successful update
                        alert('Booking status updated successfully!');
                    } else {
                        alert('Error: Could not update status.');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors if any
                    console.error('Error updating status:', error);
                    alert('There was an error updating the status. Please try again.');
                }
            });
        });
    });



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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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