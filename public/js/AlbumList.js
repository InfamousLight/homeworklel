var AlbumList = {
    id: null,

    delete: function(event){
        this.id = event.target.id;
        var self = this;

        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Album!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url: "/album/delete-album",
                        data: {
                            albumId: self.id
                        },
                        success: function(result) {
                            $('#album-row-' + self.id).remove();
                            swal("Deleted!", "Album has been deleted.", "success");
                        },
                        fail: function(result) {
                            swal("Cancelled", "There was an error deleting the Album", "error");
                        }
                    });
                }
            });
    }
}

$(document).ready(function() {
    $(".delete-album").on("click", AlbumList.delete);
});