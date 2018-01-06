<script>

    $(document).on('click' , '.delete' , function (e) {

        var $this = $(this);
        var id    = $this.data('id');

        swal({
            showLoaderOnConfirm: true,
            title: "Alert",
            text: "Are you sure!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#007AFF",
            confirmButtonText: "confirm",
            cancelButtonText: "cancel",
            closeOnConfirm: true
        }, function() {
            $.ajax({
                url    :  '{{ str_replace('-1','',route($model.'.destroy',-1))  }}' + id,
                headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                error: function() {
                    swal("Cancelled", "Unable to delete ", "error");
                },
                success: function(response) {

                    swal("Success", "Deleted successfully !", "success");
                    tr.remove();
                    location.reload();
                    if(response.success == 'true'){
                    }else{
                    }
                },

                type: 'DELETE'
            });
        });


    });



</script>