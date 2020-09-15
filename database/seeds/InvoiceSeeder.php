<?php

use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i<= 100; $i++) {
            $status = rand(0, 2);
            $emission = rand(0,-90);

            DB::table('invoices')->insert([
                'user_id' => rand(1, 2),
                'value' => rand(10, 800),
                'emission' => now()->addDays($emission),
                'due' => now()->addDays($emission+30),
                'status' => $status
            ]);
        }
    }
}
