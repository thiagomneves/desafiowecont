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
        DB::table('invoices')->insert([
            'user_id' => '1',
            'products' => 'caneta',
            'value' => 50.00,
            'emission' => now(),
            'due' => now()->addDays(30),
        ]);
    }
}
