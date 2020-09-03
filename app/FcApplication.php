<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $premise_detail_id
 * @property string $apply_date
 * @property string $type
 * @property string $expiry_date
 * @property string $status
 * @property string $no_siri
 * @property string $created_at
 * @property string $updated_at
 * @property PremiseDetail $premiseDetail
 * @property Document[] $documents
 * @property Inspection[] $inspections
 * @property Notice[] $notices
 * @property Payment[] $payments
 */
class FcApplication extends Model
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
    protected $fillable = ['premise_detail_id', 'apply_date', 'type', 'approved_date', 'expiry_date', 'status', 'no_siri', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function premiseDetail()
    {
        return $this->belongsTo('App\PremiseDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inspections()
    {
        return $this->hasMany('App\Inspection');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notices()
    {
        return $this->hasMany('App\Notice');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
