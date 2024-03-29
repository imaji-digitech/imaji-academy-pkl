<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            @if(Request::segment(1) == 'blog')
            <form action="{{route('blogSearchPost')}}" method="post">
                @csrf
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search_terms" placeholder='Search Keyword'
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'" >
                        <div class="input-group-append">
                            <button class="btn" type="button"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
            </form>
            @elseif(Request::segment(1) == 'berita')
                <form action="{{route('beritaSearchPost')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search_terms" placeholder='Search Keyword'
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'" >
                            <div class="input-group-append">
                                <button class="btn" type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
                </form>
            @endif
        </aside>

        @if(Request::segment(1) == 'blog')
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Category</h4>
            <ul class="list cat-list">
                @foreach(Site::getTags() as $t)
                <li>
                    <a href="{{route('blogTagLink',$t->id)}}" class="d-flex">
                        <p>{{$t->tag}}</p>
                        <p>({{$t->contentTags->count()}})</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </aside>

        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title">Recent Post</h3>
            @foreach(Site::getRecentPostBlog() as $rp)
            <div class="media post_item">
                <img src="{{asset('storage/content/'.$rp->thumbnail)}}" style="width: 120px; height: 120px;"   alt="post">
                <div class="media-body">
                    <a href="{{route('show',$rp->id)}}">
                        <h3>{{$rp->title}}</h3>
                    </a>
                    <p>{{$rp->created_at->format('F j, Y ')}}</p>
                </div>
            </div>
            @endforeach
        </aside>

        @elseif(Request::segment(1) == 'berita')
            <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title">Category</h4>
                <ul class="list cat-list">
                    @foreach(Site::getTags() as $t)
                        <li>
                            <a href="{{route('newsTagLink',$t->id)}}" class="d-flex">
                                <p>{{$t->tag}}</p>
                                <p>({{$t->contentTags->count()}})</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

            <aside class="single_sidebar_widget popular_post_widget">
                <h3 class="widget_title">Recent Post</h3>
                @foreach(Site::getRecentPostNews() as $rp)
                    <div class="media post_item">
                        <img src="{{asset('storage/content/'.$rp->thumbnail)}}" style="width: 120px; height: 120px;"   alt="post">
                        <div class="media-body">
                            <a href="{{route('shownews',$rp->id)}}">
                                <h3>{{$rp->title}}</h3>
                            </a>
                            <p>{{$rp->created_at->format('F j, Y ')}}</p>
                        </div>
                    </div>
                @endforeach
            </aside>
        @endif
{{--        <aside class="single_sidebar_widget tag_cloud_widget">--}}
{{--            <h4 class="widget_title">Tag Clouds</h4>--}}
{{--            <ul class="list">--}}
{{--                @foreach($tag as $t)--}}
{{--                    <li>--}}
{{--                        <a href="#">{{$t->tag}}</a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </aside>--}}


{{--        <aside class="single_sidebar_widget instagram_feeds">--}}
{{--            <h4 class="widget_title">Instagram Feeds</h4>--}}
{{--            <ul class="instagram_row flex-wrap">--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <img class="img-fluid" src="{{asset('frontend/img/post/post_5.png')}}" alt="">--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <img class="img-fluid" src="{{asset('frontend/img/post/post_6.png')}}" alt="">--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <img class="img-fluid" src="{{asset('frontend/img/post/post_7.png')}}" alt="">--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <img class="img-fluid" src="{{asset('frontend/img/post/post_8.png')}}" alt="">--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <img class="img-fluid" src="{{asset('frontend/img/post/post_9.png')}}" alt="">--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <img class="img-fluid" src="{{asset('frontend/img/post/post_10.png')}}" alt="">--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </aside>--}}


        <aside class="single_sidebar_widget newsletter_widget">
            <h4 class="widget_title">Newsletter</h4>

            <form action="#">
                <div class="form-group">
                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                        type="submit">Subscribe</button>
            </form>
        </aside>
    </div>
</div>
