<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProjectBackupController extends Controller
{
    public function showBackups()
    {
        // Get the directory containing backup files
        $backupDirectory = storage_path('app/IMLI');

        // Get all backup files in the directory
        $backupFiles = File::glob($backupDirectory . '/*.zip');

        // Sort backup files by name (which includes timestamp) in descending order
        rsort($backupFiles);

        // Limit to last 5 backups
        $lastFiveBackups = array_slice($backupFiles, 0, 5);

        return view('admin.pages.backups.index', ['backups' => $lastFiveBackups]);
    }

    public function deleteBackup($filename)
    {
        $backupPath = storage_path('app/IMLI/' . $filename);

        if (File::exists($backupPath)) {
            File::delete($backupPath);
            return redirect()->route('admin.project.backup.index')->with('success', 'Backup deleted successfully.');
        } else {
            return redirect()->route('admin.project.backup.index')->with('error', 'Backup not found.');
        }
    }
}
