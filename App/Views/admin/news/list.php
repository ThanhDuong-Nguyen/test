<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu Đề</th>
            <th>Tác Giả</th>
            <th>Ảnh Đại Diện</th>
            <th>Nội dung</th>
            <th>Đường dẫn</th>
            <th>Sắp xếp</th>
            <th>Trạng thái</th>
            <th>Ngày cập nhật</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if ($data->num_rows > 0) {
                while ($row = $data->fetch_assoc()) { ?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['title']?></td>
                        <td><?=$row['author']?></td>
                        <td>
                            <a href="<?=$row['file']?>" target="_blank">
                                <img src="<?=$row['file']?>" width="150px">
                            </a>
                        </td>
                        <td>
                            <?=Core\Helper::mysubstr($row['content'], 300)?>
                        </td>
                        <td><?=$row['url']?></td>
                        <td><?=$row['sort_by']?></td>
                        <td><?=\App\Helpers\Helper::active($row['active'])?></td>
                        <td><?=$row['updated_at']?></td>
                        <td>
                            <a href="/admin/news/edit/<?=$row['id']?>"><i class="far fa-edit"></i>
                        </td>
                        <td>
                            <a href="#" onclick="deleteRow(<?=$row['id']?>, '/admin/news/delete')"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>

        <?php } } ?>
    </tbody>
</table>