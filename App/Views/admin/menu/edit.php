<form action="/admin/menus/update/<?=$data['id']?>" method="POST">

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên Danh Mục</label>
                    <input type="text" value="<?=\Core\Helper::decodeSafe($data['name'])?>" name="name" class="form-control" placeholder="Nhập Tên Danh Mục" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Danh Mục</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">Danh Mục Cha</option>

                        <?php  if ($menus->num_rows > 0) {
                                while ($row = $menus->fetch_assoc()) { ?>
                                    <option value="<?=$row['id']?>"  <?=$row['id'] == $data['parent_id'] ? 'selected' : ''?>>
                                        <?=$row['name']?>
                                    </option>
                        <?php  }  } ?>
                        
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Mô Tả Ngắn</label>
            <textarea name="description" class="form-control"><?=\Core\Helper::decodeSafe($data['description'])?></textarea>
        </div>

        <div class="form-group">
            <label for="">Vị Trí </label>
            <input type="number" value="<?=$data['order_by']?>" name="order_by" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="customRadio1" 
                    name="active" <?=$data['active'] == 1 ? 'checked' : '' ?>>
                <label for="customRadio1" class="custom-control-label">Có</label>
            </div>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="customRadio2" 
                    name="active" <?=$data['active'] == 0 ? 'checked' : '' ?>>
                <label for="customRadio2" class="custom-control-label">Không</label>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
    </div>
</form>
          