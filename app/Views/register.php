<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-5 mx-auto">
            <div class="card mt-5">
                <h2 class="ms-3">Create new account</h2>
                <?php $session=session(); ?>
                <?php if(!is_null($session->getFlashdata('success_message'))): ?>
                <div class="alert alert-success">
                    <?=$session->getFlashdata('success_message');?>
                </div>
                <?php endif ?>
                <?php $validation = \Config\Services::validation(); ?>
                <div class="card-body">
                    <form action="<?=base_url('register')?>" method="POST">
                        <div class="mb-2">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username"/>
                            <div class="text-danger">
                                <?=$validation->getError('username')?>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email"/>
                            <div class="text-danger">
                                <?=$validation->getError('email')?>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password"/>
                            <div class="text-danger">
                                <?=$validation->getError('password')?>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword"/>
                            <div class="text-danger">
                                <?=$validation->getError('cpassword')?>
                            </div>
                        </div>
                        <div class="mb-2 text-center">
                            <input type="submit" class="btn btn-primary" name="register" value="Register"/>
                        </div>
                    </form>
                    <a href="<?=base_url()?>login">Already have an account?</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
