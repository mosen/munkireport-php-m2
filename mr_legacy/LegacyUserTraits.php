<?php
namespace MrLegacy;


trait LegacyUserTraits
{
    //// RELATIONSHIPS

    /**
     * Retrieve all BusinessUnits that contain this user as either a `manager` or `user` role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function businessUnits()
    {
        return $this->morphMany(
            'Mr\BusinessUnit',
            'businessUnitable',
            'property',
            'value',
            'name'
        );
    }

    //// SCOPES

    /**
     * Retrieve a list of business units where this User has the `manager` role.
     *
     * @param Builder $query Eloquent query builder
     * @return Builder
     */
    public function scopeManagerOfBusinessUnits(Builder $query) {
        $query->joinWhere('business_unit', 'property', '=', BusinessUnit::PROP_MANAGER)
            ->where('value', '=', $this->name);
    }

    /**
     * Retrieve a list of business units where this User has the `user` role.
     *
     * @param Builder $query Eloquent query builder
     * @return Builder
     */
    public function scopeUserOfBusinessUnits(Builder $query) {
        $query->joinWhere('business_unit', 'property', '=', BusinessUnit::PROP_USER)
            ->where('value', '=', $this->name);
    }
}