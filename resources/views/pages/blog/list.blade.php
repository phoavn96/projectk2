@extends('pages.layout')
@section('content')
    @foreach($list as $blog_list)
        <div class="container">
            <div class="col-sm-12">
                <div class="ps-post--2">
                    <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="#"></a><img src="{{$blog_list->thumbnail}}" style="width: 450px" height="310px"></div>
                    <div class="ps-post__container">
                        <header class="ps-post__header"><a class="ps-post__title" href="blog-details/{{$blog_list->id}}">{{$blog_list->title}}</a>
                            <p>Posted by <a href="#">{{$blog_list->email}}</a> on {{$blog_list->created_at}}  in <a href="#">Shop Az</a> , <a href="#">Stylish</a></p>
                        </header>
                        <div class="ps-post__content">
                            <p>{{$blog_list->description}}</p>
                        </div>
                        <footer class="ps-post__footer"><a class="ps-post__morelink" href="blog-details/{{$blog_list->id}}">READ MORE<i class="ps-icon-arrow-left"></i></a>
                            <div class="ps-post__actions"><span><i class="fa fa-comments"></i> 23 Comments</span><span><i class="fa fa-heart"></i>  likes</span>
                                <div class="ps-post__social"><i class="fa fa-share-alt"></i><a href="#">Share</a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="mt-30">
        <div class="ps-pagination">
            <ul class="pagination">
                <li><a href="http://127.0.0.1:8000/blog?page=1"><i class="fa fa-angle-left"></i></a></li>
                <li class="page-link"><a href="http://127.0.0.1:8000/blog?page=1">1</a></li>
                <li><a class="page-link" href="http://127.0.0.1:8000/blog?page=2">2</a></li>
                <li><a href="http://127.0.0.1:8000/blog?page=2"><i class="fa fa-angle-right"></i></a></li>
            </ul>
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
@endsection
