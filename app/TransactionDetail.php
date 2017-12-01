<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = ['amount', 'user_id', 'transaction_id'];

    //
    protected function transaction()
    {
   		return $this->belongsTo(Transaction::class);
    }    
    protected function user()
    {
        return $this->belongsTo(User::class);
    }    
}
