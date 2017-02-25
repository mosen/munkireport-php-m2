<?php

namespace Mr;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name'
    ];

    //// RELATIONSHIPS

    /**
     * Fetch the users that are a member of this group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsToMany('Mr\User');
    }
}
