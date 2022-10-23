// loadiing ajax before send
$(document).ajaxSend(function() {
    $('#loading-main').removeClass('d-none');
});

// loading ajax complete
$(document).ajaxComplete(function() {
    $('#loading-main').addClass('d-none');
});

function insertPegawai(url, method, data) {
    $.ajax({
        url: './'+ url,
        type: method,
        dataType: 'json',
        data: data,
        cache:false,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);

            if(response.success === true) {
                alert(response.message);
                $('#form-insert-pegawai')[0].reset();
                $('#img-preview').attr('src', '');
            } else {
                alert(response.message);
            }
        },
        error: function (response) {
            alert(response.status +' '+ response.message);
        }
    })
}

$('#form-insert-pegawai').on('submit', function (e) {
    e.preventDefault();

    const url = $(this).attr('action');
    const method = $(this).attr('method');
    const data = new FormData(this);
    insertPegawai(url, method, data);
})

$('input[name="photo"]').on('change', function (e) {
    let reader = new FileReader();

    reader.onload = () => {
        $('#img-preview').attr('src', reader.result);
    }
    reader.readAsDataURL(e.target.files[0]);
})