<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>
    <div class="container">
        <form action="api.php" method="post">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
            <label for="">Name</label>
            <input type="Email" name="email" class="form-control" placeholder="Email">
            <br>
            <input type="hidden" name="type" value="add">
            <input type="submit" value="Save" name="btnsave" class="btn btn-success">
        </form>
    </div>
</body>

</html>