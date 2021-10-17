<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
	<a href="/" class="s-text16">
		Home
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<a href="/bai-viet" class="s-text16">
		News
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<span class="s-text17">
		<?=$title?>
	</span>
</div>

<!-- content page -->
<section class="bgwhite p-t-60 p-b-25">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9 p-b-80">
				<div class="p-r-50 p-r-0-lg">
					<div class="p-b-40">
						<div class="blog-detail-img wrap-pic-w">
							<img src="<?=$news['file']?>" alt="<?=$title?>">
						</div>

						<div class="blog-detail-txt p-t-33">
							<h4 class="p-b-11 m-text24">
								<?=$title?>
							</h4>

							<div class="s-text8 flex-w flex-m p-b-21">
								<span>
									By <?=\Core\Helper::decodeSafe($news['author'])?>
									<span class="m-l-3 m-r-6">|</span>
								</span>
								<span>
									<?=\Core\Helper::decodeSafe($news['time_create'])?>
									<span class="m-l-3 m-r-6">|</span>
								</span>
							</div>
							<p class="p-b-25">
								<?=\Core\Helper::decodeSafe($news['content'])?>
							</p>
						</div>
					</div>

				</div>
			</div>

			<div class="col-md-4 col-lg-3 p-b-80">
				<div class="rightbar">
					<!-- Search -->
					<div class="pos-relative bo11 of-hidden">
						<form action="/bai-viet" method="GET">
							<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="q" placeholder="Search">

							<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</form>
					</div>

					<!-- Danh mục -->
					<h4 class="m-text23 p-t-56 p-b-34">
						Danh mục
					</h4>

					<ul>
						<?php if ($menus->num_rows > 0) {
						while ($rows = $menus->fetch_assoc()) { ?>
							<li class="p-t-6 p-b-8 bo6">
								<a href="/danh-muc/<?=$rows['slug']?>" class="s-text13 p-t-5 p-b-5">
									<?=$rows['name']?>
								</a>
							</li>
						<?php } } ?>
					</ul>

					<!-- Featured Products -->
					<h4 class="m-text23 p-t-65 p-b-34">
						Sản phẩm nổi bật
					</h4>

					<ul class="bgwhite">
						<?php if ($featuredPro->num_rows > 0) {
							while ($row = $featuredPro->fetch_assoc()) { ?>
								<li class="flex-w p-b-20">
									<a href="/san-pham/<?=$row['slug']?>.html" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
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
		</div>
	</div>
</section>