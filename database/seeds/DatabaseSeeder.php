<?php

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
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        }
        // $this->call(UserSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(CategorySeeding::class);
        $this->call(BrandSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CheckoutSeeder::class);
        $this->call(ContactUsSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderDetailSeeder::class);
        $this->call(DiscountSeeding::class);
        $this->call(QuestionSeeding::class);
        $this->call(BlogSeeding::class);
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
