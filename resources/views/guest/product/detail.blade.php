@extends('layouts.guest_layout')

@section('content')
<div id="content" class="wrapper">
	<div class="grid">
		<!-- Phần nội dung bên trái 3/4 -->
		<section class="unit three-quarters">
			<article class="post">
				<!-- Tên tieeu -->
				<header class="post-header">
					<h1 class="post-title">{{$product->name}}</h1>
					<div class="breadcrumbs">
						<a href="{{route('get.home')}}">Trang chủ</a> <i class="delimeter"></i> 
						{{$product->name}}
					</div>
				</header>
				
				<!-- Sản phẩm -->
				<div class="ib post-content">
					<div class="post-text">
						<div class="product type-product status-publish hentry sale featured instock">
							<div class="images">
								<!-- Giảm giá -->
								@if($product->sale)
									<span class="onsale" data-appear-animation="rotateIn">-{{$product->sale}}%</span>
								@endif

								<!-- Ảnh đại diện cho sản phẩm -->
								<a href="{{ asset(parse_url_file($product->avatar)) }}" class="woocommerce-main-image image-link zoom">
									<img width="360" height="369" src="{{ asset(parse_url_file($product->avatar)) }}" class="attachment-shop_single wp-post-image" alt="{{$product->name}}" title="" />
								</a>
							
								<!-- Danh sách ảnh còn lại -->
								<div class="thumbnails product-scroller">
									<div class="scroller">
										@if($product->img1)
										<a href="{{ asset(parse_url_file($product->img1)) }}" class="zoom image-link first">
											<img width="67" height="68" src="{{ asset(parse_url_file($product->img1)) }}" class="attachment-shop_thumbnail" alt="{{$product->name}}" />
										</a>
										@endif
										@if($product->img2)
										<a href="{{ asset(parse_url_file($product->img2)) }}" class="zoom image-link first">
											<img width="67" height="68" src="{{ asset(parse_url_file($product->img2)) }}" class="attachment-shop_thumbnail" alt="{{$product->name}}" />
										</a>
										@endif
										@if($product->img3)
										<a href="{{ asset(parse_url_file($product->img3)) }}" class="zoom image-link first">
											<img width="67" height="68" src="{{ asset(parse_url_file($product->img3)) }}" class="attachment-shop_thumbnail" alt="{{$product->name}}" />
										</a>
										@endif
										@if($product->img4)
										<a href="{{ asset(parse_url_file($product->img4)) }}" class="zoom image-link first">
											<img width="67" height="68" src="{{ asset(parse_url_file($product->img4)) }}" class="attachment-shop_thumbnail" alt="{{$product->name}}" />
										</a>
										@endif
									</div>
								</div>
							</div>
							
							<div class="summary entry-summary">
								<header>
									@if($product->sale)
										<span class="old-price">{{number_format($product->price_old,0,',','.')}} đ</span>
									@endif
									<span class="price">{{number_format($product->price,0,',','.')}} đ</span>
									<div class="clear"></div>
									<span class="add-to-cart">
										<a href="{{route('get.cart.add', $product->id)}}" class="button">Chọn mua</a>
									</span>
									
									<div class="rating">
										<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
										<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
										<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
										<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
										<img src="{{ asset('public/guest/images/star-2.png') }}" width="19" height="18" alt="" />
										<span>(<strong>5</strong> đánh giá)</span>
									</div>
								</header>
								
								<div class="product-description">
									<!-- Đọc từng dòng mô tả của sản phẩm và hiển thị -->
									@foreach(preg_split("/((\r?\n)|(\r\n?))/", $product->description) as $line)
										<p>{{$line}}</p>
									@endforeach
								</div>
								
								<footer>
									@if(count($product->keywords) > 0)
									<p><span>Từ khóa:</span>
										@foreach($product->keywords as $keyword)
											<a href="" style="border:1px solid #E91E63;display:inline-block;padding:0 5px;border-radius:5px;color:#E91E63">
												{{$keyword->name}}
											</a>
										@endforeach
									</p>
									@endif
								</footer>
							</div>
						</div>
					</div>
					
					<!-- Mô tả sản phẩm -->
					<div class="clear"></div>
					
					<section class="tabs">
						<div class="liquid-slider content-slider" id="product-tabs">
							<div>
								<h2 class="title">Thông tin</h2>
								{!! $product->content !!}
							</div>

							<div>
								<h2 class="title">Thông số kỹ thuật</h2>
								<table class="tech-info">
									<!-- Đọc từng dòng mô tả của sản phẩm và hiển thị -->
									<?php $i = 1; ?>
									@foreach(preg_split("/((\r?\n)|(\r\n?))/", $product->tech_info) as $line)
										<tr class="{{ ($i % 2) == 0 ? 'odd' : 'even'}}">
											<?php $j = 1; ?>
											@foreach(preg_split("/[:]/", $line) as $part)
												@if($j % 2 != 0)
													<th style="min-width:260px">{{$part}}</th>
												@else
													<td>{{$part}}</td>
												@endif
											<?php $j++; ?>
											@endforeach
										</tr>
									<?php $i++; ?>
									@endforeach
								</table>
							</div>

							<div>
								<h2 class="title">Đánh giá (7)</h2>

								<div id="comments">
									<ol class="comment-list">
										<li class="comment even thread-even depth-1">
										<div class="comment-avatar">
											<img src="images/temp/avatar_2.jpg" width="70" height="70" alt="" />
										</div>
								
										<div class="comment-data">
											<span class="author">James May</span>
											<span class="time">3 July 2013</span>
										</div>
								
										<div class="comment-content">
											<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. By injected humour, or randomised words which don't look even slightly believable.</p>
										</div>
								
										<div class="comment-reply">
											<a href="javascript:;">Trả lời</a> <i class="arrow-keep-reading"></i>
										</div>
							
										<ol class="children">
											<li class="comment even thread-even depth-2">
												<div class="comment-avatar">
													<img src="images/temp/avatar_3.jpg" width="70" height="70" alt="" />
												</div>
								
												<div class="comment-data">	
													<span class="author">James May</span>
													<span class="time">3 July 2013</span>
												</div>
								
												<div class="comment-content">
													<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. By injected humour, or randomised words which don't look even slightly believable.</p>
												</div>
								
												<div class="comment-reply">
													<a href="javascript:;">Trả lời</a> <i class="arrow-keep-reading"></i>
												</div>
											</li>
										</ol>
									</li>

									<li class="comment odd depth-1">
							
										<div class="comment-avatar">
								
											<img src="images/temp/avatar_4.jpg" width="70" height="70" alt="" />
								
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
								
											<img src="images/temp/avatar_1.jpg" width="70" height="70" alt="" />
								
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
								
													<img src="images/temp/avatar_3.jpg" width="70" height="70" alt="" />
									
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
								
															<img src="images/temp/avatar_1.jpg" width="70" height="70" alt="" />
								
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
								
															<img src="images/temp/avatar_2.jpg" width="70" height="70" alt="" />
								
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
						
								<!-- Viết đánh giá -->
								<div id="respond">
									<h3>Viết đánh giá:</h3>
							
									<form action="javascript:;" id="commentform" method="post">
										<fieldset>
								
											<div class="wrapper-block ib half">
												<label class="label" for="author">
													Tên:
												</label>
												<input type="text" id="author" name="author" size="30" />
											</div>
									
											<div class="wrapper-block ib half">
												<label class="label" for="email">
													Địa chỉ email:
												</label>
												<input type="email" id="email" name="email" size="30" />
											</div>
									
											<div class="wrapper-block">
												<label class="label" for="comment">
													Nội dung:
												</label>
												<textarea name="comment" id="comment"></textarea>
											</div>
								
											<input type="submit" id="submit" value="Gửi đánh giá" />
										</fieldset>
									</form>
								</div>
							</div>

						</div>
					</section>
				</div>
				
				<!-- Sản phẩm liên quan -->
				@if(isset($suggestedProducts))
				<div class="related-products" data-appear-animation="fadeIn">
					<header>
						<h2>Sản phẩm liên quan</h2>
					</header>
					
					<div class="items">
						@foreach($suggestedProducts as $suggestedProduct)
							@if($suggestedProduct->id == $product->id)
							<!-- Loại bỏ sản phẩm đang xem ra danh sách liên quan -->
							@else		
							<div class="item box">
								<div class="inside">	
									<a class="thumbnail" href="{{ route('get.product.detail', $suggestedProduct->slug.'-'.$suggestedProduct->id) }}">
										<img src="{{ asset(parse_url_file($suggestedProduct->avatar)) }}" width="180" height="182" alt="" />
									</a>
										
									<a class="title" href="{{ route('get.product.detail', $suggestedProduct->slug.'-'.$suggestedProduct->id) }}">
										{{$suggestedProduct->name}}
									</a>
									
									<div class="rating">
										<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
										<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
										<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
										<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
										<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
									</div>
										
									<div class="rating">
										@if($suggestedProduct->sale)
											<del>{{number_format($suggestedProduct->price_old,0,',','.')}} đ</del>
										@endif
										<span><strong>{{number_format($suggestedProduct->price,0,',','.')}} đ</strong></span>
									</div>
									<a href="{{route('get.cart.add', $suggestedProduct->id)}}" class="button desktop">Chọn mua</a>
									<a href="{{route('get.cart.add', $suggestedProduct->id)}}" class="button show-on-phone">Chọn mua</a>
									<div class="clear"></div>
								</div>
							</div>
							@endif
						@endforeach
					</div>
					<div class="clear"></div>
				</div>
				@endif

			</article>
		</section>
		
		<!-- Phần side bar bên phải 1/4 -->
		@include('guest._components.aside')
	</div>
</div>
@stop