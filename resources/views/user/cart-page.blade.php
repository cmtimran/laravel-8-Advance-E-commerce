@extends('layouts.fontend-master')
@section('content')
@section('title')
@if (session()->get('language') == 'bangla')
	কার্ট পেইজ
@else
	Cart Page
@endif
@endsection
@php
	function bn_price($str){
		$en = array(1,2,3,4,5,6,7,8,9,0);
		$bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
		$str = str_replace($en,$bn,$str);
		return $str;
	}
@endphp

<div class="breadcrumb">
	<div class="container">
	  <div class="breadcrumb-inner">
		<ul class="list-inline list-unstyled">
		  <li><a href="#">Home</a></li>
		  <li class="active">Shopping Cart</li>
		</ul>
	  </div>
	  <!-- /.breadcrumb-inner -->
	</div>
	<!-- /.container -->
  </div>
  <!-- /.breadcrumb -->

  <div class="body-content outer-top-xs">
	<div class="container">
	  <div class="row">
		<div class="shopping-cart">
		  <div class="shopping-cart-table">
			<div class="table-responsive">
			  <table class="table">
				<thead>
				  <tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Subtotal</th>
					<th class="cart-total last-item">Grandtotal</th>
				  </tr>
				</thead>
				<!-- /thead -->
				<tfoot>
				  <tr>
					<td colspan="7">
					  <div class="shopping-cart-btn">
						<span class="">
						  <a
							href="{{ url('/') }}"
							class="btn btn-upper btn-primary outer-left-xs"
							>Continue Shopping</a
						  >
						  {{-- <a
							href="#"
							class="btn btn-upper btn-primary pull-right outer-right-xs"
							>Update shopping cart</a
						  > --}}
						</span>
					  </div>
					  <!-- /.shopping-cart-btn -->
					</td>
				  </tr>
				</tfoot>
				<tbody id="cart">
				  
				</tbody>
				<!-- /tbody -->
			  </table>
			  <!-- /table -->
			</div>
		  </div>
		  <!-- /.shopping-cart-table -->
		  
		  <!-- /.estimate-ship-tax -->

		  <div class="col-md-6 col-sm-12 estimate-ship-tax">
			 @if (Session::has('coupon'))
				 
			 @else
			<table class="table" id="couponField">
			  <thead>
				<tr>
				  <th>
					<span class="estimate-title">Discount Code</span>
					<p>Enter your coupon code if you have one..</p>
				  </th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td>
					<div class="form-group">
					  <input
						type="text"
						id="coupon_name"
						class="form-control unicase-form-control text-input"
						placeholder="You Coupon.."
					  />
					</div>
					<div class="clearfix pull-right">
					  <button type="submit" onclick="applyCoupon()" class="btn-upper btn btn-primary">
						APPLY COUPON
					  </button>
					</div>
				  </td>
				</tr>
			  </tbody>
			  <!-- /tbody -->
			</table> 
			 @endif 
			
			<!-- /table -->
		  </div>
		  <!-- /.estimate-ship-tax -->

		  <div class="col-md-6 col-sm-12 cart-shopping-total">
			<table class="table">
			  <thead id="couponcalField">
				{{-- <tr>
				  <th>
					<div class="cart-sub-total">
					  Subtotal<span class="inner-left-md">$600.00</span>
					</div>
					<div class="cart-sub-total">
						Coupon<span class="inner-left-md">$600.00</span>
					</div>
					<div class="cart-sub-total">
						Discount<span class="inner-left-md">$600.00</span>
					</div>
					<div class="cart-grand-total">
					  Grand Total<span class="inner-left-md">$600.00</span>
					</div>
				  </th>
				</tr> --}}
			  </thead>
			  <!-- /thead -->
			  <tbody>
				<tr>
				  <td>
					<div class="cart-checkout-btn pull-right">
					  <a
						href="{{ route('checkout') }}"
						type="submit"
						class="btn btn-primary checkout-btn"
					  >
						PROCCED TO CHEKOUT
					</a>
					</div>
				  </td>
				</tr>
			  </tbody>
			  <!-- /tbody -->
			</table>
			<!-- /table -->
		  </div>
		  <!-- /.cart-shopping-total -->
		</div>
		<!-- /.shopping-cart -->
	  </div>
	  <!-- /.row -->
	  <!-- ============================================== BRANDS CAROUSEL ============================================== -->
	  
	  @include('fontend.inc.brand')


@endsection