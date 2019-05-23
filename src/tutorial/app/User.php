<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomPasswordReset;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use MustVerifyEmail, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * is Admin?
     *
     * @param number $id User ID
     * @return bool
     */
    public function isAdmin($id=null)
    {
        $id = ($id) ? $id : $this->id;
        return ( $id == config('admin_id') );
    }
    
    /**
     * Relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post')->latest();
    }
    
    /**
     * Notification password reset
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify( new CustomPasswordReset( $token ) );
    }
    
    /**
     * Notification verify email
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify( new CustomVerifyEmail() );
    }
}
