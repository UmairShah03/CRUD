<?php
include 'header.php';

if(isset($_POST['deletebtn'])){
    $delte = $_POST['delete'];

if($delte){
    $delquery = "DELETE FROM users WHERE `users`.`id` = '{$delte}'";
    $resquery = mysqli_query($conn, $delquery);
}
}


?>
<!-- DELETE FROM users WHERE `users`.`id` = 4"? -->

<div class="container bg-body-tertiary py-3">
    <h2 class="my-3">Delete Record</h2>
    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">
        <div class="form-floating mb-3 w-50">
            <input type="tel" class="form-control" name="delete" id="floatingInput" placeholder="Your ID" autocomplete="off" required>
            <label for="floatingInput">ID</label>
        </div>
        <input type="submit" value="Delete" name='deletebtn' class="btn btn-dark">
    </form>

</div>
</div>
</body>

</html>