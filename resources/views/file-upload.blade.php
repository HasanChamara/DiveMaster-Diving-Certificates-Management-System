<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f7f6;
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
    <div class="container">
        <h1>File Upload</h1>
        
        <div id="message-container"></div>
        
        <form action="{{ route('upload.files') }}" class="dropzone" id="my-dropzone">
            @csrf
        </form>
        
        <button id="submit-all" class="btn-upload">Upload Files</button>
        
        <div class="uploaded-files" id="uploaded-files"></div>
    </div>

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
            init: function() {
                var myDropzone = this;
                var submitButton = document.getElementById("submit-all");
                
                submitButton.addEventListener("click", function() {
                    if (myDropzone.getQueuedFiles().length === 0) {
                        showMessage('Please add files to upload', 'error');
                        return;
                    }
                    showMessage('Uploading files...');
                    myDropzone.processQueue();
                });
                
                this.on("success", function(file, response) {
                    if (response.success) {
                        addUploadedFile(response.file);
                    }
                });
                
                this.on("error", function(file, errorMessage) {
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
</body>
</html>