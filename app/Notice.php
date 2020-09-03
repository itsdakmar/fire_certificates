<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $fc_application_id
 * @property string $notice_date
 * @property string $total_payment
 * @property string $created_at
 * @property string $updated_at
 * @property FcApplication $fcApplication
 */
class Notice extends Model
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
    protected $fillable = ['fc_application_id', 'notice_date', 'total_payment', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fcApplication()
    {
        return $this->belongsTo('App\FcApplication');
    }
}
