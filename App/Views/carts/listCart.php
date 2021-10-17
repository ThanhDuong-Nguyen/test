
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(uploads/heading-pages-06.jpg);">
	<h2 class="l-text2 t-center" style="text-decoration-line:underline !important">
		<?=$title?>
	</h2>
</section>

	<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
	<div class="container">
		<form action="" method="POST">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Sản phẩm</th>
							<th class="column-3">Đơn giá</th>
							<th class="column-4 p-l-70">Số lượng</th>
							<th class="column-5">Thành tiền</th>
							<th>&nbsp;</th>
						</tr>

						<?php
					
							$sumTotal = $ck = $total = 0;
							if ($cartProducts->num_rows > 0) { 
								while ($products = $cartProducts->fetch_assoc()) {
									$price = $products['price_sale'] != 0 ? $products['price_sale'] : $products['price'];
									$qty = isset($_SESSION['carts'][$products['id']]) ? $_SESSION['carts'][$products['id']] : 1;
									$sumPrice = $price * $qty;
									$sumTotal += $sumPrice;
									if (!is_null($discount)) {
										$ck = (int) $discount['value'];
										$total = (int) $sumTotal - $ck;
									} ?>
										<tr class="table-row">
											<td class="column-1">
												<div class="cart-img-product b-rad-4 o-f-hidden">
													<img src="<?=$products['file']?>" alt="<?=\Core\Helper::decodeSafe($products['name'])?>">
												</div>
											</td>
											<td class="column-2"><?=\Core\Helper::decodeSafe($products['name'])?></td>
											<td class="column-3"><?=number_format($price, 0, '', '.')?></td>
											<td class="column-4 p-l-70">
												<div class="flex-w bo5 of-hidden w-size17">
													<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
														<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
													</button>

													<input class="size8 m-text18 t-center num-product" type="number" name="num_product[<?=$products['id']?>]" value="<?=$qty?>">

													<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
														<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
													</button>
												</div>
											</td>
											<td class="column-5"><?=number_format($sumPrice, 0, '', '.')?></td>
											<td class="p-r-30"><a href="/carts/delete/<?=$products['id']?>"><i class="fa fa-trash"></i></a></td>
										</tr>
						
						<?php } } ?>
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
						<div class="size11 bo4 m-r-10">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon_code" placeholder="Thêm mã Giảm giá">
						</div>

						<div class="size9 trans-0-4 m-t-10 m-b-10 m-r-10">
							<!-- Button -->
							<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Thêm
							</button>
						</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<input type="submit" value="Cập nhật" formaction="/carts/update" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
				</div>
			</div>
		</form>
		<!-- Total -->
		<form action="/carts/store" method="POST" class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
			
			<h5 class="m-text20 p-b-24">
				Đơn Hàng
			</h5>

			<div class="flex-w flex-sb-m p-b-12">
				<span class="s-text18 w-size19 w-full-sm">
					Tổng:
				</span>

				<span class="m-text21 w-size20 w-full-sm">
					<?=number_format($sumTotal, 0, '', '.')?> vnđ
				</span>
			</div>
			<div class="flex-w flex-sb-m p-b-12">
				<span class="s-text18 w-size19 w-full-sm">
					Chiết khấu:
				</span>

				<span class="m-text21 w-size20 w-full-sm">
					<?=is_null($discount) ? '0' : '-' . number_format($ck, 0, '', '.') ?> vnđ
				</span>
			</div>
			<div class="flex-w flex-sb-m p-b-12">
				<span class="s-text18 w-size19 w-full-sm">
					Còn:
				</span>

				<span class="m-text21 w-size20 w-full-sm">
					<?=is_null($discount) ? number_format($sumTotal, 0, '', '.') : number_format($total, 0, '', '.')?> vnđ
				</span>
			</div>
			<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
				<span class="s-text18 w-size19 w-full-sm">
					Tên Anh/Chị:
				</span>

				<div class="size13 bo4 m-b-22">
					<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="name" placeholder="Nhập tên Anh/Chị" required>
				</div>

				<span class="s-text18 w-size19 w-full-sm">
					Số điện thoại:
				</span>

				<div class="size13 bo4 m-b-22">
					<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="phone" placeholder="Nhập Số điện thoại" required>
				</div>

				<span class="s-text18 w-size19 w-full-sm">
					Email:
				</span>

				<div class="size13 bo4 m-b-22">
					<input class="sizefull s-text7 p-l-15 p-r-15" type="email" name="email" placeholder="Nhập Email">
				</div>

				
				<span class="s-text18 w-size19 w-full-sm">
					Địa chỉ:
				</span>

				<div class="size13 bo4 m-b-22">
					<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="address" placeholder="Nhập Địa chỉ">
				</div>

				<span class="s-text18 w-size19 w-full-sm">
					Ghi chú:
				</span>

				<div class="size13 bo4 m-b-22">
					<textarea name="note" class="dis-block sizefull s-text7 size15 p-l-15 p-r-15"></textarea>
				</div>
			</div>

			<div class="size15 trans-0-4">
			<input type="hidden" name="total" value="<?=is_null($discount) ? $sumTotal : $total?>">
			<input type="hidden" name="discount" value="<?=is_null($discount) ? '0' : $ck?>">
				<!-- Button -->
				<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
					Đặt hàng ngay
				</button>
			</div>
				
		</form>
	</div>
</section>





