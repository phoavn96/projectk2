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
@endsection
@section('content')
    {{-- Thêm sản phẩm --}}
    <section id="data-thumb-view" class="data-thumb-view-header">
        <div class="add-new-data">
            <form role="form" action="{{URL::to('/admin/categories')}}" method="post" id="product_form">
                {{csrf_field()}}
                <div class="overlay-bg"></div>
                <div class="add-new-data">
                    <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                        <div>
                            <h4 class="text-uppercase">Thêm loại sản phẩm</h4>
                        </div>
                    </div>
                    <div class="data-items pb-3" style="padding-bottom:0px!important">
                        <div class="data-fields px-2 mt-1">
                            <div class="row">
                                <div class="col-sm-5 data-field-col">
                                    <label for="name">Tên loại sản phẩm</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{old('name')}}">
                                    @if($errors -> has('name'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('name')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-11 data-field-col">
                                    <label for="data-brand"> Mô tả </label>
                                    <textarea style="resize: none" rows="5" class="form-control"
                                              id="editor"
                                              placeholder="Mô tả loại sản phẩm" name="description"></textarea>
                                    @if($errors -> has('description'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('description')}}
                                    </span>
                                    @endif
                                </div>

                                <div class="col-sm-3 data-field-col">
                                    <label for="data-status">Trạng thái</label>
                                    <select class="form-control" id="data-status" name="status">
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                        <div class="add-data-btn">
                            <button class="btn btn-primary">Thêm loại sản phẩm</button>
                        </div>
                        <div class="cancel-data-btn">
                            <button class="btn btn-outline-danger" name="add_product" type="reset" >Nhập lại</button>
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
