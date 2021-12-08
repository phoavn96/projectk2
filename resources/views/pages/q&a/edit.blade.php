@extends('pages.layout')
@section('content')
    <script type="text/javascript" language="javascript">
        function PrintPopup() {
            window.open('/Utilities/PrintView.aspx?distributionid=96288', '', 'width = 890,height = 480,location= yes, resizable=yes,scrollbars=yes, toolbar=no,location=no,menubar=no');
        }
        function EmailPopup(url) {
            window.open('/Utilities/Email4Friend.aspx?news_url=' + url, '', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no'); return false;
        }

        function socialShare(type, title, link) {
            title = typeof title !== 'undefined' ? title : document.title;
            link = typeof link !== 'undefined' ? link : window.location.href;

            var eTitle = encodeURIComponent(title);
            var eLink = encodeURIComponent(link);

            switch (type) {
                case 'fb':
                    window.open('http://www.facebook.com/sharer.php?u=' + eLink + '&t=' + eTitle);
                    break;

                case 'tw':
                    window.open('http://twitter.com/home?status=' + eTitle + ' ' + eLink);
                    break;

                case 'zm':
                    window.open('http://link.apps.zing.vn/share?u=' + eLink + '&t=' + eTitle);
                    break;

                case 'lh':
                    window.open('http://linkhay.com/submit?url=' + eLink + '&title=' + eTitle);
                    break;
            }
            return false;
        }

        function sns_click(type) { var sns_sharekey; if (type == "facebook") { sns_sharekey = 'http://www.facebook.com/sharer.php?u='; } else if (type == "zingme") { sns_sharekey = 'http://link.apps.zing.vn/share?url='; } else if (type == "googleplus") { sns_sharekey = 'https://plus.google.com/share?url='; } var u = location.href; var t = document.title; window.open(sns_sharekey + encodeURIComponent(u) + '&amp;t=' + encodeURIComponent(t), 'sharer', 'toolbar=0,status=0,width=626,height=436'); return false; }
    </script>
    <form role="form" action="{{URL::to('/qa/'.$question->id.'/edit')}}" method="post" id="account-form" >
        {{csrf_field()}}
    <div class="container">
        <div class="col-sm-12">
            <article class="main-article clearfix">
                <header><h2> Tên câu hỏi :{{$question->name}}</h2></header>
                <div class="meta clearfix">
                    <p class="author">Người hỏi <strong>{{$question->email}}</strong></p>
                    <div class="stuff">
                        <time>{{$question->created_at}}</time>
                    </div>
                </div>
                <div class="text">
                    <div class="subtitle"><h3>Chi tiết câu hỏi : </h3>
                    </div>
                    <div>
                        <p>{{$question->question}}</p>
                    </div>
                    <div class="QA-box clearfix">
                        <div class="question-text">
                            <div style="text-align: justify;"></div>
                            <!-- <div class="relate-author"><span class="tac-gia">Đặng Minh Quang, Trần Minh Tiến, Nguyễn Quốc Nam</span></div> -->
                        </div>
                    </div>

                    <div class="subtitle"><h3>Trả lời : </h3>
                        <input type="form-control" class="form-control" id="data-name" name="answer">
                    </div>
                    <div class="QA-box clearfix">
                        <div class="answer-text">
                            <div class="nguoi-tra-loi">
                            </div>
                            <div class="answer-content">
                                <p style="text-align: justify;"></p>
                            </div>
                        </div>
                    </div>
                        <div class="add-data-btn">
                            <button class="btn btn-primary">Trả lời</button>
                        </div>
                        <div class="col-sm-12">
                            <p></p>
                        </div>
                        <div class="cancel-data-btn">
                            <button class="btn btn-primary" name="add_product" type="reset" >Nhập lại</button>
                        </div>


                </div>
            </article>
        </div>
    </div>
    </form>
@endsection
