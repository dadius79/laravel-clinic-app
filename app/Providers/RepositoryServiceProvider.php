<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\MenuContract;
use App\Repositories\MenuRepository;
use App\Contracts\SubMenuContract;
use App\Repositories\SubMenuRepository;
use App\Contracts\OptionMenuContract;
use App\Repositories\OptionMenuRepository;
use App\Contracts\MedicineContract;
use App\Repositories\MedicineRepository;
use App\Contracts\VisitRateContract;
use App\Repositories\VisitRateRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    
    protected $repositories = [
        MenuContract::class => MenuRepository::class,
        SubMenuContract::class => SubMenuRepository::class,
        OptionMenuContract::class => OptionMenuRepository::class,
        MedicineContract::class => MedicineRepository::class,
        VisitRateContract::class => VisitRateRepository::class,
        PatientContract::class => PatientRepository::class,
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
