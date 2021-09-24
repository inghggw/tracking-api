<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Path contracts of UseCases
     *
     * @var string
     */
    protected $namespaceContract = 'App\UseCases\Contracts';

    /**
     * Path of UseCases
     *
     * @var string
     */
    protected $namespaceUsecase = 'App\UseCases';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $path = app_path('UseCases/Contracts/');

        foreach (glob($path . '/*.php') as $file) {
            $contract = basename($file, ".php");
            $usecase = Str::before($contract, 'Interface') . 'Usecase';

            $this->app->bind(
                $this->namespaceContract . '\\' . $contract,
                $this->namespaceUsecase . '\\' . $usecase
            );
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
