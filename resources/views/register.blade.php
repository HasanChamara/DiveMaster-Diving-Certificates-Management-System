<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Internal CSS */
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        
        .register-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }
        
        .register-title {
            color: #343a40;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 600;
        }
        
        .form-control {
            margin-bottom: 15px;
            padding: 12px;
        }
        
        .btn-register {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            font-weight: 500;
            background-color: #28a745;
            border: none;
        }
        
        .btn-register:hover {
            background-color: #218838;
        }
        
        .login-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }
        
        .login-link:hover {
            color: #28a745;
            text-decoration: none;
        }
        
        .password-match {
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 15px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="register-title">Create Account</h2>
        <form method="POST" action="/register">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                <div class="password-match">Make sure it matches the password above</div>
            </div>
            <button type="submit" class="btn btn-register">Sign Up</button>
        </form>
        <a href="/login" class="login-link">Already have an account? Login</a>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional: Password match validation script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const password = document.querySelector('input[name="password"]');
            const confirmPassword = document.querySelector('input[name="password_confirmation"]');
            const passwordMatch = document.querySelector('.password-match');
            
            function checkPasswordMatch() {
                if (password.value && confirmPassword.value) {
                    if (password.value === confirmPassword.value) {
                        passwordMatch.style.color = '#28a745';
                        passwordMatch.textContent = '✓ Passwords match';
                    } else {
                        passwordMatch.style.color = '#dc3545';
                        passwordMatch.textContent = '✗ Passwords do not match';
                    }
                } else {
                    passwordMatch.style.color = '#6c757d';
                    passwordMatch.textContent = 'Make sure it matches the password above';
                }
            }
            
            password.addEventListener('input', checkPasswordMatch);
            confirmPassword.addEventListener('input', checkPasswordMatch);
        });
    </script>
</body>
</html>