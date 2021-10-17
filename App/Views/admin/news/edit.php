
<form action="/admin/news/update/<?=$new['id']?>" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tiêu đề bài viết</label>
                    <input type="text" name="title" class="form-control" value="<?=\Core\Helper::decodeSafe($new['title'])?>" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tác giả</label>
                    <input type="text" name="author" value="<?=$new['author']?>" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Vị Trí </label>
            <input type="number" name="sort_by" value="<?=$new['sort_by']?>" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="">Ảnh Đại Diện</label>
                <input type="file" id="file" class="form-control">
                <div id="thumb"><a href="<?=$new['file']?>" target="_blank"><img src="<?=$new['file']?>" width="150px"></a></div>
                <input type="hidden" name="file" value="<?=$new['file']?>" id="url_file">
            </div>

            <div class="col-md-6">
                    <label for="">Đường Dẫn</label>
                    <input type="text" name="url" value="<?=$new['url']?>" class="form-control">
            </div>
        
        </div>

        <div class="form-group" style="margin-top: 10px;">
            <label for="">Nội dung Bài viết</label>
            <textarea name="content" id="content"><?=\Core\Helper::decodeSafe($new['content'])?></textarea>
        </div> 

        <div class="form-group">
            <label>Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="active" <?=$new['active'] == 1 ? 'checked' : ''?>>
                <label for="customRadio1" class="custom-control-label">Có</label>
            </div>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="active" <?=$new['active'] == 0 ? 'checked' : ''?>>
                <label for="customRadio2" class="custom-control-label">Không</label>
            </div>
        </div>
        </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật Bài viết</button>
    </div>
</form>


