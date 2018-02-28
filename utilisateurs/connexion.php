<?php
require_once "../accessoires/header.html";
require_once "../accessoires/nav.html";

session_start();
if ((isset($_POST['email'])) && (isset($_POST['password']))) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    //connecter sur BdD
    $conn = mysqli_connect('localhost', 'root', 'Ab882685', 'utilisateurs');
    $res = mysqli_query($conn, "select * from utilisateur where email =  '$email' ");
    $row = mysqli_fetch_assoc($res);
    $nom=$row['nom'];
    $prenom=$row['prenom'];
    $role=$row['role'];

    if ($row['pwd'] == $pwd) {
        //密码验证通过，设置session，把用户名和密码保存在服务端
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $pwd;
        $_SESSION["nom"] = $nom;
        $_SESSION["prenom"] = $prenom;
        $_SESSION["role"]= $role;

        //最后跳转到登录后的欢迎页面 //注意：这里我们没有像cookie一样带参数过去
        header('Location: ../Publication/administration.php');
    } else {
        echo "Error: wrong enters";
    }
} else {
    ?>
    <div id="div">
        <form id="form" action="" method="post">
            <table id="table">
                <tr>
                    <td>Email:</td>
                    <td><input placeholder="email" id="email" type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Mot de passe:</td>
                    <td><input placeholder="password" type="password" name="password"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Se connecter" name="login1"></td>
                </tr>
            </table>
        </form>
    </div>

    <?php
}
?>

<?php
require_once "../accessoires/footer.html";

/**
 * Created by PhpStorm.
 * User: zhaow
 * Date: 2018/2/2
 * Time: 15:48
 */
?>

