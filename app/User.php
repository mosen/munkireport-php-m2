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
     * Retrieve business units where this user is a member (manager or normal user).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function memberOfBusinessUnits() {
        return $this->belongsToMany('Mr\BusinessUnit');
    }

    /**
     * Retrieve business units where this user is a manager of the business unit.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function managerOfBusinessUnits() {
        return $this->memberOfBusinessUnits()->wherePivot('role', 'manager');
    }

    /**
     * Retrieve business units where this user has a basic user role in the business
     * unit.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userOfBusinessUnits() {
        return $this->memberOfBusinessUnits()->wherePivot('role', 'user');
    }
    
    /**
     * Get the group(s) that this user is a member of.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups() {
        return $this->belongsToMany('Mr\Group');
    }
}
