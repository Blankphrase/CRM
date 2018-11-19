<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Account $account)
    {
        $account=Account::findOrFail($accountId);


        if (Auth::user()->id !== $account->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        return response()->json(['account'=> $account],200);
        //
    }

    public function index()
    {
        return response()->json(['accounts'=> Auth::user()->accounts],200);
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required']);

        Auth::user()->accounts()->create([
            'name'    => $request->name,
        ]);
        return response()->json(['message' => 'success'], 200);
    }

    public function update(Request $request, $accountId)
    {
        $this->validate($request,['name'=>'required']);
        $account = Account::find($accountId);
        if (Auth::user()->id !== $account->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        $account->update($request->all());
        return response()->json(['message' => 'success', 'account' => $account], 200);
    }


    public function destroy($id)
    {
        $account=Account::find($id);
        if(Auth::user()->id !== $account->user_id) {
            return response()->json(['status'=>'error','message'=>'unauthorized'],401);
        }
        if (Account::destroy($id)) {
            return response()->json(['status' => 'success', 'message' => 'Account Deleted Successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
    }

    //
}
