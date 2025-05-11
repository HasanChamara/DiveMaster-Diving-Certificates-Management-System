<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('file-upload');
    }

    public function uploadFiles(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,mp4,avi|max:5120',
        ]);

        try {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            
            // Clean filename while preserving extension
            $extension = $file->getClientOriginalExtension();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $safeName = Str::slug($fileName).'.'.$extension;
            
            // Windows-compatible paths
            $storageRelative = 'public\uploads';
            $storageAbsolute = storage_path('app'.DIRECTORY_SEPARATOR.$storageRelative);
            
            // Ensure directory exists with proper permissions
            if (!is_dir($storageAbsolute)) {
                mkdir($storageAbsolute, 0777, true);
                exec('icacls "'.$storageAbsolute.'" /grant "Everyone:(OI)(CI)F"');
            }

            // Handle duplicate filenames
            $counter = 1;
            $finalName = $safeName;
            while (file_exists($storageAbsolute.'\\'.$finalName)) {
                $finalName = pathinfo($safeName, PATHINFO_FILENAME).'_'.$counter++.'.'.$extension;
            }

            // Method 1: Direct filesystem move (most reliable for Windows)
            $destination = $storageAbsolute.'\\'.$finalName;
            if ($file->move($storageAbsolute, $finalName)) {
                if (!file_exists($destination)) {
                    throw new \Exception("File moved but not physically present");
                }
                
                return response()->json([
                    'success' => true,
                    'message' => 'File uploaded successfully',
                    'file' => [
                        'original_name' => $originalName,
                        'storage_path' => $storageRelative.'\\'.$finalName,
                        'public_url' => Storage::url(str_replace('\\', '/', $storageRelative).'/'.$finalName),
                        'physical_path' => $destination
                    ]
                ]);
            }

            throw new \Exception("All storage methods failed");

        } catch (\Exception $e) {
            Log::error("Upload failed: ".$e->getMessage());
            return response()->json([
                'error' => 'Upload failed: '.$e->getMessage()
            ], 500);
        }
    }
}