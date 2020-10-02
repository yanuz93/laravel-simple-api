<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
class Package extends Model
{
    // use HasFactory;

    protected $collection = 'packages';

    // protected $primaryKey = 'transaction_id';

    protected $fillable = [
        // "transaction_id",
        "connote_id",
        "customer_name",
        "customer_code",
        "transaction_amount",
        "transaction_discount",
        "transaction_additional_field",
        "transaction_payment_type",
        "transaction_state",
        "transaction_code",
        "transaction_order",
        "location_id",
        "organization_id",
        "transaction_payment_type_name",
        "transaction_cash_amount",
        "transaction_cash_change",
        "customer_attribute",
        "origin_data",
        "destination_data",
    ];

    protected $with = ['connote'];

    public function connote()
    {
        return $this->belongsTo(Connote::class, 'connote_id', '_id');
    }

}
