<!DOCTYPE html>
<html>
<head>
    <title>Login Admin - SIAKAD UNIPI</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; background: #f3f4f6;">
    <div class="card" style="width: 350px;">
        <h2 style="text-align: center;">Admin Login</h2>
        <?php if (session()->getFlashdata('error')) : ?>
            <p style="color: red; text-align: center;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        
        <form action="<?= base_url('auth/proses_login') ?>" method="post">
            <div style="margin-bottom: 15px;">
                <label>Username</label>
                <input type="text" name="username" class="stat-card" style="width: 100%;" required>
            </div>
            <div style="margin-bottom: 20px;">
                <label>Password</label>
                <input type="password" name="password" class="stat-card" style="width: 100%;" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Masuk</button>
        </form>
    </div>
</body>
</html>