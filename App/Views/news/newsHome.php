<section class="blog bgwhite p-b-65 p-t-35">
	<div class="container">
		<div class="sec-title p-b-52">
			<h3 class="m-text5 t-center">
				NEWS
			</h3>
		</div>

		<div class="row">
            <?php if ($news->num_rows > 0) {
                while ($row = $news->fetch_assoc()) {?>
				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="/bai-viet/<?=$row['slug']?>" class="block3-img dis-block hov-img-zoom">
							<img src="<?=$row['file']?>" alt="<?=\Core\Helper::decodeSafe($row['title'])?>">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="/bai-viet/<?=$row['slug']?>" class="m-text11">
									<?=\Core\Helper::decodeSafe($row['title'])?>
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7"><?=$row['author']?></span>
							<span class="s-text6">on</span> <span class="s-text7"><?=$row['time_create']?></span>

							<p class="s-text8 p-t-16">
								<?=Core\Helper::mysubstr($row['content'], 300)?>
								<a href="/bai-viet/<?=$row['slug']?>" class="s-text20">Đọc tiếp
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</p>			
						</div>
					</div>
				</div>
            <?php } } ?>
		</div>
	</div>
</section>