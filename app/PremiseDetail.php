<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $city_id
 * @property integer $premise_type_id
 * @property integer $premise_category_id
 * @property integer $office_id
 * @property string $name
 * @property string $address_1
 * @property string $address_2
 * @property int $postcode
 * @property string $phone_number
 * @property string $fax_number
 * @property boolean $ert
 * @property string $pic_name
 * @property string $pic_phone
 * @property string $fc_name
 * @property string $fc_phone
 * @property string $created_at
 * @property string $updated_at
 * @property City $city
 * @property Office $office
 * @property PremiseCategory $premiseCategory
 * @property PremiseType $premiseType
 */
class PremiseDetail extends Model
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
    protected $fillable = ['city_id', 'premise_type_id', 'premise_category_id', 'office_id', 'name', 'address_1', 'address_2', 'postcode', 'phone_number', 'fax_number', 'ert', 'pic_name', 'pic_phone', 'fc_name', 'fc_phone', 'created_at', 'updated_at'];

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
    public function office()
    {
        return $this->belongsTo('App\Office');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function premiseCategory()
    {
        return $this->belongsTo('App\PremiseCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function premiseType()
    {
        return $this->belongsTo('App\PremiseType');
    }
}
