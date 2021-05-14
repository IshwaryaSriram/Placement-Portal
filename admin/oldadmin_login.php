<?php
require_once 'dbconnect.php';  
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();  
class dbFunction {  
    private $result;

    //private $conn=Database::getObject(); 
    //private Database $db;
    function __construct() {  
      //    $this->$conn=Database::getObject();
        //echo "constructor created";
               
        }  
        // destructor  
        function __destruct() {  

        }  

        public function getResult($adminid)
        {
            $stmt = Database::getObject()->prepare("SELECT admin_id,pwd FROM admin_log WHERE admin_id=?");
            $stmt->bind_param("s", $adminid);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
        public function isUserExist($adminid){  
            $result = $this->getResult($adminid);
            if ($row = $result->fetch_array(MYSQLI_ASSOC)){
                return true;
            }
            else{
                return false;
            }
        }  
        
        public function Login($adminid, $password){  
            if($this->isUserExist($adminid))
            {
                $result = $this->getResult($adminid);
                $row_cnt = $result->num_rows;              
                if ($row_cnt == 1)   
                {  
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    print_r($row);
                    //$passchk=password_verify($password,$row['pwd']);
                    if($password!==$row['pwd'])
                    {
                        echo "<script>alert('Password Does Not Match')</script>";
                        echo "<script> location.replace('../webpages/admlogin.php'); </script>";
                        
                    }
                    elseif($password===$row['pwd'])
                    {
                        session_start();
                        $_SESSION['s_id'] =$row['adminid'];
                        header("Location:../webpages/home.php");
                        return true;
                    }
                }  
                else  
                { 
                    return FALSE;  
                }
            }  
            else{
                return false;
            }
        }  
        
    }  
 
?>