<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgentsController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Agent\AgentDashboardController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AppliedApplicantController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IsAgentRequestController;
use App\Http\Controllers\JobCategoryContoller;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PersonalDataController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostShowController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\SavejobController;
use App\Http\Controllers\SendRequestController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\WorkController;
use App\Http\Middleware\AuthVerifyCandidate;
use App\Http\Middleware\StatusBlockMiddleware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

// Home index related routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// post show
Route::get('show/detail/{post}/post',[PostShowController::class, 'showIndex'])->name('show.post.index');

// Job Categories filter
Route::get('jobs/{category}/categories', [JobCategoryContoller::class, 'category'])
        ->name('jobs.category');

        // Applicant Related route
Route::post('candidate/{post}/applicant', [ApplicantController::class, 'apply'])
        ->name('applicant.apply')->middleware(['auth']);

        //Candidate save job related route
Route::get('candidate/save/jobs', [SavejobController::class, 'index'])
        ->name('save.job.index')->middleware(['auth', 'verified']);

Route::post('candidate/save/job/{post}/create', [SavejobController::class, 'create'])
        ->name('save.job.create')->middleware(['auth', 'verified']);

Route::delete('candidate/save/job/{id}/destroy', [SavejobController::class, 'destroy'])
        ->name('save.job.destroy')->middleware(['auth', 'verified']);

// Agent Send  request related route
Route::get('send/request', [SendRequestController::class, 'create'])->name('send.request');
Route::post('send/request', [SendRequestController::class, 'store'])->name('send.request.store');


// About page 
Route::get('about-us', [AboutController::class, 'index'])->name('about.index');


// **********************************************************************************************

// User / Agent register related routes
Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'createRegister'])
        ->name('create.register');
    Route::get('login', [AuthController::class, 'login'])->name('login');
});
Route::post('auth/candidate/store', [AuthController::class, 'authCandidateStore'])
    ->name('auth.candidate.store');
Route::post('auth/login', [AuthController::class, 'authLogin'])->name('auth.login');

// The Email verification handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect(route('login'));
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('verify', [ProfileController::class, 'very'])->middleware(['auth',  AuthVerifyCandidate::class])->name('verification.notice');
Route::get('resend/verification/email', [ProfileController::class, 'resend'])->middleware(['auth', AuthVerifyCandidate::class])->name('resend.email');

// Logout related routes
Route::delete('logout', [AuthController::class, 'logout'])->name('logout');


// *********************************************

// Candidate profile related route
Route::get('candidate/profile', [ProfileController::class, 'index'])
    ->name('user.profile.index')->middleware(['auth', 'verified', AuthVerifyCandidate::class]);

Route::get('candidate/profile/settings', [ProfileController::class, 'profileSettings'])
    ->name('candidate.profile.setting')->middleware(['auth', 'verified', AuthVerifyCandidate::class]);
Route::put('candidate/profile/update', [ProfileController::class, 'candidateProfileUpdate'])
    ->name('candidate.profile.update')->middleware(['auth', 'verified']);

 // Candidate Change Password
Route::post('candidate/change/password', [ProfileController::class, 'candidateChangePassword'])
    ->name('candidate.change.password')->middleware(['auth', 'verified']);
    
    // Candidate Personal Detail
Route::resource('personals', PersonalDataController::class)->middleware(['auth', 'verified',AuthVerifyCandidate::class]);
    
// Candidate Education
Route::resource('educations', EducationController::class)->middleware(['auth', 'verified',AuthVerifyCandidate::class]);

// Candidate Work detail relate routes
Route::resource('works', WorkController::class)->middleware(['auth', 'verified', AuthVerifyCandidate::class]);

// Candidate file cv/resume upload related routes
Route::get('candidate/resume', [ResumeController::class, 'create'])
        ->name('resume.create')->middleware(['auth', 'verified', AuthVerifyCandidate::class]);

        //Candidate upload CV/ Resume
Route::post('resume/cv', [ResumeController::class, 'resumeStore'])->name('resume.store')
        ->middleware(['auth', 'verified', AuthVerifyCandidate::class]);

// *********************************************


// Admin related routes
Route::prefix('/admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');

    // Admin profile related routes
    Route::get('/profile', [AdminController::class, 'indexAdminProfile'])
        ->name('admin.profile.index');
    Route::get('edit', [AdminController::class, 'adminEditProfile'])
        ->name('admin.edit.profile');

    Route::post('update', [AdminController::class, 'adminUpdateProfile'])
        ->name('admin.update.profile');

    // Admin Change password related routes
    Route::post('update/pwd', [AdminController::class, 'changePwd'])
        ->name('admin.change.pwd');

    // Admin general setting for application related routes
    Route::post('general/setting', [GeneralSettingController::class, 'generalSettings'])
        ->name('admin.general.settings');
    Route::get('general/setting/{id}/edit', [GeneralSettingController::class, 'generalSettingsEdit'])
        ->name('admin.general.settings.edit');
    Route::put('general/setting/{id}/update', [GeneralSettingController::class, 'generalSettingsUpdate'])
        ->name('admin.general.settings.update');
    Route::delete('general/setting/{id}/destroy', [GeneralSettingController::class, 'generalSettingsDestroy'])
        ->name('admin.general.settings.destroy');

    // Agent related routes
    Route::post('agents/{id}/status', [AgentsController::class, 'adminAgentChangeStatus'])
        ->name('agents.status');
    Route::resource('agents', AgentsController::class);

    // Category 
    Route::resource('categories', CategoryController::class);
    
    // Home Gallery related route
    Route::resource('gallery', GalleryController::class);

    // Is Agent Request
    Route::get('accept/request', [IsAgentRequestController::class, 'index'])
        ->name('admin.accept.agent.request');
        Route::delete('accept/request/{id}/destroy', [IsAgentRequestController::class, 'destroy'])
        ->name('admin.accept.request.destroy');

});



// ********************************************************* Agent start

// Agent related routes
Route::prefix('/agent')->middleware(['auth', 'role:agent', StatusBlockMiddleware::class])
    ->group(function () {
        Route::get('dashboard', [AgentDashboardController::class, 'index'])
            ->name('agent.dashboard.index');
        // Agent profile
        Route::get('profile', [AgentDashboardController::class, 'profile'])
            ->name('agent.profile');
        Route::get('profile/edit', [AgentDashboardController::class, 'profileEdit'])
            ->name('agent.profile.edit');
        Route::post('profile/update', [AgentDashboardController::class, 'profileUpdate'])
        ->name('agent.profile.update');

            // Agent Change password related routes
    Route::post('update/pwd', [AgentDashboardController::class, 'changePwd'])
        ->name('agent.change.pwd');


        // Post /job
  Route::put('posts/job/{post}/change', [PostController::class, 'jobChangePublish'])
        ->name('post.job.change');
    Route::put('posts/job/{post}/status', [PostController::class, 'jobStatus'])->name('post.job.status');

    // Applied Applicant
    Route::get('applicant/applied/', [AppliedApplicantController::class, 'appliedApplcant'])
        ->name('applied.applicant');

    Route::get('applicant/applied/{post}/show', [AppliedApplicantController::class, 'appliedApplicantShow'])
        ->name('applied.applied.show');

    Route::resource('posts', PostController::class);


    });
