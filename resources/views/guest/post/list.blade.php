@extends('layouts.guest_layout')

@section('content')
<div id="content" class="wrapper">
	<div class="grid">
		
		<section class="unit three-quarters">
			<!-- Tên tiêu đề và Đường dẫn -->
			<header class="post-header">
				<h1 class="post-title">Tin tức công nghệ</h1>
				<div class="breadcrumbs">
					<a href="{{route('get.home')}}">Trang chủ</a> <i class="delimeter"></i> 
					Bài viết
				</div>
			</header>
			
			@if($postList)
			<div class="posts">
				<!-- Liệt kê bài viết -->
				@foreach($postList as $post)	
				<article class="post with-thumbnail" data-appear-animation="fadeIn">
					<div class="thumbnail">
						<a href="{{ route('get.post_detail', $post->slug.'-'.$post->id) }}">
							<img src="{{ asset(parse_url_file($post->avatar)) }}" width="364" alt="{{$post->title}}" />
						</a>
						<div class="clear"></div>
					</div>

					<header>
						<h2>
							<a href="{{ route('get.post_detail', $post->slug.'-'.$post->id) }}">
								{{$post->title}}
							</a>
						</h2>
						<div class="data">
							<span class="date">{{ $post->created_at->format("d/m/Y") }}</span> 
							<i class="fa fa-comments-o"></i> 146
						</div>
					</header>

					<div class="text">
						<p>{{$post->description}} [...]</p>
					</div>
					<footer>
						<a href="{{ route('get.post_detail', $post->slug.'-'.$post->id) }}" class="continue-reading">Đọc tiếp...</a>
					</footer>
				</article>
				@endforeach
			</div>
			@endif
			
			<!-- Phân trang -->
			{!! $postList->links() !!}
			<!-- <div class="pagination">						
				<div class="numeric">
					<a href="javascript:;" class="button current">1</a>
					<a href="javascript:;" class="button dark">2</a>
					<a href="javascript:;" class="button dark">Next</a>
				</div>
			</div> -->
			
		</section>
		
		<!-- Phần side bar bên phải 1/4 -->
		@include('guest._components.aside')
		
	</div>
</div>
@stop