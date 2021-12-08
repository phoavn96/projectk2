@extends('pages.layout')
@section('content')
    <form role="form" action="{{URL::to('/qa')}}" method="post" id="account-form" >
        {{csrf_field()}}
        <div class="container">
            <div class="col-sm-6">
                <div class="subtitle"><h3 class="text-uppercase">Xin mời đặt tên câu hỏi : </h3>
                    <input type="form-control" class="form-control" id="data-name" name="name">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="subtitle"><h3 class="text-uppercase">Xin mời điền email của bạn : </h3>
                    <input type="form-control" class="form-control" id="data-name" name="email">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="subtitle"><h3 class="text-uppercase">Xin mời đặt câu hỏi : </h3>
                    <input type="form-control" class="form-control" id="data-name" name="question">
                </div>
            </div>
            <div class="col-sm-12">
                <p></p>
            </div>
            <div class="col-sm-12">
                <div class="add-data-btn">
                    <button class="btn btn-primary">Đặt câu hỏi</button>
                </div>
                <div class="col-sm-12">
                    <p></p>
                </div>
                <div class="cancel-data-btn">
                    <button class="btn btn-primary" name="add_product" type="reset" >Nhập lại</button>
                </div>
            </div>
    </form>
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
