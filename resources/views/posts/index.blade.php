@extends('layouts.main')
    @section('title', 'Blog')

@section('content')
    @if($posts->count())

        <!-- Featured Post-->
        <x-featured-post :post="$posts[0]"  />

        @if($posts->count() > 1)
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5">
                    <h2 class="fw-bolder fs-5 mb-4">Featured Stories</h2>
                    <div class="row gx-5">
                        @foreach($posts as $post)
                            <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="{{@asset($post->image->path )}}" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="{{route('posts.show', $post)}}"><div class="h5 card-title mb-3">{{$post->post_title}}</div></a>
                                    <p class="card-text mb-0">{{$post->excerpt}}</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">{{$post->author->name}}</div>
                                                <div class="text-muted">{{$post->created_at->diffForHumans()}} &middot; 6 min read</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="text-end mb-5 mb-xl-0">
                        {{$posts->links()}}
{{--                        <a class="text-decoration-none" href="#!">--}}
{{--                            More stories--}}
{{--                            <i class="bi bi-arrow-right"></i>--}}
{{--                        </a>--}}
                    </div>
                </div>
            </section>
        @endif
    @else
        <p>No posts yet. Please check back later.</p>
    @endif
@endsection
