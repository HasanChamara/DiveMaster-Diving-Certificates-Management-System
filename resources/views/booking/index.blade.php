<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        button {
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }

        /* Popup Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
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
    </style>
</head>
<body>
    <h1>Manage Bookings</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Booking Date</th>
                <th>People</th>
                <th>Status</th>
                <th>Instructor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->first_name }} {{ $booking->last_name }}</td>
                    <td>{{ $booking->date }}</td>
                    <td>{{ $booking->people }}</td>
                    <td>
                        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                            @csrf
                            <select name="status" required onchange="checkStatus({{ $booking->id }}, this)">
                                <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Accepted" {{ $booking->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                            </select>
                    </td>
                    <td>
                        <input type="text" name="instructor" value="{{ $booking->instructor }}" placeholder="Enter instructor name">
                    </td>
                    <td>
                        <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Popup Modal -->
    <div id="popupModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Update Booking</h2>
            <form action="{{ route('bookings.saveDetails', $booking->id) }}" method="POST">
                @csrf
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
                    <button type="submit">Update</button>
                    <button type="button" class="close">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function checkStatus(bookingId, selectElement) {
            if (selectElement.value === 'Accepted') {
                // Show the popup when status is Accepted
                document.getElementById('popupModal').style.display = "block";
            }
        }

        // Close the modal when the user clicks the "x"
        document.querySelector('.close').onclick = function() {
            document.getElementById('popupModal').style.display = "none";
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            if (event.target == document.getElementById('popupModal')) {
                document.getElementById('popupModal').style.display = "none";
            }
        }
    </script>
</body>
</html>
