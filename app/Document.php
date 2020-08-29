<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $fc_application_id
 * @property string $description
 * @property string $doc_path
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 * @property FcApplication $fcApplication
 */
class Document extends Model
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
    protected $fillable = ['fc_application_id', 'description', 'doc_path', 'type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fcApplication()
    {
        return $this->belongsTo('App\FcApplication');
    }
}
