<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
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

    public function show(meeting $meeting)
    {
        $meeting=Meeting::findOrFail($meetingId);


        if (Auth::user()->id !== $meeting->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        return response()->json(['meeting'=> $meeting],200);
        //
    }

    public function index()
    {
        return response()->json(['meetings'=> Auth::user()->meetings],200);
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required']);

        Auth::user()->meetings()->create([
            'name'    => $request->name,
        ]);
        return response()->json(['message' => 'success'], 200);
    }

    public function update(Request $request, $meetingId)
    {
        $this->validate($request,['name'=>'required']);
        $meeting = Meeting::find($meetingId);
        if (Auth::user()->id !== $meeting->user_id) {
            return response()->json(['status' => 'error', 'message' => 'unauthorized'], 401);
        }
        $meeting->update($request->all());
        return response()->json(['message' => 'success', 'meeting' => $meeting], 200);
    }


    public function destroy($id)
    {
        $meeting=Meeting::find($id);
        if(Auth::user()->id !== $meeting->user_id) {
            return response()->json(['status'=>'error','message'=>'unauthorized'],401);
        }
        if (Meeting::destroy($id)) {
            return response()->json(['status' => 'success', 'message' => 'meeting Deleted Successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
    }

    //
}
