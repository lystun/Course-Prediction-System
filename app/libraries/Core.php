 <?php 
    /*
        * App Core Class
        * Creates URL & loads core Controller
        * URL Format - /controller/method/params
    */

    class Core {
        
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){

            $url = $this->getUrl();
            
            //Look in controllers for first value
            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                $this->currentController = ucwords($url[0]);
                unset($url[0]); 

            }
            
            //Require controller class
            require_once '../app/controllers/'.$this->currentController.'.php';
            
            //Instantiate controller class
            $this->currentController = new $this->currentController;

            //Look in url for second part
            if(isset($url[1])){
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }

            }

            //Get Params
            $this->params = $url ? array_values($url) : [] ;
            
            //call a callback with array of parameters
            call_user_func_array([$this->currentController , $this->currentMethod], $this->params);




        }

        public function getUrl(){

            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/' );
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                
                return $url;
            }
        }
    }
 
 
 
 ?>