<?= $this->extend('private_layout') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <h1>Welcome to User dashboard</h1>
        </div>
        <div class="col-sm-2">
            <a href="<?=base_url('profile')?>" class="btn btn-dark">Change Profile</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>