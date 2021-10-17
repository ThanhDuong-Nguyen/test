<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Danh Mục</th>
            <th>Hình Ảnh</th>
            <th>Album Ảnh</th>
            <th style="width: 150px">Trạng Thái</th>
            <th style="width: 150px">Sản phẩm Nổi bật</th>
            <th style="width: 200px">Ngày Cập Nhật</th>
            <th style="width: 50px">Sửa</th>
            <th style="width: 50px">Xóa</th>
        </tr>
    </thead>
    <tbody>
      
    <?php  if ($products->num_rows > 0) {
        while ($row = $products->fetch_assoc()) {
    ?>
        <tr>
            <td style="width: 50px"><?=$row['id']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['menu_name']?></td>
            <td>
                <a href="<?=$row['file']?>" target="_blank"><img src="<?=$row['file']?>" style="width: 60px; height: 40px" ></a>
            </td>
            <td>
                <a href="/admin/products/album/<?=$row['id']?>">Album</a>
            </td>
            <td style="width: 150px"><?=\App\Helpers\Helper::active($row['active'])?></td>
            <td style="width: 150px"><?=\App\Helpers\Helper::featured($row['featured'])?></td>
            <td style="width: 200px"><?=$row['updated_at']?></td>
            <td><a href="/admin/products/edit/<?=$row['id']?>"><i class="far fa-edit"></i></a></td>
            <td><a href="#" onclick="deleteRow(<?=$row['id']?>, '/admin/products/delete')"><i class="far fa-trash-alt"></i></a></td>      
        </tr>

    <?php  } }  ?>

    </tbody>
</table>
<div><?=page($sumPage, $page, '/admin/products/list')?></div>