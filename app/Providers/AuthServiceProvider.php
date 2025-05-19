<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Medicine;
use App\Policies\MedicinePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Medicine::class => MedicinePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
