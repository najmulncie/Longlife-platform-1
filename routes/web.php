<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CommissionSettingController;
use App\Http\Controllers\AdminActivationController;
use App\Http\Controllers\PaymentSettingController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\WithdrawSettingController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\Admin\WithdrawRequestController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\PasswordController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\Admin\TargetController as AdminTargetController;
use App\Http\Controllers\User\LeadershipController;
use App\Http\Controllers\Admin\LeadershipLevelController;
use App\Http\Controllers\User\GmailSubmissionController;
use App\Http\Controllers\Admin\GmailSellSettingController;
use App\Http\Controllers\Admin\GmailSaleController;
use App\Http\Controllers\UserGmailSaleController;

use App\Http\Controllers\Project\GlobalBonusController;




// ======================
// ✅ Public Routes
// ======================
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// ======================
// ✅ User Routes (auth middleware)
// ======================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

    Route::get('/activate-account', [ActivationController::class, 'showForm'])->name('user.activate');
    Route::post('/activate-account', [ActivationController::class, 'submitRequest'])->name('user.activate.submit');

    Route::get('/activation-success', function () {
        return view('user.activation_success');
    })->name('user.activation.success');
});

// ======================
// ✅ Admin Auth Routes
// ======================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ======================
// ✅ Admin Protected Routes
// ======================
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // কমিশন সেটিংস
    Route::get('/commissions', [CommissionSettingController::class, 'index'])->name('commissions.index');
    Route::post('/commissions', [CommissionSettingController::class, 'update'])->name('commissions.update');

    // একাউন্ট অ্যাক্টিভেশন রিকোয়েস্ট
    // Route::get('/activation-requests', [AdminActivationController::class, 'index'])->name('activation.requests');

    Route::get('/activation-requests/pending', [AdminActivationController::class, 'pending'])->name('activation.requests.pending');
    Route::get('/activation-requests/approved', [AdminActivationController::class, 'approved'])->name('activation.requests.approved');
    Route::get('/activation-requests/rejected', [AdminActivationController::class, 'rejected'])->name('activation.requests.rejected');

    Route::post('/activation-approve/{id}', [AdminActivationController::class, 'approve'])->name('activation.approve');
    Route::post('/activation-reject/{id}', [AdminActivationController::class, 'reject'])->name('activation.reject');

    // ফিক্সড কমিশন সেটিংস
    Route::get('/fixed-commissions', [AdminController::class, 'editCommissions'])->name('fixedCommissions.edit');
    Route::post('/fixed-commissions', [AdminController::class, 'updateCommissions'])->name('fixedCommissions.update');

});

// ✅ Admin panel route group (with prefix and middleware)
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    // ✅ Resourceful routes for Payment Settings under admin
    Route::resource('payment-settings', PaymentSettingController::class);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/withdraw', [WithdrawController::class, 'create'])->name('withdraw.form');
    Route::post('/withdraw', [WithdrawController::class, 'store'])->name('withdraw.submit');
});

Route::get('/user/withdraw/history', [WithdrawController::class, 'history'])->name('withdraw.history');


Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/withdraw-settings', [WithdrawSettingController::class, 'index'])->name('admin.withdraw.settings');
    Route::post('/withdraw-settings/method', [WithdrawSettingController::class, 'storeMethod'])->name('admin.withdraw.method.store');
    Route::post('/withdraw-settings/type', [WithdrawSettingController::class, 'storeType'])->name('admin.withdraw.type.store');
    Route::post('/withdraw-settings/config', [WithdrawSettingController::class, 'storeConfig'])->name('admin.withdraw.config.store');
});

// ✅ Admin Withdraw Request Routes
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/withdraw-requests/pending', [WithdrawRequestController::class, 'indexPending'])->name('withdraw.pending');
    Route::get('/withdraw-requests/approved', [WithdrawRequestController::class, 'indexApproved'])->name('withdraw.approved');
    Route::get('/withdraw-requests/rejected', [WithdrawRequestController::class, 'indexRejected'])->name('withdraw.rejected');

    Route::post('/withdraw-requests/{id}/approve', [WithdrawRequestController::class, 'approve'])->name('withdraw.approve');
    Route::post('/withdraw-requests/{id}/reject', [WithdrawRequestController::class, 'reject'])->name('withdraw.reject');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');

    Route::get('/global-bonus', [GlobalBonusController::class, 'index'])->name('global-bonus');
    Route::post('/global-bonus/achieve', [GlobalBonusController::class, 'achieve'])->name('global-bonus.achieve');



});



Route::get('/income-summary', function () {
    return view('user.income.summary');
})->middleware(['auth'])->name('income.summary');


Route::get('/update', function () {
    return view('update');
});







Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/user/change-password', [PasswordController::class, 'index'])->name('user.change.password');
    Route::post('/user/change-password', [PasswordController::class, 'update'])->name('user.change.password.update');
});



Route::get('/level/{level}', [ReferralController::class, 'showLevel'])->middleware('auth');


Route::get('/my-team', [ReferralController::class, 'showLevels'])->middleware('auth');
Route::get('/level/{level}', [ReferralController::class, 'showLevel'])->middleware('auth');

// routes/web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/income-history', [IncomeController::class, 'index'])->name('income.history');
});

Route::get('/income/today', [IncomeController::class, 'today'])->name('income.today');
Route::get('/income/yesterday', [IncomeController::class, 'yesterday'])->name('income.yesterday');
Route::get('/income/last-7-days', [IncomeController::class, 'last7'])->name('income.last7');
Route::get('/income/last-30-days', [IncomeController::class, 'last30'])->name('income.last30');
Route::get('/income/total', [IncomeController::class, 'total'])->name('income.total');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'editProfile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/change-password', [AdminController::class, 'showChangePasswordForm'])->name('admin.password.form');
    Route::post('/admin/change-password', [AdminController::class, 'updatePassword'])->name('admin.password.update');
});

// Admin user management routes
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/{id}/update', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::post('/users/{id}/ban', [AdminUserController::class, 'ban'])->name('admin.users.ban');
    Route::post('/users/{id}/unban', [AdminUserController::class, 'unban'])->name('admin.users.unban');

 Route::get('/users/banned', [AdminUserController::class, 'bannedUsers'])->name('admin.users.banned');
 Route::get('/admin/active-users', [AdminUserController::class, 'activeUsers'])->name('admin.users.active');
 Route::get('/users/inactive', [AdminUserController::class, 'inactiveUsers'])->name('admin.users.inactive');

    Route::get('/users/{id}/message', [AdminUserController::class, 'showMessageForm'])->name('admin.users.sendMessageForm');
    Route::post('/users/{id}/send-message', [AdminUserController::class, 'sendMessage'])->name('admin.users.sendMessage');


    // ইউজার সার্চ রেজাল্ট পেজ
Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/search', [AdminUserController::class, 'index'])->name('admin.users.search');

});


Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/targets', [AdminTargetController::class, 'index'])->name('admin.targets.index');
    Route::put('/targets/{id}', [AdminTargetController::class, 'update'])->name('admin.targets.update');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/targets', [TargetController::class, 'showTargets'])->name('user.targets');
    Route::post('/targets/claim/{type}', [TargetController::class, 'claimBonus'])->name('user.claimTarget');
});



Route::delete('/user/dismiss-message', [UserController::class, 'dismissMessage'])->name('user.dismissMessage')->middleware('auth');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/leadership', [App\Http\Controllers\User\LeadershipController::class, 'index'])->name('user.leadership');
    Route::post('/leadership/claim/{id}', [App\Http\Controllers\User\LeadershipController::class, 'claim'])->name('user.claimLeadership');
});



Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::resource('leadership-levels', LeadershipLevelController::class)
        ->names([
            'index' => 'admin.leadership-levels.index',
            'create' => 'admin.leadership-levels.create',
            'store' => 'admin.leadership-levels.store',
            'show' => 'admin.leadership-levels.show',
            'edit' => 'admin.leadership-levels.edit',
            'update' => 'admin.leadership-levels.update',
            'destroy' => 'admin.leadership-levels.destroy',
        ]);
});



// routes/web.php

// Admin

Route::middleware(['auth'])->group(function () {
    // Gmail Sell user routes
    Route::get('/gmail-sell', [GmailSubmissionController::class, 'gmailSellForm'])->name('user.gmail.sell');
    Route::post('/gmail-sell', [GmailSubmissionController::class, 'submit'])->name('user.gmail.submit');

    Route::get('/user/gmail-sales-history/{status?}', [UserGmailSaleController::class, 'history'])->name('user.gmail-sales.history');
    
});


Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Gmail Sell Setting routes
    Route::get('/gmail-setting', [GmailSellSettingController::class, 'index'])->name('gmail.setting');
    Route::post('/gmail-setting', [GmailSellSettingController::class, 'update'])->name('gmail.setting.update');
    Route::get('/gmail-setting-toggle', [GmailSellSettingController::class, 'toggle'])->name('gmail.setting.toggle');

    // Gmail Sales routes
    Route::get('/gmail-sales', [GmailSaleController::class, 'index'])->name('gmail.sales.index');
    Route::put('/gmail-sales/{id}/status', [GmailSaleController::class, 'updateStatus'])->name('gmail.sales.status');

    Route::get('/gmail-sales/export', [GmailSaleController::class, 'export'])->name('gmail.export');

    Route::put('/gmail-sales/bulk-action', [GmailSaleController::class, 'bulkAction'])->name('gmail.bulkAction');


    // Gmail Sales status-wise routes
    Route::get('/gmail-sales/pending', [GmailSaleController::class, 'pending'])->name('gmail.sales.pending');
    Route::get('/gmail-sales/checked', [GmailSaleController::class, 'checked'])->name('gmail.sales.checked');
    Route::get('/gmail-sales/rejected', [GmailSaleController::class, 'rejected'])->name('gmail.sales.rejected');
    Route::get('/gmail-sales/completed', [GmailSaleController::class, 'completed'])->name('gmail.sales.completed');
});
