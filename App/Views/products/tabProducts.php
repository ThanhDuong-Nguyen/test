<section class="bgwhite p-t-45 p-b-58">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					Sản phẩm
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#new-products" role="tab">Hàng mới về</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#featured" role="tab">Sản phẩm nổi bật</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Sale</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-35">
					<!-- New Products -->
					<div class="tab-pane fade" role="tabpanel" id="new-products">
						<div class="row">
                            <?php if ($newProducts->num_rows > 0) {
                                    while ($row = $newProducts->fetch_assoc()) { ?>
                                        <?php include _VIEW_ . '/products/products.php'; ?>
                            <?php } } ?>
                        </div>
                    </div>

					<!-- Featured -->
					<div class="tab-pane fade show active" id="featured" role="tabpanel">
						<div class="row">
                            <?php if ($featuredPro->num_rows > 0) {
                                while ($row = $featuredPro->fetch_assoc()) { ?>
                                    <?php include _VIEW_ . '/products/products.php'; ?>
                            <?php } } ?>
						</div>
					</div>

					<!-- SALE -->
					<div class="tab-pane fade" id="sale" role="tabpanel">
						<div class="row">
                                <?php if ($salePro->num_rows > 0) {
                                    while ($row = $salePro->fetch_assoc()) { ?>
                                        <?php include _VIEW_ . '/products/products.php'; ?>
                                <?php } } ?>
					    </div>
				    </div>
			</div>
		</div>
</section>