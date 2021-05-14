<?php
require_once 'dbconnect.php';  
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();  
class dbFunction {  
    private $result;
    function __construct() {  
        }  
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
                        echo "<script> location.replace('../webpages/adminlogin.php'); </script>";
                        
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

function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}
      

// by default, error messages are empty
$login=$nameErr=$passErr='';

$funObj = new dbFunction();  
extract($_POST);
if(isset($_POST['submit']))
{
   
   
   $validName="/^[a-zA-Z0-9]*$/";
    if(empty($adminid)){
        $nameErr="Admin ID is Required"; 
    }
    else if (!preg_match($validName,$adminid)) {
    $nameErr="Invalid Admin ID";
    }
    else{
    $nameErr=true;
    }
    

    if(empty($password)){
    $passErr="Password is Required"; 
    } 
    else{
    $passErr=true;
    }

    if( $nameErr==1 && $passErr==1)
    {
        $adminid= legal_input($adminid);
        $password= legal_input($password);
        echo $password;
        $user = $funObj->Login($adminid, $password);  
        if ($user) {  
            header("location:../webpages/home.php");  
        } else {  
            echo "<script>alert('AdminId Does Not Match')</script>";  
        }
    

    }

}
 
?>