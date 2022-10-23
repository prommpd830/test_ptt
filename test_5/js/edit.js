// loadiing ajax before send
$(document).ajaxSend(function() {
    $('#loading-main').removeClass('d-none');
});

// loading ajax complete
$(document).ajaxComplete(function() {
    $('#loading-main').addClass('d-none');
});

// document ready
$(document).ready(function () {
    const id = $('input[name="id"]').val();
    getPegawai(id);
})

function getPegawai(id) {
    $.ajax({
        url: './action_db/getPegawai.php',
        type: 'get',
        dataType: 'json',
        data: {action: 'get', id : id},
        success: function (response) {
            // console.log(response);

            if(response.success === true) {
                $('input[name="name"]').val(response.data.name);
                $('input[name="email"]').val(response.data.email);
                $('input[name="nip"]').val(response.data.nip);
                $('#img-preview').attr('src', 'upload/'+response.data.photo);
                $(`select[name="gender"] option[value="${response.data.gender}"]`).prop('selected', true);
                $(`select[name="hoby"] option[value="${response.data.hoby}"]`).prop('selected', true);
            } else {
                alert(response.message);
                history.back();
            }
        },
        error: function (response) {
            alert(response.status +' '+ response.message);
        }
    })
}

function editPegawai(url, method, data) {
    $.ajax({
        url: './'+ url,
        type: method,
        dataType: 'json',
        data: data,
        cache:false,
        contentType: false,
        processData: false,
        success: function (response) {
            // console.log(response);

            if(response.success === true) {
                alert(response.message);
                getPegawai(response.id);
            } else {
                alert(response.message);
            }
        },
        error: function (response) {
            alert(response.status +' '+ response.message);
        }
    })
}

$('#form-edit-pegawai').on('submit', function (e) {
    e.preventDefault();

    const url = $(this).attr('action');
    const method = $(this).attr('method');
    const data = new FormData(this);
    // console.log(data);
    editPegawai(url, method, data);
})

$('input[name="photo"]').on('change', function (e) {
    let reader = new FileReader();

    reader.onload = () => {
        $('#img-preview').attr('src', reader.result);
    }
    reader.readAsDataURL(e.target.files[0]);
})