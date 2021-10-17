<section class="slide1">
	<div class="wrap-slick1">
		<div class="slick1">
			<?php
				if ($sliders->num_rows > 0 ) {
				while ($row = $sliders->fetch_assoc()) { ?>
					<div class="item-slick1 item3-slick1" style="background-image: url(<?=$row['file']?>);">
						<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
							<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
								L2H Store
							</span>

							<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight" style="text-decoration-line:underline !important">
								<?=$row['title']?>
							</h2>

							<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
								<!-- Button -->
								<a href="<?=$row['url']?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
									MUA NGAY
								</a>
							</div>
						</div>
					</div>						
			<?php } } ?>
		</div>
	</div>
</section>
