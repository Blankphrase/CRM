<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;
use App\Message;



class MessageTransformers extends TransformerAbstract
{
    public function transform(Message $message)
    {
        return [
          'id'=> $message->id,
          'account_id' => $message->account_id,
          'receiver' => $message->receiver,
          'date' => $message->date,
          'message' =>$message->message,
        ];
    }
}