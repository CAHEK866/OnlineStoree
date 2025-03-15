<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_name' => 'Шоколадный торт',
                'price' => 2000,
            ],
            [
                'product_name' => 'Торт Наполеон',
                'price' => 2500,
            ],
            [
                'product_name' => 'Красный бархат',
                'price' => 3000,
            ],
            [
                'product_name' => 'Торт Медовик',
                'price' => 2200,
            ],
            [
                'product_name' => 'Торт Муравейник',
                'price' => 1800,
            ],
            [
                'product_name' => 'Торт Птичье молоко',
                'price' => 2600,
            ],
            [
                'product_name' => 'Торт Черный лес',
                'price' => 3500,
            ],
            [
                'product_name' => 'Торт Тирамису',
                'price' => 2900,
            ],
            [
                'product_name' => 'Торт Raffaello',
                'price' => 2700,
            ],
            [
                'product_name' => 'Торт Морковный',
                'price' => 2300,
            ],
            [
                'product_name' => 'Торт Наполеон с клубникой',
                'price' => 2800,
            ],
            [
                'product_name' => 'Торт Вишневый',
                'price' => 2500,
            ],
            [
                'product_name' => 'Торт Кокосовый',
                'price' => 2200,
            ],
            [
                'product_name' => 'Торт Профитроли',
                'price' => 3000,
            ],
            [
                'product_name' => 'Торт Ванильный',
                'price' => 2100,
            ],
            [
                'product_name' => 'Торт Сметанник',
                'price' => 2400,
            ],
            [
                'product_name' => 'Торт Сказка',
                'price' => 3200,
            ],
            [
                'product_name' => 'Торт Черничный',
                'price' => 3300,
            ],
            [
                'product_name' => 'Торт Фисташковый',
                'price' => 3400,
            ],
            [
                'product_name' => 'Торт Карамельный',
                'price' => 2100,
            ],
            [
                'product_name' => 'Торт Шоколадно-ореховый',
                'price' => 2800,
            ],
            [
                'product_name' => 'Торт Черный шоколад',
                'price' => 3500,
            ],
            [
                'product_name' => 'Торт Клубничный',
                'price' => 2600,
            ],
            [
                'product_name' => 'Торт Карамельный с орехами',
                'price' => 3300,
            ],
            [
                'product_name' => 'Торт Тарталетки',
                'price' => 2000,
            ],
        ]);
    }

}
