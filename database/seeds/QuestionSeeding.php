<?php

use Illuminate\Database\Seeder;

class QuestionSeeding extends Seeder
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
        \Illuminate\Support\Facades\DB::table('questions')->truncate();
        \Illuminate\Support\Facades\DB::table('questions')->insert([
            [
                'id' => 1,
                'name' => 'Hỏi về vấn đề giày dép',
                'question' => 'Làm sao để đi giày cao gót thật tự tin mà không khiến chân đau nhức?',
                'answer' => 'Nếu bạn cảm thấy không thoải mái hoặc có cảm giác đau nhức bàn chân khi đi giày cao gót, lời khuyên đầu tiên là bạn nên chọn một đôi giày có phần gót thấp và đế giày ít dốc hơn. Nếu bạn vẫn muốn tăng vài cm chiều cao, những đôi giày platform heels (giày cao gót có phần độn đế khá dày phía trước) sẽ là lựa chọn thích hợp hơn cả. Bạn cũng nên đi thử giày vào chiều tối, khi kích cỡ bàn chân nở to nhất trong ngày và chọn đúng cỡ giày để có dáng đi đẹp và tự tin hơn. Bên cạnh đó, bạn cũng nên giảm tốc độ khi di chuyển để giảm thiểu lực và trọng lượng tác động đến bàn chân.',
                'status'=>1,
                'email' => 'hoa@gmail.com',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')

            ], [
                'id' => 2,
                'name' => 'Hỏi về vấn đề giày dép',
                'question' => 'Khi đi boots nên mặc gì?',
                'answer' => 'Câu trả lời cho câu hỏi này thực ra rất đơn giản, bạn có thể mặc gần như mọi thứ mình thích với một đôi bốt. Từ cropped jeans, áo T- shirt cho tới những chiếc áo len, áo khoác và váy của mùa đông. Để có vẻ ngoài cá tính hơn nhưng vẫn giữ được nét nữ tính, bạn hãy thử phối chân váy chữ A với một chiếc áo len vừa vặn và xem hiệu quả ngạc nhiên mà set đồ đơn giả này mang lại nhé.',
                'status'=>1,
                'email' => 'hoa@gmail.com',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ], [
                'id' => 3,
                'name' => 'Hỏi về bảo hành sản phẩm',
                'question' => 'Có bảo hành sản phẩm không?',
                'answer' => 'ShopAz có chính sách bảo hành 6 tháng dành cho mọi khách hàng. Nhưng nếu qua 6 tháng hoặc trong suốt thời gian khách hàng sử dụng, nếu sản phẩm bị lỗi kĩ thuật, ShopAz sẽ vẫn sửa chữa, bảo hành sản phẩm cho quý khách. Đông Hải chỉ tính phí nguyên liệu, không tính phí sửa chữa.',
                'status'=>1,
                'email' => 'hoa@gmail.com',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'name' => 'Hỏi về shop?',
                'question' => ' Sản phẩm mua online có bảo đảm chất lượng không?',
                'answer' => 'Sản phẩm do ShopAz sản xuất và phân phối và có bảo hành nên khách hàng hoàn toàn có thể yên tâm về chất lượng.',
                'status'=>1,
                'email' => 'hoa@gmail.com',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'name' => 'Hỏi về shop',
                'question' => 'Giá sản phẩm mua online và mua ở cửa hàng có gì khác không?',
                'answer' => 'Giá sản phẩm mua online và mua ở cửa hàng là giống nhau.',
                'status'=>1,
                'email' => 'hoa@gmail.com',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'name' => 'Hỏi về đổi trả hàng',
                'question' => 'Không vừa ý có thể đổi trả lại không??',
                'answer' => 'Trong trường hợp không hài lòng về sản phẩm, khách hàng vui lòng thanh toán phí vận chuyển gửi đi và gửi về cho bưu điện,shop cho khách đổi hàng 100% trong 3 ngày',
                'status'=>1,
                'email' => 'hoa@gmail.com',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'name' => 'Hỏi về sản phẩm',
                'question' => 'Sản phẩm giống hình không??',
                'answer' => 'Toàn bộ hình ảnh đều là hình thật do bộ phận Design của ShopAz chụp. Khách hàng có thể yên tâm sản phẩm giống hình 100%',
                'status'=>1,
                'email' => 'hoa@gmail.com',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'name' => 'Hỏi về phí ship',
                'question' => 'Có MIỄN PHÍ cước phí vận chuyển không?',
                'answer' => 'Shop Az miễn phí 100% phí vận chuyển tới tay khách hàng.',
                'status'=>1,
                'email' => 'hoa@gmail.com',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'name' => 'Hỏi về dịch vụ ship hàng của shop',
                'question' => 'Có dịch vụ vận chuyển COD (trả tiền khi nhận sản phẩm) không??',
                'answer' => 'ShopAz có sử dụng dịch vụ vận chuyển COD. Cụ thể, tùy vào gói vận chuyển & hình thức thanh toán, khách sẽ được miễn phí 100% phí',
                'status'=>1,
                'email' => 'hoa@gmail.com',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'name' => 'Hỏi về thời gian nhận hàng',
                'question' => 'Thời gian nhận được hàng là bao lâu??',
                'answer' => 'Từ 3-5 ngày là khách sẽ nhận được sản phẩm sau khi đặt hàng thành công',
                'status'=>1,
                'email' => 'hoa@gmail.com',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 11,
                'name' => 'Hỏi về nhận hàng',
                'question' => 'Tôi không nhận sản phẩm khi ship COD được không??',
                'answer' => 'Có thể không nhận sản phẩm nếu khách hàng không vừa ý. Tuy nhiên, khách hàng vui lòng thanh toán phí vận chuyển gửi đi và gửi về cho bưu điện..',
                'status'=>1,
                'email' => 'hoa@gmail.com',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ]



        ]);
        //\Illuminate\Support\Facades\DB::statement('ALTER SEQUENCE questions_id_seq RESTART WITH 4');
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
