<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Setting;
use App\Models\Visitor;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use App\View\Composers\FooterComposer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(!App::runningInConsole()){
            $settings = Setting::pluck('value', 'key')->toArray();

            $settings['appLogoUrl'] = isset($settings['appLogo'])
                ? (Storage::disk('public')->exists($settings['appLogo'])
                    ? Storage::url($settings['appLogo'])
                    : '/assets/admin/images/logo-home.png')
                : '/assets/admin/images/logo-home.png';

            $settings['jdihnLogoUrl'] = isset($settings['jdihnLogo'])
                ? (Storage::disk('public')->exists($settings['jdihnLogo'])
                    ? Storage::url($settings['jdihnLogo'])
                    : '/assets/admin/images/logo-home.png')
                : '/assets/admin/images/logo-home.png';

            $settings['fullAddress'] = implode(', ', [
                $settings['address'],
                $settings['city'],
                $settings['district'],
                $settings['regency'],
                $settings['province']
            ]);

            View::share($settings);

            View::composer(
                ['jdih.layouts.footer', 'jdih.legislation.leftbar'],
                FooterComposer::class
            );

            View::composer('jdih.layouts.footer', function ($view) {
                $todayVisitor = Visitor::countDaily()->get()->count();
                $yesterdayVisitor = Visitor::countDaily(1)->get()->count();
                $lastWeekVisitor = Visitor::countWeekly()->get()->count();
                $lastMonthVisitor = Visitor::countMonthly()->get()->count();
                $allVisitor = Visitor::countAll()->get()->count();

                $welcome = Post::whereSlug('selamat-datang')->first();

                return $view->with('todayVisitor', $todayVisitor)
                    ->with('yesterdayVisitor', $yesterdayVisitor)
                    ->with('lastWeekVisitor', $lastWeekVisitor)
                    ->with('lastMonthVisitor', $lastMonthVisitor)
                    ->with('allVisitor', $allVisitor)
                    ->with('welcome', $welcome);
            });
        }

    }
}
