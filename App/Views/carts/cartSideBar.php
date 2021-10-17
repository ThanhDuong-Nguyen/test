<img src="/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
<span class="header-icons-noti">
    <?=isset($_SESSION['carts']) ? count($_SESSION['carts']) : 0?>
</span>
<!-- Header cart noti -->
<div class="header-cart header-dropdown">
    <ul class="header-cart-wrapitem">
        <?php        
            $sumTotalSB = 0;
            $cartSidebar = \App\Helpers\Helper::cartProducts();
            
            if ($cartSidebar !== false && $cartSidebar->num_rows > 0) { 
                while ($productsCarts = $cartSidebar->fetch_assoc()) {
                    $priceSB = $productsCarts['price_sale'] != 0 ? $productsCarts['price_sale'] : $productsCarts['price'];
                    $qtySB = isset($_SESSION['carts'][$productsCarts['id']]) ? $_SESSION['carts'][$productsCarts['id']] : 1;
                    $sumPriceSB = $priceSB * $qtySB;
                    $sumTotalSB += $sumPriceSB; ?>

                        <li class="header-cart-item">
                            <div class="header-cart-item-img">
                                <img src="<?=$productsCarts['file']?>" alt="<?=\Core\Helper::decodeSafe($productsCarts['name'])?>">
                            </div>

                            <div class="header-cart-item-txt">
                                <a href="#" class="header-cart-item-name">
                                    <?=\Core\Helper::decodeSafe($productsCarts['name'])?>
                                </a>

                                <span class="header-cart-item-info">
                                    <?=$qtySB . ' x ' . number_format($priceSB, 0, '', '.')?> vnđ
                                </span>
                            </div>
                        </li>

        <?php } } ?>
    </ul>

    <div class="header-cart-total">
        Tổng: <?=number_format($sumTotalSB, 0, '', '.')?> vnđ
    </div>

    <div class="header-cart-buttons">
            <!-- Button -->
            <a href="/gio-hang" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 m-l-55 m-r-55">
                Thanh toán
            </a>   
    </div>
</div>
