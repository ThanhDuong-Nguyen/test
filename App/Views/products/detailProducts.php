<?php $html = '<div class="wrap-slick3-dots"></div>'; ?>
<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="/" class="s-text16">
			HOME
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="/danh-muc/<?=$detailproducts['menuSlug']?>" class="s-text16">
			<?=$detailproducts['menuName']?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?=\Core\Helper::decodeSafe($detailproducts['name'])?>
		</span>
	</div>
	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<?php if ($album->num_rows > 0) echo $html ?>
					<!-- <div class="wrap-slick3-dots"></div> -->
					<div class="slick3">
					<?php if ($album->num_rows > 0) {
						while ($row = $album->fetch_assoc()) { ?>
							<div class="item-slick3" data-thumb="<?=$row['file']?>">
								<div class="wrap-pic-w">
									<img src="<?=$row['file']?>" alt="<?=$title?>">
								</div>
							</div>

					<?php } } ?>
					</div>
					<?php if ($album->num_rows <= 0) { ?>
						<div class="item-slick3" data-thumb="<?=$row['file']?>">
							<div class="wrap-pic-w">
								<img src="<?=$detailproducts['file']?>" alt="<?=$title?>">
							</div>
						</div>
					<?php } ?>

				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?=\Core\Helper::decodeSafe($detailproducts['name'])?>
				</h4>

				<span class="m-text17">
					<?=\App\Helpers\Helper::price($detailproducts['price'], $detailproducts['price_sale'])?>
				</span>

				<p class="s-text8 p-t-10">
					<?=\Core\Helper::decodeSafe($detailproducts['description'])?>
				</p>

				<div class="p-t-33 p-b-60">

					<div class="flex-r-m flex-w p-t-10">
						<?php if ((int) $detailproducts['price'] != 0) {  ?>

							<form action="/carts/add" method="POST">
								<div class="w-size16 flex-m flex-w">
									<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
										<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>
										

										<input class="size8 m-text18 t-center num-product" type="number" name="num_product" value="1">

										<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
										</button>
									</div>

									<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
										<!-- Button -->
										<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
											Thêm vào giỏ
										</button>
										<input type="hidden" value="<?=$detailproducts['id']?>" name="product_id">
									</div>
								</div>
							</form>
							
						<?php } ?>
					</div>
				</div>

				<div class="p-b-45">
					<!-- <span class="s-text8 m-r-35">SKU: MUG-01</span> -->
					<span class="s-text8">Danh mục: <?=\Core\Helper::decodeSafe($detailproducts['menuName'])?></span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Mô tả
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?=\Core\Helper::decodeSafe($detailproducts['description'])?>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Chi tiết sản phẩm
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?=\Core\Helper::decodeSafe($detailproducts['content'])?> 
						</p>
					</div>
				</div>

				<!-- <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Sản phẩm cùng danh mục
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php
						if ($related->num_rows > 0) {
						while ($row = $related->fetch_assoc()) { ?>
							<div class="item-slick2 p-l-15 p-r-15">
								<!-- Block2 -->
								<div class="block2">
									<form action="/carts/update" method="POST">
										<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
											<img src="<?=$row['file']?>" alt="<?=\Core\Helper::decodeSafe($row['name'])?>">

											<div class="block2-overlay trans-0-4">
												<div class="block2-btn-addcart w-size1 trans-0-4">
													<!-- Button -->
													<?php if ((int) $row['price'] != 0) {  ?>
														<input type="submit" formaction="/carts/add" value="Thêm vào giỏ" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													<?php } ?>
												</div>
											</div>
										</div>

										<div class="block2-txt p-t-20">
											<a href="/san-pham/<?=$row['slug']?>" class="block2-name dis-block s-text3 p-b-5">
												<?=\Core\Helper::decodeSafe($row['name'])?>
											</a>

											<span class="block2-price m-text6 p-r-5">
												<?=\App\Helpers\Helper::price($row['price'], $row['price_sale'])?>
											</span>
										</div>
									</form>
								</div>
							</div>
					<?php } } ?>

				</div>
			</div>
		</div>
	</section>