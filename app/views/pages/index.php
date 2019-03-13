<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <p class="display-2"><?= $data['title'] ?></p>
        <p>to</p>
        <p class="lead">Lautech Student Course Prediction System</p>
    </div>
</div> 

<footer class="clearfix">
    <a href="<?= URLROOT ?>/students/info"><button class="btn btn-primary float-right">Click to Proceed <i class="fa fa-arrow-circle-right"></i> </button></a>
</footer>

<?php  require_once APPROOT.'/views/inc/footer.php'; ?>

