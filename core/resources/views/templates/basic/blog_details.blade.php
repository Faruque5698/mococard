@extends($activeTemplate.'layouts.frontend')
@section('content')
    <!-- Blog Section Starts Here -->
    <section class="blog-section pt-120 pb-120 bg--section">
        <div class="container">
            <div class="row gy-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="post__details pb-50">
                        <div class="post__header">
                            <h3 class="post__title">
                                {{ __(@$blog->data_values->title) }}
                            </h3>
                            <ul class="post-meta d-flex flex-wrap align-items-center">
                                <li><i class="las la-user-circle"></i> @lang('by Admin')</li>
                                <li><i class="las la-eye"></i> {{ __(@$blog->view) }} </li>
                            </ul>
                            <p>
                                {{ substr($blog->data_values->description, 0, 450) }}
                            </p>
                        </div>
                        <div class="post__thumb">
                            <img src="{{ getImage('assets/images/frontend/blog/' .@$blog->data_values->image, '700x450') }}" alt="blog">
                        </div>
                        <p>
                            {{ substr($blog->data_values->description, 450) }}
                        </p>

                        <div class="col-md-6">
                            <h6 class="post__share__title">@lang('Share now')</h6>
                            <ul class="post__share">
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?=u{{ url()->current() }}" target="_blank">
                                        <i class="lab la-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/home?status={{ url()->current() }}" target="_blank">
                                        <i class="lab la-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}" target="_blank">
                                        <i class="lab la-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.reddit.com/submit?url={{ url()->current() }}" target="_blank">
                                        <i class="lab la-reddit"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-12">
                            <div class="fb-comments mt-5" data-href="{{ route('blog.details',[$blog->id,slug($blog->data_values->title)]) }}" data-numposts="5">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="blog-sidebar bg--body">

                        <div class="widget widget__post__area">
                            <h5 class="widget__title">@lang('Recent Blog')</h5>
                            <ul>

                                @foreach ($latestBlogs as $latestBlog)
                                    <li>
                                        <a href="{{ route('blog.details', ['slug'=>slug($latestBlog->data_values->title), 'id'=>$latestBlog->id]) }}" class="widget__post">
                                            <div class="widget__post__thumb">
                                                <img src="{{ getImage('assets/images/frontend/blog/' .$latestBlog->data_values->image, '700x450') }}" alt="blog">
                                            </div>
                                            <div class="widget__post__content">
                                                <h6 class="widget__post__title">
                                                    {{ __($latestBlog->data_values->title) }}
                                                </h6>
                                                <span>{{ showDateTime($latestBlog->created_at) }}</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="widget widget__post__area">
                            <h5 class="widget__title">@lang('Top View')</h5>
                            <ul>

                                @foreach ($topBlogs as $topBlog)
                                    <li>
                                        <a href="{{ route('blog.details', ['slug'=>slug($topBlog->data_values->title), 'id'=>$topBlog->id]) }}" class="widget__post">
                                            <div class="widget__post__thumb">
                                                <img src="{{ getImage('assets/images/frontend/blog/' .$topBlog->data_values->image, '700x450') }}" alt="blog">
                                            </div>
                                            <div class="widget__post__content">
                                                <h6 class="widget__post__title">
                                                    {{ __($topBlog->data_values->title) }}
                                                </h6>
                                                <span>{{ showDateTime($topBlog->created_at) }}</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>


                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section Ends Here -->
@endsection

@push('fbComment')
	@php echo loadFbComment() @endphp
@endpush

@push('seo_share')
<meta itemprop="name" content="{{ $blog->data_values->title }}">
<meta itemprop="description" content="{{ $blog->data_values->description }}">
<meta itemprop="image" content="{{ getImage('assets/images/frontend/blog/' .@$blog->data_values->image, '700x450') }}">
@endpush

@push('share')
<meta property="og:title" content="{{ $blog->data_values->title }}">
<meta property="og:description" content="{{ $blog->data_values->description }}">
<meta property="og:image" content="{{ getImage('assets/images/frontend/blog/' .@$blog->data_values->image, '700x450') }}"/>
@endpush
