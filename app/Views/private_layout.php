<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Ecommerce</title>
    <?= $this->include("bootstrap") ?>
    <link rel="stylesheet" href="<?= base_url() ?>css/main.css">
</head>
<body>
    <?= $this->include("navbar") ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <h1>Welcome to Admin Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="<?=base_url('admin/users')?>" class="list-group-item">Users</a>
                    <a href="<?=base_url('admin/product_categories')?>" class="list-group-item">Product categories</a>
                </div>
            </div>
        </div>
    </div>
    <?= $this->renderSection('content') ?>
</body>
</html>