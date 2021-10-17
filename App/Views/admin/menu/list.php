<table class="table table-bordered ">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Danh Mục</th>
            <th style="width: 200px">Sắp Xếp</th>
            <th style="width: 250px">Trạng Thái</th>
            <th style="width: 300px">Ngày Cập Nhật</th>
            <th style="width: 70px">Sửa</th>
            <th style="width: 70px">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?=\App\Helpers\Helper::menuShow($menus)?>
    </tbody>
</table>