<?php
session_start();
include "connect.php";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";
if (!empty($_POST['submit_validate'])) {
    $query = mysqli_query($conn, " SELECT * FROM tb_user WHERE username = '$username' && password = '$password' ");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        $_SESSION['username_warunggiemin'] = $username;
        $_SESSION['level_warunggiemin'] = $hasil['level'];
        header('location:../home');
    } else { ?>
        <script>
            alert('your username or password is wrong');
            window.location = '../login'
        </script>
<?php
    }
}
?>