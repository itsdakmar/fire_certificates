<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $fc_application_id
 * @property string $inspect_date
 * @property string $inspect_time
 * @property string $created_at
 * @property string $updated_at
 * @property FcApplication $fcApplication
 * @property InspectionIssue[] $inspectionIssues
 * @property InspectionPostpone[] $inspectionPostpones
 */
class Inspection extends Model
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
    protected $fillable = ['fc_application_id', 'inspect_date', 'inspect_time', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fcApplication()
    {
        return $this->belongsTo('App\FcApplication');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inspectionIssues()
    {
        return $this->hasMany('App\InspectionIssue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inspectionPostpones()
    {
        return $this->hasMany('App\InspectionPostpone');
    }
}
