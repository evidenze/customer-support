$(document).ready( function(){
    $('#check').click( function(){
        var id = $(this).val();
        var url = "/customer-support/public/ticket";
        $('#check').html('Checking..');
        $('#exampleModal').modal('hide');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: url + '/' + id,
            type: "DELETE",
            method: "DELETE",
            data: {_method: 'DELETE'},
            success: window.location.reload(true),

            error: function(data){
                console.log('Error:', data);
            }
        });
    });
});