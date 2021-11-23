<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\MenuContract;
use App\Repositories\MenuRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    
    protected $repositories = [
        MenuContract::class => MenuRepository::class,
        SubMenuContract::class => SubMenuRepository::class,
        OptionMenuContract::class => OptionMenuRepository::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
