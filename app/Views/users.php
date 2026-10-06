<!DOCTYPE html>
<html>
<head>
    <title>User Accounts - POS System</title>

    <style>
        .avatar {
            width: 80px;
            height: 80px;
            object-fit: cover;
            vertical-align: middle;
            margin-right: 12px;
        }
    </style>
</head>
<body>

    <h1>User Accounts</h1>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a> |
        <a href="<?= site_url('about') ?>">About</a> |
        <a href="<?= site_url('customers') ?>">Customer Accounts</a> |
        <a href="<?= site_url('users') ?>">User Accounts</a>
        <a href="<?= site_url('logout') ?>">Logout</a>
    </nav>

    <hr>

    <p>
        <a href="<?= site_url('users/new') ?>">Add New User</a>
    </p>

    <?php foreach ($users as $user): ?>
        <?php $avatar = $user['avatar'] ?: 'placeholder.svg'; ?>

        <p>
            <img
                class="avatar"
                src="<?= esc(base_url('uploads/avatars/' . $avatar)) ?>"
                alt="Profile picture of <?= esc($user['full_name']) ?>">

            <strong><?= esc($user['username']) ?></strong><br>
            Name: <?= esc($user['full_name']) ?><br>
            <a href="<?= site_url('users/' . $user['id'] . '/edit') ?>">Edit</a>
        </p>

        <hr>
    <?php endforeach; ?>

</body>
</html>