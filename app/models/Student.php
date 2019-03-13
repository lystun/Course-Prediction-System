
<?php 


    class Student {
        private $db;


        public function __construct(){
            $this->db = new Database;
        }

        public function register($data) {

            $this->db->query("INSERT INTO students (name, address, phone, age, gender, marital_status, state_of_origin) VALUES (:name, :address, :phone, :age, :gender, :status, :sog) ");
            
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':phone', $data['num']);
            $this->db->bind(':sog', $data['sog']);
            $this->db->bind(':age', $data['age']);

            // $age  = (int)date('Y') - (int)$data['age'];
            // $this->db->bind(':age', $age);

            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':status', $data['status']);

            if($this->db->execute()){

                $_SESSION['student_id'] = $this->db->lastInsertId();

                return true;

            } else {
                return false;
            }

        }

        public function olevel($data){

            $olevel = json_encode($data);

            if (isset($_SESSION['student_id']) && !empty($_SESSION['student_id'])) {
                $student_id = $_SESSION['student_id'];
            } else {
                redirect('students/info');
                die();
            }

            $this->db->query("SELECT steps FROM students WHERE id = :student_id ");
            $this->db->bind(':student_id', $student_id);
            
            $row = $this->db->single();

            $step = $row->steps;

            if ($step != '0' ) {    
                redirect("students/info");
                die();
            }

            $this->db->query("UPDATE students SET olevel = :olevel, steps = :step WHERE id = :id ");
            
            $this->db->bind(':olevel', $olevel);
            $this->db->bind(':step', 1);
            $this->db->bind(':id', $student_id);

            if($this->db->execute()){
                return true;
            } else {

                return false;
            }
        }

        public function utme($data){

            $utme = json_encode($data);

            if (isset($_SESSION['student_id']) && !empty($_SESSION['student_id'])) {
                $student_id = $_SESSION['student_id'];
            } else {
                redirect('students/info');
                die();
            }

            $this->db->query("SELECT steps FROM students WHERE id = :student_id ");
            $this->db->bind(':student_id', $student_id);
            
            $row = $this->db->single();

            $step = $row->steps;

            if ($step != '1' ) {    
                redirect("students/info");
                die();
            }

            $this->db->query("UPDATE students SET utme = :utme, steps= :step WHERE id = :id ");
            
            $this->db->bind(':utme', $utme);
            $this->db->bind(':step', 2);
            $this->db->bind(':id', $_SESSION['student_id']);

            if($this->db->execute()){
                return true;
            } else {

                return false;
            }
        }

        public function classificationAlgoPrediction(){

            if (isset($_SESSION['student_id']) && !empty($_SESSION['student_id'])) {
                $student_id = $_SESSION['student_id'];
            } else {
                redirect('students/info');
                die();
            }

            $this->db->query("SELECT * FROM students WHERE id = :id ");
            $this->db->bind(':id', $student_id);

            $result = $this->db->single();

            return $result;

        }

        public function data_set(){
            if (!empty($result) ) {
                echo $result['first'];
                echo $result['second'];
            }
        }


    }