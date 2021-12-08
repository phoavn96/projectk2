<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('DB_CONNECTION')=='mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }
        \Illuminate\Support\Facades\DB::table('products')->truncate();
        \Illuminate\Support\Facades\DB::table('products')->insert([
            [
                'id' => 1,
                'product_name' => 'Puma RSX',
                'product_desc' => 'Sở hữu kiểu dáng siêu phong cách, hiện đại với thiết kế được sắp xếp hợp lý, giày Puma RS-X Toys là mẫu giày mới nhất của nhà Puma được đông đảo giới sneaker đặc biệt yêu thích. ',
                'product_price'=> 12200000,
                'thumbnail'=>'pm0252_1_2048x2048_b5xusk,pm0252_2_2048x2048_rqubar,pm0252_4_2048x2048_utqrqt',
                'product_status'=>1,
                'category_id'=>2,
                'brand_id'=>6,
                'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-33)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 2,
                'product_name' => 'Converse 70s Hightop',
                'product_desc' => ' Dòng sản phẩm Converse 70s Hightop thường được coi là dòng giày của trường học bởi thiết kế đơn giản và tinh tế cực kỳ phù hợp với dạng trang phục dành cho học sinh. ',
                'product_price'=>2000000,
                'thumbnail'=>'cv0167_1_2048x2048_kabl0e,cv0167_3_2048x2048_gyplv6,cv0167_4_2048x2048_u76ipq',
                'product_status'=>1,
                'category_id'=>2,
                'brand_id'=>5,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-53)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 3,
                'product_name' => 'Vans Old Skool',
                'product_desc' => ' Vẫn là kiểu dáng Old Skool cổ điển nhưng đã được nâng cấp hoàn toàn nội thất bên trong để người mang có được trải nghiệm tuyệt vời nhất! ',
                'product_price'=>1998000,
                'thumbnail'=>'vans_old_skool_lemon_1_wgavtu,vans_old_skool_lemon_3_azha4q,vans_old_skool_lemon_5_yn1yrn',
                'product_status'=>1,
                'category_id'=>1,
                'brand_id'=>4,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-33)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 4,
                'product_name' => 'Puma Mule',
                'product_desc' => ' Nếu bạn quá lười để mang một đôi giày thắt dây thì Puma Puma là một sự lựa chọn tuyệt vời khi vẫn giữ nguyên phần upper mặt trước như một đôi giày thắt dây nhưng lại là một đôi giày đạp gót cực kì xinh xắn',
                'product_price'=>1388000,
                'thumbnail'=>'pm0045_3_2048x2048_stbwy6,pm0045_4_2048x2048_rko0qs,pm0045_2_2048x2048_zp3ydu',
                'product_status'=>1,
                'category_id'=>2,
                'brand_id'=>6,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-33)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 5,
                'product_name' => 'Timberland Boots TS',
                'product_desc' => 'Những đôi giày Timberland xứng đáng là người bạn đồng hành cùng bạn cho những chuyến phiêu lưu khám phá đầy tính năng động. ',
                'product_price'=>919000,
                'thumbnail'=>'tim0024_1_2048x2048_ru2agr,tim0024_4_2048x2048_uxtbuq,tim0024_5_2048x2048_vtwo4t',
                'product_status'=>1,
                'category_id'=>3,
                'brand_id'=>7,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-33)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 6,
                'product_name' => 'Fila Ray',
                'product_desc' => 'Kiểu dáng thanh lịch, màu sắc hài hòa trang nhã, Đế bằng cao su tổng hợp chắc chắn, bền đẹp ',
                'product_price'=>819000,
                'thumbnail'=>'fl0036_1_2048x2048_eqtvdq,fl0036_2_2048x2048_e1sypm,fl0036_4_2048x2048_ve7cdc',
                'product_status'=>1,
                'category_id'=>2,
                'brand_id'=>8,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-33)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 7,
                'product_name' => 'Vans Slip On',
                'product_desc' => 'Là sản phẩm iconic của Vans, làm nên tên tuổi của Vans từ những ngày đầu. Có thể nói đây là item must have của mọi người vì sự tiện lợi và đẹp đẽ trẻ trung mà nó mang lại. ',
                'product_price'=>2938000,
                'thumbnail'=>'va0079_1_2048x2048_gmy3ih,va0079_2_2048x2048_nzhh7f,va0079_4_2048x2048_lmfre3',
                'product_status'=>1,
                'category_id'=>1,
                'brand_id'=>4,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-33)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 8,
                'product_name' => 'Converse Classic Hightop',
                'product_desc' => 'Classic là dòng bán chạy số 1 của Converse. Đến từ thương Hiệu giày thể thao hàng đầu nước Mỹ, mẫu giày này đã nhanh chóng được toàn thế giới ưa chuộng không chỉ bởi giá thành phù hợp mà còn bởi khả năng mix đồ đa dạng với các loại trang phục khác nhau.  ',
                'product_price'=>1500000,
                'thumbnail'=>'converse_high_top_blue_3_sdqlo5,converse_high_top_blue_6_d7tmdi,converse_high_top_blue_4_fgenxi',
                'product_status'=>1,
                'category_id'=>2,
                'brand_id'=>5,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-33)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 9,
                'product_name' => 'Timberland Boots SD',
                'product_desc' => ' Những đôi giày Timberland xứng đáng là người bạn đồng hành cùng bạn cho những chuyến phiêu lưu khám phá đầy tính năng động.  ',
                'product_price'=>700000,
                'thumbnail'=>'tim0005_1_2048x2048_cgupng,tim0005_3_2048x2048_i1hzpm,tim0005_5_2048x2048_e8m513',
                'product_status'=>1,
                'category_id'=>4,
                'brand_id'=>7,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-20)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 10,
                'product_name' => 'ADIDAS WOMEN  90S SANDALS',
                'product_desc' => 'BST giày sandals Ombre là sự kết hợp độc đáo và mới lạ giữa nhiều gam màu khác nhau, tạo nên 1 tổng thể hài hòa về màu sắc nhưng cũng không kém phần thu hút, ấn tượng.  ',
                'product_price'=>2000000,
                'thumbnail'=>'4062052965740_2_rs7k7b,4062052965740_5_bvjpj0,4062052965740_6_muxobp',
                'product_status'=>1,
                'category_id'=>7,
                'brand_id'=>1,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 11,
                'product_name' => 'NIKE KIDS SUNRAY ADJUST 5',
                'product_desc' => 'Nike Sunray Adjust 5 được chế tạo để theo kịp những người nhỏ bé ở dưới nước, trên cạn hoặc bất cứ nơi nào có cuộc phiêu lưu.  Thiết kế nhanh khô có dây buộc phía trên và phía sau gót giúp giày không bị tuột.  ',
                'product_price'=>1199000,
                'thumbnail'=>'888408418289_2_ddrvyn,888408418289_5_htihxi,888408418289_1_hf43v8',
                'product_status'=>1,
                'category_id'=>7,
                'brand_id'=>2,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 12,
                'product_name' => 'Timberland Boots SV',
                'product_desc' => ' Những đôi giày Timberland xứng đáng là người bạn đồng hành cùng bạn cho những chuyến phiêu lưu khám phá đầy tính năng động.   ',
                'product_price'=>1999000,
                'thumbnail'=>'tim0008_1_2048x2048_yv4xe2,tim0008_3_2048x2048_x8ufad,tim0008_5_2048x2048_ywqtal',
                'product_status'=>1,
                'category_id'=>4,
                'brand_id'=>7,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 13,
                'product_name' => 'Puma RSO',
                'product_desc' => 'sở hữu kiểu dáng siêu phong cách, hiện đại với thiết kế được sắp xếp hợp lý, giày Puma RS-X Toys là mẫu giày mới nhất ',
                'product_price'=>399000,
                'thumbnail'=>'web12345689_3_rlvxuy,pm0123_3_800x800_tn9jtw,pm0123_4_800x800_wxywbu',
                'product_status'=>1,
                'category_id'=>1,
                'brand_id'=>6,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 14,
                'product_name' => 'Newbalance 574',
                'product_desc' => 'Những đôi giày cổ điển như thế này 574 không bao giờ lỗi mốt. Phần trên của những đôi giày thể thao này được làm bằng da lộn mềm mại,   ',
                'product_price'=>799000,
                'thumbnail'=>'nb0252_1_2048x2048_yxbzhs,nb0252_4_2048x2048_grvfhy,nb0252_5_2048x2048_umhtup',
                'product_status'=>1,
                'category_id'=>2,
                'brand_id'=>3,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 15,
                'product_name' => 'Adidas Tubular Black.Orange',
                'product_desc' => 'dòng tubalar invader là sự tay thế hoàn hảo Kiểu dáng lịch sự pha chút bụi đặc biệt phối quần jeans   ',
                'product_price'=>799000,
                'thumbnail'=>'ad0008_5_wsoevr,ad0008_6_db5kjp',
                'product_status'=>1,
                'category_id'=>2,
                'brand_id'=>1,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 16,
                'product_name' => 'Adidas Slipper Pink ',
                'product_desc' => 'dòng Slipper Pink2 là sự tay thế hoàn hảo Kiểu dáng lịch sự pha chút bụi đặc biệt phối quần jeans   ',
                'product_price'=>1199000,
                'thumbnail'=>'dsc_3680_na5lmk,dsc_3683_cvmau4,dsc_3682_u1uvaw',
                'product_status'=>1,
                'category_id'=>8,
                'brand_id'=>1,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 17,
                'product_name' => 'Fila OAKMONT',
                'product_desc' => ' Form giày siêu cá tính và nịnh dáng  ',
                'product_price'=>999000,
                'thumbnail'=>'ncut1466_pkxm7b,ncut1467_zzlj9z',
                'product_status'=>1,
                'category_id'=>2,
                'brand_id'=>8,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 18,
                'product_name' => 'Converse Lowtop',
                'product_desc' => 'Classic là dòng bán chạy số 1 của Converse. Đến từ thương Hiệu giày thể thao hàng đầu nước Mỹ, mẫu giày này đã nhanh chóng được toàn thế giới ưa chuộng không chỉ bởi giá thành phù hợp mà còn bởi khả năng mix đồ đa dạng với các loại trang phục khác nhau. ',
                'product_price'=>1599000,
                'thumbnail'=>'img_3110_owjquc,img_3113_gnoaim',
                'product_status'=>1,
                'category_id'=>2,
                'brand_id'=>5,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 19,
                'product_name' => ' Nike Zoom Gravity BQ3202-100',
                'product_desc' => ' được Nike xếp vào phân khúc Run Easy – tối ưu cho những người mới bắt đầu chạy. Các đôi giày thuộc phân khúc này có đặc điểm chung là đế giày dày, êm ái, thân giày mềm mại,',
                'product_price'=>1999000,
                'thumbnail'=>'2085144_L_nctlhp,2085144_1_L_hntgut',
                'product_status'=>1,
                'category_id'=>5,
                'brand_id'=>2,
                'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 20,
                'product_name' => 'WMNS Nike Flex 2018 RN AA7408-800',
                'product_desc' => 'là mẫu giày được thiết kế mang phong cách cổ điển, màu sắc khỏe khoắn, sang trọng sẽ mang đến cho bạn 1 phong cách thể thao thật cá tính.',
                'product_price'=>1999000,
                'thumbnail'=>'2070488_1_L_tei3z3,2070488_L_lrji8i',
                'product_status'=>1,
                'category_id'=>6,
                'brand_id'=>2,
                'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ]
                ,[
                'id' => 21,
                'product_name' => 'Converse 70s',
                'product_desc' => 'Converse 1970s là 1 trong những dòng sản phẩm bán chạy nhất của Converse. ',
                'product_price'=>1199000,
                'thumbnail'=>'img_3014_wyafzv,img_3015_bonafe',
                'product_status'=>1,
                'category_id'=>2,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'brand_id'=>4,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-16)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 22,
                'product_name' => 'Timberland Boots GG',
                'product_desc' => '   Những đôi giày Timberland xứng đáng là người bạn đồng hành cùng bạn cho những chuyến phiêu lưu khám phá đầy tính năng động. ',
                'product_price'=>999000,
                'thumbnail'=>'tim0019_1_cdprva,tim0019_2_appqwv',
                'product_status'=>1,
                'category_id'=>3,
                'brand_id'=>7,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-16)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 23,
                'product_name' => 'Vans Slip on',
                'product_desc' => 'Là sản phẩm iconic của Vans, làm nên tên tuổi của Vans từ những ngày đầu. Có thể nói đây là item must have của mọi người vì sự tiện lợi và đẹp đẽ trẻ trung mà nó mang lại.',
                'product_price'=>899000,
                'thumbnail'=>'va0199_1_2048x2048_eezq2z,va0199_2_2048x2048_tyrio2',
                'product_status'=>1,
                'category_id'=>1,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'brand_id'=>4,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 24,
                'product_name' => 'Fila Sandal SF',
                'product_desc' => 'Công nghệ đệm trợ lực BOUNCE™ mang lại năng lượng hoàn hảo trong quá trình di chuyển, bạn sẽ cảm thấy từng bước chân trở nên thật nhẹ nhàng. ',
                'product_price'=>799000,
                'thumbnail'=>'img_7981_x5txlc,img_7982_irsojx',
                'product_status'=>1,
                'category_id'=>8,
                'brand_id'=>8,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 25,
                    'product_name' => 'Fila Sandal AX',
                    'product_desc' => ' Công nghệ đệm trợ lực BOUNCE™ mang lại năng lượng hoàn hảo trong quá trình di chuyển, bạn sẽ cảm thấy từng bước chân trở nên thật nhẹ nhàng.',
                    'product_price'=>1599000,
                    'thumbnail'=>'img_7985_yf39tb,img_8068_yymnla',
                'product_status'=>1,
                'category_id'=>8,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'brand_id'=>8,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-7)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 26,
                'product_name' => 'Newbalance 996 Navy.Gold',
                'product_desc' => ' Những đôi giày cổ điển như thế này 996 không bao giờ lỗi mốt. Phần trên của những đôi giày thể thao này được làm bằng da lộn mềm mại,',
                'product_price'=>1599000,
                'thumbnail'=>'img_2895_kbxbw4,img_2896_hysr7e,img_2897_qqm3dg',
                'product_status'=>1,
                'category_id'=>1,
                'brand_id'=>3,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 27,
                'product_name' => 'Converse Low Top Chuck2 Black',
                'product_desc' => ' Classic là dòng bán chạy số 1 của Converse. Đến từ thương Hiệu giày thể thao hàng đầu nước Mỹ, mẫu giày này đã nhanh chóng được toàn thế giới ưa chuộng không chỉ bởi giá thành phù hợp mà còn bởi khả năng mix đồ đa dạng với các loại trang phục khác nhau. ',
                'product_price'=>39990000,
                'thumbnail'=>'cv0569_6_knzutk,cv0569_5_mqdihy',
                'product_status'=>1,
                'category_id'=>1,
                'brand_id'=>5,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 28,
                'product_name' => 'Timberland Boots SDF',
                'product_desc' => ' hững đôi giày Timberland xứng đáng là người bạn đồng hành cùng bạn cho những chuyến phiêu lưu khám phá đầy tính năng động. Với mỗi sản phẩm giày Timberland sẽ truyền cảm hứng cho bạn để thực hiện những thách thức mới trong mỗi chuyến đi.',
                'product_price'=>15000000,
                'thumbnail'=>'tim0006_1_2048x2048_km7omj,tim0006_2_2048x2048_atmf1p',
                'product_status'=>1,
                'category_id'=>4,
                'brand_id'=>7,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-4)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 29,
                'product_name' => 'Timberland boots SXC',
                'product_desc' => 'hững đôi giày Timberland xứng đáng là người bạn đồng hành cùng bạn cho những chuyến phiêu lưu khám phá đầy tính năng động. Với mỗi sản phẩm giày Timberland sẽ truyền cảm hứng cho bạn để thực hiện những thách thức mới trong mỗi chuyến đi. ',
                'product_price'=>9999000,
                'thumbnail'=>'tim0001_1_2048x2048_lotbjz,tim0001_4_2048x2048_ju4mcm',
                'product_status'=>1,
                'category_id'=>4,
                    'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'brand_id'=>7,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-4)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 30,
                'product_name' => 'Fila Sandal AX',
                'product_desc' => 'Công nghệ đệm trợ lực BOUNCE™ mang lại năng lượng hoàn hảo trong quá trình di chuyển, bạn sẽ cảm thấy từng bước chân trở nên thật nhẹ nhàng. ',
                'product_price'=>8399000,
                'thumbnail'=>'img_2182_kssbz2,img_2184_k9apxa',
                'product_status'=>1,
                'category_id'=>7,
                'size'=>'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
                'brand_id'=>8,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-3)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ]
        ]
        );
        //\Illuminate\Support\Facades\DB::statement('ALTER SEQUENCE products_id_seq RESTART WITH 31');
        if (env('DB_CONNECTION')=='mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }

}
