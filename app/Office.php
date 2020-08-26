<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $city_id
 * @property integer $zone_id
 * @property string $name
 * @property string $address_1
 * @property string $address_2
 * @property int $postcode
 * @property string $created_at
 * @property string $updated_at
 * @property City $city
 * @property Zone $zone
 * @property PremiseDetail[] $premiseDetails
 */
class Office extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['city_id', 'zone_id', 'name', 'address_1', 'address_2', 'postcode', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function premiseDetails()
    {
        return $this->hasMany('App\PremiseDetail');
    }
}
