<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Your Dive Details</title>
</head>
<body>

<h3>Log Your Dive Details</h3>

<form method="POST" action="{{ route('diveLog.store') }}">
    @csrf
    <input type="hidden" name="booking_id" value="{{ $booking_id }}" /> <!-- Booking ID hidden -->

    <!-- Common Details for All Divers -->
    <div class="common-details">
        <label for="visibility">Visibility (Select):</label>
        <select id="visibility" name="visibility">
            <option value="Good" {{ old('visibility') == 'Good' ? 'selected' : '' }}>Good</option>
            <option value="Fair" {{ old('visibility') == 'Fair' ? 'selected' : '' }}>Fair</option>
            <option value="Poor" {{ old('visibility') == 'Poor' ? 'selected' : '' }}>Poor</option>
        </select>

        <label for="weather_conditions">Weather Conditions:</label>
        <select id="weather_conditions" name="weather_conditions">
            <option value="Sunny" {{ old('weather_conditions') == 'Sunny' ? 'selected' : '' }}>Sunny</option>
            <option value="Cloudy" {{ old('weather_conditions') == 'Cloudy' ? 'selected' : '' }}>Cloudy</option>
            <option value="Rainy" {{ old('weather_conditions') == 'Rainy' ? 'selected' : '' }}>Rainy</option>
        </select>

        <label for="dive_site_conditions">Dive Site Conditions:</label>
        <select id="dive_site_conditions" name="dive_site_conditions">
            <option value="Calm" {{ old('dive_site_conditions') == 'Calm' ? 'selected' : '' }}>Calm</option>
            <option value="Moderate" {{ old('dive_site_conditions') == 'Moderate' ? 'selected' : '' }}>Moderate</option>
            <option value="Rough" {{ old('dive_site_conditions') == 'Rough' ? 'selected' : '' }}>Rough</option>
        </select>
    </div>

    <!-- Diver-specific Details -->
    @foreach($divers as $index => $diver)
        <div class="diver-section">
            <h4>Diver {{ $index + 1 }}: {{ $diver->name }}</h4>

            <input type="hidden" name="divers[{{ $index }}][diver_id]" value="{{ $diver->id }}" />

            <label for="depth_{{ $diver->id }}">Depth (m):</label>
            <input type="number" id="depth_{{ $diver->id }}" name="divers[{{ $index }}][depth]" value="{{ old('divers.' . $index . '.depth') }}" required>

            <label for="duration_{{ $diver->id }}">Duration (minutes):</label>
            <input type="number" id="duration_{{ $diver->id }}" name="divers[{{ $index }}][duration]" value="{{ old('divers.' . $index . '.duration') }}" required>

            <label for="dive_type_{{ $diver->id }}">Dive Type:</label>
            <select id="dive_type_{{ $diver->id }}" name="divers[{{ $index }}][dive_type]" required>
                <option value="Recreational" {{ old('divers.' . $index . '.dive_type') == 'Recreational' ? 'selected' : '' }}>Recreational</option>
                <option value="Deep Dive" {{ old('divers.' . $index . '.dive_type') == 'Deep Dive' ? 'selected' : '' }}>Deep Dive</option>
                <option value="Wreck Dive" {{ old('divers.' . $index . '.dive_type') == 'Wreck Dive' ? 'selected' : '' }}>Wreck Dive</option>
            </select>

            <label for="air_consumption_{{ $diver->id }}">Air Consumption (PSI/bar):</label>
            <input type="number" id="air_consumption_{{ $diver->id }}" name="divers[{{ $index }}][air_consumption]" value="{{ old('divers.' . $index . '.air_consumption') }}">

            <label for="notes_{{ $diver->id }}">Additional Notes:</label>
            <textarea id="notes_{{ $diver->id }}" name="divers[{{ $index }}][notes]">{{ old('divers.' . $index . '.notes') }}</textarea>
        </div>
        <hr> <!-- Add a separator between diver sections -->
    @endforeach

    <button type="submit">Submit Dive Logs</button>
</form>

</body>
</html>
