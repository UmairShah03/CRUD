<?php
include 'header.php';

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $class = $_POST['class'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO `users` ( `name`, `address`, `class`, `phone`) VALUES ( '$name', '$address', '$class', '$phone')";
    $result = mysqli_query($conn,$query);

    if($result){
        header("Location: index.php");
    }else{
        echo "Query unsuccessfull";
    }
}


?>


<div class="container bg-body-tertiary py-5">
    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Your full name" autocomplete="off" required>
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="address" id="floatingPassword" placeholder="Your complete address" autocomplete="off" required>
            <label for="floatingPassword">Address</label>
        </div>
        <select class="form-select mb-3 w-50" name="class" aria-label="Default select example" required>
                    <option selected disabled>Class</option>
                    
                    <?php 
                    
                $class = "SELECT * FROM `class`";
                $classResult = mysqli_query($conn, $class);

                while($row = mysqli_fetch_array($classResult)){

                
                 ?>
                    
                    <option value='<?php echo $row['cid'];?>'><?php echo $row['cname'];?> </option>
                <?php }?>
                    
                
                   
                </select>
        <div class="form-floating mb-3 w-50">
            <input type="tel" class="form-control" name="phone" id="floatingPhone" placeholder="Your phone number" autocomplete="off" required>
            <label for="floatingPhone">Phone</label>
        </div>

        <input type="submit" value="Send" name='send' class="btn btn-dark">
    </form>
</div>


</div>
</body>
</html>