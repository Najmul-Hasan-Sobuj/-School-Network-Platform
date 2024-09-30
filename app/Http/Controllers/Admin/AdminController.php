<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:dashboard.view', ['only' => ['index']]);
    }
    /**
     * Display the form for managing settings.
     */
    public function index()
    {
        // Initialize variables
        $totalSchools = 0;
        $totalAdmins = 0;
        $totalStudents = 0;
        $pendingApprovals = 0;
        $latestStudents = [];


        $latestStudents = User::where('is_approved', 0)
            ->latest()
            ->take(5)
            ->get();

        // For Super Admin
        if (auth()->user()->hasRole('Super Admin')) {
            $totalSchools = School::count();
            $totalAdmins = Admin::role('School Admin')->count();
            $totalStudents = User::count();
            $pendingApprovals = User::where('is_approved', 0)->count();
        }

        // For School Admin
        if (auth()->user()->hasRole('School Admin')) {
            $totalStudents = User::count(); 
            $pendingApprovals = User::where('is_approved', 0)->count();
        }

        return view('admin.dashboard', compact('totalSchools', 'totalAdmins', 'totalStudents', 'pendingApprovals', 'latestStudents'));
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
