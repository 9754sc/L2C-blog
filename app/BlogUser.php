<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class BlogUser extends Authenticatable
{
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

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function addNewUser()
    {
        $result = DB::table('users')->insert([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        return $result;
    }
}
