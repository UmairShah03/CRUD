<?php 
include 'header.php';


if(isset($_POST['showbtn'])){

    $user = $_POST['user'];
    if($user){
        $query = "SELECT * FROM `users` WHERE `users`.`id` = '{$user}'";
        $resquery = mysqli_query($conn , $query);
    }

   
}
if(isset($_POST['update'])){
    $hiddenId = $_POST['hidden'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $class = $_POST['class'];
    $phone = $_POST['phone'];

    $update = "UPDATE `users` SET `name` = '{$name}', `address` = '{$address}', `class` = '{$class}', `phone` = '{$phone}' WHERE `id` = '{$hiddenId}'";
    $updateResult = mysqli_query($conn, $update);

    if($updateResult){
        header("Location: index.php");
    }
}
?>



<div class="container bg-body-tertiary py-3">
<h2 class="my-3">Update Record</h2>
    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">
        
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="user" id="floatingInput" placeholder="Your ID" autocomplete="off" required>
            <label for="floatingInput">ID</label>
        </div>
        <input type="submit" value="Show" name='showbtn' class="btn btn-dark">
        </form>



        <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">

        <?php 
        if(@$resquery){
            
            while($row = mysqli_fetch_array($resquery)){
        

    
    ?>
     <input type="hidden" class="form-control" name="hidden" value='<?php echo $row['id'];?>'>
        <div class="form-floating mb-3 w-50 mt-5">
            
            <input type="text" class="form-control" name="name" value='<?php echo $row['name'];?>' id="floatingInput" placeholder="Your full name" autocomplete="off" required>
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="address" value='<?php echo $row['address'];?>' id="floatingPassword" placeholder="Your complete address" autocomplete="off" required>
            <label for="floatingPassword">Address</label>
        </div>
        <select class="form-select mb-3 w-50" name="class" aria-label="Default select example" required>
            <option selected disabled>Class</option>
            <?php 
                    
                    $class = "SELECT * FROM `class`";
                    $classResult = mysqli_query($conn, $class);
    
                    while($crow = mysqli_fetch_array($classResult)){
    
                    if($row['class'] == $crow['cid']){
                        $select = 'selected';
                    }else{
                        $select = '';
    
                    }
                     ?>
             <option <?php echo $select;?>  value='<?php echo $crow['cid'];?>'> <?php echo $crow['cname'];?> </option>
                <?php }?>
        </select>
        <div class="form-floating mb-3 w-50">
            <input type="tel" class="form-control" name="phone" value='<?php echo $row['phone'];?>' id="floatingPhone" placeholder="Your phone number" autocomplete="off" required>
            <label for="floatingPhone">Phone</label>
        </div>
               
        <input type="submit" value="Update" name='update' class="btn btn-dark">
        <?php }  }?>
    </form>
</div>



</div>
</body>
</html>