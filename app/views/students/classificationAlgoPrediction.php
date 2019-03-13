<?php require_once APPROOT.'/views/inc/header.php'; ?>


    <div class="row">
        <div class=" col-10 jumbotron text-center mx-auto">

            <div id="StudentInfo">
                <h3 class="mt-">Student Information</h3>
                
                <p class="text-left ml-3">Name: <span class="font-weight-bold"> <?php echo ucwords($data['name']) ?></span></p>
                <p class="text-left ml-3">Age: <?php echo $data['age'] ?></p>
                <p class="text-left ml-3">Gender: <?php echo ucwords($data['gender']) ?></p>
                <p class="text-left ml-3">State Of Origin: <?php echo ucwords($data['state']).' State' ?></p>
                <p class="text-left ml-3">Phone Number: <?php echo ucwords($data['phone']) ?></p>
                <p class="text-left ml-3">Marital Status: <?php echo ucwords($data['status']) ?></p>
                <p class="text-left ml-3">Contact Address: <?php echo ucwords($data['address']) ?></p>
                                
            </div>

            <div id="result">
                <h4 class="lead font-weight-bold mb-3">Olevel Result</h4>
                <?php foreach ($data['olevel'] as $key => $olevel): ?>
                        <span class="m-2 btn btn-success"><?php echo ucwords($key) .' : '. ucwords($olevel) ?></span>
                <?php endforeach ?> 

                
                <h4 class="lead font-weight-bold my-4">UTME Result</h4>
                <?php foreach ($data['utme'] as $key => $utme): ?>
                        <span class="m-2 btn btn-danger"><?php echo ucwords($key) .' : '. ucwords($utme) ?></span>
                <?php endforeach ?> 
            </div>


            <div id="predict">
                <p class="mt-4">THE PREDICTED COURSES CLASSIFICATION ALGORITHM ARE: </p>
                <h4 class="lead font-weight-bold">
                    FIRST CHOICE: <?php echo $data['first']; ?>
                </h4>
                <h5 class="small font-weight-bold">
                    SECOND CHOICE: <?php echo $data['second']; ?>
                </h5>
            </div>


            <a href="<?=URLROOT?>/student" class="float-right btn btn-primary px-4 ">Return</a>
        </div> 
    </div>

    

<?php  require_once APPROOT.'/views/inc/footer.php'; ?>

