<?php 
include 'header.php';


?>

        <table class="table text-center table-stripted">
            <thead class="bg-dark text-white table-active">
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Address</td>
                    <td>Class</td>
                    <td>Phone</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody >
                <?php 
                $query = "SELECT * FROM `users` AS u INNER JOIN `class` AS c ON u.class = c.cid";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result)){

               

                ?>
                
                <tr>
                    <td> <?php echo $row['id'];?> </td>
                    <td><?php echo $row['name'];?> </td>
                    <td><?php echo $row['address'];?> </td>
                    <td><?php echo $row['cname'];?> </td>
                    <td><?php echo $row['phone'];?> </td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-warning text-white">Edit</a>
                        <a href="deleteinline.php?id=<?php echo $row['id'];?>" class="btn btn-danger text-white">Delete</a>
                    </td>
                </tr>


                <?php  }?>

               
                
             
                
             
            </tbody>
        </table>

        
    </div>
</body>
</html>