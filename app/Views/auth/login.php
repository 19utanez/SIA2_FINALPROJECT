<?= $this->extend('layouts/login_base') ?>

<?= $this->section('content') ?>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg border-0 p-4" style="max-width: 400px; width: 100%;">
        <div class="card-body">
            <h2 class="text-center mb-4"><?= env('system_name') ?></h2>
            <h5 class="text-center mb-3 fw-bold">Login to Your Account</h5>

            <?php if ($session->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $session->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if ($session->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= $session->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login') ?>" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fa fa-user"></i></span>
                        <input type="email" class="form-control" id="email" name="email" 
                            placeholder="jsmith@mail.com" 
                            value="<?= esc($data->getPost('email') ?? '') ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" 
                            placeholder="**********" required>
                    </div>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

                <div class="text-center small">
                    <p>Don't have an account? <a href="<?= base_url('/Auth/register') ?>" class="fw-bold">Sign up</a></p>
                    <p><a href="<?= base_url('/Blog') ?>" class="text-muted">← Back to Blog</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
