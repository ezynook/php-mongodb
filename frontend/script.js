$(document).ready(function(){
    $("#myTable").DataTable({
        responsive: true
    });
    $(".btn-edit").on('click', function(e){
    e.preventDefault();
    var id = $(this).data("id");
    var txtname = $(this).data("name");
    var txtemail = $(this).data("email");
    $("#formedit").trigger('reset');
    $("#txt_name").val(txtname);
    $("#txt_email").val(txtemail);
    $("#formedit").submit(function(e){
        e.preventDefault();
        var params = {
            id: id,
            name: $("#txt_name").val(),
            email: $("#txt_email").val(),
            type: 'edit',
        }
        $.ajax({
        url: 'api.php',
        method: 'POST',
        data: params,
        dataType: 'json',
        success: (response) => {
            if (response.message == 'success'){
                location.reload();
            }else{
                console.log(response.message);
            }
        }
        });
    });
    });
});