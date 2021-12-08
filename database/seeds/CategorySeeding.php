<?php

use Illuminate\Database\Seeder;

class CategorySeeding extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('DB_CONNECTION')=='mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        }
        \Illuminate\Support\Facades\DB::table('categories')->truncate();
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Giày Sneaker Nữ ',
                'description' => 'Sneaker  là những đôi giày được thiết kế chủ yếu để phục vụ cho thể thao hoặc các hoạt động khác liên quan đến thể dục, tuy nhiên ngày nay, loại giày này cũng có thể được hiểu là giày dùng để đi thường ngày.',
                'status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-7)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s')
            ],[
                'id' => 2,
                'name' => 'Giày Sneaker Nam ',
                'status'=>1,
                'description' => 'Sneaker là những đôi giày được thiết kế chủ yếu để phục vụ cho thể thao hoặc các hoạt động khác liên quan đến thể dục, tuy nhiên ngày nay, loại giày này cũng có thể được hiểu là giày dùng để đi thường ngày.',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-6)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s')
            ],[
                'id' => 3,
                'name' => 'Giày Boot Nam ',
                'status'=>1,
                'description' => 'Boot là một loại giày dép đặc biệt. Hầu hết những đôi boot chủ yếu là bao trùm cả chân và mắt cá chân, ',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-4)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s')
            ],[
                'id' => 4,
                'name' => 'Giày Boot Nữ ',
                'status'=>1,
                'description' => 'Boot là một loại giày dép đặc biệt. Hầu hết những đôi boot chủ yếu là bao trùm cả chân và mắt cá chân, ',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'name' => 'Giày thể thao nam',
                'status'=>1,
                'description' => ' Giày thể thao thường được làm bằng những hợp chất linh hoạt và bền, đế giày thường được làm bằng cao su đặc. Tuy nhiên một số mẫu giày mới có khoang để chứa gel hoặc không khí để tăng khả năng đàn hồi và hấp thụ lực của đế giày. ',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'name' => 'Giày thể thao nữ',
                'status'=>1,
                'description' => ' Giày thể thao thường được làm bằng những hợp chất linh hoạt và bền, đế giày thường được làm bằng cao su đặc. Tuy nhiên một số mẫu giày mới có khoang để chứa gel hoặc không khí để tăng khả năng đàn hồi và hấp thụ lực của đế giày.  ',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s')
            ],[
                'id' => 7,
                'name' => 'Sandal Nam',
                'status'=>1,
                'description' => ' là một loại giầy,dép có cấu trúc mở, bao gồm một đế giầy được giữ vào chân người mang bằng một hệ thống đai và dây vòng qua mu bàn chân và cổ chân.',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s')
            ],[
                'id' => 8,
                'name' => 'Sandal Nữ',
                'status'=>1,
                'description' => ' là một loại giầy,dép có cấu trúc mở, bao gồm một đế giầy được giữ vào chân người mang bằng một hệ thống đai và dây vòng qua mu bàn chân và cổ chân.',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s')
            ]
        ]);
        //\Illuminate\Support\Facades\DB::statement('ALTER SEQUENCE categories_id_seq RESTART WITH 9');
        if (env('DB_CONNECTION')=='mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
