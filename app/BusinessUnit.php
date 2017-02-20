<?php

namespace Mr;

use Illuminate\Database\Eloquent\Model;

class BusinessUnit extends Model
{
    protected $fillable = [
        'name',
        'address',
        'link'
    ];

    //// RELATIONSHIPS

    /**
     * Retrieve a list of members of this business unit (managers and users).
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members() {
        return $this->belongsToMany('Mr\User');
    }

    /**
     * Retrieve users who are managers of this business unit.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function managers() {
        return $this->members()->wherePivot('role', 'manager');
    }

    /**
     * Retrieve users who are basic users in this business unit.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->members()->wherePivot('role', 'user');
    }
}
