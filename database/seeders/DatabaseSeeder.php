<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Item;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            ItemSeeder::class,
        ]);
        // fakerを使ったダミーデータを1000件生成
        Customer::factory(1000)->create();

        // $itemsに全件のItemモデルを代入
        $items = Item::all();

        Purchase::factory(100)->create()
        ->each(function(Purchase $purchase)use ($items){
            // 中間テーブルにデータを挿入
            $purchase->items()->attach(
                $items->random(rand(1, 3))->pluck('id')->toArray(),
                ['quantity' => rand(1, 5)]
            );
        });


    }
}
