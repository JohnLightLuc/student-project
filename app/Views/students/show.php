<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="container" id="content" style="margin: 5rem auto auto;">
    <!-- -->
    <div class="card mb-3" style="max-width: 840px;" >
        <div class="row g-0">
            <div class="col-md-4">
            <img src="<?= $student->photo_url ?>" class="img-fluid rounded-start"  alt="">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">First Name: <?= $student->first_name ?></h5>
                <p class="card-text"><b>Last Name :</b> <?= $student->last_name ?></p>
                <p class="card-text"><b>Email :</b> <?= $student->email ?></p>
                <p class="card-text"><b>Inscription date :</b> <?= $student->created_at ?></p>
                <a href="/students" class="btn btn-primary">Go back</a>
            </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>