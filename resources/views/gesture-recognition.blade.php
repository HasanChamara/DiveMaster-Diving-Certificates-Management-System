<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dive Master | Booking Management</title>
    @vite(['resources/css/dm-dashboard.css'])
    @vite(['resources/css/dm-tables.css'])
    @vite(['resources/css/dm-main.css'])
    @vite(['resources/css/gestire-recognition.css'])

    <!-- Swiper.js CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/imgs/DiveMaster-Fav.png">
    <style>
        /* Notepad Styles */
        .notepad-container {
            display: flex;
            flex-direction: column;
            gap: 16px;
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 20px;
        }
        
        .note-item {
            background-color: #f9f7fe;
            border-radius: 8px;
            padding: 12px;
            position: relative;
            border-left: 4px solid #6366f1;
        }
        
        .note-text {
            font-size: 14px;
            color: #333;
            margin-bottom: 4px;
            word-break: break-word;
        }
        
        .note-timestamp {
            font-size: 12px;
            color: #666;
            font-style: italic;
        }
        
        .delete-note {
            position: absolute;
            right: 10px;
            top: 10px;
            background: none;
            border: none;
            color: #f87171;
            cursor: pointer;
            font-size: 18px;
        }
        
        .new-note-input {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            font-size: 14px;
            width: 100%;
            margin-bottom: 10px;
            resize: none;
        }
        
        .note-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }
        
        .add-note-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: #6366f1;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.2s;
        }
        
        .add-note-btn:hover {
            background-color: #4f46e5;
        }
        
        .sync-btn {
            background-color: #10b981;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px 24px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.2s;
        }
        
        .sync-btn:hover {
            background-color: #059669;
        }
        
        .notepad-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 4px;
            color: #333;
        }
        
        .notepad-subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }
        
        .sync-success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 10px;
            border-radius: 6px;
            margin-top: 16px;
            text-align: center;
            display: none;
        }
        
        /* Empty state */
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: #f9fafb;
            border-radius: 8px;
            text-align: center;
        }
        
        .empty-state-icon {
            font-size: 32px;
            color: #9ca3af;
            margin-bottom: 12px;
        }
        
        .empty-state-text {
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="trp-main-wrapper dm-hand-gesture-recognition-container">
        <div class="trp-right-col trp-container" style="">
            <div class="trp-right-col-top">
                @if(session('success'))
                    <div class="success-message">{{ session('success') }}</div>
                @endif

                <div class="dm-gr-wrapper">
                    <div class="trp-col left" style="margin-bottom: 16px;">
                        <h2 class="trp-h2 trp-dashboard-title">Underwater Hand Signal Recognition</h2>
                    </div>
                    <div class="gr-inner">
                        <div class="verification-container">
                            <!-- Left Card - Face Scanning -->
                            <div class="face-scan-card pink-bg">
                                <div class="scan-container">
                                    <div class="video-container">
                                        <img id="videoFeed" class="videoFeed" src="{{ asset('imgs/hand-gesture-recognition.webp') }}" style="object-fit: cover;  height: 100%; width: 100%; border-radius: 12px;">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Right Card - Notepad -->
                            <div class="face-scan-card white-bg">
                                <div class="right-card-content">
                                    <h2 class="biometric-title">Dive Notes</h2>
                                    <p style="margin-bottom: 16px;" class="biometric-subtitle mb-3">Record your observations about hand signals during the dive session</p>
                                    
                                    <!-- Notepad Container -->
                                    <div id="notepadContainer" class="notepad-container">
                                        <!-- Notes will be added here dynamically -->
                                        <div class="empty-state" id="emptyState">
                                            <div class="empty-state-icon">📝</div>
                                            <p class="empty-state-text">No notes yet. Add your first note below.</p>
                                        </div>
                                    </div>
                                    
                                    <!-- New Note Input -->
                                    <textarea id="newNoteInput" class="new-note-input" placeholder="Write a new note..." rows="2"></textarea>
                                    
                                    <!-- Note Actions -->
                                    <div class="note-actions">
                                        <button id="addNoteBtn" class="add-note-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                                            </svg>
                                            Add Note
                                        </button>
                                        <span id="noteCount">0 notes</span>
                                    </div>
                                    
                                    <!-- Sync Button -->
                                    <button id="syncBtn" class="sync-btn">Sync Notes</button>
                                    
                                    <!-- Success Message -->
                                    <div id="syncSuccess" class="sync-success">
                                        Notes synced successfully!
                                    </div>
                                    
                                    <div class="footer">
                                        <span>Contact support</span>
                                        <span>© 2025, Dive Master. All Rights Reserved.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- scripts start -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize notes array
                let notes = [];
                
                // DOM Elements
                const notepadContainer = document.getElementById('notepadContainer');
                const newNoteInput = document.getElementById('newNoteInput');
                const addNoteBtn = document.getElementById('addNoteBtn');
                const syncBtn = document.getElementById('syncBtn');
                const syncSuccess = document.getElementById('syncSuccess');
                const noteCount = document.getElementById('noteCount');
                const emptyState = document.getElementById('emptyState');
                
                // Add note function
                function addNote() {
                    const noteText = newNoteInput.value.trim();
                    if (noteText) {
                        const timestamp = new Date();
                        const note = {
                            id: Date.now(),
                            text: noteText,
                            timestamp: timestamp.toISOString()
                        };
                        
                        notes.push(note);
                        renderNotes();
                        newNoteInput.value = '';
                    }
                }
                
                // Render notes function
                function renderNotes() {
                    // Remove empty state from container temporarily
                    if (emptyState.parentNode === notepadContainer) {
                        notepadContainer.removeChild(emptyState);
                    }
                    
                    // Clear all existing notes
                    notepadContainer.innerHTML = '';
                    
                    // Re-add the empty state
                    notepadContainer.appendChild(emptyState);
                    
                    // Create note elements and add them after the empty state
                    notes.forEach(note => {
                        const noteElement = document.createElement('div');
                        noteElement.className = 'note-item';
                        noteElement.dataset.id = note.id;
                        
                        const formattedDate = new Date(note.timestamp).toLocaleString();
                        
                        // Create note content
                        noteElement.innerHTML = `
                            <p class="note-text">${note.text}</p>
                            <span class="note-timestamp">${formattedDate}</span>
                            <button class="delete-note" data-id="${note.id}">×</button>
                        `;
                        
                        // Add directly to the container
                        notepadContainer.appendChild(noteElement);
                    });
                    
                    // Update note count
                    noteCount.textContent = `${notes.length} note${notes.length !== 1 ? 's' : ''}`;
                    
                    // Show/hide empty state
                    emptyState.style.display = notes.length === 0 ? 'flex' : 'none';
                }
                
                // Delete note function
                function deleteNote(id) {
                    // Convert the id to a number before filtering
                    const numericId = parseInt(id, 10);
                    notes = notes.filter(note => note.id !== numericId);
                    renderNotes();
                }
                
                // Sync notes function
                function syncNotes() {
                    // Create JSON with notes and timestamp
                    const syncData = {
                        notes: notes,
                        syncTimestamp: new Date().toISOString()
                    };
                    
                    // In a real application, you would send this to your backend
                    console.log('Syncing notes:', JSON.stringify(syncData, null, 2));
                    
                    // Show success message
                    syncSuccess.style.display = 'block';
                    setTimeout(() => {
                        syncSuccess.style.display = 'none';
                    }, 3000);
                    
                    // For testing purposes, display the synced data in a more visible way
                    console.table(notes);
                }
                
                // Event Listeners
                addNoteBtn.addEventListener('click', addNote);
                
                newNoteInput.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        addNote();
                    }
                });
                
                syncBtn.addEventListener('click', syncNotes);
                
                // Event delegation for delete buttons - more robust implementation
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('delete-note')) {
                        const noteId = e.target.getAttribute('data-id');
                        if (noteId) {
                            deleteNote(noteId);
                        }
                    }
                });
                
                // Initialize the UI
                renderNotes();
                
                // Add test data - Remove for production
                // Uncomment to test with sample data
                /*
                setTimeout(() => {
                    notes.push({
                        id: 1000,
                        text: "Test note 1",
                        timestamp: new Date().toISOString()
                    });
                    notes.push({
                        id: 2000,
                        text: "Test note 2",
                        timestamp: new Date().toISOString()
                    });
                    renderNotes();
                }, 500);
                */
            });
        </script>
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