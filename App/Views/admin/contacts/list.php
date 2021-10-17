<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Người Liên Hệ</th>
            <th>Số điện thoại</th>
            <th>Trạng thái</th>
            <th>Email</th>
            <th>Nội dung</th>
            <th>Ngày Liên Hệ</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($contacts->num_rows > 0) {
        while ($row = $contacts->fetch_assoc()) { ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['phone']?></td>
                <td><?=\App\Helpers\Helper::isConfirm($row['is_confirm'], $row['id'])?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['message']?></td>
                <td><?=$row['created_at']?></td>
                <td><a href="#" onclick="deleteRow(<?=$row['id']?>, '/admin/contact/delete')"><i class="far fa-trash-alt"></i></a></td>
            </tr>
        <?php  } }  ?>    
    </tbody>
</table>