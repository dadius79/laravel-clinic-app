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
use App\Contracts\VisitContract;
use App\Repositories\VisitRepository;
use App\Contracts\ConsultationContract;
use App\Repositories\ConsultationRepository;
use App\Contracts\PrescriptionContract;
use App\Repositories\PrescriptionRepository;
use App\Contracts\BillingContract;
use App\Repositories\BillingRepository;
use App\Contracts\PatientContract;
use App\Repositories\PatientRepository;
use App\Contracts\ConsultationFeeContract;
use App\Repositories\ConsultationFeeRepository;
use App\Contracts\AdminContract;
use App\Repositories\AdminRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    
    protected $repositories = [
        MenuContract::class => MenuRepository::class,
        SubMenuContract::class => SubMenuRepository::class,
        OptionMenuContract::class => OptionMenuRepository::class,
        MedicineContract::class => MedicineRepository::class,
        VisitRateContract::class => VisitRateRepository::class,
        PatientContract::class => PatientRepository::class,
        ConsultationFeeContract::class => ConsultationFeeRepository::class,
        VisitContract::class => VisitRepository::class,
        ConsultationContract::class => ConsultationRepository::class,
        PrescriptionContract::class => PrescriptionRepository::class,
        BillingContract::class => BillingRepository::class,
        PatientContract::class => PatientRepository::class,
        AdminContract::class => AdminRepository::class,
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
