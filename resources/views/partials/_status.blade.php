<script>
    $(document).on('click' , '.status' , function (e) {

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
                url    :  '{{ str_replace('-1','',route($model.'.status',-1))  }}' + id,
                headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                error: function() {
                    swal("Cancelled", "Unable to change status ", "error");
                },
                success: function(response) {

                    swal("Success", "Successfull !", "success");
//                            tr.remove();
                    location.reload();

                    if(response.success == 'true'){
                    }else{
                    }
                },

                type: 'POST'
            });
        });


    });
</script>