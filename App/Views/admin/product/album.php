
<style>
.color-filter1 {background-color: #00bbec;}
.color-filter2 {background-color: #2c6ed5;}
.color-filter3 {background-color: #ffa037;}
.color-filter4 {background-color: #ff5337;}
.color-filter5 {background-color: #a88c77;}
.color-filter6 {background-color: #393939;}
.color-filter7 {background-color: #cccccc;}

.checkbox-color-filter {
  display: none;
}

.color-filter {
    display:block;
    width:25px;
    height:25px;
    cursor:pointer;
    border-radius: 50%;
    margin: 5px;
}

.checkbox-color-filter:checked + .color-filter {
  box-shadow: 0 0 0px 2px black;
  -moz-box-shadow: 0 0 0px 2px black;
  -webkit-box-shadow: 0 0 0px 2px black;
  -o-box-shadow: 0 0 0px 2px black;
  -ms-box-shadow: 0 0 0px 2px black;
}
</style>

<form action="/admin/products/updateAlbum/<?=$data['id']?>" method="POST" enctype="multipart/form-data">
    <div class="card-body">
  
        <div class="form-group">
            <label for="">Thêm ảnh</label>
            <input type="file" id="file" class="form-control" name="file[]" multiple>
            <div id="thumb"></div>
            <input type="hidden" name="file" id="url_file">
        </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
</form>

