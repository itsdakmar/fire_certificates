<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $premise_type_id
 * @property integer $premise_category_id
 * @property integer $office_id
 * @property string $name
 * @property string $address
 * @property string $phone_number
 * @property string $fax_number
 * @property boolean $ert
 * @property string $pic_name
 * @property string $pic_phone
 * @property string $fc_name
 * @property string $fc_phone
 * @property string $created_at
 * @property string $updated_at
 * @property Office $office
 * @property PremiseCategory $premiseCategory
 * @property PremiseType $premiseType
 * @property FcApplication[] $fcApplications
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
    protected $fillable = ['no_fail','premise_type_id', 'premise_category_id', 'office_id', 'name', 'address', 'phone_number', 'fax_number', 'ert', 'pic_name', 'pic_phone', 'fc_name', 'fc_phone', 'created_at', 'updated_at'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fcApplications()
    {
        return $this->hasMany('App\FcApplication', 'premis_detail_id');
    }
}
