<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\BookingRepositoryInterface;
use App\Interfaces\BookingStatusRepositoryInterface;
use App\Interfaces\ManufacturerRepositoryInterface;
use App\Interfaces\VehicleModelRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\VehicleCategoryRepositoryInterface;
use App\Interfaces\VehicleRepositoryInterface;
use App\Repositories\BookingRepository;
use App\Repositories\BookingStatusRepository;
use App\Repositories\VehicleModelRepository;
use App\Repositories\ManufacturerRepository;
use App\Repositories\UserRepository;
use App\Repositories\VehicleRepository;
use App\Repositories\VehicleCategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(BookingStatusRepositoryInterface::class, BookingStatusRepository::class);
        $this->app->bind(VehicleModelRepositoryInterface::class, VehicleModelRepository::class);
        $this->app->bind(ManufacturerRepositoryInterface::class, ManufacturerRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(VehicleCategoryRepositoryInterface::class, VehicleCategoryRepository::class);
        $this->app->bind(VehicleRepositoryInterface::class, VehicleRepository::class);
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
