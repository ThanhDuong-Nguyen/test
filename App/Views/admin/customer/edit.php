<form action="/admin/customer/update/<?=$data['id']?>" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Tên Khách Hàng</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?=\Core\Helper::decodeSafe($data['name'])?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?=\Core\Helper::decodeSafe($data['phone'])?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?=\Core\Helper::decodeSafe($data['email'])?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?=\Core\Helper::decodeSafe($data['address'])?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group">
                <label for="email">Ghi chú</label>
                <input type="text" class="form-control" id="note" name="note" value="<?=\Core\Helper::decodeSafe($data['note'])?>">
            </div>
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="is_view" <?=$data['is_view'] == 1 ? 'checked' : ''?>>
                <label for="customRadio1" class="custom-control-label">Đã xem</label>
            </div>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="is_view" <?=$data['is_view'] == 0 ? 'checked' : ''?>>
                <label for="customRadio2" class="custom-control-label">Chưa xem</label>
            </div>
        </div>      
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
</form>