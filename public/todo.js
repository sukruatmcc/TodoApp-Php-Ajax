$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(".delete").click(function (){
    let id = $(this).data('id');
    let action = $(this).data('action');
    let button = $(this);
    Swal.fire({
        title: 'Silmek İstediğinize eminmisiniz',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax(
                {
                    type: "POST",
                    url: action,
                    dataType:'json',
                    data: {id : id},
                    success: function (response)
                    {
                        //console.log(response);
                        button.parent().parent().remove();
                        if (response.status == "Success"){
                            Swal.fire( 'Deleted!', 'Your file has been deleted.', 'success' );
                        }
                    },
                }
            );



        }
    })

});

