$(document).ready(function() {

    $('#btnAddUserModal').on('click', function() {
        $('#addUserModal').modal('show');
    });

    $('#btnStoreUser').on('click', function() {
        let formData = $('#formAddUser').serialize();

        $('#nameErr').addClass('d-none');
        $('#emailErr').addClass('d-none');
        $('#roleErr').addClass('d-none');
        $('#passwordErr').addClass('d-none');
        
        $.ajax({
            url: "user",
            method: 'POST',
            data: formData,
            success: function(data) {
                swal("Sukses", "Data user berhasil ditambahkan!", "success");
                setTimeout(function(){
                    window.location.assign('user');
                }, 1500);
            },
            error: function(data) {
                var errors = data.responseJSON;
                if($.isEmptyObject(errors) == false){
                    $.each(errors.errors, function(key, value){
                        var ErrorId = '#' + key + 'Err';
                        $(ErrorId).removeClass('d-none');
                        $(ErrorId).text(value)
                    })
                }
            }
        })
    });


    $('.btnEditUserModal').on('click', function() {
        let id = $(this).data('id');
        
        $.ajax({
            url: `user/${id}/edit`,
            method: 'GET',
            success: function(data) {
                $('#editUserModal').find('.modal-body').html(data)
                $('#editUserModal').modal('show');
            },
            error: function(error) {
                alert('gagal')
            }
        })
    });


    $('#btnUpdateUser').on('click', function() {
        let id = $('#editUserModal').find('#id_data').val();
        let formData = $('#formEditUser').serialize();

        $.ajax({
            url: `user/${id}`,
            method: 'PATCH',
            data: formData,
            success: function(data) {
                $('#editUserModal').modal('hide');
                swal("Sukses", "Data user berhasil diedit!", "success");
                setTimeout(function(){
                    window.location.assign('user');
                }, 1500);
            },
            error: function(data) {
                var errors = data.responseJSON;
                if($.isEmptyObject(errors) == false){
                    $.each(errors.errors, function(key, value){
                        var ErrorId = '#' + key + 'Er';
                        $(ErrorId).removeClass('d-none');
                        $(ErrorId).text(value)
                    })
                }
            }
        })
    });

    $('.btnDeleteUser').on('click', function() {
        let id = $(this).data('id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
        
        $.ajax({
            url: `user/${id}`,
            method: 'DELETE',
            data: {
                _token: CSRF_TOKEN
            },
            success: function(data) {
                iziToast.success({
                    title: 'Sukses',
                    message: 'Data user berhasil dihapus!',
                });
    
                setTimeout(function(){
                    window.location.assign('user');
                    }, 2000);
            },
            error: function(error) {
                iziToast.error({
                    title: 'Oops!',
                    message: 'Terjadi Suatu kesalahan',
                });
            }
        })
    });

});