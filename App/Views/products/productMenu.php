
<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(/uploads/heading-pages-06.jpg);">
	<p class="m-text13 t-center">
		Bộ sưu tập
	</p>
	<h2 class="l-text2 t-center" style="text-decoration-line:underline !important">
		<?=$title?>
	</h2>	
</section>

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<h4 class="m-text14 p-b-10">
						Danh mục
					</h4>

					<ul class="p-b-50">
						<?php if ($menus->num_rows > 0) {
						while ($rows = $menus->fetch_assoc()) { ?>
							<li class="p-t-4">
								<a href="/danh-muc/<?=$rows['slug']?>" class="s-text13 active1">
									<?=$rows['name']?>
								</a>
							</li>
						<?php } } ?>						
					</ul>

											<!-- Featured Products -->
					<h4 class="m-text14 p-t-30 p-b-34">
						Sản phẩm nổi bật
					</h4>

					<ul class="bgwhite">
						<?php if ($featuredPro->num_rows > 0) {
							while ($row = $featuredPro->fetch_assoc()) { ?>
							<li class="flex-w p-b-20">
								<a href="/san-pham/<?=$row['slug']?>" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="<?=$row['file']?>" alt="<?=\Core\Helper::decodeSafe($row['name'])?>">
								</a>

								<div class="w-size23 p-t-5">
									<a href="/san-pham/<?=$row['slug']?>" class="s-text20">
										<?=\Core\Helper::decodeSafe($row['name'])?>
									</a>

									<span class="dis-block s-text17 p-t-6">
										<?=\App\Helpers\Helper::price($row['price'], $row['price_sale'])?>
									</span>
								</div>
							</li>
						<?php } } ?>
					</ul>
				</div>
			</div>

			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
				<!--Filter-->
				<div class="flex-sb-m flex-w p-b-35">
					<div class="flex-w">
						<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text14 color0-hov trans-0-4">
							Filter : &nbsp;
							<i class="down-mark fs-16 color1 fa fa-caret-down dis-none" aria-hidden="true"></i>
							<i class="up-mark fs-16 color1 fa fa-caret-right" aria-hidden="true"></i>
							
							<span class="s-text20 p-t-5 p-b-5" style="margin-left: 650px;">
								Hiển thị <?=$listProducts->num_rows?> kết quả
							</span>
						</h5>

						<div class="dropdown-content dis-none p-t-15 p-b-23">
							<div class="w-size12 m-t-5 m-b-5 m-l-10 m-r-47" style="float:left">
								<nav>
									<h4 class="s-text12 p-b-5">
									Sắp xếp theo:
									</h4>
									<ul style="margin-left:5px;">
										<li>
											<a href="<?=\App\Helpers\Helper::getFilter()?>" >Mặc định</a>
										<li>
										<li>
											<a href="<?=\App\Helpers\Helper::getFilter(['price' => 'newest'])?>">Mới nhất</a>
										<li>
											<a href="<?=\App\Helpers\Helper::getFilter(['price' => 'oldest'])?>">Cũ nhất</a>
										</li>
										<li>
											<a href="<?=\App\Helpers\Helper::getFilter(['price' => 'asc'])?>">Giá: Tăng dần</a>
										</li>
										<li>
											<a href="<?=\App\Helpers\Helper::getFilter(['price' => 'desc'])?>">Giá: Giảm dần</a>
										</li>
									</ul>
								</nav>
							</div>

							<div class="w-size12 m-t-5 m-b-5 m-r-10 m-l-10" style="float:left">
								<nav>
									<h4 class="s-text12 p-b-5">
										Giá:
									</h4>
									<ul>
										<li>
											<a href="<?=\App\Helpers\Helper::getFilter(['range' => '0-500000'])?>" >0 - 500.000</a>
										<li>
											<a href="<?=\App\Helpers\Helper::getFilter(['range' => '500000-1000000'])?>" >500.000 - 1.000.000</a>
										</li>
										<li>
											<a href="<?=\App\Helpers\Helper::getFilter(['range' => '1000000-2000000'])?>" >1.000.000 - 2.000.000</a>
										</li>
										<li>
											<a href="<?=\App\Helpers\Helper::getFilter(['range' => '2000000-++'])?>" >2.000.000 ++</a>
										</li>
									</ul>
								</nav>
							</div>
							
							<div class="search-product pos-relative bo4 of-hidden m-t-5 m-b-5 m-l-130" style="float:left">
								<form action="" method="GET">
									<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="q" placeholder="Tìm kiếm sản phẩm...">
									<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
										<i class="fs-12 fa fa-search" aria-hidden="true"></i>
									</button>
								</form>
							</div>
							
						</div>
					</div>

				</div>
				
				<!-- Product -->
				<div class="row">
					<?php if ($listProducts->num_rows > 0) {
						while ($row = $listProducts->fetch_assoc()) { ?>
							<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<form action="/carts/update" method='POST'>
										<div class="block2-img wrap-pic-w of-hidden pos-relative block2<?=\App\Helpers\Helper::btnPrice($row['price_sale'])?>">
											<img src="<?=$row['file']?>" alt="<?=\Core\Helper::decodeSafe($row['name'])?>">
											<div class="block2-overlay trans-0-4">
												<div class="block2-btn-addcart w-size1 trans-0-4">
												<input type="hidden" value="<?=$row['id']?>" name="product_id">
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
											<?php if ($row['price_sale'] != 0) { ?>
												<span class="block2-oldprice m-text7 p-r-5">
													<?=number_format($row['price'], 0, '', '.')?> vnđ
												</span>
												
												<span class="block2-newprice m-text8 p-r-5">
													<?=number_format($row['price_sale'], 0, '', '.')?> vnđ
												</span>
											<?php } ?>

											<?php if ($row['price_sale'] == 0 && $row['price'] != 0) { ?>
												<span class="block2-newprice m-text8 p-r-5">
													<?=number_format($row['price'], 0, '', '.')?> vnđ
												</span>
											<?php } ?>

											<?php if ($row['price_sale'] == 0 && $row['price'] == 0) { ?>	
												<span class="block2-newprice m-text8 p-r-5">
													<a href="/lien-he">Liên Hệ</a> 
												</span>
											<?php } ?>

										</div>
									</form>
								</div>
							</div>
					<?php } } ?>
				</div>
				<!-- Pagination -->
				<div class="pagination flex-m flex-w p-t-26" style="justify-content:center"><?=pageHome($sumPage, $page)?></div>	
			</div>
		</div>
	</div>
</section>