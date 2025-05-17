<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0 shadow-sm">
    <div class="card-header bg-white border-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-bold mb-0">List of Posts</h5>
            <a href="<?= base_url('Main/post_add') ?>" class="btn btn-primary bg-gradient rounded-0">
                <i class="fa fa-plus-square me-1"></i> Add Post
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <!-- Search Form -->
            <form action="<?= base_url("Main/posts") ?>" method="GET" class="row justify-content-center mb-4">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="input-group">
                        <input type="search" id="search" name="search" class="form-control rounded-0" placeholder="Search blog here..." value="<?= esc($request->getVar('search')) ?>">
                        <button class="btn btn-outline-secondary border rounded-0" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Posts Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <colgroup>
                        <col width="5%">
                        <col width="15%">
                        <col width="25%">
                        <col width="15%">
                        <col width="20%">
                        <col width="10%">
                    </colgroup>
                    <thead class="table-light text-center">
                        <tr>
                            <th>#</th>
                            <th>Created/Updated</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $row): ?>
                            <tr>
                                <td class="text-center"><?= esc($row['id']) ?></td>
                                <td><?= date("M d, Y h:i A", strtotime($row['updated_at'])) ?></td>
                                <td>
                                    <?= esc($row['title']) ?>
                                    <a href="<?= base_url("Blog/view/".$row['id']) ?>" target="_blank" class="text-muted text-decoration-none ms-1" title="Open in new tab">
                                        <i class="fa fa-external-link-alt"></i>
                                    </a>
                                </td>
                                <td><?= esc($row['author']) ?></td>
                                <td class="text-center">
                                    <?php 
                                        switch($row['status']) {
                                            case 1:
                                                echo '<span class="badge bg-primary bg-gradient rounded-pill px-3">Published</span>';
                                                break;
                                            case 0:
                                                echo '<span class="badge bg-secondary bg-gradient rounded-pill px-3">Unpublished</span>';
                                                break;
                                            default:
                                                echo '<span class="badge bg-light border text-dark rounded-pill px-3">N/A</span>';
                                                break;
                                        }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('Main/post_edit/'.$row['id']) ?>" class="text-decoration-none text-primary mx-1" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('Main/post_delete/'.$row['id']) ?>" class="text-decoration-none text-danger mx-1" title="Delete"
                                        onclick="if(!confirm('Are you sure you want to delete \"<?= esc($row['title']) ?>\"?')) event.preventDefault();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if(count($posts) <= 0): ?>
                            <tr>
                                <td colspan="6" class="text-center py-3 text-muted">No results found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                <?= $pager->makeLinks($page, $perPage, $total, 'custom_view') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
