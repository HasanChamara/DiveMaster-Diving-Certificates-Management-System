<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        
        .login-title {
            color: #343a40;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .form-control {
            margin-bottom: 15px;
        }
        
        .btn-login {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        
        .register-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }
        
        .register-link:hover {
            color: #0d6efd;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="login-title">Login</h2>
        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-login">Login</button>
        </form>
        <a href="/register" class="register-link">Don't have an account? Register</a>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>