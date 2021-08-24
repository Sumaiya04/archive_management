<!--Search and add members-->
<?php
$Key=$_GET['key'];
$PId=$_GET['pid'];

if (strlen($Key)>0) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "based";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT tbl_user.Email FROM tbl_user INNER JOIN tbl_user_role ON tbl_user.ID=tbl_user_role.UserID
    INNER JOIN tbl_role ON tbl_user_role.RoleID=tbl_role.ID WHERE tbl_role.Name='Student'
    AND tbl_user.Email NOT IN (SELECT tms_student_thesis.student_id FROM tms_student_thesis WHERE 
    tms_student_thesis.thesis_id='".$PId."') AND tbl_user.Email LIKE '%$Key%'";

    $hint="";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($res=$result->fetch_assoc()){
            if($hint==""){
                $hint='<a href="?id='.$PId.'&auid='.$res['Email'].'" onclick="return confirm(\'sure to add !\');">'.$res['Email'].'</a>';

            }else{
                $hint=$hint.'<br /><a href="?id='.$PId.'&auid='.$res['Email'].'" onclick="return confirm(\'sure to add !\');">'.$res['Email'].'</a>';

            }
        }
    }
    if($hint==""){
        echo "No Student Found";
    }else{
        echo $hint;
    }

    $conn->close();
}
?>
