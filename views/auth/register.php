<?php include './templates/header.php';
session_start();
?>

<form method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <?php if (isset($_SESSION['error']['username'])): ?>
        <p class="error"><?php echo $_SESSION['error']['username']; ?></p>
        <?php unset($_SESSION['error']['username']) ?>
    <?php endif; ?>

    <label for="password">Passwort</label>
    <input type="password" name="pwd" id="password">
    <?php if (isset($_SESSION['error']['pwd'])): ?>
        <p class="error"><?php echo $_SESSION['error']['pwd']; ?></p>
        <?php unset($_SESSION['error']['pwd']) ?>
    <?php endif; ?>

    <label for="email">E-Mail</label>
    <input type="email" name="email" id="email">
    <?php if (isset($_SESSION['error']['email'])): ?>
        <p class="error"><?php echo $_SESSION['error']['email']; ?></p>
        <?php unset($_SESSION['error']['email']) ?>
    <?php endif; ?>
    <input type="submit" value="Abschicken">
</form>