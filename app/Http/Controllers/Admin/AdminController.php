<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    /**
     * Display the form for managing settings.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function runBackup()
    {
        Artisan::call('backup:run');

        flash()
            ->success('Backup has been successfully executed.')
            ->flash();
        return redirect()->back();
    }

    public function clearOptimize()
    {
        Artisan::call('optimize:clear');
        flash()
            ->success('Optimize cache cleared.')
            ->flash();
        return redirect()->back();
    }

    public function installPassport()
    {
        // dd(Artisan::call('passport:install'));
        Artisan::call('passport:install');
        flash()
            ->success('Passport installed successfully.')
            ->flash();
        return redirect()->back();
    }

    public function downloadBackup()
    {
        Artisan::call('backup:run');

        $backupDirectory = storage_path('app/IMLI');

        $backupFiles = File::glob($backupDirectory . '/*.zip');

        rsort($backupFiles);

        if (!empty($backupFiles)) {
            $latestBackup = $backupFiles[0];

            return response()->download($latestBackup);
        } else {
            abort(404, 'No backups found.');
        }
    }
}
