<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="bg-primary p-2 text-white">This is home page</h1>
            <img src="<?= base_url() ?>images/european.jpg" alt=""/>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
