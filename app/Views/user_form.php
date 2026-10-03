<?php $errors = session('errors') ?? []; ?>

<h1><?= $user ? 'Edit User' : 'New User' ?></h1>

<form action="<?= $formAction ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label>Username</label><br>
    <input type="text" name="username"
        value="<?= esc(old('username', $user['username'] ?? '')) ?>">
    <div><?= esc($errors['username'] ?? '') ?></div><br>

    <label>Full Name</label><br>
    <input type="text" name="full_name"
        value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>">
    <div><?= esc($errors['full_name'] ?? '') ?></div><br>

    <?php if ($user): ?>
        <label>Profile Picture (JPG or PNG, maximum 2MB)</label><br>
        <input type="file" name="avatar" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
        <div><?= esc($errors['avatar'] ?? '') ?></div><br>
    <?php endif; ?>

    <button type="submit">Save User</button>
    <a href="<?= site_url('users') ?>">Cancel</a>
</form>