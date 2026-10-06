<?php $errors = session('errors') ?? []; ?>

<!DOCTYPE html>
<html>
<head>
    <title>POS Login</title>
</head>
<body>

    <h1>POS System Login</h1>

    <?php if (session('error')): ?>
        <p style="color: red;"><?= esc(session('error')) ?></p>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <label>Username</label><br>
        <input
            type="text"
            name="username"
            value="<?= esc(old('username')) ?>">
        <div style="color: red;"><?= esc($errors['username'] ?? '') ?></div><br>

        <label>Password</label><br>
        <input type="password" name="password">
        <div style="color: red;"><?= esc($errors['password'] ?? '') ?></div><br>

        <button type="submit">Login</button>
    </form>

</body>
</html>