<?php

namespace App\Http\Controllers;

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
    public function index($contactId)
    {
        
        $contact=contacts()->find($contactId);

        return response()->json(['opportunities'=>$contact->opportunities]);
    }
    public function show($contactId,$opportunityId)
    {
    
        $contact = contacts()->find($contactId);
        $opportunity=$contact->opportunities()->find($opportunityId);
        return response()->json(['status'=>'success','opportunity'=>$opportunity]);
    }
    public function store(Request $request, $contactId)
    {
        $this->validate($request,['name'=>'required']);
        
        $contact->contacts()->find($contactId)->opportunities()->create([
            'name'    => $request->name,
        ]);
        return response()->json(['message' => 'success'], 200);
    }
    public function update(Request $request, $contactId,$opportunityId)
    {
        $this->validate($request,['name'=>'required']);
        
        $opportunity=$contact->contacts()->find($contactId)->opportunities()->find($opportunityId);
        $opportunity->update($request->all());
        return response()->json(['message' => 'success', 'opportunity' => $opportunity], 200);
    }
    public function destroy($contactId,$opportunityId)
    {
        $contact=contact::find($contactId);
        
        $opportunity=$contact->contacts()->find($contactId)->opportunities()->find($opportunityId);
        if ($opportunity->delete()) {
            return response()->json(['status' => 'success', 'message' => 'opportunity Deleted Successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
    }
}