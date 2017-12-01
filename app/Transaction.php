<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use App\TransactionDetail;

class Transaction extends Model
{

    //
	public function createTransaction($sender,$reciever_list,$amount_sent)
	{

		$this->user_id	=	$sender;
		$this->amount =	$amount_sent*count($reciever_list);
		$this->save();

		foreach ($reciever_list as $user) {
			$transactionDetail =	 new TransactionDetail();
			$transactionDetail->amount =	$amount_sent;
			$transactionDetail->user_id =	$user;
			$transactionDetail->transaction_id =	$this->id;
			$transactionDetail->save();

			$usr = User::find($user);
			$usr->vc = $usr->vc + $amount_sent;
			$usr->save();

			$transactionDetail->user->notify(new Notifications\TransactionAlerts($transactionDetail));
		}
		
	}
    protected function transactiondetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }    
    protected function user()
    {
        return $this->belongsTo(User::class);
    }    

}
