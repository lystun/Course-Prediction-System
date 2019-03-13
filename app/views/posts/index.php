<?php

 require_once APPROOT.'/views/inc/header.php';
?>

<div class="row">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>" class="btn btn-primary pull-right">
            <i class="fa fa-pencil">Add Posts</i>
        </a>
    </div>
</div> 

<?php   foreach($data['posts'] as $post): ?>  
            <div class="card card-body mb-3">
                <h4 class="card-title"><?= $post->title; ?></h4>
                <div class="bg-light p-2 mb-3">Written by Lystun</div>
            </div>

<?php   endforeach ?>

<?php  require_once APPROOT.'/views/inc/footer.php'; ?>

