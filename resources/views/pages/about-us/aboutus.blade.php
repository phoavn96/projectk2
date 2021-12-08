@extends('pages.layout')
@section('content')

    <div class="container">
        <div class="col-sm-12">

            <body><div class="wrapper row2">
                <div id="container" class="clear">
                    <div id="about-us" class="clear">
                        <section id="about-intro" class="clear">
                            <div class="three_fifth first"><img class="imgholder" src="images/demo/nhom.jpg" width="100%" alt=""></div>
                            <div class="two_fifth">
                                <h2>Một vài thông tin về team</h2>
                                <p style="size: 22px; color: #0b0b0b">-Team được lập ra ngày 15/2 bởi trưởng nhóm Mai Công Viên</p>
                                <p style="size: 22px; color: #0b0b0b">-Mong muốn được hoàn thành các bài project các kì với điểm số cao nhất.</p>
                            </div>
                        </section>
                        <section id="team">
                            <h2 style="text-align: center">Danh sách thành viên và công việc</h2>
                            <ul class="clear">
                                <li class="one_quarter first">
                                    <figure><img src="images/demo/vien.jpg" alt="" style="width: 250px" height="250px">
                                        <figcaption>
                                            <p class="team_name" style="color: #0b0b0b; size: 30px">Mai Công Viên(Trưởng nhóm)</p>
                                            <p style="size: 22px; color: #0b0b0b">Phân công việc cho các thành viên, báo cáo lại tiến trình làm việc của nhóm cho giáo viên, làm slide thuyết trình</p>
                                        </figcaption>
                                    </figure>
                                </li>
                                <li class="one_quarter">
                                    <figure><img src="images/demo/phu.jpg" alt=""style="width: 250px" height="250px">
                                        <figcaption>
                                            <p class="team_name">Lý Lê Trọng Phú(Thành viên)</p>
                                            <p style="size: 22px; color: #0b0b0b">Xử lý frontend trong admin,so sánh sản phẩm,xuất excel,...</p>
                                        </figcaption>
                                    </figure>
                                </li>
                                <li class="one_quarter">
                                    <figure><img src="images/demo/loc.jpg" alt=""style="width: 250px"height="250px">
                                        <figcaption>
                                            <p class="team_name">Nguyễn Xuân Lộc(Thành viên)</p>
                                            <p style="size: 22px; color: #0b0b0b">Xử lý frontend trong admin,trang about-us,trang blog,tương tác facebook,thanh toán paypal,live chat,...</p>
                                        </figcaption>
                                    </figure>
                                </li>
                                <li class="one_quarter">
                                    <figure><img src="images/demo/trinh.jpg" alt=""style="width: 250px"height="250px">
                                        <figcaption>
                                            <p class="team_name">Lê Hoàng Trình(Thành viên)</p>
                                            <p style="size: 22px; color: #0b0b0b">Xử lý frontend trong admin,giỏ hàng,thanh toán dùng mã giảm giá,gửi mail thông báo,gửi tin nhắn thông báo....</p>
                                        </figcaption>
                                    </figure>
                                </li>
                                <li class="one_quarter">
                                    <figure><img src="images/demo/hoa.jpg" alt=""style="width: 250px"height="250px">
                                        <figcaption>
                                            <p class="team_name">Phạm Văn Hòa(Thành viên)</p>
                                            <p style="size: 22px; color: #0b0b0b">Xử lý frontend trong admin,xuất pdf,yêu thích sản phẩm,</p>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </section>
                        <!-- ####################################################################################################### -->
                    </div>
                    <!-- ####################################################################################################### -->
                    <!-- ####################################################################################################### -->
                    <!-- ####################################################################################################### -->
                    <!-- ####################################################################################################### -->
                </div>
            </div></body>
        </div>
    </div>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5f3fc466cc6a6a5947adabf5/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
@endsection
