<?php

use Illuminate\Database\Seeder;

class BlogSeeding extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        }
        \Illuminate\Support\Facades\DB::table('blogs')->truncate();
        \Illuminate\Support\Facades\DB::table('blogs')->insert([
            [
                'id' => 1,
                'email' => 'hoa@gmail.com',
                'title' => 'Cách Làm Sạch Giày Nhung',
                'description' => 'Với chất liệu mềm mại và trang nhã, những đôi giày nhung làm tăng vẻ sang trọng cho tủ đồ của bất kỳ phụ nữ nào. Tuy nhiên, đây là chất liệu dễ bị ảnh hưởng bởi tác động bên ngoài, có thể để lại những vết hằn làm cho vải bị nát và nhão – dẫn đến các vết hói theo thời gian. Ngoài ra, khi mang giày nhung trong mưa hay tuyết sẽ dễ khiến cho chúng bị hư, làm cho bụi bẩn dễ đóng lại, ẩm mốc. Vậy làm thế nào để khôi phục cho đôi giày nhung trở về vẻ đẹp vốn có của nó? X-Clean sẽ hướng dẫn chi tiết cách làm sạch giày nhung của bạn nhé!',
                'thumbnail' => 'http://xclean.vn/wp-content/uploads/2020/08/lam-sach-giay-nhung-xclean-1024x512.jpg',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')

            ], [
                'id' => 2,
                'email' => 'hoa@gmail.com',
                'title' => 'Bí quyết bảo quản và chăm sóc giày trắng luôn như mới',
                'description' => 'Chắc hẳn ai cũng sở hữu cho mình một đôi giày trắng đúng không nào. Giày trắng khá đẹp và đơn giản nhưng lại dễ bị xuống màu, dính vết bẩn và ố vàng. Chính vì vậy, hãy cùng chúng tôi tìm hiểu cách bảo quản và chăm sóc giày trắng để đôi giày của bnaj luôn như mới nhé !!!,Cách đầu tiên để bảo quản và chăm sóc giày trắng đó chính là dùng kem đánh răng. Kem đánh răng có tác dụng làm sạch nhanh những mảng ố bẩn. Bàn chải sẽ giúp chải sạch kỹ càng đôi giày ở những vị trí nhỏ một cách dễ dàng nhất.',
                'thumbnail' => 'https://bizweb.dktcdn.net/100/275/458/files/1-0-core-black.jpg?v=1534988171243',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ], [
                'id' => 3,
                'email' => 'hoa@gmail.com',
                'title' => 'Những mẫu giày chạy bộ Adidas nào đang hot và được ưa chuộng',
                'description' => 'Hiện nay, có rất là nhiều bạn yêu thích và đam mê môn chạy bộ. Và dĩ nhiên muốn có trải nghiệm tốt về chạy bộ phải có một đôi giày thể thao chạy bộ chất lượng để có thể chạy thật thoải mái và êm ái. Và giày chạy bộ tốt phải đi kèm với sự thời trang. Hôm nay Vsneaker xin giới thiệu các bạn những mẫu giày chạy bộ đẹp và tốt đang hot của Nike hiện nay. Chúng ta cùng xem nay nhé !!',
                'thumbnail' => 'https://bizweb.dktcdn.net/100/275/458/files/adidas-ultra-boost-atr-mid-pk-grey-1.jpg?v=1534989162598',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'email' => 'hoa@gmail.com',
                'title' => 'Cách mang giày sneaker đi làm',
                'description' => 'Trước đây, mỗi khi đi làm đều là mang giày tây, giày mọi. Trong khoảng thời gian gần đây, giày thể thao sneaker đã chinh phục bất cứ trang phục nào, cũng như mọi nơi chúng ta đến và đi. Nên giày thể thao sneaker rất được ưa chuộng. Nhưng các bạn thấy khó khăn khi kết hợp giày sneaker với thời trang công sở, văn phòng làm việc.',
                'thumbnail' => 'https://vsneakershop.weebly.com/uploads/6/3/3/8/63388329/8945781_orig.jpg',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'email' => 'hoa@gmail.com',
                'title' => 'Những mẫu giày Free Flyknit đẹp vô cùng đang hot',
                'description' => 'Giày Free Flyknit là những mẫu giày chạy bộ cực tốt mà bạn không thể nào bỏ qua khi bạn đam mê chạy bộ running. Với đế Free chạy cực nhẹ cực êm, làm bạn hài lòng về độ dẻo dai linh hoạt từ bộ đế bám đường, ngoài ra còn đáp ứng được hai tiêu chí của bạn là thời trang và mát mẻ đến từ thân giày co giãn theo phom bàn chân cho mỗi bước chân chạy rất nhẹ và thoải mái mát mẻ vô cùng',
                'thumbnail' => 'https://bizweb.dktcdn.net/100/275/458/files/nike-free-rn-black-white-1.jpg?v=1530152562282',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 6,
                'email' => 'hoa@gmail.com',
                'title' => 'Những dòng giày sneaker dẫn đầu xu hướng đang được chuộng',
                'description' => '​Một cơn chấn động lớn từ Adidas được mang tên là Ultra Boost và trở thành đôi giày xuất sắc nhất trong lịch sử 70 năm qua của Adidas. Siêu phẩm giày chạy bộ này vừa được tung ra và đã khiến cho giới thời trang cũng như giới chạy bộ và thể thao phải ngước nhìn, đã làm mưa làm gió từ năm 2015 đến giờ vẫn còn rất nóng và không có dấu hiệu giảm nhiệt chút nào.',
                'thumbnail' => 'https://vsneakershop.weebly.com/uploads/6/3/3/8/63388329/img20150313224549627_orig.jpg',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'email' => 'hoa@gmail.com',
                'title' => 'Những dòng giày Adiddas dẫn đầu xu hướng đang được chuộng',
                'description' => 'Stansmith thực chất là một đôi giày quần vợt, được lấy tên từ một tay vợt nổi tiếng người Mỹ. Nhưng nhờ vào thiết kế đơn giản hóa, toàn bộ đôi giày lấy màu trắng làm màu chủ đạo cùng phối màu được nhận biết và với phác họa Stansmith ở lưỡi gà của mình, Stan Smith cũng nhanh chóng trở thành một hiện tượng ngay khi "ra đời" và cho đến tận bây giờ, nó vẫn được yêu thích vì sự đa dụng, dễ đi, dễ phối và hợp nhiều phong cách khác nhau.',
                'thumbnail' => 'https://vsneakershop.weebly.com/uploads/6/3/3/8/63388329/adidas-originals-stan-smith-primeknit-og-0_2_orig.jpg',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'email' => 'hoa@gmail.com',
                'title' => 'Những dòng giày Vans dẫn đầu xu hướng đang được chuộng',
                'description' => 'Có thể nói Air Jordan XI là một trong những mẫu giày bóng rổ có ảnh hưởng lớn nhất mọi thời đại khi nó lấn sân và phủ sóng hầu hết các lĩnh vực đồng thời gây được tiếng vang lớn đối với giới truyền thông cũng như cộng đồng người hâm mộ giày sneaker . Đây còn là một trong những thiết kế Jordan được biết đến và yêu thích nhất từ trước tới nay. Đế icy đẹp lộng lẫy cùng những đường nét uốn lượn khỏe khoắn thể thao, dây giày loại tròn đặc trưng của dòng JD11s, thiết kế đen bóng ở phần mũi giày bên cạnh đó cổ giày và lưỡi gà được độn để bảo vệ tối đa phần cổ chân khi chạy hay nhảy. ​',
                'thumbnail' => 'https://bizweb.dktcdn.net/100/275/458/files/nike-free-rn-black-white-1.jpg?v=1530152562282',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 9,
                'email' => 'hoa@gmail.com',
                'title' => 'Những mẫu giày JORDAN đẹp vô cùng đang hot',
                'description' => 'Có thể nói adidas AlphaBOUNCE là một trong những đôi giày sáng giá mới dành cho mảng giày chạy bộ, với các thiết kế đặc trưng hỗ trợ cho mọi động tác khó trong vận động và bộ đệm Bounce êm ái và dẻo dai từng bước chân. Alpha Bounce sẽ giúp bạn có những chuyến đi bộ dài cực kì êm ái và thoải mái. Phần thân giày có những nếp gắp đặc trưng của AP có tác dụng  ôm vào chân bạn một cách vừa vặn và thoải mái nhất, giúp bàn chân bạn có thể di chuyển trong trạng thái ‘đích thực’ của nó. Đây cũng chính là đặc điểm nổi bật vừa mang tính thời trang, vừa góp phần làm nổi trội của đôi giày này. Đế giày làm từ cao su dẻo với các họa tiết nút tròn nhằm nâng đỡ áp lực từ bàn chân. ',
                'thumbnail' => 'https://vsneakershop.weebly.com/uploads/6/3/3/8/63388329/bred-xi-1_orig.jpg',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ]
            ,[
                'id' => 10,
                'email' => 'hoa@gmail.com',
                'title' => 'Những mẫu giày ALPHABOUNCE đẹp vô cùng đang hot',
                'description' => 'Với sẵn số lượng người hâm mộ, Flyknit Racer đã khẳng định được vị thế của mình trong lòng người hâm mộ giới sneaker. Cái tên đã nói lên tất cả, FR đơn thuần là một giày chạy rất là êm với đế Racer êm mượt cùng với chất vải flyknit tối ưu thoáng mát và giúp bàn chân co giãn linh hoạt, nhưng nét chất cùng họa tiết mang âm hưởng streetstyle nên không gì lạ khi nhiều bạn mê mẩn Racer. Nay hot hơn với nhiều phối màu đẹp lòng người.',
                'thumbnail' => 'https://vsneakershop.weebly.com/uploads/6/3/3/8/63388329/nike-flyknit-racer-goddess-1-1020x685_orig.jpg',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ]

        ]);
        //\Illuminate\Support\Facades\DB::statement('ALTER SEQUENCE blogs_id_seq RESTART WITH 4');
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
