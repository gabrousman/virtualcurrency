<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use App\TransactionDetail;




class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  
    }
    //Page Post back on this action.
    public function moneysent()
    {

        //
        $this->validate(request(),[
            'AmountPerUser' => 'required|numeric',
            'UsersList' => 'required'
        ]);

        $user = User::find(auth()->id());
        $totalAmount    =   count(request('UsersList'))*request('AmountPerUser');
        if ($user->vc  >= $totalAmount)
        {  
            $transaction = new Transaction;
            $transaction->createTransaction(auth()->id(),request('UsersList'),request('AmountPerUser'));

            $user->vc = $user->vc - $totalAmount;
            $user->save();
            

        }
        else{
            
            die ('Not have enough funds.<a href="/sendmoney">Try again</a>');
        }

        return redirect('/transactions');

    }
    //List All Transactions
    public function list()
    {
        $transactions =    Transaction::orderBy("id",'desc')->where('user_id', '=', auth()->id())->get();

	    return view('transactions.list', compact('transactions'));

    }

    //List All Transaction Details recieved by user.
    public function moneyrecieved()
    {
        $transaction_details =    TransactionDetail::orderBy("id",'desc')->where('user_id', '=', auth()->id())->get();

        return view('transactions.moneyrecieved', compact('transaction_details'));

    }
    //Money Form
    public function sendmoney()
    {
        $usr = User::find(auth()->id());
        //load all users.
        $users =    User::getOtherUsers(auth()->id());

    	//load view.
	    return view('transactions.sendmoney', compact('users','usr'));

    	# code...
    }

    //
    public function MarkNotifications()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }
}
