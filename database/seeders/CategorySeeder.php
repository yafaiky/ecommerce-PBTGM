<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'        => 'Pakaian Pria',
                'slug'        => 'pakaian-pria',
                'description' => 'Koleksi pakaian pria terlengkap dan terjangkau',
                'image'       => null,
            ],
            [
                'name'        => 'Pakaian Wanita',
                'slug'        => 'pakaian-wanita',
                'description' => 'Fashion wanita kekinian dan stylish',
                'image'       => null,
            ],
            [
                'name'        => 'Aksesoris',
                'slug'        => 'aksesoris',
                'description' => 'Aksesoris fashion pelengkap penampilan',
                'image'       => null,
            ],
            [
                'name'        => 'Sepatu & Sandal',
                'slug'        => 'sepatu-sandal',
                'description' => 'Footwear terbaik untuk setiap kegiatan',
                'image'       => null,
            ],
            [
                'name'        => 'Tas',
                'slug'        => 'tas',
                'description' => 'Koleksi tas berkualitas untuk pria dan wanita',
                'image'       => null,
            ],
            [
                'name'        => 'Elektronik',
                'slug'        => 'elektronik',
                'description' => 'Gadget dan elektronik terkini',
                'image'       => null,
            ],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
