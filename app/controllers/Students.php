<?php

    class Students extends Controller {

        public $student;

        public function __construct (){

            $this->studentModel = $this->model('Student');
          
        }


        public function index(){

        }

        //Collect student Information
        public function info(){

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['name']),
                    'address' => trim($_POST['address']),
                    'num' => trim($_POST['num']),
                    'sog' => trim($_POST['sog']),
                    'age' => trim($_POST['age']),
                    'gender' => trim($_POST['gender']),
                    'status' => trim($_POST['status'])
                ];
    
    
                if(empty($data['name']) ){
                    $data['name_err'] = "Please Enter Name";
                }
    
                if(empty($data['address']) ){
                    $data['address_err'] = "Please Enter Address";
                }
    
                if(empty($data['num']) ){
                    $data['num_err'] = "Please Enter Phone Number";
                }
    
                if(empty($data['sog']) ){
                    $data['sog_err'] = "Please Enter State of Origin";
                }
    
                if(empty($data['age']) ){
                    $data['age_err'] = "Please Enter Age";
                }
    
                if(empty($data['gender']) ){
                    $data['gender_err'] = "Please Enter Gender";
                }
    
                if(empty($data['status']) ){
                    $data['status_err'] = "Please Enter Marital Status";
                }

                if (empty($data['name_err']) && empty($data['address_err']) && empty($data['num_err']) && empty($data['sog_err']) && empty($data['age_err']) && empty($data['gender_err']) && empty($data['status_err']) ){
            
                    if($this->studentModel->register($data)){
                        
                        redirect('students/olevel');
                        
                    }else{
                        die('Something went wrong');
                    }

                } else {
                    $this->view('students/info', $data);
                }


            } else {
                $data = [
                    'name' => '',
                    'address' => '',
                    'num' => '',
                    'sog' => '',
                    'age' => '',
                    'gender' => '',
                    'status' => ''
                ];
            }
          

            $this->view('students/info', $data);
        }

        public function olevel(){

            if($_SERVER['REQUEST_METHOD'] == 'POST') {


                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Process information
                $data = [
                    'english' => trim($_POST['english']),
                    'maths' => trim($_POST['maths']),
                    'chemistry' => trim($_POST['chemistry']),
                    'physics' => trim($_POST['physics']),
                    'biology' => trim($_POST['biology']),
                    
                ];


                if(empty($data['english']) ){
                    $data['english_err'] = "Please Enter English Grade";
                }elseif(!preg_match('/[a-fA-F]/', $data['english'])){
                    $data['english_err'] = "Grade Must Be Between A-F";
                }

                if(empty($data['maths']) ){
                    $data['maths_err'] = "Please Enter Maths Grade";
                }elseif(!preg_match('/[a-fA-F]/', $data['maths'])){
                    $data['maths_err'] = "Grade Must Be Between A-F";
                }

                if(empty($data['physics']) ){
                    $data['physics_err'] = "Please Enter Pysics Grade";
                }elseif(!preg_match('/[a-fA-F]/', $data['physics'])){
                    $data['physics_err'] = "Grade Must Be Between A-F";
                }

                if(empty($data['biology']) ){
                    $data['biology_err'] = "Please Enter Biology Grade";
                }elseif(!preg_match('/[a-fA-F]/', $data['biology'])){
                    $data['biology_err'] = "Grade Must Be Between A-F";
                }

                if(empty($data['chemistry']) ){
                    $data['chemistry_err'] = "Please Enter Chemistry Grade";
                }elseif(!preg_match('/[a-fA-F]/', $data['chemistry'])){
                    $data['chemistry_err'] = "Grade Must Be Between A-F";
                }

                //validation
                if (empty($data['english_err']) && empty($data['maths_err']) && empty($data['physics_err']) && empty($data['biology_err']) && empty($data['chemistry_err'])){
            
                    if($this->studentModel->olevel($data)){

                        redirect('students/utme');

                    }else{
                        die('Something went wrong');
                    }

                } else {
                    $this->view('students/olevel', $data);
                }


            } else {
                $data = [
                    'maths' => '',
                    'physics' => '',
                    'english' => '',
                    'biology' => '',
                    'chemistry' => '',
                ];

                $this->view('students/olevel', $data);
            }
        }

        public function utme(){

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Process information
                $data = [
                    'maths' => trim($_POST['maths']),
                    'chemistry' => trim($_POST['chemistry']),
                    'physics' => trim($_POST['physics']),
                    'biology' => trim($_POST['biology']),
                    
                ];

                if(empty($data['maths']) ){
                    $data['maths_err'] = "Please Enter Mathematics Score";
                }
                if(empty($data['physics']) ){
                    $data['physics_err'] = "Please Enter Pysics Score";
                }
                if(empty($data['biology']) ){
                    $data['biology_err'] = "Please Enter Biology Score";
                }
                if(empty($data['chemistry']) ){
                    $data['chemistry_err'] = "Please Enter Chemistry Score";
                }


                //validation
                if (empty($data['maths_err']) && empty($data['physics_err']) && empty($data['biology_err']) && empty($data['chemistry_err']) ){
            
                    if($this->studentModel->utme($data)){

                        redirect('students/classificationAlgoPrediction');

                    }else{
                        die('Something went wrong');
                    }

                } else {
                    $this->view('students/utme', $data);
                }


            } else {
                $data = [
                    'mathematics' => '',
                    'physics' => '',
                    'biology' => '',
                    'chemistry' => ''
                ];

                $this->view('students/utme', $data);
            }
        }

        public function classificationAlgoPrediction(){

            $result = $this->studentModel->classificationAlgoPrediction();

            $olevel = json_decode($result->olevel);
            $olr = [
                'olevel'=>$olevel,
                'english'=> strtoupper($olevel->english),
                'maths'=> strtoupper($olevel->maths),
                'physics'=> strtoupper($olevel->physics),
                'chemistry'=> strtoupper($olevel->chemistry),
                'biology'=> strtoupper($olevel->biology),
                'english'=> strtoupper($olevel->english),

            ];

            $utme = json_decode($result->utme);
            $utr = [
                'utme'=>$utme,
                'maths'=> $utme->maths,
                'physics'=> $utme->physics,
                'chemistry'=> $utme->chemistry,
                'biology'=> $utme->biology,
            ];

            $result = [
                'olevel'=>$olevel,
                'utme'=>$utme,
                'name'=>$result->name,
                'phone'=>$result->phone,
                'gender'=>$result->gender,
                'age'=>$result->age,
                'state'=>$result->state_of_origin,
                'status'=>$result->marital_status,
                'address'=>$result->address,
                'first'=> '',
                'second'=> '',

            ];


            if(($olr['chemistry'] == 'A' or $olr['chemistry'] == 'B') and ($olr['biology'] == 'A' or $olr['biology'] == 'B') and 
                ($utr['biology'] >= 60 and $utr['chemistry'] >= 60 )){

                $choice1= ['Medicine', 'Physiology', 'Anatomy', 'Biochemistry'];
                $choice1_key = array_rand($choice1);
                $result['first'] = $choice1[$choice1_key];

                $choice2 = ['Science Laboratory Technology', 'Pure and Applied Biology', 'Pure and Applied Chemistry', 'Animal Nutrition Biotechnology'];
                $choice2_key = array_rand($choice2);
                $result['second'] = $choice2[$choice2_key];
            
            } elseif( ($olr['chemistry'] == 'A' or $olr['chemistry'] == 'B' or $olr['chemistry'] == 'C' ) and ($olr['biology'] == 'A' or $olr['biology'] == 'B' or $olr['biology'] == 'C') and 
                ($utr['biology'] >= 50 and $utr['chemistry'] >= 50 and $utr['biology'] < 60 and $utr['chemistry'] < 60 ) ){

                    $choice1 = ['Science Laboratory Technology', 'Pure and Applied Biology', 'Pure and Applied Chemistry', 'Animal Nutrition Biotechnology'];
                    $choice1_key = array_rand($choice1);
                    $result['first'] = $choice1[$choice1_key];

                    $choice2 = ['Animal Production and Health', 'Crop Production Science', 'Area Environmental and Rural Development'];
                    $choice2_key = array_rand($choice2);
                    $result['second'] = $choice2[$choice2_key];

            }elseif(($olr['chemistry'] == 'C' or $olr['chemistry'] == 'D') and ($olr['biology'] == 'C' or $olr['biology'] == 'D') and 
                ($utr['biology'] >= 40 and $utr['chemistry'] >= 40 ) ){

                    $choice1 = ['Animal Production and Health', 'Crop Production Science', 'Area Environmental and Rural Development'];
                    $choice1_key = array_rand($choice1);
                    $result['first'] = $choice1[$choice1_key];
                    
                    $choice2 = ['Fine and Applied Art', 'Urban and Regional Planning'];
                    $choice2_key = array_rand($choice2);
                    $result['second'] = $choice2[$choice2_key];
            
            }elseif(($olr['maths'] == 'A' or $olr['maths'] == 'B') and ($olr['physics'] == 'A' or $olr['physics'] == 'B') and 
                ($utr['maths'] >= 60 and $utr['maths'] >= 60 )){

                    $choice1 = ['Electrical and Electronics Engineering', 'Computer Science and Engineering', 'Mechanical Enginerring' ];
                    $choice1_key = array_rand($choice1);
                    $result['first'] = $choice1[$choice1_key];
                    
                    $choice2 = ['Pure and Applied Physics', 'Pure and Applied Mathematics', 'Agricultural Engineering', 'Statistics'];
                    $choice2_key = array_rand($choice2);
                    $result['second'] = $choice2[$choice2_key];
                
            }elseif(($olr['maths'] == 'A' or $olr['maths'] == 'B') and ($olr['chemistry'] == 'A' or $olr['chemistry'] == 'B') and 
                ($utr['maths'] >= 60 and $utr['maths'] >= 60 ) ){

                    $choice1 = ['Food Science and Engineering', 'Chemical Enginerring' ];
                    $choice1_key = array_rand($choice1);
                    $result['first'] = $choice1[$choice1_key];
                    
                    $choice2 = ['Pure and Applied Chemistry', 'Science Laboratory Technology', 'Geology'];
                    $choice2_key = array_rand($choice2);
                    $result['second'] = $choice2[$choice2_key];

            }else{
                $choice1 = ['Accounting', 'Transport Management', 'General Studies'];
                $choice1_key = array_rand($choice1);
                $result['first'] = $choice1[$choice1_key];
                
                $result['second'] = 'Not Awarded';
            }

            $first_choice = $result['first'];
            $second_choice = $result['second'];
            
            $this->view('students/classificationAlgoPrediction', $result);
        }

        public function regressionAlgoprediction(){

            $result = $this->studentModel->classificationAlgoPrediction();

            $olevel = json_decode($result->olevel);
            $olevelResult = [
                'olevel'=>$olevel,
                'english'=> strtoupper($olevel->english),
                'maths'=> strtoupper($olevel->maths),
                'physics'=> strtoupper($olevel->physics),
                'chemistry'=> strtoupper($olevel->chemistry),
                'biology'=> strtoupper($olevel->biology),
            
            ];

            $utme = json_decode($result->utme);
            $utmeResult = [
                'utme'=>$utme,
                'maths'=> $utme->maths,
                'physics'=> $utme->physics,
                'chemistry'=> $utme->chemistry,
                'biology'=> $utme->biology,
            ];

            $result = [
                'olevel'=>$olevel,
                'utme'=>$utme,
                'name'=>$result->name,
                'phone'=>$result->phone,
                'gender'=>$result->gender,
                'age'=>$result->age,
                'state'=>$result->state_of_origin,
                'address'=>$result->address,
                'status'=>$result->marital_status,
                'first'=> '',
                'second'=> '',

            ];


            $scores = [
                'A'=>5,
                'B'=>4,
                'C'=>3,
                'D'=>2,
                'E'=>1,
            ];

            $grades = [
                'maths'=> strtoupper($olevel->maths),
                'physics'=> strtoupper($olevel->physics),
                'chemistry'=> strtoupper($olevel->chemistry),
                'biology'=> strtoupper($olevel->biology),
                'english'=> strtoupper($olevel->english),
            ];

            foreach ($grades as $gradeKey => $grade) {

                foreach ($scores as $scoreKey => $score) {

                    if ($grade == $scoreKey) {
                        $values[] = $score;
                    }
                }
            }

            $olevelSum = array_sum($values);
    
            $utmeGrade = [
                'maths'=> $utme->maths,
                'physics'=> $utme->physics,
                'chemistry'=> $utme->chemistry,
                'biology'=> $utme->biology,
            ];

            foreach ($utmeGrade as $utmeKey => $utmeScore) {
               
                if ($utmeScore >= 60) {
                    $utmeValues[] = 5;
                }
                if($utmeScore > 49 and $utmeScore < 60){
                    $utmeValues[] = 4;
                }
                if($utmeScore > 39 and $utmeScore < 50){
                    $utmeValues[] = 3;
                }
                if($utmeScore > 29 and $utmeScore < 40){
                    $utmeValues[] = 2;
                }
                if($utmeScore < 29 ){
                    $utmeValues[] = 1;
                }

            }

            $utmeSum = array_sum($utmeValues);
            $total = (4 * $utmeSum) + $olevelSum;

        

            if ($total > 100) {

                $choice1 = ['Medicine', 'Biochemistry' ,'Chemical Enginerring', 'Electrical and Eletronics Engineering' ];
                $choice1_key = array_rand($choice1);
                $result['first'] = $choice1[$choice1_key];
                    
                $choice2 = ['Pure and Applied Chemistry', 'Pure and Applied Biology', 'Science Laboratory Technology', 'Geology'];
                $choice2_key = array_rand($choice2);
                $result['second'] = $choice2[$choice2_key];
            }

            if ($total > 90 && $total <=100) {

                $choice1 = ['Physiology', 'Anatomy' ,'Computer Science and Enginerring', 'Food Science and Technology' , 'Mechanical Engineering', 'Animal Nutrition and BioTechnology'];
                $choice1_key = array_rand($choice1);
                $result['first'] = $choice1[$choice1_key];
                    
                $choice2 = ['Pure and Applied Maths', 'Pure and Applied Physics', 'Pure and Applied Biology', 'Accounting', 'Transport Management'];
                $choice2_key = array_rand($choice2);
                $result['second'] = $choice2[$choice2_key];
            }

            if ($total > 80 && $total <= 90) {
                $choice1 = ['Civil Enginerring','Mechanical Engineering', 'Statistics', 'Pure and Applied Maths', 'Agricultural Economics and Extension' ];
                $choice1_key = array_rand($choice1);
                $result['first'] = $choice1[$choice1_key];
                    
                $choice2 = ['Pure and Applied Chemistry', 'Agricultural Engineering', 'Science Laboratory Technology', 'Geology'];
                $choice2_key = array_rand($choice2);
                $result['second'] = $choice2[$choice2_key];
            }

            if ($total > 70 && $total <=80) {
                $choice1 = ['Crop Science and Production', 'Fine and Applied Arts', 'General studies', 'Transport Management'. 'Animal Producton and Health' ];
                $choice1_key = array_rand($choice1);
                $result['first'] = $choice1[$choice1_key];
                    
                $choice2 = ['Pure and Applied Chemistry', 'Area Environmental and Rural Development', 'Science Laboratory Technology', 'Geology'];
                $choice2_key = array_rand($choice2);
                $result['second'] = $choice2[$choice2_key];
            }

            if ($total <=70) {
                $choice1 = ['Transport Management' ,'Area Environmental and Rural Development', 'Geology' ];
                $choice1_key = array_rand($choice1);
                $result['first'] = $choice1[$choice1_key];
                    
                $choice2 = ['Urban and Regional Planning', 'Crop Production and Science', 'Fine and Applied Arts', ];
                $choice2_key = array_rand($choice2);
                $result['second'] = $choice2[$choice2_key];
            }


            $this->view('students/regressionAlgoPrediction', $result);



        }

    }


?>