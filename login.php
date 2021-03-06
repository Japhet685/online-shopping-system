<?php include("includes/header.php"); ?>
<?php 
    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(!User::check_if_user_logged_in($username)) {
            if(User::is_admin_approved($username)) {
                if(!User::verify_user($username, $password)) {
                    $message = "Username or Password is incorrect";
                } else {
                    User::add_user_login();
                    header("Location: index.php");
                }
            } else {
                $message = "Please wait for admin approve";
            }
        } else {
            $message = "{$username} is logged in";
        }
    }
?>
<div class="container">
    <div class="login-form">
            <div class="login-title">
                <h4>เข้าสู่ระบบ</h4>
            </div>
            <?php if(isset($message)) {
                echo "<div class='warning-message'>";
                echo $message;
                echo "</div>";
            }
            ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">ชื่อผู้ใช้</label>
                <input type="text" name="username" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">รหัสผ่าน</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button type="submit" name="login">เข้าสู่ระบบ</button>
        </form>
    </div>
</div>
<?php include("includes/footer.php"); ?>
    
