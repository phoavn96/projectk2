@extends('layouts.layout_admin_master')

@section('title', 'Danh sách sản phẩm')

@section('vendor-style')
    {{-- vendor files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">

@endsection
@section('page-style')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
@endsection
@section('content')
    {{-- Thêm sản phẩm --}}
    <section id="data-thumb-view" class="data-thumb-view-header">
        <div class="add-new-data">
            <form role="form" action="{{URL::to('admin/product')}}" method="post" id="product_form">
                {{csrf_field()}}
                <div class="overlay-bg"></div>
                <div class="add-new-data">
                    <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                        <div>
                            <h4 class="text-uppercase">Thêm sản phẩm</h4>
                        </div>
                    </div>
                    <div class="data-items pb-3" style="padding-bottom:0px!important">
                        <div class="data-fields px-2 mt-1">
                            <div class="row">
                                <div class="col-sm-5 data-field-col">
                                    <h4 for="data-name">Tên sản phẩm</h4>
                                    <input type="text" class="form-control" id="data-name" name="product_name"
                                           value="{{old('product_name')}}" required autocomplete="product_name" autofocus>
                                    @if($errors -> has('product_name'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('product_name')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-3 data-field-col">
                                    <h4 for="data-category"> Danh mục</h4>
                                    <select class="form-control" id="data-category" name="category_id" >
                                        @foreach($categories as $cate)
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors -> has('category_id'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('category_id')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-3 data-field-col">
                                    <h4 for="data-brand"> Thương hiệu </h4>
                                    <select class="form-control" id="data-category" name="brand_id" >
                                        @foreach($brands as $bran)
                                            <option value="{{$bran->id}}">{{$bran->brand_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors -> has('brand_id'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('brand_id')}}
                                    </span>
                                    @endif
                                </div>

                                <div class="col-sm-11 data-field-col">
                                    <h4 for="data-brand"> Mô tả </h4>
                                    <textarea style="resize: none" rows="5" class="form-control"
                                              id="editor"
                                              placeholder="Mô tả sản phẩm" name="product_desc"></textarea>
                                    @if($errors -> has('product_desc'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('product_desc')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-3 data-field-col">
                                    <h4 for="data-price">Giá</h4>
                                    <input type="number" class="form-control" id="data-price" name="product_price"
                                           value="{{old('product_price')}}" required autocomplete="product_price" autofocus>
                                    @if($errors -> has('product_price'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('product_price')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-3 data-field-col">
                                    <h4 for="data-status">Trạng thái</h4>
                                    <select class="form-control" id="data-status" name="product_status">
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 data-field-col">
                                    <h4>Hình ảnh</h4>
                                    <div class="form-group">
                                        <button type="button" id="upload_widget" class="btn btn-primary">Thêm ảnh
                                        </button>
                                        <div class="thumbnails"></div>
                                    </div>
                                </div>

                                <!-- Multiple Select2 start -->
                                <div class="col-sm-6 data-field-col">
                                    <h4>Kích cỡ</h4>
                                    <div class="form-group">
                                        <select class="select2 form-control" multiple="multiple" name="sizes[]" id="sizes">
                                            <option value="3" selected>3</option>
                                            <option value="4" selected>4</option>
                                            <option value="5" >5</option>
                                            <option value="6" >6</option>
                                            <option value="7" >7</option>
                                            <option value="8" >8</option>
                                            <option value="9" >9</option>
                                            <option value="10" >10</option>
                                            <option value="11" >11</option>
                                            <option value="12" >12</option>
                                            <option value="13" >13</option>
                                            <option value="14" >14</option>
                                            <option value="15" >15</option>
                                        </select>
                                    </div>
                                </div>
                            <!-- Multiple Select2 end -->
                        </div>
                    </div>
                </div>
                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                    <div class="add-data-btn">
                        <button class="btn btn-danger">Lưu</button>
                    </div>
                    <div class="cancel-data-btn">
                        <button class="btn btn-outline-danger" name="add_product" type="reset">Nhập lại</button>
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
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>

@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/forms/select/form-select2.js')) }}"></script>

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
