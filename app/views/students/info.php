<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h3 class="text-center">STUDENT INFORMATION</h3>
                <p class="text-center">Please confirm your information before you submit</p>
                <br><br>
                <form action="<?= URLROOT?>/students/info" method="post">

                    <div class="form-group">
                        <label for="name">Name <sup>*</sup> (Surname First) </label>
                        <input type="text" name="name" class="form-control form-control-sm <?php echo (!empty($data['name_err'])) ? 'is-invalid' :'' ?> " value="<?php echo $data['name']; ?>" required>
                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                    </div>
                    <!-- <div class="form-group">
                        <label for="name">Name <sup>*</sup> (Surname First) </label>
                        <input type="text" name="name" class="form-control form-control-sm <?php echo (!empty($data['name_err'])) ? 'is-invalid' :'' ?> " value="<?php echo $data['name']; ?>" required>
                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                    </div> -->
                    
                    <div class="form-group">
                        <label for="address">Contact Address <sup>*</sup></label>
                        <input type="text" name="address" class="form-control form-control-sm <?php echo (!empty($data['address_err'])) ? 'is-invalid' :'' ?> " value="<?php echo $data['address']; ?>" required>
                        <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="num">Phone Number <sup>*</sup></label>
                        <input type="number" name="num" class="form-control form-control-sm <?php echo (!empty($data['num_err'])) ? 'is-invalid' :'' ?> " value="<?php echo $data['num']; ?>" required>
                        <span class="invalid-feedback"><?php echo $data['num_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="sog">State Of Origin <sup>*</sup></label>
                        <select name="sog" id="" class="form-control form-control-sm <?php echo (!empty($data['address_err'])) ? 'is-invalid' :'' ?> " required>
                            <option></option>
                            <option value="abia">Abia</option>
                            <option value="adamawa">Adamawa</option>
                            <option value="Akwa Ibom">Akwa Ibom</option>
                            <option value="Anambra">Anambra</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Bayelsa">Bayelsa</option>
                            <option value="BenueBorno">Benue</option>
                            <option value="Borno">Borno</option>
                            <option value="Cross River">Cross River</option>
                            <option value="Delta">Delta</option>
                            <option value="Ebonyi">Ebonyi</option>
                            <option value="Edo">Edo</option>
                            <option value="Ekiti">Ekiti</option>
                            <option value="Enugu">Enugu</option>
                            <option value="FCT">FCT</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Imo">Imo</option>
                            <option value="Jigawa">Jigawa</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Katsina">Katsina</option>
                            <option value="Kebbi">Kebbi</option>
                            <option value="Kogi">Kogi</option>
                            <option value="Kwara">Kwara</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Nassarawa">Nassarawa</option>
                            <option value="Niger">Niger</option>
                            <option value="Ogun">Ogun</option>
                            <option value="Ondo">Ondo</option>
                            <option value="Osun">Osun</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Plateau">Plateau</option>
                            <option value="Rivers">Rivers</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Taraba">Taraba</option>
                            <option value="Yobe">Yobe</option>
                            <option value="Zamfara">Zamfara</option>
                        </select>
                        <span class="invalid-feedback"><?php echo $data['sog_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="age">Age <sup>*</sup></label>
                        <input type="date" name="age" class="form-control  form-control-sm <?php echo (!empty($data['age_err'])) ? 'is-invalid' :'' ?> " value="<?php echo $data['age']; ?>" required>
                        <span class="invalid-feedback"><?php echo $data['age_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender <sup>*</sup></label>
                        <select name="gender" class="form-control form-control-sm" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <span class="invalid-feedback"><?php echo $data['gender_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="status">Marital Status <sup>*</sup></label>
                        <select name="status" id="" class="form-control form-control-sm" required>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                        </select>
                        <span class="invalid-feedback"><?php echo $data['status_err']; ?></span>
                    </div>

                    <div class="row">
                        <div class="col ">
                            <input type="submit" value="Submit Information" class="btn btn-success btn-block float-right">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php  require_once APPROOT.'/views/inc/footer.php'; ?>

