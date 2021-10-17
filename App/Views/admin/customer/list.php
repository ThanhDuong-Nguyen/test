<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Khách Hàng</th>
            <th>Số điện thoại</th>
            <th>Trạng thái</th>
            <th>Mã đơn hàng</th>
            <th>Chi tiết đơn hàng</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Ghi chú</th>
            <th>Chiết khấu</th>
            <th>Tiền</th>
            <th>Ngày Đặt hàng</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($customer->num_rows > 0) {
        while ($row = $customer->fetch_assoc()) { ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['phone']?></td>
                <td><?=\App\Helpers\Helper::isView($row['is_view'], $row['id'])?></td>
                <td><?=$row['code']?></td>
                <td><a href="/admin/cart/detail/<?=$row['id']?>">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fas fa-paperclip"></i></a>
                </td>
                <td><?=$row['email']?></td>
                <td><?=$row['address']?></td>
                <td><?=$row['note']?></td>
                <td><?=$row['discount']?></td>
                <td><?=$row['total']?></td>
                <td><?=$row['created_at']?></td>
                <td><a href="/admin/customer/edit/<?=$row['id']?>"><i class="far fa-edit"></i></a></td>
                <td><a href="#" onclick="deleteRow(<?=$row['id']?>, '/admin/customer/delete')"><i class="far fa-trash-alt"></i></a></td>
            </tr>
        <?php  } }  ?>    
    </tbody>
</table>
