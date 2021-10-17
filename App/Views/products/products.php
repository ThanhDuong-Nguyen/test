<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
    <!-- Block2 -->
    <div class="block2">
        <form action="/carts/update" method='POST'>
            <div class="block2-img wrap-pic-w of-hidden pos-relative block2<?=\App\Helpers\Helper::btnPrice($row['price_sale'])?>">
                <img src="<?=$row['file']?>" alt="<?=\Core\Helper::decodeSafe($row['name'])?>">

                <div class="block2-overlay trans-0-4">
                    <div class="block2-btn-addcart w-size1 trans-0-4">
                        <input type="hidden" value="<?=$row['id']?>" name="product_id" id="product_id">
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
