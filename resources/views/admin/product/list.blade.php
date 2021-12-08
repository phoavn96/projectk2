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
    {{-- Data list view starts --}}
    <section id="data-thumb-view" class="data-thumb-view-header">
        <div class="action-btns d-none">
            <div class="btn-dropdown mr-1 mb-1">
                <div class="btn-group dropdown actions-dropodown">
                    <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hành động
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript:void(0)" id="delete-all"><i class="feather icon-trash"></i>Xóa</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="../admin/product" method="get" id="product_form_send">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Chọn Danh mục</label>
                                            <select name="category_id" class="form-control" id="categorySelect">
                                                <option value="0">Tất cả</option>
                                                @foreach($categories as $cate)
                                                    <option value="{{$cate->id}}" {{$cate->id == $category_id ? 'selected':''}}>{{$cate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Chọn Thương hiệu</label>
                                            <select name="brand_id" class="form-control" id="brandSelect">
                                                <option value="0">Tất cả</option>

                                                @foreach($brands as $bran)
                                                    <option value="{{$bran->id}}" {{$bran->id == $brand_id ? 'selected':''}}>{{$bran->brand_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Tìm kiếm theo thời gian</label>
                                            <input type="text" name="dates" class="form-control">
                                            <input type="hidden" name="start" >
                                            <input type="hidden" name="end" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span style="color:#1b6d85;font-size:17px;width: 100%;text-align: center;font-weight: bold;">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>

        {{-- dataTable starts --}}
        <div class="table-responsive">

            <table class="table data-thumb-view">
                <thead>
                <tr>
                    <th class="border-0 font-14 font-weight-medium text-muted">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkAll" value="0">
                            <label class="custom-control-label" for="checkAll"></label>
                        </div>
                    </th>
                    <th style="width: 240px">Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th>Giá</th>
{{--                    <th>Mô tả sản phẩm</th>--}}
                    <th>Trạng thái</th>
                    <th>Quản lý</th>
                </tr>
                </thead>

                <tbody>
                @foreach($list as $product_list)
                    <tr>
                        <td class="border-top-0 px-2 py-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input product-checkbox"
                                       value="{{$product_list->id}}" id="checkbox_{{$product_list->id}}">
                                <label class="custom-control-label"
                                       for="checkbox_{{$product_list->id}}"></label>
                            </div>
                        </td>
                        <td class="product-img">
                            @foreach($product_list->small_photos as $p)
                                <img src="{{$p}}" alt="" class="rounded-circle" style="width: 100px">
                            @endforeach
                        </td>
                        <td class="product-name" id="name">{{$product_list->product_name}}</td>
                        <td class="product-category">{{$product_list->category->name}}</td>
                        <td class="product-brand">{{$product_list->brand->brand_name}}</td>
                        <td class="product-price">{{number_format($product_list->product_price).' VNĐ'}}</td>
{{--                        <td>{!! $product_list->product_desc  !!}</td>--}}
                        <td>
                        <span class="text-ellipsis">
                        <?php
                          /** @var TYPE_NAME $product_list */
                          if ($product_list->product_status == 1) {
                         ?>
                         <a href="{{URL::to('/unactive-product/'.$product_list->id)}}">
                         <span class="fa-thumb-styling fa fa-check"></span></a>
                         <?php
                        }else{
                        ?>
                         <a href="{{URL::to('/active-product/'.$product_list->id)}}"><span
                             class="fa-thumb-styling fa fa-times" style="color: #880000"></span></a>
                        <?php
                          }
                        ?>
                        </span>
                        </td>
                        <td class="product-action">
                            <a href="{{URL::to('admin/product/'.$product_list->id.'/edit')}}"
                               class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <span><a class="feather icon-trash" onclick="delete_product_id({{$product_list->id}})"
                                     href="javascript:"></a></span>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
        {{-- dataTable ends --}}

        {{-- Thêm sản phẩm --}}

        <div class="add-new-data-sidebar">
            <form role="form" action="{{URL::to('admin/product')}}" method="post" id="product_form">
                {{csrf_field()}}
            <div class="overlay-bg"></div>
            <div class="add-new-data">
                <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                    <div>
                        <h4 class="text-uppercase">Thêm sản phẩm</h4>
                    </div>
                    <div class="hide-data-sidebar">
                        <i class="feather icon-x"></i>
                    </div>
                </div>
                <div class="data-items pb-3">
                    <div class="data-fields px-2 mt-1">
                        <div class="row">
                            <div class="col-sm-12 data-field-col">
                                <label for="data-name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="data-name" name="product_name"
                                       value="{{old('product_name')}}" required autocomplete="product_name" autofocus>
                                @if($errors -> has('product_name'))
                                    <span class="error" style="color: red">
                                {{$errors -> first('product_name')}}
                                    </span>
                                @endif
                            </div>
                            <div class="col-sm-12 data-field-col">
                                <label for="data-category"> Danh mục</label>
                                <select class="form-control" id="data-category" name="category_id">
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
                            <div class="col-sm-12 data-field-col">
                                <label for="data-brand"> Thương hiệu </label>
                                <select class="form-control" id="data-category" name="brand_id">
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
                            <div class="col-sm-12 data-field-col">
                                <label for="data-price">Giá</label>
                                <input type="number" class="form-control" id="data-price" name="product_price"
                                       value="{{old('product_price')}}" required autocomplete="product_price" autofocus>
                                @if($errors -> has('product_price'))
                                    <span class="error" style="color: red">
                                {{$errors -> first('product_price')}}
                                    </span>
                                @endif
                            </div>
                            <div class="col-sm-12 data-field-col">
                                <label for="data-brand"> Mô tả </label>
                                <textarea style="resize: none" rows="5" class="form-control"
                                          id="editor"
                                          placeholder="Mô tả sản phẩm" name="product_desc"></textarea>
                                @if($errors -> has('product_desc'))
                                    <span class="error" style="color: red">
                                {{$errors -> first('product_desc')}}
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-12 data-field-col">
                                <label for="data-status">Trạng thái</label>
                                <select class="form-control" id="data-status" name="product_status">
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                                <!-- Multiple Select2 start -->
                                <div class="col-sm-12 data-field-col">
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
                            <div class="col-sm-12 data-field-col">
                                <label >Hình ảnh</label>
                                <div class="form-group">
                                    <button type="button" id="upload_widget" class="btn btn-primary">Thêm ảnh
                                    </button>
                                    <div class="thumbnails"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                    <div class="add-data-btn">
                        <button class="btn btn-primary">Thêm sản phẩm</button>
                    </div>
                    <div class="cancel-data-btn">
                        <button class="btn btn-outline-danger" name="add_product" type="reset" >Nhập lại</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
        {{-- add new sidebar ends --}}
    </section>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
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
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        // bắt sự kiện vào checkbox check all.
        $('#checkAll').click(function () {
            // chuyển trạng thái check của tất cả checkbox có class 'product-checkbox'
            // theo trạng thái của checkbox checkall.
            $('.product-checkbox').prop('checked', $(this).prop('checked'));
        });
        // khi click nút delete all
        $('#delete-all').click(function () {

            // lấy ra danh sách ids của các checkbox đã checked.
            var deleteIds = $('input:checkbox:checked').map(function(){
                return $(this).val();
            }).get();
            // trường hợp chưa sản phẩm nào được check thì return.
            if(deleteIds.length == 0){
                $.toast({
                    text: "Vui lòng chọn 1 sản phẩm!", // Text that is to be shown in the toast
                    heading: 'Thông báo', // Optional heading to be shown on the toast
                    icon: 'warning', // Type of toast icon
                    showHideTransition: 'plain', // fade, slide or plain
                    allowToastClose: true, // Boolean value true or false
                    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                    position: 'top-center', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                    textAlign: 'center',  // Text alignment i.e. left, right or center
                    loader: true,  // Whether to show loader or not. True by default
                    loaderBg: '#9EC600',  // Background color of the toast loader
                });
                return ;
            }
            // gửi request lên server yêu cầu xoá tất cả sản phẩm được check.
            // thông báo xác nhận thao tác xóa sản phẩm
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa không?',
                text: "Bạn sẽ không thể hoàn nguyên thao tác này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, Xóa nó!',
                cancelButtonText: "Không, Quay lại!",
            }).then((result) => {
                // nếu chọn Yes thì thực hiện, không thì thôi
                if (result.isConfirmed) {
                    $.ajax({
                        'url': '/product/delete-all',
                        'method': 'POST',
                        'data': {
                            "_token": $('meta[name="csrf-token"]').attr('content'),
                            'ids': deleteIds
                        },
                        'success': function () {
                            // Thông báo thành công, reload lại trang.
                            $.toast({
                                text: "Xóa sản phẩm thành công", // Text that is to be shown in the toast
                                heading: 'Thông báo', // Optional heading to be shown on the toast
                                icon: 'success', // Type of toast icon
                                showHideTransition: 'fade', // fade, slide or plain
                                allowToastClose: true, // Boolean value true or false
                                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                                position: 'top-center', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



                                textAlign: 'center',  // Text alignment i.e. left, right or center
                                loader: true,  // Whether to show loader or not. True by default
                                loaderBg: '#9EC600',  // Background color of the toast loader
                                afterHidden: function () {
                                    location.reload();
                                }  // will be triggered after the toast has been hidden
                            });

                        },
                        'error': function () {
                            $.toast({
                                text: "Thao tác thất bại, vui lòng kiểm tra lại!", // Text that is to be shown in the toast
                                heading: 'Lỗi', // Optional heading to be shown on the toast
                                icon: 'error', // Type of toast icon
                                showHideTransition: 'plain', // fade, slide or plain
                                allowToastClose: true, // Boolean value true or false
                                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                                position: 'top-center', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                                textAlign: 'center',  // Text alignment i.e. left, right or center
                                loader: true,  // Whether to show loader or not. True by default
                                loaderBg: '#9EC600',  // Background color of the toast loader
                            });
                        }
                    })
                }
            })





        });
    </script>
    <script>
        $('input[name="dates"]').daterangepicker(
            {
                locale: {
                    format: 'DD/MM/YYYY'
                },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }
        );
        $('#categorySelect').change(function () {
            $('#product_form_send').submit();
        })
        $('#brandSelect').change(function () {
            $('#product_form_send').submit();
        })
        $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
            $('input[name="start"]').val(picker.startDate.format('YYYY-MM-DD'));
            $('input[name="end"]').val(picker.endDate.format('YYYY-MM-DD'));
            $('#product_form_send').submit();
            $('input[name="dates"]').val(setValue(picker.endDate.format('YYYY-MM-DD')));

        });
    </script>
    <script>
        function delete_product_id(id) {
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa không?',
                text: "Bạn sẽ không thể hoàn nguyên thao tác này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, Xóa nó!',
                cancelButtonText: "Không, Quay lại!",
            }).then((result) => {
                // nếu chọn Yes thì thực hiện, không thì thôi
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/delete-product/' + id,
                        type: 'GET',
                    }).done(function (deleteoneproduct) {
                        $.toast({
                            text: "Đã xóa sản phẩm!", // Text that is to be shown in the toast
                            heading: 'Thông báo', // Optional heading to be shown on the toast
                            icon: 'success', // Type of toast icon
                            showHideTransition: 'plain', // fade, slide or plain
                            allowToastClose: true, // Boolean value true or false
                            hideAfter: 1000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                            stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                            position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                            textAlign: 'left',  // Text alignment i.e. left, right or center
                            loader: true,  // Whether to show loader or not. True by default
                            loaderBg: '#9EC600',  // Background color of the toast loader
                            afterHidden: function (e) {
                                location.reload();
                            },
                        });
                    });
                }
            })

        }
    </script>
@endsection
