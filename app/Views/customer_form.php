<?php $errors = session('errors') ?? []; ?>

<h1><?= $customer ? 'Edit Customer' : 'New Customer' ?></h1>

<form action="<?= $formAction ?>" method="post">
    <?= csrf_field() ?>

    <label>Full Name</label><br>
    <input type="text" name="full_name"
        value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>">
    <div><?= esc($errors['full_name'] ?? '') ?></div><br>

    <label>Email</label><br>
    <input type="email" name="email"
        value="<?= esc(old('email', $customer['email'] ?? '')) ?>">
    <div><?= esc($errors['email'] ?? '') ?></div><br>

    <label>Phone</label><br>
    <input type="text" name="phone"
        value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>"><br><br>

    <button type="submit">Save Customer</button>
    <a href="<?= site_url('customers') ?>">Cancel</a>
</form>