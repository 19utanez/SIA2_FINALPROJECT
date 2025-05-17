<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0 shadow-sm">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title fw-bold mb-0">Update Account Details</h5>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8 col-sm-12">
                    <form action="<?= base_url('update_user') ?>" method="POST" novalidate class="mt-3">
                        <!-- Flash Messages -->
                        <?php if($session->getFlashdata('error')): ?>
                            <div class="alert alert-danger rounded-0 mb-3">
                                <?= esc($session->getFlashdata('error')) ?>
                            </div>
                        <?php endif; ?>
                        <?php if($session->getFlashdata('success')): ?>
                            <div class="alert alert-success rounded-0 mb-3">
                                <?= esc($session->getFlashdata('success')) ?>
                            </div>
                        <?php endif; ?>

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-user"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control rounded-0" 
                                    id="name" 
                                    name="name" 
                                    placeholder="John Smith" 
                                    value="<?= esc($user['name'] ?? '') ?>" 
                                    required 
                                    autofocus
                                >
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-at"></i></span>
                                <input 
                                    type="email" 
                                    class="form-control rounded-0" 
                                    id="email" 
                                    name="email" 
                                    placeholder="jsmith@mail.com" 
                                    value="<?= esc($user['email'] ?? '') ?>" 
                                    required
                                >
                            </div>
                        </div>

                        <!-- New Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-key"></i></span>
                                <input 
                                    type="password" 
                                    class="form-control rounded-0" 
                                    id="password" 
                                    name="password" 
                                    placeholder="**********"
                                >
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="cpassword" class="form-label fw-semibold">Confirm New Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-key"></i></span>
                                <input 
                                    type="password" 
                                    class="form-control rounded-0" 
                                    id="cpassword" 
                                    name="cpassword" 
                                    placeholder="**********"
                                >
                            </div>
                        </div>

                        <!-- Current Password -->
                        <div class="mb-4">
                            <label for="current_password" class="form-label fw-semibold">Current Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-lock"></i></span>
                                <input 
                                    type="password" 
                                    class="form-control rounded-0" 
                                    id="current_password" 
                                    name="current_password" 
                                    placeholder="**********" 
                                    required
                                >
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary bg-gradient rounded-0">
                                <i class="fa fa-save me-1"></i> Update Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
