<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "location_id" => Str::random(10),
            "connote_id" => Str::random(20),
            "organization_id" => rand(1, 1000),
            "transaction_id" => rand(1, 10000000),
            "customer_name" => $this->faker->company,
            "customer_code" => rand(10000000000, 10000000000000),
            "transaction_amount" => rand(10000, 10000000000000),
            "transaction_discount" => rand(0, 10000000),
            "transaction_additional_field" => Str::random(),
            "transaction_payment_type" => rand(1, 50),
            "transaction_state" => Str::random(6),
            "transaction_code" => Str::random(),
            "transaction_order" => rand(1, 1000000000),
            "transaction_cash_amount" => rand(10000, 10000000000000),
            "transaction_cash_change" => rand(10000, 10000000000000),
            "transaction_payment_type_name" => Str::random(),
            'destination_data' => Str::random(),
            'origin_data' => Str::random(),
        ];
    }
}
