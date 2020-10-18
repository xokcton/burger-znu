<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'text'        => 'Categories',
                'url'         => '/admin/category',
                'label'       => \App\Category::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Products',
                'url'         => '/admin/product',
                'label'       => \App\Product::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Slider',
                'url'         => '/admin/slider',
                'label'       => \App\Slider::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Reviews',
                'url'         => '/admin/review',
                'label'       => \App\Review::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Questions',
                'url'         => '/admin/question',
                'label'       => \App\Question::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Calls',
                'url'         => '/admin/call',
                'label'       => \App\Call::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Orders',
                'url'         => '/admin/order',
                'label'       => \App\Order::count(),
                'label_color' => 'success',
            ]);
        });
    }
}
