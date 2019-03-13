<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h3 class="text-center">ENTER UTME SCORE</h3>
                <p class="text-center">Please confirm your information before you submit</p>
                <hr><br>
                <form action="<?= URLROOT?>/students/utme" method="post">

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="maths">
                                    <b>Mathematics </b> 
                                    <input type="number" name="maths"  id="maths" min="39" max="100" required  class="form-control <?php echo (!empty($data['maths_err'])) ? 'is-invalid' :'' ?>"  value=" <?php echo $data['maths']; ?>">
                                    <span class="invalid-feedback"><?= $data['maths_err'] ?></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="chemistry">
                                    <b>Chemistry </b> 
                                    <input type="number" name="chemistry" id="chemistry" min="39" max="100" required class="form-control <?php echo (!empty($data['chemistry_err'])) ? 'is-invalid' :'' ?> " value=" <?php echo $data['chemistry']; ?>">
                                    <span class="invalid-feedback"><?= $data['chemistry_err'] ?></span>
                                </label>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="physics">
                                    <b>Physics </b> 
                                    <input type="number" name="physics" id="physics" min="39" max="100" required class="form-control <?php echo (!empty($data['physics_err'])) ? 'is-invalid' :'' ?>" value=" <?php echo $data['physics']; ?>" >
                                    <span class="invalid-feedback"><?= $data['physics_err'] ?></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="biology">
                                    <b>Biology </b> 
                                    <input type="number" name="biology" id="biology" min="39" max="100" required class="form-control <?php echo (!empty($data['biology_err'])) ? 'is-invalid' :'' ?>"  value=" <?php echo $data['biology']; ?>" >
                                    <span class="invalid-feedback"><?= $data['biology_err'] ?></span>
                                </label>
                            </div>
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="col ">
                            <input type="submit" value="Submit UTME Result" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php  require_once APPROOT.'/views/inc/footer.php'; ?>

