@extends('pages.layout')
@section('content')
<section class="list-question">
    <script type="text/javascript">
        $('#txtSearchAdvanced').val('');
    </script>

    <div class="ps-widget__header" style="text-align: center">
        <h2>DANH SÁCH CÂU HỎI</h2>
    </div>
    @foreach($list as $question_list)
    <div class="container">
        <div class="col-sm-12">
            <div class="box">
                <div class="ps-widget__header">
                </div>
                <h3><a href="/Danh-sach-cau-hoi/pagetype2/Tai-chinh-Ngan-hang-Dau-tu-Cong-Thuong/section14.vgp" id="name"> Câu hỏi số {{$question_list->id}}</a></h3>
                <div class="content-box">
                    <div class="story">
                        <div class="question">
                            <a href="/Chi-tiet-cau-hoi/Cach-tinh-thue-TNCN-khi-co-thu-nhap-2-noi/26608.vgp">
                                {{$question_list->name}}</a>
                        </div>
                        <div class="answer">
                            <div style="text-align: justify;">{{$question_list->question}}</div>
                            Trà lời:
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            {{$question_list->answer}}
                        </div>
                        <div class="meta">
                            <a href="javascript:void(0);">
                                {{$question_list->email}}</a>
                            <time>Ngày đăng:{{$question_list->created_at}}</time>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="container">
        <div class="col-sm-12">
            <div class="fb-like" data-href="http://127.0.0.1:8000/blog" data-width="100%" data-layout="standard" data-action="like" data-size="large" data-share="true"></div>
            <div class="fb-comments" data-href="http://127.0.0.1:8000/blog" data-numposts="20" data-width="100%"></div>
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


</section>
{{--@endforeach--}}
@endsection
