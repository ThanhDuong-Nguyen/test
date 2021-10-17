<form action="/admin/products/update/<?=$data['id']?>" method="POST">

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên Sản Phẩm</label>
                    <input type="text" name="name" value="<?=\Core\Helper::decodeSafe($data['name'])?>" 
                            class="form-control" placeholder="Nhập Tên " >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Danh Mục</label>
                    <select name="menu_id" class="form-control">
                        <?php  if ($menus->num_rows > 0) {
                                while ($row = $menus->fetch_assoc()) { ?>
                                    <option value="<?=$row['id']?>" <?=$data['menu_id'] == $row['id'] ? 'selected' : '' ?>><?=$row['name']?></option>
                        <?php  }  } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Mô Tả Ngắn</label>
            <textarea name="description" class="form-control"><?=\Core\Helper::decodeSafe($data['description'])?></textarea>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Giá Tiền</label>
                    <input type="number" name="price" value="<?=$data['price']?>" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Giá Giảm</label>
                    <input type="number" name="price_sale" value="<?=$data['price_sale']?>" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Chi Tiết Sản Phẩm</label>
           <textarea name="content" ><?=\Core\Helper::decodeSafe($data['content'])?></textarea>
        </div>
      
        <div class="form-group">
            <label for="">Ảnh Đại Diện</label>
            <input type="file" id="file" class="form-control">
            <div id="thumb">
                <a href="<?=$data['file']?>" target="_blank"><img src="<?=$data['file']?>" width="100px"></a>
            </div>
            <input type="hidden" name="file" value="<?=$data['file']?>" id="url_file">
        </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="customRadio1" 
                        name="active" <?=$data['active'] == 1 ? 'checked' : ''?> >
                    <label for="customRadio1" class="custom-control-label">Có</label>
                </div>

                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="customRadio2" 
                        name="active" <?=$data['active'] == 0 ? 'checked' : ''?>>
                    <label for="customRadio2" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>

        <div class="col-md-6">
                <div class="form-group">
                    <label>Sản phẩm nổi bật</label>
                    <div>
                        <input value="1" type="radio" name="featured" <?=$data['featured'] == 1 ? 'checked' : ''?>>
                        <label for="customRadio1">Có</label>
                    </div>

                    <div>
                        <input value="0" type="radio" name="featured" <?=$data['featured'] == 0 ? 'checked' : ''?>>
                        <label for="customRadio2">Không</label>
                    </div>
                </div>
            </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập Nhật Sản Phẩm</button>
    </div>
</form>

