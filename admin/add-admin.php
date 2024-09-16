<html>
    <head>
        <title>Online Restaurant Website</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <!-- Section for Menu Start -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                </ul>
            </div>
        </div>
        <!-- Section for Menu End -->

        <div class="main-content">
            <div class="wrapper">
                <h1>Add Admin</h1>

                <br><br>

                <?php 
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add']; 
                        unset($_SESSION['add']); 
                    }
                ?>

                <form action="" method="POST">
                    <table class="tbl-30">
                        <tr>
                            <td>Full Name: </td>
                            <td>
                                <input type="text" name="full_name" placeholder="Enter Your Name">
                            </td>
                        </tr>

                        <tr>
                            <td>Username: </td>
                            <td>
                                <input type="text" name="username" placeholder="Your Username">
                            </td>
                        </tr>

                        <tr>
                            <td>Password: </td>
                            <td>
                                <input type="password" name="password" placeholder="Your Password">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <?php 
        define('LOCALHOST', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'order-food');

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); 
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        
        if(isset($_POST['submit'])) {
            
            $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            
            $password = md5($_POST['password']); 
            
            
            $sql = "INSERT INTO tbl_admin (full_name, username, password) 
            VALUES ('$full_name', '$username', '$password')";
            
            $res = mysqli_query($conn, $sql) or die(mysqli_error());
            
            if($res==TRUE){
                echo "true";
                // $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>"; 
                // //Connect to manage admin page
                // header("location:".SITEURL.'admin/manage-admin.php');
            }
            else{ 
                echo "false";
                // $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
                // header("location:".SITEURL.'admin/add-admin.php');
            };
            
            var_dump($_POST); die;
        };
        ?>
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="wrapper">
                Footer
            </div>
        </div>
        <!-- Footer End -->
    </body>
</html>