<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;

    use Notifiable;

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

    public function roles(){
        return $this->belongsToMany('\App\Role');
    }

    public function posts(){
        return $this->hasMany('\App\Post');
    }

    public function themes(){
        return $this->hasMany('\App\Theme');
    }

    public function setPasswordAttribute($value) {
        return $this->attributes['password'] = bcrypt($value);
    }

    public function hasRole($role_name)
    {
        foreach ($this->roles as $role){

            if ($role->name == $role_name)
                return true;
        }
        return false;
    }
}


//Source for password function: https://laracasts.com/discuss/channels/laravel/hashing-passwords-when-registering-users
//Source for hasRole functions: https://stackoverflow.com/questions/61887940/how-to-check-user-role-and-show-select-option-in-laravel
