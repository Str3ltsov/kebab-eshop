<?php

namespace App\Providers;

use App\Services\AttributeService;
use App\Services\AttributeValueService;
use App\Services\IAttributeService;
use App\Services\IAttributeValueService;
use App\Services\IProductAttributeValueService;
use App\Services\ProductAttributeValueService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IAttributeService::class, AttributeService::class);
        $this->app->bind(IAttributeValueService::class, AttributeValueService::class);
        $this->app->bind(IProductAttributeValueService::class, ProductAttributeValueService::class);
    }

    public function boot()
    {
        //
    }
}
