<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        .container {
            padding: 20px;
        }
        .page-title {
            margin-bottom: 30px;
            color: #343a40;
            font-weight: 600;
        }
        .table-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 30px;
        }
        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        .action-buttons {
            white-space: nowrap;
        }
        .btn-update {
            margin-right: 5px;
        }
        .form-inline {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="page-title">User Management</h2>

        <!-- Flash Messages -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Current Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form class="form-inline" action="{{ route('admin.updateRole', $user->id) }}" method="POST">
                                    @csrf
                                    <select name="role" class="form-select form-select-sm">
                                        @foreach($roles as $role)
                                            <option value="{{ $role }}" {{ $user->role === $role ? 'selected' : '' }}>{{ $role }}</option>
                                        @endforeach
                                    </select>
                            </td>
                            <td class="action-buttons">
                                    <button type="submit" class="btn btn-sm btn-primary btn-update">Update</button>
                                </form>
                                <form class="form-inline" action="{{ route('admin.deleteUser', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</body>
</html>