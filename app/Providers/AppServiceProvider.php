<?php

namespace App\Providers;

use App\Models\course_finderModel;
use App\Models\User;
use App\Models\NotificationModel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
   public function boot()
    {

    View::composer('*', function ($view) {
            $courses = course_finderModel::where('status', 1)->get();
            $view->with('course_finder', $courses);
        });


   View::composer('*', function ($view) {
    $user = auth()->user();
    $notifications = $user ? $user->notifications : [];

    $readNotifications = collect([]);
    $unreadNotifications = collect([]);

    foreach ($notifications as $notification) {
        if ($notification->read_at === null) {
            $unreadNotifications->push($notification);
        } else {
            $readNotifications->push($notification);
        }
    }

    $view->with('readNotifications', $readNotifications);
    $view->with('unreadNotifications', $unreadNotifications);
});

    View::composer('*', function ($view) {
            $application_status_unread = NotificationModel::where('read_at',null)->get();
            $view->with('application_status_unread', $application_status_unread);
        });

}

}
