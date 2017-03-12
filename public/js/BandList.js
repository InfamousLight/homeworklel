var BandList = {
    id: null,

    delete: function(event){
        this.id = event.target.id;
        var self = this;

        swal({
                title: "Are you sure?",
                text: "This will delete the band AND ALL ALBUMS!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete them!",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url: "/band/delete-band",
                        data: {
                            bandId: self.id
                        },
                        success: function(result) {
                            $('#band-row-' + self.id).remove();
                            swal("Deleted!", "Band has been deleted.", "success");
                        },
                        fail: function(result) {
                            swal("Cancelled", "There was an error deleting the Band", "error");
                        }
                    });
                }
            });
    }
}

$(document).ready(function() {
    $(".delete-band").on("click", BandList.delete);
});