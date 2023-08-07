<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php
                use App\Models\UserDetailModel;
                $model=new UserDetailModel();
                $session=session();
                $user_id=$session->user_id; 
                $record=$model->where('user_id',$user_id)->first();
            ?>
            <div class="card my-2">
                <div class="card-body">
                    <h1>Change profile</h1>
                    <form action="<?=base_url('profile')?>" method="post">
                        <div class="row">
                            <div class="col">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" name="country" id="country" placeholder="Country" aria-label="Country" value="<?= !is_null($record)?$record['country']:''?>">
                            </div>
                            <div class="col">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name="state" id="state"  placeholder="State" aria-label="State" value="<?= !is_null($record)?$record['state']:''?>">
                            </div>
                            <div class="col">
                                <label for="district">District</label>
                                <input type="text" class="form-control" name="district" id="district" placeholder="District" aria-label="District"  value="<?= !is_null($record)?$record['district']:''?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="pincode">Pincode</label>
                                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" aria-label="Pincode" value="<?= !is_null($record)?$record['pincode']:''?>">
                            </div>
                            <div class="col">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile number" aria-label="Mobile number" value="<?= !is_null($record)?$record['mobile']:''?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="local_address">Local Address</label>
                                <textarea class="form-control" name="local_address" id="local_address" placeholder="Local Address"><?= !is_null($record)?$record['local_address']:''?></textarea>
                            </div>
                            <div class="col">
                                <label for="permanent_address">Permanent Address</label>
                                <textarea class="form-control" name="permanent_address" id="permanent_address" placeholder="Permanent Address"><?= !is_null($record)?$record['permanent_address']:''?></textarea>
                            </div>
                        </div>
                        <div class="text-center my-2">
                            <button class="btn btn-primary" type="submit">Save chnages</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>