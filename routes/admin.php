<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ReadingController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\PersonalController;
use App\Http\Controllers\Admin\NewPasswordController;
use App\Http\Controllers\Admin\VerifyEmailController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProjectBackupController;
use App\Http\Controllers\Admin\PasswordResetLinkController;
use App\Http\Controllers\Admin\TermsAndConditionController;
use App\Http\Controllers\Admin\ConfirmablePasswordController;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Admin\EmailVerificationPromptController;
use App\Http\Controllers\Admin\EmailVerificationNotificationController;

// Route::get('/', function () {
//     return Redirect::route('admin.dashboard');
// });


Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::resources(
        [
            'role'     => RoleController::class,
            'user'     => UserController::class,
            'personal' => PersonalController::class,
            'project'  => ProjectController::class,
            'reading'  => ReadingController::class,
        ],
        ['except' => ['show']]
    );

    Route::resource('category', CategoryController::class);
    Route::post('/category/toggle-status/{id}', [CategoryController::class, 'toggleStatus'])->name('category.toggle-status');


    Route::put('email-settings', [SettingController::class, 'emailUpdate'])->name('email.update');
    Route::post('email-settings/send-test-email', [SettingController::class, 'sendTestEmail'])->name('email.sendTest');

    Route::post('backup/run', [AdminController::class, 'runBackup'])->name('backup.run');
    Route::post('optimize/clear', [AdminController::class, 'clearOptimize'])->name('optimize.clear');
    Route::post('passport/install', [AdminController::class, 'installPassport'])->name('passport.install');

    Route::get('/download-backup',  [AdminController::class, 'downloadBackup'])->name('download.backup');

    Route::get('project-backup',  [ProjectBackupController::class, 'showBackups'])->name('project.backup.index');
    Route::delete('/backups/{filename}',  [ProjectBackupController::class, 'deleteBackup'])->name('project.delete.backup');

    Route::get('privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy.index');
    Route::put('privacy-policy', [PrivacyPolicyController::class, 'UpdateOrCreate'])->name('privacy-policy.update');

    Route::get('terms-and-condition', [TermsAndConditionController::class, 'index'])->name('terms-and-condition.index');
    Route::put('terms-and-condition', [TermsAndConditionController::class, 'UpdateOrCreate'])->name('terms-and-condition.update');

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('setting', [SettingController::class, 'UpdateOrCreate'])->name('setting.update');
});
