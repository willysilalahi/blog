function openModalAdd(){
    $('#addTagModal').modal('show');
}

function storeData(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var nama = $('#name').val();

    $('#nameError').addClass('d-none');

    $.ajax({
        url: "tag",
        method: 'POST',
        data: {
            _token: CSRF_TOKEN,
            name:nama,
        },
        success: function(data){
            
            swal("Sukses", "Data tag berhasil ditambahkan!", "success");
            setTimeout(function(){
                window.location.assign('tag');
            }, 1500);
            
        },
        error: function(data){
           
            var errors = data.responseJSON;
            if($.isEmptyObject(errors) == false){
                $.each(errors.errors, function(key, value){
                    var ErrorId = '#' + key + 'Error';
                    $(ErrorId).removeClass('d-none');
                    $(ErrorId).text(value)
                })
            }

        }
    });
}


$('.btnEditTag').on('click', function() {
    let id = $(this).data('id');
    
    $.ajax({
        url: `tag/${id}/edit`,
        method: 'GET',
        success: function(data) {
            $('#editTagModal').find('.modal-body').html(data)
            $('#editTagModal').modal('show');
        },
        error: function(error) {
            alert('gagal')
        }
    })
});


function updateData(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var name = $('#index').val();
    let id = $('#editTagModal').find('#idTag').val();

    
    $('#nameError').addClass('d-none');

    $.ajax({
        url: `tag/${id}`,
        method: 'PATCH',
        data: {
            _token: CSRF_TOKEN,
            name:name,
        },
        success: function(data){
            swal("Sukses", "Data tag berhasil diubah!", "success");
            
            setTimeout(function(){
                window.location.assign('tag');
                }, 2000);
            
        },
        error: function(data){
            var err = data.responseJSON;
            if($.isEmptyObject(err) == false){
                $.each(err.errors, function(key, value){
                    var ErrId = '#' + key + 'Errors';
                    $(ErrId).removeClass('d-none');
                    $(ErrId).text(value)
                })
            }

        }
    });
}

$('.btnDeleteTag').on('click', function() {
    let id = $(this).data('id');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    
    $.ajax({
        url: `tag/${id}`,
        method: 'DELETE',
        data: {
            _token: CSRF_TOKEN
        },
        success: function(data) {
            iziToast.success({
                title: 'Sukses',
                message: 'Data tag berhasil dihapus!',
            });

            setTimeout(function(){
                window.location.assign('tag');
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