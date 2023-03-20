@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Thông tin sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$sanpham->name}}</p>
								<p class="single-item-price">
									@if($sanpham->promotion_price == $sanpham->unit_price)
										<span >{{number_format($$sanpham->unit_price)}}</span>
										@else
										<span class="flash-del">{{number_format($sanpham->unit_price)}} </span>
										<span class="flash-sale">{{number_format($sanpham->promotion_price)}}<span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Tùy chọn:</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option>Số lượng</option>
									<option value="1">1</option>
								</select>
								<a class="add-to-cart" href="{{route('themvaogiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->description}} </p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>SẢN PHẨM TƯƠNG TỰ</h4>
						<div class="row">
							@foreach($sptt as $tt)
							<div class="col-sm-4">
								<div class="single-item">
									@if($tt->promotion_price!=$tt->unit_price)
										<div class="ribbon-wrapper">
											<div class="ribbon sale">SALE</div></div>
									@endif 
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$tt->id)}}"><img src="source/image/product/{{$tt->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$tt->name}}</p>
										<p class="single-item-price">
											@if(($tt->promotion_price==$tt->unit_price))
												<span >{{number_format($tt->unit_price)}}đồng</span>
											@else
												<span class="flash-del">{{number_format($tt->unit_price)}} </span>
												<span class="flash-sale">{{number_format($tt->promotion_price)}} <span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href={{route('themvaogiohang',$tt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$tt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$sptt->links("pagination::bootstrap-4")}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">BÁN CHẠY</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/image/product/sp1.jpg" alt=""></a>
									<div class="media-body">
										GIÀY NIKE AIR MAX
										<span class="beta-sales-price">2,150,000</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/image/product/sp6.jpg" alt=""></a>
									<div class="media-body">
										GIÀY ADIDAS PUREBOOST
										<span class="beta-sales-price">1,700,000</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/image/product/sp11.jpg" alt=""></a>
									<div class="media-body">
										GIÀY LACOSTE L005 222
										<span class="beta-sales-price">2,750,000</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/image/product/sp15.jpg" alt=""></a>
									<div class="media-body">
										GIÀY PUMA TAPER
										<span class="beta-sales-price">2,850,000</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">SẢN PHẨM MỚI</h3>

						<div class="widget-body">
							@foreach($new_product as $new)
							<div class="beta-sales beta-lists">								
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/image/product/{{$new->image}}" alt=""></a>
									<div class="media-body" style="font-size:12px">
										{{$new->name}}
										<span class="beta-sales-price">{{number_format($new->promotion_price)}}</span>
									</div>
								</div>		
							</div>
							@endforeach

							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
