@extends('layouts.layout_admin_master')

@section('title', 'Quảng bá sản phẩm')
@section('vendor-style')
    {{-- vendor files --}}

    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
@endsection
@section('page-style')
    {{-- Page css files --}}
    <link href="{{asset('css/jquery.toast.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <link rel="stylesheet"
          href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <script
        src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
    <link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <style>
        .mt-100 {
            margin-top: 100px
        }

        body {

            min-height: 100vh
        }
    </style>

@endsection
@section('content')
    <div class="loading" style="display: none; font-size: 26px; text-align: center;" >
        <img src="https://blog.haposoft.com/content/images/2017/08/ajax-loader.gif" alt="loading"><span style="color: green;">&nbsp&nbspĐang gửi...</span>
    </div>
    <div class="row d-flex justify-content-center mt-100">
        <div class="col-md-6" id="product">
            <label for="product" style="color: mediumpurple;font-size: 16px">Chọn sản phẩm</label>
            <select id="choices-multiple-remove-button" name="product" placeholder="Tìm kiếm" multiple>
                @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-100">
        <div class="col-md-6" id="email">
            <label for="email" style="color: mediumpurple;font-size: 16px">Chọn email gửi đến</label>
            <select id="choices-multiple-remove-button" name="email" placeholder="Tìm kiếm" multiple>
                @foreach($accounts as $account)
                    <option value="{{$account->email}}">{{$account->email}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-100">
        <div class="col-md-6">
        <textarea name="note" class="form-control" id="note" required placeholder="Lời Nhắn..." rows="3"></textarea>
        <button class=" btn btn-save btn-primary btn-success" id="send" style="margin-top: 10px;">Gửi</button>
        </div>
    </div>


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
    <script src="{{asset('js/jquery.toast.js')}}"></script>

    <script>
        $(document).ready(function () {

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount: 10,
                searchResultLimit: 99,
                renderChoiceLimit: 99
            });


        });
        $('#send').click(function () {
            var productsid = $('div#product option:selected').map(function () {
                return $(this).val();
            }).get();
            var emails = $('div#email option:selected').map(function () {
                return $(this).val();
            }).get();
            var error = '<script>'
            if ($.trim($("#note").val()).indexOf(error) > -1 ){
                Swal.fire(
                    'Lời nhắn không hợp lệ!',
                    '',
                    'error'
                )
            }
                else{
                var note = $.trim($("#note").val());
            }
            if (productsid.length == 0) {
                Swal.fire(
                    'Chọn ít nhất 1 sản phẩm!',
                    '',
                    'error'
                )
                return;
            }
            if (emails.length == 0) {
                Swal.fire(
                    'Chọn ít nhất 1 Email!',
                    '',
                    'error'
                )
                return;
            }
            if(note.length == 0){
                Swal.fire(
                    'Vui lòng viết lời nhắn!',
                    '',
                    'error'
                )
                return;
            }
            $('.loading').show();
            $.ajax({
                'url': '/admin/sendads',
                'method': 'POST',
                'data': {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    'productsid': productsid,
                    'emails':emails,
                    'note':note
                }}).done(function (){
                    $.toast({
                        text: "Gửi quảng cáo thành công!", // Text that is to be shown in the toast
                        heading: 'Thông báo', // Optional heading to be shown on the toast
                        icon: 'success', // Type of toast icon
                        showHideTransition: 'plain', // fade, slide or plain
                        allowToastClose: true, // Boolean value true or false
                        hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                        stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                        position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                        textAlign: 'left',  // Text alignment i.e. left, right or center
                        loader: true,  // Whether to show loader or not. True by default
                        loaderBg: '#9EC600',  // Background color of the toast loader

                    });
                    $('.loading').hide();
                }

                )



        });


    </script>





@endsection
