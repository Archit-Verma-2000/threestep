<?php
    $conn=mysqli_connect("Localhost","root","");
    mysqli_select_db($conn,"db_user");
   
?>
<?php
     if($conn)
     {
        if(isset($_POST["action"])&&$_POST["action"]=="register")
        {
            $email=$_POST["txtemail"];
            $str="SELECT email from Register where email='$email'";
            $rs=mysqli_query($conn,$str);
            if($row=mysqli_fetch_assoc($rs))
            {
                $arr=array("status"=>"failed","msg"=>"email already exists");
                $str=json_encode($arr);
                echo $str;
            }
            else
            {
                $arr=array("status"=>"success","redirect"=>"page2");
                $str=json_encode($arr);
                echo $str;
            }
        }
     }
     else
     {
        die();
     }
   
?>