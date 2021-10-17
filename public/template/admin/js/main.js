function deleteRow(id = 0, url = '')
{
    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc?')) {
        $.ajax({
            type : 'POST',
            dataType : 'JSON',
            data : { id },
            url  : url,
            success : function (result) {
                alert(result.message);

                if (result.error == false) {
                    location.reload();
                }
            }
        });
    }
}

/* Upload File */

$('#file').change(function () {

    var formData = new FormData();
    formData.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false, 
        type : 'POST',
        dataType : 'JSON',
        data : formData,
        url : '/admin/upload/add',
        success : function (result) {
            if (result.error == false) {
                $('#url_file').val('/' + result.url);
                
                const html = '<a href="/' + result.url + '" target="_blank"><img src="/' + result.url + '" width="100px"></a>';
                $('#thumb').html(html);
            } else {
                alert(result.message);
            }
        }
    })
});

