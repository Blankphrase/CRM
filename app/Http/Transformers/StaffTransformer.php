<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;
use App\Staff;



class StaffTransformers extends TransformerAbstract
{
    public function transform(Staff $staff)
    {
        return [
          'id'=> $staff->id,
          'account_id' => $staff->account_id,
          'staff' => $staff->staff,
          'user_id' => $staff->user_id,
        ];
    }
}