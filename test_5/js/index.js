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
    // load datatable
    $('#table-pegawai').DataTable();
    loadPegawai();
})

function loadPegawai() {
    $.ajax({
        url: './action_db/getPegawai.php',
        type: 'get',
        dataType: 'json',
        data: {action: 'all'},
        success: function (response) {
            // console.log(response);

            $('#table-pegawai tbody').html('');
            let tablePegawai = $('#table-pegawai').DataTable();
            // each to data table+
            $.each(response.data, function(key,val) {
                tablePegawai.row.add([
                    val.id,
                    val.name,
                    val.email,
                    val.gender,
                    val.nip,
                    val.hoby,
                    `<img class="img-fluid img-thumbnail" src="upload/${val.photo}" alt="${val.photo}">`,
                    `<a class="text-decoration-none text-warning" href="edit.php?id=${val.id}">Edit</a> | <a class="text-decoration-none text-danger deletePegawai" href="action_db/deletePegawai.php" data-id="${val.id}">Delete</a>`
                ]).draw(false);
            });

            $('.deletePegawai').unbind();
            $('.deletePegawai').on('click', function (e) {
                e.preventDefault();

                let result = confirm("Want to delete?");
                if (result) {
                    const url = $(this).attr('href');
                    const method = 'post';
                    const id = $(this).data('id');
                    deletePegawai(url, method, id);
                } else {
                    return false;
                }
            })

        },
        error: function (response) {
            alert(response.status +' '+ response.message);
        }
    })
}

function deletePegawai(url, method, id) {
    $.ajax({
        url: './'+ url,
        type: method,
        dataType: 'json',
        data: {id: id},
        success: function (response) {
            // console.log(response);

            if(response.success === true) {
                alert(response.message);
                location.reload();
            } else {
                alert(response.message);
            }
        },
        error: function (response) {
            alert(response.status +' '+ response.message);
        }
    })
}

