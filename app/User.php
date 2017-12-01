<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
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

    protected function getOtherUsers($userid)
    {
        //return $this::all();
        return DB::table('users')
                     ->select('*')
                     ->where('id', '<>', $userid)
                     ->get();        
    }
    protected function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    protected function transactiondetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }    

}
