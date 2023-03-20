@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Checkout</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trangchu')}}">Home</a> / <span>Checkout</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			<div class="alter alter-success">{{Session::get('thongbao')}}</div>
			<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-6">
						<h4>Thông tin khách hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" name="name" required placeholder="Nhập Họ và tên">
						</div>
						<div class="form-block">
							<label for="gender">Giới tính</label>
							<input type="radio" id="gender" name="gender" value="Nam" checked="checked" style="width: 10%; "><span style="padding-right: 20px;">Nam</span>
							<input type="radio" id="gender" name="gender" value="Nữ" checked="checked" style="width: 10%;"><span>Nữ</span>
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="address" name="address" value="" required placeholder="Nhập địa chỉ">
						</div>

						<div class="form-block">
							<label for="email">Email *</label>
							<input type="email" id="email" name="email" required placeholder="example@gmail.com">
						</div>

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" required placeholder="">
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="note" name="note"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
									@if(Session::has('cart'))
									@foreach($product_cart as $cart)
										<div class="media">
											<img width="35%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$cart['item']['name']}}</p>
												<span class="color-gray your-order-info">Giá: {{number_format($cart['item']['promotion_price'])}}</span>
												<span class="color-gray your-order-info">Số lượng: {{$cart['qty']}}</span>
											</div>
										</div>
									@endforeach
									@endif
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}} đồng @else 0 đồng @endif</h5></div>
									
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
	
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán trực tiếp </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Nhận hàng rời trả tiền
										</div>						
									</li>
									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Tài khoản ngân hàng </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chủ tài khoản: Linh
											<br>STK: BIDV 25110002805297
											<br>....................
											<br>Chủ tài khoản: Khánh
											<br>STK: BIDV 25110002805317
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Thanh toán <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection