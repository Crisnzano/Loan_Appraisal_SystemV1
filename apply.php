<?php
     mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    include'db_connect.php';

        function generateKey(){
            $keyLength=6;
            $str="1234567890";
            $randStr=substr(str_shuffle($str),0,$keyLength);
            return$randStr;
        }
         function generateKey2(){
            $keyLength=1;
            $str="1234567890";
            $randStr=substr(str_shuffle($str),0,$keyLength);
            return$randStr;
        }
         function generateKey3(){
            $keyLength=1;
            $str="123";
            $randStr=substr(str_shuffle($str),0,$keyLength);
            return$randStr;
        }
        function getClientID(){
        } 
       
       
    
        $loantype= $_POST['loan_type'];
        $plan = $_POST['loan_plan'];
        $amount = $_POST['loan_amount'];
        $purpose= $_POST['purpose'];
        $refno= generateKey();
        $clientID = generateKey3();
        $status=0;
       



    $sql = "INSERT INTO loans ( clientID, purpose, loan_type_id, ref_number, loan_amount, planID, loan_status) VALUES ('$clientID','$purpose','$loantype','$refno', '$amount', '$plan','$status')";
    if(mysqli_query($conn,$sql)){
        echo"<br>";
        echo header('location:loanapplication.php?application=success');
        }else{
        die("Error Inserting Data");
        }
 
    
 
?>

