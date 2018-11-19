<?php

namespace App\Http\Controllers;

use App\Account;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
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
    public function index($accountId)
    {
        $account=Account::find($accountId);
          if (Auth::user()->id !== $account->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        return response()->json(['contacts'=>$account->contacts]);
    }
    public function show($accountId,$contactId)
    {
        $account=Account::find($accountId);
          if (Auth::user()->id !== $account->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        $contact = $account->contacts()->find($contactId);
        return response()->json(['status'=>'success','contact'=>$contact]);
    }
    public function store(Request $request, $accountId)
    {
        $this->validate($request,['name'=>'required']);
        $account=Account::find($accountId);
        if (Auth::user()->id !== $account->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        $account->contacts()->create([
            'name'    => $request->name,
        ]);
        return response()->json(['message' => 'success'], 200);
    }
    public function update(Request $request, $accountId,$contactId)
    {
        $this->validate($request,['name'=>'required']);
        $account = Account::find($accountId);
        if (Auth::user()->id !== $account->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        $account->update($request->all());
        return response()->json(['message' => 'success', 'account' => $account], 200);
    }
    public function destroy($accountId,$contactId)
    {
        $account=Account::find($accountId);
        if(Auth::user()->id !== $account->user_id) {
            return response()->json(['status'=>'error','message'=>'unauthorized'],401);
        }
        $contact=$account->contacts()->find($contactId);
        if ($contact->delete()) {
            return response()->json(['status' => 'success', 'message' => 'contact Deleted Successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
    }
}