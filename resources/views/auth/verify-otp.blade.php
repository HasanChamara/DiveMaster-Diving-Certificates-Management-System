<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
</head>
<body>
<form action="{{ route('password.verifyOtp') }}" method="POST">
    @csrf
    <input type="text" name="otp" placeholder="Enter the OTP">
    <button type="submit">Verify OTP</button>
</form>

</body>
</html>