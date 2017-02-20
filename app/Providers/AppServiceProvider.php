<?php
namespace Mr\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Apply the relationship morph map necessary for use of polymorphic relations in MachineGroup and
     * BusinessUnit.
     */
    protected function applyMorphMap()
    {
        Relation::morphMap([
            'manager' => 'Mr\User',
            'user' => 'Mr\User',
            'machine_group' => 'Mr\MachineGroup'
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->applyMorphMap();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
