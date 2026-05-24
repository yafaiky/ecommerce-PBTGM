<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $pria      = Category::where('slug', 'pakaian-pria')->first();
        $wanita    = Category::where('slug', 'pakaian-wanita')->first();
        $aksesoris = Category::where('slug', 'aksesoris')->first();
        $sepatu    = Category::where('slug', 'sepatu-sandal')->first();
        $tas       = Category::where('slug', 'tas')->first();
        $elektronik = Category::where('slug', 'elektronik')->first();

        $products = [
            // Pakaian Pria
            [
                'name'           => 'Kaos Polos Premium PBTGM',
                'slug'           => 'kaos-polos-premium-pbtgm',
                'description'    => 'Kaos polos premium bahan cotton combed 30s, nyaman dipakai sepanjang hari. Tersedia dalam berbagai warna pilihan.',
                'price'          => 89000,
                'original_price' => 120000,
                'stock'          => 150,
                'category_id'    => $pria?->id ?? 1,
                'is_featured'    => true,
                'is_active'      => true,
            ],
            [
                'name'           => 'Kemeja Flannel Oversize',
                'slug'           => 'kemeja-flannel-oversize',
                'description'    => 'Kemeja flannel oversize dengan bahan tebal dan hangat. Cocok untuk gaya kasual maupun semi-formal.',
                'price'          => 185000,
                'original_price' => 250000,
                'stock'          => 80,
                'category_id'    => $pria?->id ?? 1,
                'is_featured'    => true,
                'is_active'      => true,
            ],
            [
                'name'           => 'Celana Chino Slim Fit',
                'slug'           => 'celana-chino-slim-fit',
                'description'    => 'Celana chino slim fit bahan twill premium. Tampil rapi dan stylish untuk berbagai kesempatan.',
                'price'          => 175000,
                'original_price' => 220000,
                'stock'          => 100,
                'category_id'    => $pria?->id ?? 1,
                'is_featured'    => false,
                'is_active'      => true,
            ],
            [
                'name'           => 'Polo Shirt PBTGM Edition',
                'slug'           => 'polo-shirt-pbtgm-edition',
                'description'    => 'Polo shirt eksklusif edisi PBTGM dengan bahan lacoste berkualitas tinggi. Tampil profesional dan elegan.',
                'price'          => 135000,
                'original_price' => 165000,
                'stock'          => 60,
                'category_id'    => $pria?->id ?? 1,
                'is_featured'    => true,
                'is_active'      => true,
            ],
            // Pakaian Wanita
            [
                'name'           => 'Dress Casual Floral',
                'slug'           => 'dress-casual-floral',
                'description'    => 'Dress casual bermotif floral yang cantik dan elegan. Bahan rayon yang adem dan nyaman dipakai.',
                'price'          => 145000,
                'original_price' => 195000,
                'stock'          => 90,
                'category_id'    => $wanita?->id ?? 2,
                'is_featured'    => true,
                'is_active'      => true,
            ],
            [
                'name'           => 'Blouse Aesthetic Wanita',
                'slug'           => 'blouse-aesthetic-wanita',
                'description'    => 'Blouse aesthetic dengan desain modern dan elegan. Cocok untuk kerja, hangout, maupun acara formal.',
                'price'          => 115000,
                'original_price' => 150000,
                'stock'          => 120,
                'category_id'    => $wanita?->id ?? 2,
                'is_featured'    => true,
                'is_active'      => true,
            ],
            [
                'name'           => 'Rok Plisket Premium',
                'slug'           => 'rok-plisket-premium',
                'description'    => 'Rok plisket premium dengan bahan berkualitas, jatuh sempurna di tubuh. Tersedia dalam berbagai warna.',
                'price'          => 99000,
                'original_price' => 135000,
                'stock'          => 75,
                'category_id'    => $wanita?->id ?? 2,
                'is_featured'    => false,
                'is_active'      => true,
            ],
            // Aksesoris
            [
                'name'           => 'Topi Bucket Hat PBTGM',
                'slug'           => 'topi-bucket-hat-pbtgm',
                'description'    => 'Topi bucket hat dengan logo PBTGM. Bahan canvas berkualitas dengan desain yang trendi.',
                'price'          => 65000,
                'original_price' => 85000,
                'stock'          => 200,
                'category_id'    => $aksesoris?->id ?? 3,
                'is_featured'    => true,
                'is_active'      => true,
            ],
            [
                'name'           => 'Jam Tangan Casual Pria',
                'slug'           => 'jam-tangan-casual-pria',
                'description'    => 'Jam tangan casual pria dengan desain minimalis. Water resistant dan tahan lama untuk aktivitas sehari-hari.',
                'price'          => 299000,
                'original_price' => 399000,
                'stock'          => 45,
                'category_id'    => $aksesoris?->id ?? 3,
                'is_featured'    => true,
                'is_active'      => true,
            ],
            [
                'name'           => 'Kacamata Hitam UV400',
                'slug'           => 'kacamata-hitam-uv400',
                'description'    => 'Kacamata hitam dengan perlindungan UV400. Gaya dan melindungi mata dari sinar matahari.',
                'price'          => 75000,
                'original_price' => 95000,
                'stock'          => 80,
                'category_id'    => $aksesoris?->id ?? 3,
                'is_featured'    => false,
                'is_active'      => true,
            ],
            // Sepatu
            [
                'name'           => 'Sneakers Casual PBTGM',
                'slug'           => 'sneakers-casual-pbtgm',
                'description'    => 'Sneakers kasual dengan desain modern dan sol yang nyaman. Cocok untuk penggunaan sehari-hari.',
                'price'          => 285000,
                'original_price' => 350000,
                'stock'          => 55,
                'category_id'    => $sepatu?->id ?? 4,
                'is_featured'    => true,
                'is_active'      => true,
            ],
            [
                'name'           => 'Sandal Slide Premium',
                'slug'           => 'sandal-slide-premium',
                'description'    => 'Sandal slide premium dengan bahan EVA berkualitas. Ringan, nyaman, dan tahan lama.',
                'price'          => 85000,
                'original_price' => 110000,
                'stock'          => 130,
                'category_id'    => $sepatu?->id ?? 4,
                'is_featured'    => false,
                'is_active'      => true,
            ],
            // Tas
            [
                'name'           => 'Tas Ransel Laptop PBTGM',
                'slug'           => 'tas-ransel-laptop-pbtgm',
                'description'    => 'Tas ransel multifungsi dengan slot laptop 15 inch. Bahan polyester anti air dengan desain ergonomis.',
                'price'          => 245000,
                'original_price' => 320000,
                'stock'          => 40,
                'category_id'    => $tas?->id ?? 5,
                'is_featured'    => true,
                'is_active'      => true,
            ],
            [
                'name'           => 'Tote Bag Canvas Wanita',
                'slug'           => 'tote-bag-canvas-wanita',
                'description'    => 'Tote bag canvas dengan motif unik dan kapasitas besar. Ideal untuk belanja, kuliah, atau hangout.',
                'price'          => 95000,
                'original_price' => 125000,
                'stock'          => 110,
                'category_id'    => $tas?->id ?? 5,
                'is_featured'    => false,
                'is_active'      => true,
            ],
            // Elektronik
            [
                'name'           => 'Earphone TWS Bluetooth',
                'slug'           => 'earphone-tws-bluetooth',
                'description'    => 'True wireless earphone dengan kualitas suara jernih dan bass yang kuat. Baterai tahan hingga 6 jam.',
                'price'          => 189000,
                'original_price' => 250000,
                'stock'          => 65,
                'category_id'    => $elektronik?->id ?? 6,
                'is_featured'    => true,
                'is_active'      => true,
            ],
            [
                'name'           => 'Power Bank 10000mAh',
                'slug'           => 'power-bank-10000mah',
                'description'    => 'Power bank kapasitas 10000mAh dengan fast charging 18W. Kompak dan mudah dibawa ke mana saja.',
                'price'          => 165000,
                'original_price' => 210000,
                'stock'          => 85,
                'category_id'    => $elektronik?->id ?? 6,
                'is_featured'    => false,
                'is_active'      => true,
            ],
        ];

        foreach ($products as $prod) {
            Product::firstOrCreate(['slug' => $prod['slug']], $prod);
        }
    }
}
