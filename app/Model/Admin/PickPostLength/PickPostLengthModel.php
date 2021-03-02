<?php

namespace App\Model\Admin\PickPostLength;

use Illuminate\Database\Eloquent\Model;

class PickPostLengthModel extends Model
{
    //

    protected $table = "pick_post_length_tbls";

    protected $fillable =[
        'posts_length', 'price_details', 'img_file', 'admin_action', 'created_at', 'updated_at'
    ];
}
