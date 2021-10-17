<form action="/admin/news/store" method="POST">

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tiêu đề bài viết</label>
                    <input type="text" name="title" class="form-control" placeholder="Nhập Tên Tiêu Đề " >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tác giả</label>
                    <input type="text" name="author" class="form-control" placeholder="Nhập Tên Tác giả " >
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Vị Trí </label>
            <input type="number" name="sort_by" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="">Ảnh Đại Diện</label>
                <input type="file" id="file" class="form-control">
                <div id="thumb"></div>
                <input type="hidden" name="file" value="" id="url_file">
            </div>

            <div class="col-md-6">
                    <label for="">Đường Dẫn</label>
                    <input type="text" name="url" class="form-control" placeholder="" >
            </div>
        
        </div>

        <div class="form-group" style="margin-top: 10px;">
            <label for="">Nội dung Bài viết</label>
            <textarea name="content" id="content"></textarea>
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
        <button type="submit" class="btn btn-primary">Thêm Bài viết</button>
    </div>
</form>

