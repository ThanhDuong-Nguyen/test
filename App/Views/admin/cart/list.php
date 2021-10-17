<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Khách Hàng</th>
            <th>Tên sản phẩm</th>
            <th>Hình Ảnh</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng</th>
        </tr>
    </thead>
    <tbody>
      
    <?php  if ($cart->num_rows > 0) {
        while ($row = $cart->fetch_assoc()) { ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['product_name']?></td>
            <td>
                <a href="<?=$row['product_thumb']?>" target="_blank"><img src="<?=$row['product_thumb']?>" style="width: 60px; height: 80px" ></a>
            </td>
            <td><?=$row['qty']?></td>
            <td><?=number_format($row['price'], 0, '', '.')?><sup>đ</sup></td>
            <td><?=number_format(($row['price'] * $row['qty']), 0, '', '.')?><sup>đ</sup></td>
      
        </tr>

    <?php } } ?>

    </tbody>
</table>