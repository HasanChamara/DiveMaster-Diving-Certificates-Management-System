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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/imgs/DiveMaster-Fav.png">
    <style>
        .status-select {
            padding: 6px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
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
        @include('partials.sidebar') <!-- Sidebar content -->

        <div class="trp-right-col trp-container" style="max-height: 100vh; overflow: auto;">
            <div class="trp-right-col-top">
                <div class="trp-col left" style="margin-bottom: 24px;">
                    <h2 class="trp-h2 trp-dashboard-title">New Booking Requests</h2>
                </div>

                @if(session('success'))
                    <div class="success-message">{{ session('success') }}</div>
                @endif

                <div class="tab-pane fade show active" id="pills-b2c" role="tabpanel" aria-labelledby="pills-b2c-tab">
                    <div class="trp-section trp-cus-mgmnt trp-search-form-bar d-flex align-items-center justify-content-between">
                        <form method="GET" action="">
                            <div class="trp-search-container">
                                <input type="text" class="trp-search" name="customer-search"
                                    placeholder="Search By Name, Mobile, Email, NIC Number" />
                            </div>
                        </form>
                        <div id="trp-cus-filter-by" class="trp-cus-filter-by">
                            <button class="btn btn-primary trp-button trp-filter-date-btn light d-flex align-items-center justify-content-center" type="button">Filter By Date</button>
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
                                        <td style="text-align: center;"><a href="/booking/{{ $booking->id }}/dive-log/create" class="diver-detail-popup btn"><img src="{{ asset('imgs/edit-icon.svg') }}" alt="Update" /></a></td>
                                        <td>
                                            <form action="{{ route('bookings.update', $booking->id) }}" method="POST" class="booking-form">
                                                @csrf
                                                <select name="status" required class="status-select" onchange="this.form.submit()">
                                                    <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="Accepted" {{ $booking->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                                </select>
                                        </td>
                                        <td>
                                            <input type="text" name="instructor" value="{{ $booking->instructor }}" placeholder="Enter instructor name" class="status-select">
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a><br>
                                            {{ $booking->contact_number ?? '+94XXXXXXXX' }}
                                        </td>
                                        <td>
                                            <button type="submit" class="btn"><img src="{{ asset('imgs/edit-icon.svg') }}" alt="Update" /></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
