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
            <form role="form" action="{{URL::to('admin/brand')}}" method="post" id="brand_form">
                {{csrf_field()}}
                <div class="overlay-bg"></div>
                <div class="add-new-data">
                    <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                        <div>
                            <h4 class="text-uppercase">Thêm thương hiệu sản phẩm</h4>
                        </div>
                    </div>
                    <div class="data-items pb-3" style="padding-bottom:0px!important">
                        <div class="data-fields px-2 mt-1">
                            <div class="row">
                                <div class="col-sm-5 data-field-col">
                                    <label for="data-name">Tên thương hiệu sản phẩm</label>
                                    <input type="text" class="form-control" id="data-name" name="brand_name"
                                           value="{{old('brand_name')}}">
                                    @if($errors -> has('brand_name'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('brand_name')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-11 data-field-col">
                                    <label for="data-description"> Mô tả</label>
                                    <textarea style="resize: none" rows="5" class="form-control"
                                              id="editor"
                                              placeholder="Mô tả sản phẩm" name="brand_desc"></textarea>
                                    @if($errors -> has('brand_desc'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('brand_desc')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-3 data-field-col">
                                    <label for="data-status">Trạng thái</label>
                                    <select class="form-control" id="data-status" name="brand_status">
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo '<span style="color:red;font-size:12px;width: 100%;text-align: center;font-weight: bold;">' . $message . '</span>';
                                    Session::put('message', null);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                        <div class="add-data-btn">
                            <button class="btn btn-primary">Thêm </button>
                        </div>
                        <div class="cancel-data-btn">
                            <button class="btn btn-outline-danger" name="add_brand" type="reset" >Nhập lại</button>
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
