<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('DB_CONNECTION')=='mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        }
        \Illuminate\Support\Facades\DB::table('brands')->truncate();
        \Illuminate\Support\Facades\DB::table('brands')->insert([
            [
                'id' => 1,
                'brand_name' => 'Adidas',
                'brand_desc' => 'Adidas ltd AG là một nhà sản xuất dụng cụ thể thao của Đức, một thành viên của Adidas Group',
                'brand_status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'brand_name' => 'Nike',
                'brand_desc' => 'Nike, Inc. là một tập đoàn đa quốc gia của Mỹ hoạt động trong lĩnh vực thiết kế, phát triển, sản xuất, quảng bá cũng như kinh doanh các mặt hàng giày dép, quần áo',
                'brand_status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-4)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'brand_name' => 'New Balance',
                'brand_desc' => 'New Balance là một thương hiệu quần áo và giày dép thể thao của Mỹ xuất hiện từ năm 1906. Ban đầu, thương hiệu này được liên kết với Công ty Hỗ trợ New Balance Arch.',
                'brand_status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'brand_name' => 'Vans',
                'brand_desc' => 'Vans là một công ty bán giày trượt ván , quần áo thời trang đa quốc gia của Mỹ, có trụ sở tại Santa Ana,California , nổi tiếng với những mặt hàng giày Vans hiện giờ',
                'brand_status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-2)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'brand_name' => 'Converse',
                'brand_desc' => 'Converse là một công ty giày của Mỹ chuyên sản xuất giày trượt ván, giày dép thường ngày và quần áo. Được thành lập vào năm 1908, đến này Converse đã trở thành một công ty con của Nike, Inc. kể từ năm 2003.',
                'brand_status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'brand_name' => 'Puma',
                'brand_desc' => 'Puma là một tập đoàn đa quốc gia của Đức chuyên thiết kế và sản xuất giày dép, quần áo và phụ kiện thể thao và bình thường, có trụ sở chính tại Herzogenaurach, Bavaria, Đức.  Puma là nhà sản xuất quần áo thể thao lớn thứ ba trên thế giới.',
                'brand_status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'brand_name' => 'Timberland',
                'brand_desc' => 'Timberland LLC là một nhà sản xuất và bản lẻ những trang phục ngoài trời của Mỹ, đặc biệt là các sản phẩm giày dép và những đôi boot da chống thấm nước. ... Ngoài ra, thương hiệu Timberland còn có các sản phẩm như quần áo, đồng hồ, mắt kính và các sản phẩm bằng da khác.',
                'brand_status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 8,
                'brand_name' => 'Fila',
                'brand_desc' => 'Fila, Inc. là một công ty chuyên sản đồ thể thao của Hàn Quốc, được thành lập tại Ý. Fila được thành lập vào năm 1911 tại Ý. Kể từ khi bị tiếp quản bởi Fila Hàn Quốc vào năm 2007, Fila nay đã đã được sở hữu và quản lý tại công ty mẹ ở Hàn Quốc.',
                'brand_status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],

        ]);
        //\Illuminate\Support\Facades\DB::statement('ALTER SEQUENCE brands_id_seq RESTART WITH 9');
        if (env('DB_CONNECTION')=='mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
