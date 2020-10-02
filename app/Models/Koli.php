<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Koli extends Model
{
    protected $collection = 'koli_data';

    protected $fillable = [
        "koli_length",
        "awb_url",
        "created_at",
        "koli_chargeable_weight",
        "koli_width",
        "koli_surcharge",
        "koli_description",
        "koli_formula_id",
        "connote_id",
        "koli_volume",
        "koli_weight",
        "koli_custom_field",
        "koli_code",
    ];
}
