<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index()
    {
        $mediaItems = DB::table('media_metadata')
            ->select('id', 'type', 'title', 'notes', 'filename')
            ->orderBy('timestamp', 'desc')
            ->get()
            ->map(function ($item) {
                // Convert underscores back to hyphens in the filename for storage path
                $storageFilename = str_replace('_', '-', $item->filename);
                
                $item->media_url = asset('storage/uploads/'.$storageFilename);
                $item->original_filename = $item->filename; // Preserve original DB filename
                return $item;
            });

            //dd($mediaItems);

        return view('media.blog', compact('mediaItems'));
    }
}