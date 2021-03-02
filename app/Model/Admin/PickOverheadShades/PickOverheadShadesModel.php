<?php

namespace App\Model\Admin\PickOverheadShades;

use Illuminate\Database\Eloquent\Model;

class PickOverheadShadesModel extends Model
{
    //

    protected $table = "pick_overhead_shades_tbls";

    protected $fillable = [
        'img_standard_name', 'price_details', 'img_file', 'admin_action', 'created_at', 'updated_at'
    ];
}
