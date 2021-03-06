<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(uploads/heading-pages-06.jpg);">
	<h2 class="l-text2 t-center" style="text-decoration-line:underline !important">
		<?=$title?>
	</h2>
</section>
<!-- News -->
<section class="bgwhite p-t-60">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9 p-b-75">
				<div class="p-r-50 p-r-0-lg">
					<?php if ($news->num_rows > 0) {
						while ($row = $news->fetch_assoc()) { ?>
							<!-- item blog -->
							<div class="item-blog p-b-60">
								<a href="/bai-viet/<?=$row['slug']?>" class="item-blog-img pos-relative dis-block hov-img-zoom">
									<img src="<?=$row['file']?>" alt="<?=\Core\Helper::decodeSafe($row['title'])?>">

									<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
										<?=$row['time_create']?>
									</span>
								</a>

								<div class="item-blog-txt p-t-33">
									<h4 class="p-b-11">
										<a href="/bai-viet/<?=$row['slug']?>" class="m-text24">
											<?=\Core\Helper::decodeSafe($row['title'])?>
										</a>
									</h4>

									<div class="s-text8 flex-w flex-m p-b-21">
										<span>
											By <?=$row['author']?>
											<span class="m-l-3 m-r-6">|</span>
										</span>

										<span>
											<?=$row['time_create']?>
											<span class="m-l-3 m-r-6">|</span>
										</span>
									</div>

									<p class="p-b-10">
										<?=Core\Helper::mysubstr(($row['content']), 300)?>
									</p>
									<a href="/bai-viet/<?=$row['slug']?>" class="s-text20">
										Đọc tiếp
										<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
									</a>
								</div>
							</div>
					<?php } } ?>
				</div>
				<!-- Pagination -->
				<div class="pagination flex-m flex-w p-t-26" style="justify-content:center"><?=pageHome($sumPage, $page)?></div>
			</div>

			<div class="col-md-4 col-lg-3 p-b-75">
				<div class="rightbar">
					<!-- Search -->
					<div class="pos-relative bo11 of-hidden">
						<form action="" method="GET">
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