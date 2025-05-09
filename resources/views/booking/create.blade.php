<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="date"], textarea {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="radio"] {
            margin: 0 10px;
        }
        button {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }

        /* Modal Styles */
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
    <div class="container">
        <h1>Booking Form</h1>
        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <div>
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div>
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="contact_number">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" required>
            </div>
            <div>
                <label for="preferred_dive_activity">Preferred Dive Activity:</label>
                <input type="text" id="preferred_dive_activity" name="preferred_dive_activity" required>
            </div>
            <div>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div>
                <label for="special_notes">Special Notes:</label>
                <textarea id="special_notes" name="special_notes"></textarea>
            </div>
            <div>
                <label>Are you 18 years old or older?</label>
                <input type="radio" id="yes" name="is_adult" value="1" required> Yes
                <input type="radio" id="no" name="is_adult" value="0" required> No
            </div>
            <div>
                <button type="submit">Submit Booking Request</button>
            </div>
        </form>
    </div>

    <!-- Success Modal -->
    @if(session('success'))
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>{{ session('success') }}</h2>
            <p>Your booking request has been submitted successfully.</p>
        </div>
    </div>
    @endif

    <script>
        // Get the modal and close button
        var modal = document.getElementById('successModal');
        var closeBtn = document.getElementsByClassName('close')[0];

        // Show the modal if success message is present
        @if(session('success'))
        modal.style.display = "block";
        @endif

        // When the user clicks on the close button, close the modal
        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
