<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Dive Logs</title>
</head>
<body>
    <div class="trp-right-col trp-container" style="max-height: 100vh; overflow: auto;">
        <div class="trp-right-col-top">
            <div class="trp-col left" style="margin-bottom: 24px;">
                <h2 class="trp-h2 trp-dashboard-title">Manage Dive Logs</h2>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- List of Dive Logs -->
            <div class="dive-log-list">
                @foreach($diveLogs as $log)
                    <div class="dive-log-item">
                        <!-- Accessing Diver's Information -->
                        <h3>Diver: {{ $log->diver->name }}</h3>
                        <p>Depth: {{ $log->depth }} m</p>
                        <p>Duration: {{ $log->duration }} minutes</p>
                        <p>Visibility: {{ $log->visibility }}</p>
                        <p>Weather: {{ $log->weather_conditions }}</p>
                        <p>Site Conditions: {{ $log->dive_site_conditions }}</p>
                        <p>Dive Type: {{ $log->dive_type }}</p>
                        <p>Air Consumption: {{ $log->air_consumption }} PSI/bar</p>
                        <p>Notes: {{ $log->notes }}</p>

                        <!-- Edit button for each dive log -->
                        <a href="{{ route('editDiveLog', ['id' => $log->id, 'diver_id' => $log->diver_id]) }}" class="btn btn-primary">Edit</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</body>
</html>
