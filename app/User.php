<?php

namespace App;

/**
 * User Model
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Model
 */

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use App\Traits\Model\HasUUID;
use App\Contracts\Model\HasUUIDContract;

use App\Traits\User\RequiresConfirmation;
use App\Contracts\User\RequiresConfirmationContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasUUIDContract, RequiresConfirmationContract
{

    use Authenticatable, CanResetPassword, HasUUID, RequiresConfirmation;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'uuid' => 'string',
    ];

    /**
     * The widgets that belong to this user
     *
     * @return \App\User
     */
    public function widgets()
    {
        return $this->belongsToMany('App\Widget', 'user_widget', 'user_id', 'widget_id');
    }

    /**
     * Get widgets
     */
    public function getWidgets()
    {
        return $this->widgets()->get();
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get first name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Subscribe
     */
    public function subscribe()
    {
    }

}
