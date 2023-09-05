<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <div class="container" style="overflow-x: scroll;overflow-y: scroll;">
        <table class="table table-sm table-stripped table-hover table-bordered table-responsive" id="myTable" width="100%">
            <thead>
                <tr>
                    <td>IDx</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Option</td>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php foreach(fetchAll(1) as $val){ ?>
                <tr>
                    <td><?=$val['idx']?></td>
                    <td><?=$val['name']?></td>
                    <td><?=$val['email']?></td>
                    <td>
                        <a href="#editModal"
                            data-id="<?=$val['idx'];?>"
                            data-name="<?=$val['name'];?>"
                            data-email="<?=$val['email'];?>"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal"
                            class="btn btn-primary btn-sm btn-edit">
                            แก้ไข
                        </a>
                        <a 
                            href="api.php?id=<?=$val['idx'];?>&type=delete" 
                            onclick="return confirm('Delete ?')"
                            class="btn btn-danger btn-sm">ลบ
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post" id="formedit">
                       <div class="modal-body">
                           Name: <input type="text" class="form-control" id="txt_name">
                           Email: <input type="text" class="form-control" id="txt_email">
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" id="btnedit">Save changes</button>
                       </div>
                    </form>
                </div>
            </div>
        </div>
</body>
<script>
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
</script>
</html>