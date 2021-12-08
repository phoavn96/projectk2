@extends('pages.layout')
@section('content')


   <div class="container">
       <div class="col-sm-12">
           <div class="ps-post--detail">
               <div class="ps-post__thumbnail"><img src="images/blog/11.png" alt=""></div>
               <div class="ps-post__header">
                   <h3 class="ps-post__title">{{$blog->title}}</h3>
                   <p class="ps-post__meta">Posted by <a href="#">{{$blog->email}}</a> on {{$blog->created_at}}  in <a href="#">ShopAz</a> , <a href="#">Stylish</a></p>
               </div>

               <div class="ps-post__content">
                   <p>{{$blog->description}}</p>
                   <blockquote>
                       <p>
                           Có vẻ như ngay từ khi bạn bắt đầu thực hiện niềm yêu thích thiên văn học của mình một cách nghiêm túc, điều mà bạn nghĩ đến là bạn sẽ nhận được loại kính thiên văn nào. Và không có gì phải bàn cãi, việc đầu tư vào một chiếc kính thiên văn tốt thực sự có thể nâng cao niềm yêu thích của bạn với niềm đam mê mới trong thiên văn học.</p>
                       <p class="author">{{$blog->email}} <br> <span>ShopAz</span></p>
                   </blockquote>
                   <a href=""><img src="{{$blog->thumbnail}}"style="width: 100%"height="100%" alt=""></a>
                   <p>{{$blog->description}}</p>
               </div>
               <div class="ps-post__footer">
                   <p class="ps-post__tags"><i class="fa fa-tags"></i><a href="#">Man shoe</a>,<a href="#"> Woman</a>,<a href="#"> Nike</a></p>
                   <div class="ps-post__actions"><span><i class="fa fa-comments"></i> 23 Comments</span><span><i class="fa fa-heart"></i>  likes</span>
                       <div class="ps-post__social"><i class="fa fa-share-alt"></i><a href="#">Share</a>
                           <ul>
                               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="fb-comments" data-href="http://127.0.0.1:8000/blog-details/1" data-numposts="20" data-width="100%"></div>
               </div>
           </div>
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
