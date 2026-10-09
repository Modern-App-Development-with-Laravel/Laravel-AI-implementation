<?php

namespace Italofantone\Tutor;

use Illuminate\Support\ServiceProvider;
use Italofantone\Tutor\Livewire\Chat;
use Livewire\Livewire;

class TutorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

        $this->loadViewsFrom(__DIR__.'/Views', 'tutor');

        Livewire::component('chat', Chat::class);
    }
}
