<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dive Master | Booking Management</title>
    @vite(['resources/css/dm-dashboard.css'])
    @vite(['resources/css/dm-tables.css'])
    @vite(['resources/css/dm-main.css'])
  
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
            <li >
               <a href="/dashboard">
                  <span><img src="{{ asset('imgs/dm-dashboard.png') }}" width="24" height="24" alt="" /></span>
                  Dashboard
               </a>
            </li>
            @if(Auth::user()->role === 'Admin')
            <li class="active">
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
               <a href="/certificates" target="_blank">
                 <span><img src="{{ asset('imgs/dm-office.png') }}" width="24" height="24" alt="" /></span>
                 Certifications
               </a>
            </li>
         @endif

            @if(in_array(Auth::user()->role, ['Admin', 'Instructor']))

            <li>
               <a href="/assignments" target="_blank">
                 <span><img src="{{ asset('imgs/exam.svg') }}" width="24" height="24" alt="" /></span>
                 Assignments
               </a>
            </li>
         @endif
        
            @if(Auth::user()->role === 'Instructor')
            <li>
               <a href="/manage-dive-logs">
                 <span><img src="{{ asset('imgs/dive-logs.png') }}" width="24" height="24" alt="" /></span>
                 Dive Logs
               </a>
            </li>
         @endif
        @if(Auth::user()->role === 'Admin')
            <li>
               <a href="/inventories" target="_blank">
                 <span><img src="{{ asset('imgs/dm-equipments.png') }}" width="24" height="24" alt="" /></span>
                 Equipments Management
               </a>
            </li>
         @endif
         @if(Auth::user()->role === 'Research Diver')
            <li>
               <a href="/upload" target="_blank">
                 <span><img src="{{ asset('imgs/dm-equipments.png') }}" width="24" height="24" alt="" /></span>
                 Upload Marine Logs
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
                                    <!-- <th>Instructor's Status</th> -->
                                    <th>Contact</th>
                                    <!-- <th>Actions</th> -->
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
                                        <td style="text-align: center;"><a
                                                href="/booking/{{ $booking->id }}/dive-log/create" id="diver-detail-popup"
                                                class="diver-detail-popup btn"><img src="{{ asset('imgs/edit-icon.svg') }}"
                                                    alt="Update" /></a></td>
                                        <td>
                                            <select id="status-select-{{ $booking->id }}" name="status" required class="status-select"
                                                onchange="checkStatus({{ $booking->id }}, this)">
                                                <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Accepted" {{ $booking->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                            </select>
                                        </td>
                                        <td>
                                            <!-- <input type="text" id="instructor-status-{{ $booking->id }}" value="{{ $bookingDetail->instructor_status ?? 'Pending' }}" readonly> -->
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a><br>
                                            {{ $booking->contact_number ?? '+94XXXXXXXX' }}
                                        </td>
                                        <!-- <td>
                                            <button type="submit" class="btn"><img src="{{ asset('imgs/edit-icon.svg') }}"
                                                    alt="Update" /></button>
                                            </form>
                                        </td> -->
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
                        <!-- Form to save booking details -->
                        <form action="{{ route('bookings.details.save') }}" method="POST" id="bookingDetailsForm">
                            @csrf
                            <!-- Hidden field for booking_id -->
                            <input type="text" name="booking_id" id="modalBookingId">
                            <!-- Hidden field for status -->
                            <input type="hidden" name="status" value="Accepted">

                            <!-- Instructor Dropdown -->
                            <div>
                                <label for="instructor">Instructor:</label>
                                <select name="instructor" required>
                                    @foreach($instructors as $instructor)
                                        <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Number of Buddies -->
                            <div>
                                <label for="number_of_buddies">Number of Buddies:</label>
                                <input type="number" name="number_of_buddies" required min="1">
                            </div>

                            <!-- Boat Number -->
                            <div>
                                <label for="boat_number">Boat Number:</label>
                                <input type="text" name="boat_number" placeholder="Enter boat number">
                            </div>

                            <!-- Required Equipment -->
                            <div>
                                <label for="required_equipment">Required Equipment:</label>
                                <input type="text" name="required_equipment" placeholder="Enter required equipment">
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div>
                                <button type="submit">Save Details</button>
                                <button type="button" class="close-btn">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="trp-right-col-bottom">
                    <p>© 2025, Dive Master. All Rights Reserved.</p>
                </div>

    <!-- scripts start -->
    <script>
        // Function to handle status change and show popup
        function checkStatus(bookingId, selectElement) {
            if (selectElement.value === 'Accepted') {
                const modal = document.getElementById('popupModal');
                modal.style.display = "block";
                document.getElementById('modalBookingId').value = bookingId;
            }
        }

        // Enhanced form submission handler
        document.getElementById('bookingDetailsForm').addEventListener('submit', async function (event) {
            event.preventDefault();

            const form = event.target;
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.textContent;

            submitBtn.disabled = true;
            submitBtn.textContent = 'Saving...';

            try {
                const formData = new FormData(form);
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Server returned an error');
                }

                if (data.success) {
                    alert('Booking details saved successfully!');
                    document.getElementById('popupModal').style.display = "none";

                    // Update the status select input to "Accepted"
                    const selectElement = document.getElementById(`status-select-${formData.get('booking_id')}`);
                    if (selectElement) {
                        selectElement.value = 'Accepted';
                    }

                    window.location.reload(); // Reload page to reflect changes
                } else {
                    throw new Error(data.message || 'Failed to save booking details');
                }
            } catch (error) {
                console.error('Submission error:', error);
                alert('Error: ' + error.message);
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = originalBtnText;
            }
        });

        // Modal close handlers
        document.querySelector('.close').onclick = 
        document.querySelector('.close-btn').onclick = 
        function() {
            document.getElementById('popupModal').style.display = "none";
        };
        
        window.onclick = function(event) {
            if (event.target == document.getElementById('popupModal')) {
                document.getElementById('popupModal').style.display = "none";
            }
        };

        // Initialize pagination
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof initTablePagination === 'function') {
                initTablePagination('trDataTableBookings', 'trBookings');
            }
        });
    </script>
    <!-- scripts end -->

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