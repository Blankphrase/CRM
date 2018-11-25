<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;
use App\Meeting;



class MeetingTransformers extends TransformerAbstract
{
    public function transform(Meeting $meeting)
    {
        return [
          'id'=> $meeting->id,
          'account_id' => $meeting->account_id,
          'date' => $meeting->date,
          'location' => $meeting->location,
          'status' =>$meeting->status,
        ];
    }
}