<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
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

    public function show(message $message)
    {
        $message=message::findOrFail($messageId);


        if (Auth::user()->id !== $message->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        return response()->json(['message'=> $message],200);
        //
    }

    public function index()
    {
        return response()->json(['messages'=> Auth::user()->messages],200);
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required']);

        Auth::user()->messages()->create([
            'name'    => $request->name,
        ]);
        return response()->json(['message' => 'success'], 200);
    }

    public function update(Request $request, $messageId)
    {
        $this->validate($request,['name'=>'required']);
        $message = Message::find($messageId);
        if (Auth::user()->id !== $message->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        $message->update($request->all());
        return response()->json(['message' => 'success', 'message' => $message], 200);
    }


    public function destroy($id)
    {
        $message=Message::find($id);
        if(Auth::user()->id !== $message->user_id) {
            return response()->json(['status'=>'error','message'=>'unauthorized'],401);
        }
        if (Message::destroy($id)) {
            return response()->json(['status' => 'success', 'message' => 'message Deleted Successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
    }

    //
}
