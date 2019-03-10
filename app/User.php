<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastName','profilePic','birthdate','role','start','end'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    public function getZona() {
        switch ($this->zona) {
            case 0:
                return 'Zona Norte';
            break;
            case 1:
                return 'Zona Sur';
            break;
            case 2:
                return 'Zona Oeste';
            break;
            case 3:
                return 'Zona Este';
            break;
            case 4:
                return 'Capital federal';
            break;
            default:
                return 'Uknown';
            break;
        }
    }
}
