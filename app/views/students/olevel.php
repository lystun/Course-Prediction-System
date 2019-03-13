<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h3 class="text-center">ENTER O'LEVEL RESULT</h3>
                <p class="text-center">Please confirm your information before you submit</p>
                <hr><br>
                <form action="<?= URLROOT?>/students/olevel" method="post">
                        

                    <div class="bg-danger">
                        
                    </div>
                    <div class="row">
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="english">
                                    <b>English </b> 
                                    <input type="text" name="english" class="form-control <?php echo (!empty($data['english_err'])) ? 'is-invalid' :'' ?>" value=" <?php echo $data['english']; ?>" id="english">
                                    <span class="invalid-feedback"><?php echo $data['english_err']; ?></span>
                                </label>
                            </div>
                        </div>                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="physics">
                                    <b>Maths </b> 
                                    <input type="text" name="maths" class="form-control <?php echo (!empty($data['maths_err'])) ? 'is-invalid' :'' ?>" value="<?php echo $data['maths']; ?>" id="maths">
                                    <span class="invalid-feedback"><?php echo $data['maths_err']; ?></span>
                                </label>
                            </div>
                        </div>                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="physics">
                                    <b>Physics </b> 
                                    <input type="text" name="physics" class="form-control <?php echo (!empty($data['physics_err'])) ? 'is-invalid' :'' ?>" value=" <?php echo $data['physics']; ?>" id="physics">
                                    <span class="invalid-feedback"><?php echo $data['physics_err']; ?></span>
                                </label>
                            </div>
                        </div>                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="chemistry">
                                    <b>Chemistry </b> 
                                    <input type="text" name="chemistry" class="form-control <?php echo (!empty($data['chemistry_err'])) ? 'is-invalid' :'' ?>" value=" <?php echo $data['chemistry']; ?>" id="chemistry">
                                    <span class="invalid-feedback"><?php echo $data['chemistry_err']; ?></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="biology">
                                    <b>Biology </b> 
                                    <input type="text" name="biology" class="form-control  <?php echo (!empty($data['biology_err'])) ? 'is-invalid' :'' ?> " value=" <?php echo $data['biology']; ?>" id="biology">
                                    <span class="invalid-feedback"><?php echo $data['biology_err'] ?></span>
                                </label>
                            </div>
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="col ">
                            <input type="submit" value="Submit O'Level Result" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php  require_once APPROOT.'/views/inc/footer.php'; ?>

