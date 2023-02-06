<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = config('tech_in_touch_seeder.plans');
        foreach ($plans as $plan) {
            $new_plan = new Plan();
            $new_plan->name = $plan['name'];
            $new_plan->price = $plan['price'];
            $new_plan->price_sign = $plan['price_sign'];
            $new_plan->duration = $plan['duration'];

            $new_plan->save();
        }
    }
}
