<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['lang'])) {
    header("location: ../../");
}

include "../../templates/head.php";
?>
<div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
    <form action="auth.php" method="POST" style="width: 500px;">
        <div class="form-auth-inner shadow p-4 bg-white rounded">
            <div class="form-group">
                <label>Логин</label>
                <input name="login" type="text" class="form-control" label="Введите логин" />
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input name="password" type="password" class="form-control" label="Введите пароль" />
            </div>
            <?php
            if (isset($_SESSION['message'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['message'] . '</div>';
                unset($_SESSION['message']);
            }
            ?>
            <button type="submit" class="btn btn-primary btn-block pt-2 pb-2">
                Войти
            </button>
        </div>
    </form>
</div>
<?php
include "../../templates/footer.php";
