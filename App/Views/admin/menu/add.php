<form action="/admin/menus/store" method="POST">

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên Danh Mục</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập Tên Danh Mục" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Danh Mục</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">Danh Mục Cha</option>

                        <?php  if ($menus->num_rows > 0) {
                                while ($row = $menus->fetch_assoc()) { ?>
                                    <option value="<?=$row['id']?>"><?=$row['name']?></option>

                        <?php  }  } ?>
                        
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Mô Tả Ngắn</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="">Vị Trí </label>
            <input type="number" name="order_by" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="active" checked="">
                <label for="customRadio1" class="custom-control-label">Có</label>
            </div>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="active">
                <label for="customRadio2" class="custom-control-label">Không</label>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
    </div>
</form>
          