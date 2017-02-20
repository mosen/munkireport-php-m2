<?php

namespace Mr;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * TODO: Placeholder method to evaluate whether this user model has a particular role.
     *
     * @param $name
     * @return bool
     */
    public function hasRole($name) {
        return true;
    }


    //// RELATIONSHIPS

    //// SCOPES

    /**
     * Retrieve a list of business units where this User has the `manager` role.
     *
     * @param Builder $query Eloquent query builder
     */
    public function scopeManagerOfBusinessUnits(Builder $query) {
        $query->joinWhere('business_unit', 'property', '=', BusinessUnit::PROP_MANAGER)
            ->where('value', '=', $this->name);
    }

    /**
     * Retrieve a list of business units where this User has the `user` role.
     *
     * @param Builder $query Eloquent query builder
     */
    public function scopeUserOfBusinessUnits(Builder $query) {
        $query->joinWhere('business_unit', 'property', '=', BusinessUnit::PROP_USER)
            ->where('value', '=', $this->name);
    }
}
