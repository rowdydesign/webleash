<?php

namespace App;

/**
 * Widget Model
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Model
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Model\HasMeta;
use App\Contracts\Model\HasMetaContract;

use App\Traits\Model\HasUUID;
use App\Contracts\Model\HasUUIDContract;

class Widget extends Model implements HasMetaContract, HasUUIDContract
{
    use HasMeta, HasUUID, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'widgets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'meta'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'uuid' => 'string',
        'meta' => 'array',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The widgets that belong to this user
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsToMany('App\User', 'user_widget', 'widget_id', 'user_id')->first();
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

}
