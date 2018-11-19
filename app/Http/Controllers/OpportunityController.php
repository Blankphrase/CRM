?php

namespace App\Http\Controllers;

use App\Account;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpportunityController extends Controller
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
    public function index($accountId,$contactId)
    {
        $account=Account::find($accountId);
          if (Auth::user()->id !== $account->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        $contact=$account->contacts()->find($contactId);
        return response()->json(['opportunities'=>$contact->opportunities]);
    }
    public function show($accountId,$contactId,$opportunityId)
    {
        $account=Account::find($accountId);
          if (Auth::user()->id !== $account->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        $contact = $account->contacts()->find($contactId);
        $opportunity=$contact->opportunities()->find($opportunityId);
        return response()->json(['status'=>'success','opportunity'=>$opportunity]);
    }
    public function store(Request $request, $accountId,$contactId)
    {
        $this->validate($request,['name'=>'required']);
        $account=account::find($accountId);
        if (Auth::user()->id !== $account->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        $account->contacts()->find($contactId)->opportunities()->create([
            'name'    => $request->name,
        ]);
        return response()->json(['message' => 'success'], 200);
    }
    public function update(Request $request, $accountId,$contactId,$opportunityId)
    {
        $this->validate($request,['name'=>'required']);
        $account = account::find($accountId);
        if (Auth::user()->id !== $account->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        
        $opportunity=$account->contacts()->find($contactId)->opportunities()->find($opportunityId);
        $opportunity->update($request->all());
        return response()->json(['message' => 'success', 'opportunity' => $opportunity], 200);
    }
    public function destroy($accountId,$contactId,$opportunityId)
    {
        $account=account::find($accountId);
        if(Auth::user()->id !== $account->user_id) {
            return response()->json(['status'=>'error','message'=>'unauthorized'],401);
        }
        $opportunity=$account->contacts()->find($contactId)->opportunities()->find($opportunityId);
        if ($opportunity->delete()) {
            return response()->json(['status' => 'success', 'message' => 'opportunity Deleted Successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
    }
}