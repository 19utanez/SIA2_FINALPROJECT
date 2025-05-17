<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title . ' | ' : "" ?><?= env('system_name') ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.3.0/select2-bootstrap-5-theme.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            width: 100%;
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-weight: bold;
        }

        #user-topnav-menu {
            border: none;
            background: transparent;
            color: #fff;
            font-weight: 500;
        }

        @media print {
            .col-lg-6, .col-md-6 {
                width: 50%;
            }
            .lh-1 {
                line-height: 1em;
            }
        }

        /* Toast container */
        .toast-container {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1055;
        }
    </style>

    <?= $this->renderSection('custom_css') ?>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>"><?= env('short_name') ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link <?= isset($page_title) && $page_title == 'Home' ? 'active' : '' ?>" href="<?= base_url('/') ?>">Home</a>
                    </li>
                    <?php if ($session->login_type == 1): ?>
                        <li class="nav-item"><a class="nav-link <?= $page_title == 'Categories' ? 'active' : '' ?>" href="<?= base_url('Main/categories') ?>">Categories</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link <?= $page_title == 'Posts' ? 'active' : '' ?>" href="<?= base_url('Main/posts') ?>">Posts</a></li>
                    <?php if ($session->login_type == 1): ?>
                        <li class="nav-item"><a class="nav-link <?= $page_title == 'Users' ? 'active' : '' ?>" href="<?= base_url('Main/users') ?>">Users</a></li>
                    <?php endif; ?>
                </ul>

                <div class="dropdown">
                    <button class="btn dropdown-toggle text-white" type="button" id="user-topnav-menu" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user-circle me-1"></i> <?= esc($session->get('login_name')) ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?= base_url('update_user') ?>"><i class="fa fa-cog me-2 text-muted"></i> Update User</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="fa fa-sign-out-alt me-2 text-muted"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Toast + Alert Containers -->
    <div class="toast-container">
        <?php if ($session->getFlashdata('main_success')): ?>
            <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= $session->getFlashdata('main_success') ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <main class="container py-4">
        <?php if ($session->getFlashdata('main_error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $session->getFlashdata('main_error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>

    <!-- Auto-dismiss Toast -->
    <script>
        document.querySelectorAll('.toast').forEach(toastEl => {
            const toast = new bootstrap.Toast(toastEl, { delay: 5000 });
            toast.show();
        });
    </script>

    <?= $this->renderSection('custom_js') ?>
</body>
</html>
