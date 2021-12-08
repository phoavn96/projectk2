@extends('layouts.layout_admin_master')

@section('title', 'Sửa tài khoản')

@section('vendor-style')
    {{-- vendor files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
@endsection
@section('page-style')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
@endsection
@section('content')
    {{-- Sửa sản phẩm --}}
    <section id="data-thumb-view" class="data-thumb-view-header">
        <div class="add-new-data">
            <form role="form" action="{{URL::to('/admin/accounts/'.$account->id.'/edit')}}" method="post" id="account-form">
                {{csrf_field()}}
                <div class="overlay-bg"></div>
                <div class="add-new-data">
                    <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                        <div>
                            <h4 class="text-uppercase">Sửa thông tin tài khoản</h4>
                        </div>
                    </div>
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span style="color:red;font-size:17px;width: 100%;text-align: center;font-weight: bold;margin-left: 20px">' . $message . '</span>';
                        Session::put('message', null);}
                        $message1 = Session::get('message1');
                        if ($message1) {
                            echo '<span style="color:blue;font-size:17px;width: 100%;text-align: center;font-weight: bold;margin-left: 20px">' . $message1 . '</span>';
                            Session::put('message1', null);
                    }
                    ?>
                    <div class="data-items pb-3" style="padding-bottom:0px!important">
                        <div class="data-fields px-2 mt-1">
                            <div class="row">
                                <div class="col-sm-5 data-field-col">
                                    <label for="data-name">Tên người dùng</label>
                                    <input type="text" class="form-control" id="data-name" name="name"
                                           value="{{$account->name}}">
                                    @if($errors -> has('name'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('name')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-5 data-field-col">
                                    <label for="data-phone">Số điện thoại</label>
                                    <input type="text" class="form-control" id="data-phone" name="phone"
                                           value="{{$account->phone}}">
                                    @if($errors -> has('phone'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('phone')}}
                                    </span>
                                    @endif
                                </div>
{{--                                <div class="col-sm-5 data-field-col">--}}
{{--                                    <label for="data-old_password">Mật khẩu cũ</label>--}}
{{--                                    <input type="password" class="form-control" id="data-old_password" name="old_password"--}}
{{--                                           >--}}
{{--                                    @if($errors -> has('password'))--}}
{{--                                        <span class="error" style="color: red">--}}
{{--                                {{$errors -> first('password')}}--}}
{{--                                    </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-5 data-field-col">--}}
{{--                                    <label for="data-new_password">Mật khẩu mới</label>--}}
{{--                                    <input type="password" class="form-control" id="data-new_password" name="new_password"--}}
{{--                                           >--}}
{{--                                    @if($errors -> has('password'))--}}
{{--                                        <span class="error" style="color: red">--}}
{{--                                {{$errors -> first('password')}}--}}
{{--                                    </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-5 data-field-col">--}}
{{--                                    <label for="data-confirm_password">Nhập lại mật khẩu</label>--}}
{{--                                    <input type="password" class="form-control" id="data-confirm_password" name="confirm_password"--}}
{{--                                           >--}}
{{--                                    @if($errors -> has('password'))--}}
{{--                                        <span class="error" style="color: red">--}}
{{--                                {{$errors -> first('password')}}--}}
{{--                                    </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

                                <div class="col-sm-3 data-field-col">
                                    <label for="data-role">Quyền</label>
                                    <select class="form-control" id="data-role" name="role">
                                        @if($account -> role == 1)
                                            <option selected value="1">Admin</option>
                                            <option value="0">Người dùng</option>
                                        @else
                                            <option value="1">Admin</option>
                                            <option selected value="0">Người dùng</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-sm-3 data-field-col">
                                    <label for="data-type">Phân loại</label>
                                    <select class="form-control" id="data-type" name="type">
                                        @if($account -> type == 1)
                                            <option selected value="1">Thường</option>
                                            <option value="2">Vip</option>
                                            <option value="3">S-Vip</option>
                                        @endif
                                            @if($account -> type == 2)
                                                <option value="1">Thường</option>
                                                <option selected value="2">Vip</option>
                                                <option value="3">S-Vip</option>
                                            @endif
                                            @if($account -> type == 3)
                                                <option value="1">Thường</option>
                                                <option value="2">Vip</option>
                                                <option selected value="3">S-Vip</option>
                                            @endif
                                    </select>
                                </div>
                                <div class="col-sm-3 data-field-col">
                                    <label for="data-status">Trạng thái</label>
                                    <select class="form-control" id="data-status" name="status">
                                        @if($account -> status ==1)
                                            <option selected value="1">Hiện</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                            <option value="1">Hiện</option>
                                            <option selected value="0">Ẩn</option>
                                        @endif
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                        <div style="text-align: center">
                            <button type="submit" name="add_product" class="btn btn-info">Sửa tài khoản
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    {{-- add new sidebar ends --}}
    {{-- Data list view end --}}
@endsection
@section('vendor-script')
    {{-- vendor js files --}}
    <script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.select.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/ui/data-list-view.js')) }}"></script>
    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: 'hoadaica',
                uploadPreset: 'hoadaica',
                multiple: true,
                form: '#product_form',
                fieldName: 'thumbnails[]',
                thumbnails: '.thumbnails'
            }, function (error, result) {
                if (!error && result && result.event === "success") {
                    console.log('Done! Here is the image info: ', result.info.url);
                    var arrayThumnailInputs = document.querySelectorAll('input[name="thumbnails[]"]');
                    for (let i = 0; i < arrayThumnailInputs.length; i++) {
                        arrayThumnailInputs[i].value = arrayThumnailInputs[i].getAttribute('data-cloudinary-public-id');
                    }
                }
            }
        );
        $('#upload_widget').click(function () {
            myWidget.open();
        })
        // xử lý js trên dynamic content.
        $('body').on('click', '.cloudinary-delete', function () {
            var splittedImg = $(this).parent().find('img').attr('src').split('/');
            var imgName = splittedImg[splittedImg.length - 1];
            imgName = imgName.replace('.jpg', '');
            $('input[data-cloudinary-public-id="' + imgName + '"]').remove();
            $(this).parent().remove();
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
