<?php

use App\Http\Controllers\GoogleController;
use App\Http\Livewire\Admin\ChatTawkComponent;
use App\Http\Livewire\Admin\ContactMessagesComponent;
use App\Http\Livewire\Admin\CycleComponent;
use App\Http\Livewire\Admin\DashboardComponent;
use App\Http\Livewire\Admin\DocumentComponent;
use App\Http\Livewire\Admin\EmploymentComponent;
use App\Http\Livewire\Admin\FaqComponent;
use App\Http\Livewire\Admin\ManualsAndServicesComponent;
use App\Http\Livewire\Admin\Others\FaqSectionComponent;
use App\Http\Livewire\Admin\PolitiesComponent;
use App\Http\Livewire\Admin\PostComponent;
use App\Http\Livewire\Admin\SliderComponent;
use App\Http\Livewire\Admin\StatementComponent;
use App\Http\Livewire\Admin\SystemSettingComponent;
use App\Http\Livewire\Admin\TeamComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Social\Admin\MediaEventsComponent;
use App\Http\Livewire\Social\Admin\MediaPostComponent;
use App\Http\Livewire\Social\Admin\UsersComponent;
use App\Http\Livewire\Social\MediaGroups;
use App\Http\Livewire\Social\MediaHomeComponent;
use App\Http\Livewire\Social\MediaMessageComponent;
use App\Http\Livewire\Social\MediaPostsSaved;
use App\Http\Livewire\Social\MediaProfileComponent;
use App\Http\Livewire\Social\MediaSettingProfile;
use App\Http\Middleware\UserBanned;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/login', \App\Http\Livewire\Auth\LoginComponent::class)->name('login');
//Route::get('/register', \App\Http\Livewire\Auth\RegisterComponent::class)->name('register');
Route::get('/register', function (){ return view('errors.404');})->name('register');
Route::get('/send-reset-email', \App\Http\Livewire\Auth\SendResetEmailComponent::class)->name('send-reset-email');
Route::get('/auth/google', [GoogleController::class, 'goToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'goHandleCallback'])->name('auth.callback');

Route::get('/', HomeComponent::class)->name('home');

Route::middleware([UserBanned::class])->group(function () {

    Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::get('/admin/dashboard', DashboardComponent::class)->name('admin.dashboard');
        Route::get('/admin/cycles', CycleComponent::class)->name('admin.cycles');
        Route::get('/admin/documents', DocumentComponent::class)->name('admin.documents');
        Route::get('/admin/statements', StatementComponent::class)->name('admin.statements');
        Route::get('/admin/employments', EmploymentComponent::class)->name('admin.employments');
        Route::get('/admin/posts', PostComponent::class)->name('admin.posts');
        Route::get('/admin/teams', TeamComponent::class)->name('admin.teams');
        Route::get('/admin/website', SystemSettingComponent::class)->name('admin.website');
        Route::get('/admin/sliders', SliderComponent::class)->name('admin.sliders');
        Route::get('/admin/faqs', FaqComponent::class)->name('admin.faq');
        Route::get('/admin/manuals-and-services', ManualsAndServicesComponent::class)->name('admin.manuals-services');

        Route::get('/admin/others/faq-section', FaqSectionComponent::class)->name('admin.faq-section');
        Route::get('/admin/others/privacy-policies', PolitiesComponent::class)->name('admin.privacy-policies');

        Route::get('/admin/users', UsersComponent::class)->name('admin.users');
        Route::get('/admin/media-posts', MediaPostComponent::class)->name('admin.media-post');
        Route::get('/admin/media-events', MediaEventsComponent::class)->name('admin.media-event');
        Route::get('/admin/contact-messages', ContactMessagesComponent::class)->name('admin.contact-messages');
        Route::get('/admin/messenger', ChatTawkComponent::class)->name('admin.chat-tawk');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/social', MediaHomeComponent::class)->name('social.home');
        Route::get('/media-profile/{id?}', MediaProfileComponent::class)->name('social.profile');
        Route::get('/media/settings/profile', MediaSettingProfile::class)->name('social.settings.profile');
        Route::get('/media-saved', MediaPostsSaved::class)->name('social.saved');
        Route::get('/media-groups', MediaGroups::class)->name('social.groups');
        Route::get('/media-chat', MediaMessageComponent::class)->name('social.chat');
    });
});

Route::get('/clear', function () {
    $output = new \Symfony\Component\Console\Output\BufferedOutput();
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('log:clear');
    Artisan::call('optimize:clear', array(), $output);
    return $output->fetch();
})->name('/clear');

Route::get('/clear-temp', function () {

    $path = public_path('assets/livewire-tmp');
    $files = File::files($path);

    foreach ($files as $file) {
        $yesterdayStamp = now()->subHours(12)->timestamp;

        if ($yesterdayStamp > File::lastModified($file)) {
            File::delete($path . '/' . $file->getFilename());
        }
    }

    exec('rm -f ' . public_path('assets/livewire-tmp/*'));
    dd("Temps have been cleared!");
});
