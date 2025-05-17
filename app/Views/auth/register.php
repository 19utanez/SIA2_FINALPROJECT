<?= $this->extend('layouts/login_base') ?>

<?= $this->section('content') ?>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg border-0 p-4" style="max-width: 500px; width: 100%;">
        <div class="card-body">
            <h2 class="text-center mb-4"><?= env('system_name') ?></h2>
            <h5 class="text-center mb-3 fw-bold">Create New Account</h5>

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

            <form action="<?= base_url('register') ?>" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="John Smith"
                               value="<?= esc($data->getPost('name') ?? '') ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fa fa-at"></i></span>
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

                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" id="cpassword" name="cpassword"
                               placeholder="**********" required>
                    </div>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

                <div class="text-center small">
                    <p>Already have an account? 
                        <a href="<?= base_url('/Auth') ?>" class="fw-bold">Login here</a>
                    </p>
                    <p><a href="<?= base_url('/Blog') ?>" class="text-muted">← Back to Blog</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
