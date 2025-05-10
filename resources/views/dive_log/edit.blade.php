<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dive Log</title>
</head>
<body>
    <div class="trp-right-col trp-container" style="max-height: 100vh; overflow: auto;">
        <div class="trp-right-col-top">
            <div class="trp-col left" style="margin-bottom: 24px;">
                <h2 class="trp-h2 trp-dashboard-title">Edit Dive Log</h2>
            </div>

            <div class="dive-log-form">
                <form method="POST" action="{{ route('diveLog.update', ['id' => $diveLog->id, 'diver_id' => $diveLog->diver_id]) }}" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')  <!-- Use PUT method for updating -->

                    <input type="text" name="divelog_id" value="{{ $diveLog->id }}" />

                    <!-- Common Details Section -->
                    <div class="form-section">
                        <h4>Environmental Conditions</h4>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="visibility">Visibility:</label>
                                <select id="visibility" name="visibility" class="form-control" required>
                                    <option value="Good" {{ old('visibility', $diveLog->visibility) == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Fair" {{ old('visibility', $diveLog->visibility) == 'Fair' ? 'selected' : '' }}>Fair</option>
                                    <option value="Poor" {{ old('visibility', $diveLog->visibility) == 'Poor' ? 'selected' : '' }}>Poor</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="weather_conditions">Weather Conditions:</label>
                                <select id="weather_conditions" name="weather_conditions" class="form-control" required>
                                    <option value="Sunny" {{ old('weather_conditions', $diveLog->weather_conditions) == 'Sunny' ? 'selected' : '' }}>Sunny</option>
                                    <option value="Cloudy" {{ old('weather_conditions', $diveLog->weather_conditions) == 'Cloudy' ? 'selected' : '' }}>Cloudy</option>
                                    <option value="Rainy" {{ old('weather_conditions', $diveLog->weather_conditions) == 'Rainy' ? 'selected' : '' }}>Rainy</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="dive_site_conditions">Dive Site Conditions:</label>
                                <select id="dive_site_conditions" name="dive_site_conditions" class="form-control" required>
                                    <option value="Calm" {{ old('dive_site_conditions', $diveLog->dive_site_conditions) == 'Calm' ? 'selected' : '' }}>Calm</option>
                                    <option value="Moderate" {{ old('dive_site_conditions', $diveLog->dive_site_conditions) == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                                    <option value="Rough" {{ old('dive_site_conditions', $diveLog->dive_site_conditions) == 'Rough' ? 'selected' : '' }}>Rough</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="divider">

                    <!-- Diver-specific Details -->
                    <div class="diver-section">
                        <h4>Diver: {{ $diveLog->diver->name }}</h4>
                        <input type="hidden" name="divers[0][diver_id]" value="{{ $diveLog->diver->id }}" />

                        <div class="form-row">
                            <div class="form-group">
                                <label for="depth_{{ $diveLog->diver->id }}">Depth (m):</label>
                                <input type="number" id="depth_{{ $diveLog->diver->id }}" name="divers[0][depth]"
                                       value="{{ old('divers.0.depth', $diveLog->depth) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="duration_{{ $diveLog->diver->id }}">Duration (minutes):</label>
                                <input type="number" id="duration_{{ $diveLog->diver->id }}" name="divers[0][duration]"
                                       value="{{ old('divers.0.duration', $diveLog->duration) }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="dive_type_{{ $diveLog->diver->id }}">Dive Type:</label>
                                <select id="dive_type_{{ $diveLog->diver->id }}" name="divers[0][dive_type]"
                                        class="form-control" required>
                                    <option value="Recreational" {{ old('divers.0.dive_type', $diveLog->dive_type) == 'Recreational' ? 'selected' : '' }}>
                                        Recreational
                                    </option>
                                    <option value="Deep Dive" {{ old('divers.0.dive_type', $diveLog->dive_type) == 'Deep Dive' ? 'selected' : '' }}>
                                        Deep Dive
                                    </option>
                                    <option value="Wreck Dive" {{ old('divers.0.dive_type', $diveLog->dive_type) == 'Wreck Dive' ? 'selected' : '' }}>
                                        Wreck Dive
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="air_consumption_{{ $diveLog->diver->id }}">Air Consumption (PSI/bar):</label>
                                <input type="number" id="air_consumption_{{ $diveLog->diver->id }}"
                                       name="divers[0][air_consumption]"
                                       value="{{ old('divers.0.air_consumption', $diveLog->air_consumption) }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group" style="flex: 0 0 100%; max-width: 100%;">
                                <label for="notes_{{ $diveLog->diver->id }}">Additional Notes:</label>
                                <textarea id="notes_{{ $diveLog->diver->id }}" name="divers[0][notes]"
                                          class="form-control">{{ old('divers.0.notes', $diveLog->notes) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" style="justify-content: flex-end; margin-top: 20px;">
                        <button type="submit" class="submit-btn">Update Dive Log</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
