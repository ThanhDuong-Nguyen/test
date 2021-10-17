<form action="/admin/sliders/update/<?=$data['id']?>" method="POST">

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tiêu Đề Slider</label>
                    <input type="text" name="title" value="<?=\Core\Helper::decodeSafe($data['title'])?>" class="form-control" placeholder="Nhập Tiêu Đề " >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Vị Trí</label>
                    <input type="number" name="sort_by" value="<?=$data['sort_by']?>" class="form-control" >
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Đường Dẫn</label>
            <input type="text" name="url" value="<?=$data['url']?>" class="form-control" >
        </div>

        <div class="form-group ">
            <label for="">File Ảnh</label>
            <input type="file" id="file" class="form-control" <?=\Core\Helper::decodeSafe($data['file'])?>>
            <div id="thumb">
                <a href="<?=$data['file']?>" target="_blank">
                    <img src="<?=$data['file']?>" width="200px">
                </a>
            </div>
            <input type="hidden" name="file" value="<?=$data['file']?>" id="url_file">
        </div>
        
        <div class="form-group">
            <label>Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="active" <?=$data['active'] == 1 ? 'checked' : ''?>>
                <label for="customRadio1" class="custom-control-label">Có</label>
            </div>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="active" <?=$data['active'] == 0 ? 'checked' : ''?>>
                <label for="customRadio2" class="custom-control-label">Không</label>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật Slider</button>
    </div>
</form>

