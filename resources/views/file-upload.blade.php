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
        <link href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/imgs/DiveMaster-Fav.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
        }
        .dz-success-mark,.dz-error-mark {
            display: none !important
        }

        .dz-button {
            border: none !important;
            background: transparent!important;
            text-align: center!important;
            display: flex!important;
            width: 100%!important;
            justify-content: center!important;
            padding: 32px!important;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        .dropzone {
            border: 2px dashed #4CAF50;
            padding: 20px;
            background: #f7f7f7;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        #submit-all {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        #uploaded-files {
            margin-top: 20px;
        }

        .file-item {
            background: #f0f0f0;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .alert-success {
            background: #dff0d8;
            color: #3c763d;
        }

        .alert-error {
            background: #f2dede;
            color: #a94442;
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
                    <li class="active">
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
                    <a href="{{ route('profile.edit') }}" style="text-decoration: none; color: inherit;">
                        <div style="display: flex; align-items: center;">
                            <img class="trp-sidebar-bottom__info__user" src="{{ asset(path: 'imgs/diver.png') }}"
                                style="width: 40px;" width="40" alt="" />
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
                    <h2 class="trp-h2 trp-dashboard-title">Upload Files</h2>
                </div>

                @if(session('success'))
                    <div class="success-message">{{ session('success') }}</div>
                @endif

                <!-- <h4 class="dashboard-table-heading" style="padding-bottom: 12px;">Manage Bookings</h4> -->

                <div class="tab-pane fade show active" id="pills-b2c" role="tabpanel" aria-labelledby="pills-b2c-tab">


                    <div style="padding: 32px;" class="trp-section trp-cus-mgmnt trp-table-container">
                        <div id="message-container"></div>

                        <form action="{{ route('upload.files') }}" class="dropzone" id="my-dropzone">
                            @csrf
                        </form>

                        <button id="submit-all" class="btn-upload">Upload Files</button>

                        <div class="uploaded-files" id="uploaded-files"></div>


                    </div>
                </div>


                <div class="trp-right-col-bottom">
                    <p>© 2025, Dive Master. All Rights Reserved.</p>
                </div>

                <!-- scripts start -->
                <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.js"></script>
                <script>
                    Dropzone.options.myDropzone = {
                        url: "{{ route('upload.files') }}",
                        paramName: "file",
                        maxFilesize: 5,
                        acceptedFiles: 'image/*,video/*',
                        addRemoveLinks: true,
                        autoProcessQueue: false,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        init: function () {
                            var myDropzone = this;
                            var submitButton = document.getElementById("submit-all");

                            submitButton.addEventListener("click", function () {
                                if (myDropzone.getQueuedFiles().length === 0) {
                                    showMessage('Please add files to upload', 'error');
                                    return;
                                }
                                showMessage('Uploading files...');
                                myDropzone.processQueue();
                            });

                            this.on("success", function (file, response) {
                                if (response.success) {
                                    addUploadedFile(response.file);
                                }
                            });

                            this.on("error", function (file, errorMessage) {
                                showMessage(errorMessage, 'error');
                            });
                        }
                    };

                    function showMessage(message, type = 'info') {
                        const container = document.getElementById('message-container');
                        container.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
                    }

                    function addUploadedFile(fileInfo) {
                        const container = document.getElementById('uploaded-files');
                        const fileElement = document.createElement('div');
                        fileElement.className = 'file-item';
                        fileElement.innerHTML = `
                <strong>${fileInfo.original_name}</strong><br>
                <a href="${fileInfo.public_url}" target="_blank">View File</a> | 
                Path: ${fileInfo.storage_path}
            `;
                        container.prepend(fileElement);
                    }
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