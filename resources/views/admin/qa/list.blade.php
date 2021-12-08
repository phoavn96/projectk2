@extends('layouts.layout_admin_master')

@section('title', 'Danh sách câu hỏi')

@section('vendor-style')
    {{-- vendor files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

@endsection
@section('page-style')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">

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
                    <th>Tên câu hỏi</th>
                    <th>Mô tả</th>
                    <th>Trả lời</th>
                    <th>Trạng thái</th>
                    <th>Người hỏi</th>
                    <th>Quản lý</th>
                </tr>
                </thead>

                <tbody>
                @foreach($list as $question_list)
                    <tr>
                        <td class="border-top-0 px-2 py-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input product-checkbox"
                                       value="{{$question_list->id}}" id="checkbox_{{$question_list->id}}">
                                <label class="custom-control-label"
                                       for="checkbox_{{$question_list->id}}"></label>
                            </div>
                        </td>
                        <td class="qa-name" id="name">{{$question_list->name}}</td>
                        <td class="description">{!!$question_list->question!!}</td>
                        <td class="answer">{!!$question_list->answer!!}</td>
                        <td>
                <span class="text-ellipsis">
                 <?php
                    /** @var TYPE_NAME $question_list */
                    if ($question_list->status == 1) {
                    ?>
                     <a href="{{URL::to('/unactive-qa/'.$question_list->id)}}">
                     <span class="fa-thumb-styling fa fa-check"></span></a>
                     <?php
                    }else{
                    ?>
                     <a href="{{URL::to('/active-qa/'.$question_list->id)}}"><span
                             class="fa-thumb-styling fa fa-times" style="color: #880000"></span></a>
                     <?php
                    }
                    ?>
                </span>
                        </td>
                        <td class="answer">{!!$question_list->email!!}</td>
                        <td class="category-action">
                            <a href="{{URL::to('/admin/qa/'.$question_list->id.'/edit')}}"
                               class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <span><a class="feather icon-trash" onclick="delete_question_id({{$question_list->id}})"
                                     href="javascript:"></a></span>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
        <div class="add-new-data-sidebar">
            <form role="form" action="{{URL::to('/admin/qa')}}" method="post" id="question-form">
                {{csrf_field()}}
                <div class="overlay-bg"></div>
                <div class="add-new-data">
                    <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                        <div>
                            <h4 class="text-uppercase">Thêm câu hỏi</h4>
                        </div>
                        <div class="hide-data-sidebar">
                            <i class="feather icon-x"></i>
                        </div>
                    </div>
                    <div class="data-items pb-3">
                        <div class="data-fields px-2 mt-1">
                            <div class="row">
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-name">Tên câu hỏi</label>
                                    <input type="text" class="form-control" id="data-name" name="name" value="{{old('name')}}">
                                    @if($errors -> has('name'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('name')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-brand"> Mô tả </label>
                                    <textarea style="resize: none" rows="5" class="form-control"
                                              id="editor"
                                              placeholder="Mô tả loại sản phẩm" name="question"></textarea>
                                    @if($errors -> has('question'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('question')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-brand"> Câu trả lời </label>
                                    <textarea style="resize: none" rows="5" class="form-control"
                                              id="editor"
                                              placeholder="Trả lời" name="answer"></textarea>
                                    @if($errors -> has('answer'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('answer')}}
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
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-brand"> Mail người hỏi </label>
                                    <textarea style="resize: none" rows="5" class="form-control"
                                              id="editor"
                                              placeholder="Trả lời" name="email"></textarea>
                                    @if($errors -> has('email'))
                                        <span class="error" style="color: red">
                                {{$errors -> first('email')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                        <div class="add-data-btn">
                            <button class="btn btn-primary">Thêm câu hỏi</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
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
    </script>
    <script>
        function delete_question_id(id) {
            swal({
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
                if (result) {
                    $.ajax({
                        url: '/delete-qa/' + id,
                        type: 'GET',
                    }).done(function (deleteoneproduct) {
                        $.toast({
                            text: "Đã xóa câu hỏi!", // Text that is to be shown in the toast
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
        $('#delete-all').click(function () {

            // lấy ra danh sách ids của các checkbox đã checked.
            var deleteIds = $('input:checkbox:checked').map(function(){
                return $(this).val();
            }).get();
            // trường hợp chưa sản phẩm nào được check thì return.
            if(deleteIds.length == 0){
                $.toast({
                    text: "Vui lòng chọn 1 câu hỏi!", // Text that is to be shown in the toast
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
            swal({
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
                if (result) {
                    $.ajax({
                        'url': '/qa/delete-all',
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

@endsection
