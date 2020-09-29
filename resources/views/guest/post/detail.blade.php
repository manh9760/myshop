@extends('layouts.guest_layout')

@section('content')
<div id="content" class="wrapper">
	<div class="grid">
		
		<section class="unit three-quarters">
			<article class="post">
				<!-- Tên tiêu đề và Đường dẫn -->
				<header class="post-header">
					<h1 class="post-title">Tin tức công nghệ</h1>
					<div class="breadcrumbs">
						<a href="{{route('get.home')}}">Trang chủ</a> <i class="delimeter"></i> 
						<a href="{{route('get.post_list')}}">Tin công nghệ</a> <i class="delimeter"></i>
						{{$post->title}}
					</div>
				</header>

				<div class="ib post-date">
					<div class="ib day">{{ $post->created_at->format("d") }}</div>
					<div class="month">Tháng {{ $post->created_at->format("m") }}</div>
					<div class="year">{{ $post->created_at->format("Y") }}</div>
					<div class="comments-count"><span><i class="fa fa-comments-o"></i> 14</span></div>
				</div>

				<div class="ib post-content">
					<div class="post-slider">
						<div class="post-slider-carousel">
							<img src="{{ asset(parse_url_file($post->avatar)) }}" width="849" alt="{{$post->title}}" />
						</div>
						<div class="clear"></div>
					</div>

					<div class="post-text">
						<h2>{{$post->title}}</h2>

						<p>{!! $post->content !!}</p>
						<footer>
							<p>
								<strong>Liên kết:</strong>
								<a href="javascript:;">web design</a>, <a href="javascript:;">print retro</a>, <a href="javascript:;">design</a>, <a href="javascript:;">vector</a>, <a href="javascript:;">info</a>
							</p>
						
							<p>
								<strong>Danh mục:</strong>
								<a href="javascript:;">summer</a>, <a href="javascript:;">web design</a>, <a href="javascript:;">print retro</a>, <a href="javascript:;">design</a>, <a href="javascript:;">vector</a>, <a href="javascript:;">info</a>
							</p>
						
							<p class="share-post">
								<strong>Chia sẻ bài viết:</strong> 
							
								<a href="javascript:;"><i data-tip-gravity="s" title="Pinterest" class="fa fa-pinterest-square show-tooltip"></i></a> 
								<a href="javascript:;"><i data-tip-gravity="s" title="Facebook" class="fa fa-facebook-square show-tooltip"></i></a> 
								<a href="javascript:;"><i data-tip-gravity="s" title="Dribbble" class="fa fa-dribbble show-tooltip"></i></a> 
								<a href="javascript:;"><i data-tip-gravity="s" title="Linkedin" class="fa fa-linkedin-square show-tooltip"></i></a>
								<a href="javascript:;"><i data-tip-gravity="s" title="Twitter" class="fa fa-twitter-square show-tooltip"></i></a>
							</p>
						
							<!-- Thông tin tác giả -->
							<div class="author-info">
								<div class="avatar">
									<img src="{{ asset('public/guest/images/temp/avatar_1.jpg') }}" width="70" height="70" alt="" />
								</div>
								<div class="text">
									<a class="author-title" href="javascript:;"><span>Tác giả:</span> Paul Summers</a>
									<p>The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. </p>
									<div class="social-icons">
										<a href="javascript:;"><i title="Facebook" class="fa fa-facebook-square show-tooltip"></i></a>
										<a href="javascript:;"><i title="Linkedin" class="fa fa-linkedin-square show-tooltip"></i></a>
										<a href="javascript:;"><i title="Twitter" class="fa fa-twitter-square show-tooltip"></i></a>
									</div>
								</div>
							</div>
						</footer>
					</div>
				</div>

				<!-- Bài viết liên quan -->
				@if($suggestedPosts)
				<div class="related-posts" data-appear-animation="fadeIn">
					<h2>Bài viết liên quan</h2>
					<h4>Có thể bạn quan tâm</h4>
					<div class="items">
						@foreach($suggestedPosts as $suggestedPost)
							@if($suggestedPost->id == $post->id)
							<!-- Loại bỏ bài viết hiện tại ra danh sách liên quan -->
							@else					
							<div class="item post box">
								<div class="thumbnail">
									<a href="{{ route('get.post_detail', $suggestedPost->slug.'-'.$suggestedPost->id) }}">
										<img src="{{ asset(parse_url_file($suggestedPost->avatar)) }}" alt="" />
									</a>
									<div class="clear"></div>
								</div>
								
								<h5>
									<a href="{{ route('get.post_detail', $suggestedPost->slug.'-'.$suggestedPost->id) }}">
										{{$suggestedPost->title}}
									</a>
								</h5>
								
								<header>
									<strong>{{ $suggestedPost->created_at->format("d/m/Y") }}</strong> 
									<span class="comments"><i class="fa fa-comments-o"></i> 146</span>
								</header>
								
								<div class="excerpt">
									<p>{{ \Str::words($suggestedPost->description, '25') }} [...]</p>
								</div>
								
								<footer>
									<a href="{{ route('get.post_detail', $suggestedPost->slug.'-'.$suggestedPost->id) }}">Chi tiết...</i></a>
								</footer>				
							</div>
							@endif
						@endforeach
					</div>
					<div class="clear"></div>
				</div>
				@endif

				<!-- Ý kiến bình luận -->	
				<div id="comments" data-appear-animation="fadeIn">
				
					<h3><span>14</span> comments:</h3>
					
					<ol class="comment-list">
						<li class="comment even thread-even depth-1">
						
							<div class="comment-avatar">
							
								<img src="{{ asset('public/guest/images/temp/avatar_2.jpg') }}" width="70" height="70" alt="" />
							
							</div>
							
							<div class="comment-data">
							
								<span class="author">James May</span>
								
								<span class="time">3 July 2013</span>
							
							</div>
							
							<div class="comment-content">
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. By injected humour, or randomised words which don't look even slightly believable.</p>
							</div>
							
							<div class="comment-reply">
								<a href="javascript:;">Reply</a> <i class="arrow-keep-reading"></i>

								<!--
								<a href="javascript:;" class="likes">
									Like 
									<i class="fa fa-thumbs-up"></i>
								</a>
								-->
								
							</div>
						
							<ol class="children">
								<li class="comment even thread-even depth-2">
						
									<div class="comment-avatar">
							
										<img src="{{ asset('public/guest/images/temp/avatar_3.jpg') }}" width="70" height="70" alt="" />
							
									</div>
							
									<div class="comment-data">
								
										<span class="author">James May</span>
								
										<span class="time">3 July 2013</span>
							
									</div>
							
									<div class="comment-content">
										<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. By injected humour, or randomised words which don't look even slightly believable.</p>
									</div>
							
									<div class="comment-reply">
										<a href="javascript:;">Reply</a> <i class="arrow-keep-reading"></i>
										
										<!--
										<a href="javascript:;" class="likes">
											Like 
											<i class="fa fa-thumbs-up"></i>
										</a>
										-->
										
									</div>
						
								</li>
							</ol>
						
						</li>
						<li class="comment odd depth-1">
						
							<div class="comment-avatar">
							
								<img src="{{ asset('public/guest/images/temp/avatar_4.jpg') }}" width="70" height="70" alt="" />
							
							</div>
							
							<div class="comment-data">
							
								<span class="author">James May</span>
								
								<span class="time">3 July 2013</span>
							
							</div>
							
							<div class="comment-content">
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. By injected humour, or randomised words which don't look even slightly believable.</p>
							</div>
							
							<div class="comment-reply">
								<a href="javascript:;">Reply</a> <i class="arrow-keep-reading"></i>
								<!--
								<a href="javascript:;" class="likes">
									Like 
									<i class="fa fa-thumbs-up"></i>
								</a>
								-->
							</div>
						
						</li>
						<li class="comment odd depth-1">
						
							<div class="comment-avatar">
							
								<img src="{{ asset('public/guest/images/temp/avatar_1.jpg') }}" width="70" height="70" alt="" />
							
							</div>
							
							<div class="comment-data">
							
								<span class="author">James May</span>
								
								<span class="time">3 July 2013</span>
							
							</div>
							
							<div class="comment-content">
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. By injected humour, or randomised words which don't look even slightly believable.</p>
							</div>
							
							<div class="comment-reply">
								<a href="javascript:;">Reply</a> <i class="arrow-keep-reading"></i>
								<!--
								<a href="javascript:;" class="likes">
									Like 
									<i class="fa fa-thumbs-up"></i>
								</a>
								-->
							</div>
						
							<ol class="children">
								<li class="comment even thread-even depth-2">
						
									<div class="comment-avatar">
							
										<img src="{{ asset('public/guest/images/temp/avatar_3.jpg') }}" width="70" height="70" alt="" />
							
									</div>
							
									<div class="comment-data">
								
										<span class="author">James May</span>
								
										<span class="time">3 July 2013</span>
							
									</div>
							
									<div class="comment-content">
										<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. By injected humour, or randomised words which don't look even slightly believable.</p>
									</div>
							
									<div class="comment-reply">
										<a href="javascript:;">Reply</a> <i class="arrow-keep-reading"></i>
										<!--
										<a href="javascript:;" class="likes">
											Like 
											<i class="fa fa-thumbs-up"></i>
										</a>
										-->
									</div>
						
									<ol class="children">
										<li class="comment even thread-even depth-3">
						
											<div class="comment-avatar">
							
												<img src="{{ asset('public/guest/images/temp/avatar_1.jpg') }}" width="70" height="70" alt="" />
							
											</div>
							
											<div class="comment-data">
								
												<span class="author">James May</span>
								
												<span class="time">3 July 2013</span>
							
											</div>
							
											<div class="comment-content">
												<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. By injected humour, or randomised words which don't look even slightly believable.</p>
											</div>
							
											<div class="comment-reply">
												<a href="javascript:;">Reply</a> <i class="arrow-keep-reading"></i>
												<!--
												<a href="javascript:;" class="likes">
													Like 
													<i class="fa fa-thumbs-up"></i>
												</a>
												-->
											</div>
						
										</li>
										<li class="comment odd thread-even depth-3">
						
											<div class="comment-avatar">
							
												<img src="{{ asset('public/guest/images/temp/avatar_2.jpg') }}" width="70" height="70" alt="" />
							
											</div>
							
											<div class="comment-data">
								
												<span class="author">James May</span>
								
												<span class="time">3 July 2013</span>
							
											</div>
							
											<div class="comment-content">
												<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. By injected humour, or randomised words which don't look even slightly believable.</p>
											</div>
							
											<div class="comment-reply">
												<a href="javascript:;">Reply</a> <i class="arrow-keep-reading"></i>
												<!--
												<a href="javascript:;" class="likes">
													Like 
													<i class="fa fa-thumbs-up"></i>
												</a>
												-->
											</div>
						
										</li>
									</ol>
						
								</li>
							</ol>
						
						</li>
					</ol>
					
					<!--
					
						ADD COMMENT FORM
						
					-->
					<div id="respond" data-appear-animation="fadeIn">
						<h3>Add your comment:</h3>
						
						<form action="javascript:;" id="commentform" method="post">
							<fieldset>
							
								<div class="wrapper-block ib half">
									<label class="label" for="author">
										Name:
									</label>
									<input type="text" id="author" name="author" size="30" />
								</div>
								
								<div class="wrapper-block ib half">
									<label class="label" for="email">
										Email:
									</label>
									<input type="email" id="email" name="email" size="30" />
								</div>
								
								<div class="wrapper-block">
									<label class="label" for="comment">
										Comment:
									</label>
									<textarea name="comment" id="comment"></textarea>
								</div>
							
								<input type="submit" id="submit" value="Add Comment" />
							
							</fieldset>
						</form>
						
					</div>
				
				</div>
			</article>
				
		</section>

		<!-- Phần side bar bên phải 1/4 -->
		@include('guest._components.aside')
	</div>
</div>
@stop