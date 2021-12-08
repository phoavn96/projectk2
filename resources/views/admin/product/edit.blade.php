@extends('layouts.layout_admin_master')

@section('title', 'Danh sách sản phẩm')

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
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">

@endsection
@section('content')
    {{-- Sửa sản phẩm --}}
    <section id="data-thumb-view" class="data-thumb-view-header">
        <div class="add-new-data">
            <form role="form" action="{{URL::to('admin/product/'.$obj->id)}}" method="post" id="product_form">
                {{csrf_field()}}
                @method('put')
                <div class="overlay-bg"></div>
                <div class="add-new-data">
                    <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                        <div>
                            <h4 class="text-uppercase">Sửa sản phẩm</h4>
                        </div>
                    </div>
                    <div class="data-items pb-3" style="padding-bottom:0px!important">
                        <div class="data-fields px-2 mt-1">
                            <div class="row">
                                <div class="col-sm-5 data-field-col">
                                    <label for="data-name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="data-name" name="product_name"
                                           value="{{$obj->product_name}}" required autocomplete="product_name" autofocus>
                                    @if($errors -> has('product_name'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('product_name')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-3 data-field-col">
                                    <label for="data-category"> Danh mục</label>
                                    <select class="form-control" id="data-category" name="category_id">
                                     @foreach($categories as $cate)
                                         <option {{($cate ->id == $obj -> category_id) ? 'selected' : ''}}
                                                 value="{{$cate -> id}}"> {{$cate ->name}}</option>
                                     @endforeach
                                    </select>
                                    @if($errors -> has('category_id'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('category_id')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-3 data-field-col">
                                    <label for="data-brand"> Thương hiệu </label>
                                    <select class="form-control" id="data-category" name="brand_id">
                                        @foreach($brands as $bran)
                                            <option {{($bran ->id == $obj->brand_id) ? 'selected' : ''}}
                                                    value="{{$bran->id}}">{{$bran->brand_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors -> has('brand_id'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('brand_id')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-3 data-field-col">
                                    <label for="data-price">Giá</label>
                                    <input type="number" class="form-control" id="data-price" name="product_price"
                                           value="{{$obj->product_price}}" required autocomplete="product_price" autofocus>
                                    @if($errors -> has('product_price'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('product_price')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-11 data-field-col">
                                    <label for="data-brand"> Mô tả </label>
                                    <textarea style="resize: none" rows="5" class="form-control"
                                              id="editor"
                                              placeholder="Mô tả sản phẩm" name="product_desc" value="">{{$obj->product_desc}}</textarea>
                                    @if($errors -> has('product_desc'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('product_desc')}}
                                    </span>
                                    @endif
                                </div>

                                <div class="col-sm-3 data-field-col">
                                    <label for="data-status">Trạng thái</label>
                                    <select class="form-control" id="data-status" name="product_status">
                                        @if($obj -> product_status ==1)
                                            <option selected value="1">Hiện</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                            <option value="1">Hiện</option>
                                            <option selected value="0">Ẩn</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-sm-12 data-field-col">
                                    <label>Hình ảnh</label>
                                    <div class="form-group">
                                        <button type="button" id="upload_widget" class="btn btn-primary">Upload
                                            files
                                        </button>
                                        <div class="thumbnails">
                                            <ul class="cloudinary-thumbnails">
                                                @foreach($obj->preview_photos as $preview)
                                                    <li class="cloudinary-thumbnail active">
                                                        <img src="{{$preview}}" alt="">
                                                        <a href="javascript:void(0)" class="cloudinary-delete">x</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Multiple Select2 start -->
                                <div class="col-sm-6 data-field-col">
                                    <h4>Kích cỡ</h4>
                                    <div class="form-group">
                                        <select class="select2 form-control" multiple="multiple" name="sizes[]" id="sizes">
                                            @foreach($obj->preview_sizes as $preview)
                                                <option value="{{$preview}}" selected>{{$preview}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Multiple Select2 end -->
                            </div>
                        </div>
                    </div>
                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                        <div style="text-align: center">
                            <button type="submit" name="add_product" class="btn btn-info">Sửa sản phẩm
                            </button>
                        </div>
                        @foreach($obj->photo_ids as $id)
                            <input type="hidden" name="thumbnails[]" data-cloudinary-public-id="{{$id}}" value="{{$id}}">
                        @endforeach
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
