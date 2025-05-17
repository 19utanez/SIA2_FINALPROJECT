<?= $this->extend('layouts/main') ?>

<?= $this->section('custom_css') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    #img-viewer {
        width: 100%;
        max-height: 300px;
        object-fit: contain;
    }
    .note-group-select-from-files {
        display: none !important;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center bg-light">
        <h5 class="mb-0 fw-semibold">Add New Post</h5>
        <a href="<?= base_url('Main/Posts') ?>" class="btn btn-sm btn-outline-secondary">
            <i class="fa fa-angle-left"></i> Back to List
        </a>
    </div>
    <div class="card-body">
        <form action="<?= base_url('Main/post_add') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?= $session->login_id ?>">

            <?php if ($session->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $session->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if ($session->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $session->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="" disabled selected>Select a category</option>
                        <?php foreach($categories as $row): ?>
                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= esc($request->getPost('title')) ?>" required>
                </div>

                <div class="col-12">
                    <label for="short_description" class="form-label">Description</label>
                    <textarea class="form-control" id="short_description" name="short_description" rows="3" required><?= esc($request->getPost('short_description')) ?></textarea>
                </div>

                <div class="col-12">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" required><?= esc($request->getPost('content')) ?></textarea>
                </div>

                <div class="col-12">
                    <label for="tags" class="form-label">Tags</label>
                    <textarea class="form-control" id="tags" name="tags" rows="2" required><?= esc($request->getPost('tags')) ?></textarea>
                    <small class="text-muted">Separate your tags using commas (e.g., php, blog, codeigniter)</small>
                </div>

                <div class="col-md-6">
                    <label for="banner_img" class="form-label">Image</label>
                    <input class="form-control" type="file" name="banner_img" id="banner_img" accept="image/*" onchange="display_img(this)" required>
                </div>

                <div class="col-md-6 text-center">
                    <label class="form-label d-block">Preview</label>
                    <img id="img-viewer" class="img-fluid img-thumbnail bg-light" src="" alt="Image Preview">
                </div>

                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                </div>
            </div>

            <div class="d-grid mt-4">
                <button class="btn btn-primary" type="submit"><i class="fa fa-save me-1"></i> Save Post</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('custom_js') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function display_img(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('img-viewer').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            document.getElementById('img-viewer').src = '';
        }
    }

    $(function () {
        $('#content').summernote({
            placeholder: 'Write your content here...',
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
<?= $this->endSection() ?>
