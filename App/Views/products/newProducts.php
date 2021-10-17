<section class="newproduct bgwhite p-t-45">
	<div class="container">
        <section class="newproduct bgwhite p-t-45">
            <div class="container">
                <div class="sec-title p-b-60">
                    <h3 class="m-text5 t-center">
                        HÀNG MỚI VỀ
                    </h3>
                </div>

                <!-- Slide2 -->
                <div class="wrap-slick2">
                    <div class="slick2">
                        <?php if ($newPro->num_rows > 0) {
                            while ($row = $newPro->fetch_assoc()) { ?>
                                <div class="item-slick2 p-l-15 p-r-15">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <form action="/carts/update" method="POST">
                                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
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
    </div>
</section>

