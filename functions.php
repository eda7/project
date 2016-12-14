<?php
	function service_conn($conn){
		if($conn){
			echo "<small style='color:green;'>Service running</small>";
		}else{
			echo "<small style='color:red;'>Service not running</small>";
		}
	}

	function login($username, $smartID, $password, $conn){

		$query="SELECT * FROM `user_info` WHERE `smart_ID`='$smartID' AND `username`='$username' AND `password`='".md5($password)."'";
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result)==1) {
		    $row = mysqli_fetch_assoc($result);
		    date_default_timezone_set("Africa/Accra");
		    $_SESSION['start_time']=date("h:ia");
		    $_SESSION['id']=$row['User_id'];
		    $_SESSION['username']=$row['username'];
		    $_SESSION['designation']=$row['Designation'];
		    $_SESSION['dp']=$row['Title']." ".$row['Last_name'];
		    $_SESSION['fn']=$row['Title']." ".$row['First_name']." ".$row['Last_name'];

		    switch ($_SESSION['designation']) {
		    	case "Doctor":
		    		header("Location:account/doctor/");
		    		break;

		    	case "Nurse":
		    		header("Location:account/nurse/");
		    		break;

		    	case "MedLab":
		    		header("Location:account/medlab/");
		    		break;
		    	
		    	case "Pharmacist":
		    		header("Location:account/pharmacist/");
		    		break;

		    	case "Cashier":
		    		header("Location:account/cashier/");
		    		break;

		    	case "Administrator":
		    		header("Location:account/admin/");
		    		break;

		    	default:
		    		
		    		break;
		    }
		} else {
		    echo "<script>alert('Wrong Username or Password! or Check smartID');</script>";
		}

		
	}

	function logwriter(){
		date_default_timezone_set("Africa/Accra");
		$file ="../log/UserLogin.txt";
		$txt="User: ".$_SESSION['username']."\r\nDate: ".date("d-m-Y")."\r\nLog in: ".$_SESSION['start_time']."\r\nLog out: ".date("h:ia")."\r\n-------------------------";

		file_put_contents($file, $txt."\r\n", FILE_APPEND | LOCK_EX);
	}

	function check_session()
	{
	    if(!isset($_SESSION['username']))
	    {
	        header("Location:../../index.php");
	    }
	
	}

	function user_session()
	{
		echo "Hi ". $_SESSION['dp'];
	}

	function user_fullname()
	{
		echo $_SESSION['fn'];
	}

	function username()
	{
		echo $_SESSION['username'];
	}

	function s_UserInfo($id,$conn){
		$query="SELECT * FROM `user_info` WHERE `User_id` ='$id'";
		$result = mysqli_query($conn, $query);


		if (mysqli_num_rows($result)==1) {
		    $row = mysqli_fetch_assoc($result);

		    return $row;
		}
	}

	function u_UserInfo($address,$Civil_status,$username,$password,$email,$User_id,$conn){

		$query="UPDATE `user_info` SET `address`=$address,`Civil_status`='$Civil_status',`username`='$username',`password`='".md5($password)."',`email`='$email' WHERE `User_id`='$User_id'";

		$result=mysqli_query($conn, $query);

		if(!$result){
					echo "<script>alert('User Account Update Failed".mysql_error()."');</script>";
				}else{
					echo "<script>alert('Updated Successfully');</script>";
		}

	}

	function i_patient($smartid,$title,$fname,$lname,$mname,$dob,$pob,$gender,$Civil_status,$religion,$bloodtype,$house_no,$city,$mobile_no,$home_no,$work_no,$address,$email,$Insurance_Scheme,$Insurance_ID_number,$conn){

	$check="SELECT * FROM `patient_info` WHERE `smart_ID`='$smartid'";
	$result = mysqli_query($conn, $check);


		if(mysqli_num_rows($result)==0){
			$query = "INSERT INTO `patient_info`(`P_ID`, `smart_ID`, `Title`, `Last_name`, `First_name`, `Middle_name`, `DOB`, `Place_of_birth`, `Gender`, `Marital_status`, `Religion`, `Blood_group`, `House_number`, `City`, `Address`, `Phone_num1`, `Phone_num2`, `Phone_num3`, `Email`, `Insurance_Scheme`, `Insurance_ID_number`) VALUES ('','$smartid','$title','$fname','$lname','$mname','$dob','$pob','$gender','$Civil_status','$religion','$bloodtype','$house_no','$city','$address','$mobile_no','$home_no','$work_no','$email','$Insurance_Scheme','$Insurance_ID_number')";

				$result = mysqli_query($conn, $query);

				if(!$result){
					echo "<script>alert('Record Insertion Failed".mysql_error()."');</script>";
				}else{
					echo "<script>alert('Patient Record Saved Successfully');</script>";
				}
		}else{
			echo "<script>alert('Patient Record Already in Database. Click "."to continue');</script>";	
		}

	}

	function i_user($smartid,$title,$fname,$lname,$mname,$dob,$pob,$gender,$Civil_status,$religion,$bloodtype,$house_no,$city,$mobile_no,$home_no,$work_no,$address,$email,$Insurance_Scheme,$Insurance_ID_number,$conn){

	$check="SELECT * FROM `patient_info` WHERE `smart_ID`='$smartid'";
	$result = mysqli_query($conn, $check);


		if(mysqli_num_rows($result)==0){
			$query = "INSERT INTO `patient_info`(`P_ID`, `smart_ID`, `Title`, `Last_name`, `First_name`, `Middle_name`, `DOB`, `Place_of_birth`, `Gender`, `Marital_status`, `Religion`, `Blood_group`, `House_number`, `City`, `Address`, `Phone_num1`, `Phone_num2`, `Phone_num3`, `Email`, `Insurance_Scheme`, `Insurance_ID_number`) VALUES ('','$smartid','$title','$fname','$lname','$mname','$dob','$pob','$gender','$Civil_status','$religion','$bloodtype','$house_no','$city','$address','$mobile_no','$home_no','$work_no','$email','$Insurance_Scheme','$Insurance_ID_number')";

				$result = mysqli_query($conn, $query);

				if(!$result){
					echo "<script>alert('Record Insertion Failed".mysql_error()."');</script>";
				}else{
					echo "<script>alert('Patient Record Saved Successfully');</script>";
				}
		}else{
			echo "<script>alert('Patient Record Already in Database. Click "."to continue');</script>";	
		}

	}


function patient_list($conn){
	$query="SELECT * FROM `patient_info` ORDER BY `P_ID` ASC";
	$result = mysqli_query($conn, $query);

	while($row=mysqli_fetch_assoc($result)){
		 printf('<tr><td><a href=edit_patient?id='.$row['P_ID'].'&edit=true>'.$row['P_ID'].'</a></td><td>'.$row['First_name'].' '.$row['Last_name'].'</td><td>'.$row['DOB'].'</td><td>'.$age=date('Y-m-d')-$row['DOB'].'</td><td>'.$row['Gender'].'</td><td>'.$row['Blood_group'].'</td><td>'.$row['time_stamp'].'</td><td><a href=edit_patient?id='.$row['P_ID'].'&edit=true>Edit </a> | <a> Delete</a></td></tr>');
	}

}

function user_list($conn){
	$query="SELECT * FROM `user_info` ORDER BY `User_id` ASC";
	$result = mysqli_query($conn, $query);

	while($row=mysqli_fetch_assoc($result)){
		 printf('<tr><td><a href=view_user.php?id='.$row['User_id'].'&view=true>'.$row['User_id'].'</a></td><td>'.$row['First_name'].' '.$row['Last_name'].'</td><td>'.$row['Department'].'</td><td>'.$row['Designation'].'</td><td>'.$row['User_role'].'</td></tr>');
	}

}

function outpatient($conn)
{
	$status="None";
	$query="SELECT * FROM `patient_info` WHERE  `hospital_status`=''  ORDER BY `P_ID` ASC";
	$result = mysqli_query($conn, $query);

	while(@$row=mysqli_fetch_assoc($result)){
		 printf('<tr><td>'.$row['P_ID'].'</td><td>'.$row['First_name'].' '.$row['Last_name'].'</td><td>'.$row['DOB'].'</td><td>'.$age=date('Y-m-d')-$row['DOB'].'</td><td><a href="?id='.$row['P_ID'].'&st=Out">Select</a></td></tr>');
	}
}

function inpatient($conn)
{
	$status="None";
	$query="SELECT * FROM `patient_info` WHERE  `hospital_status`=''  ORDER BY `P_ID` ASC";
	$result = mysqli_query($conn, $query);

	while(@$row=mysqli_fetch_assoc($result)){
		 printf('<tr><td>'.$row['P_ID'].'</td><td>'.$row['First_name'].' '.$row['Last_name'].'</td><td>'.$row['DOB'].'</td><td>'.$age=date('Y-m-d')-$row['DOB'].'</td><td><a href="?id='.$row['P_ID'].'&st=In">Select</a></td></tr>');
	}
}



####################################################################################################
 function edit_patient($id,$edit,$conn)
 {
 	$query="SELECT * FROM  `patient_info` WHERE `P_ID`='$id'";

 	if($edit=="true"){
 		$result = mysqli_query($conn, $query);
 		$row=mysqli_fetch_assoc($result);
 	}

 	return $row;
 }

function u_patient($title,$fname,$lname,$mname,$dob,$pob,$gender,$status,$religion,$bloodtype,$house_no,$city,$mobile_no,$home_no,$work_no,$address,$email,$i_scheme,$i_no,$conn){

	$id=$_SESSION['edit']['P_ID'];

	$check="SELECT * FROM `patient_info` WHERE `P_ID`='$id'";
	$result = mysqli_query($conn, $check);

	if(mysqli_num_rows($result)==1){
		
		$query="UPDATE `patient_info` SET `Title`='$title',`Last_name`='$lname',`First_name`='$fname',`Middle_name`='$mname',`DOB`='$dob',`Place_of_birth`='$pob',`Gender`='$gender',`Marital_status`='$status',`Religion`='$religion',`Blood_group`='$bloodtype',`House_number`='$house_no',`City`='$city',`Address`='$address',`Phone_num1`='$mobile_no',`Phone_num2`='$home_no',`Phone_num3`='$work_no',`Email`='$email',`Insurance_Scheme`='$i_scheme',`Insurance_ID_number`='$i_no' WHERE `P_ID`='$id'";


		$result = mysqli_query($conn, $query);

				if(!$result){
					echo "<script>alert('Record Update Failed".mysql_error()."');</script>";
				}else{
					echo "<script>alert('Patient Record Updated Successfully');</script>";
					echo"<script type='text/javascript'>window.location.href = 'patient_mg.php';</script>";
				}
	}else{
		echo "<script>alert('Patient Record Duplicated in Database. Click "."to continue');</script>";	
	}
}

function outpatient_list($conn)
{
	$status="None";
	$query="SELECT * FROM `patient_info` WHERE  `hospital_status`='Out'  ORDER BY `P_ID` ASC";
	$result = mysqli_query($conn, $query);

	while(@$row=mysqli_fetch_assoc($result)){
		 printf('<tr><td>'.$row['P_ID'].'</td><td>'.$row['First_name'].' '.$row['Last_name'].'</td><td>'.$row['DOB'].'</td><td>'.$age=date('Y-m-d')-$row['DOB'].'</td><td>'.$row['Gender'].'</td><td>'.$row['Blood_group'].'</td><td>'.$row['Insurance_Scheme'].'</td><td>'.$row['Insurance_ID_number'].'</td><td><a href="view_patient.php?id='.$row['P_ID'].'&view=true&type=out">View</a></td></tr>');
	}
}

function inpatient_list($conn)
{
	$status="None";
	$query="SELECT * FROM `patient_info` WHERE  `hospital_status`='In'  ORDER BY `P_ID` ASC";
	$result = mysqli_query($conn, $query);

	while(@$row=mysqli_fetch_assoc($result)){
		 printf('<tr><td>'.$row['P_ID'].'</td><td>'.$row['First_name'].' '.$row['Last_name'].'</td><td>'.$row['DOB'].'</td><td>'.$age=date('Y-m-d')-$row['DOB'].'</td><td>'.$row['Gender'].'</td><td>'.$row['Blood_group'].'</td><td>'.$row['department'].'</td><td><a href="view_patient.php?id='.$row['P_ID'].'&view=true&type=in">View</a></td></tr>');
	}
}

function view_patient($patient_type,$view,$id,$conn)
{
	if($patient_type=="out" && $view=="true"){
		$query="SELECT * FROM `patient_info` WHERE `P_ID` ='$id'";
		$result = mysqli_query($conn, $query);

			if(mysqli_num_rows($result)==1){
				$row=mysqli_fetch_assoc($result);
				return $row;
			}

	}else if($patient_type=="in" && $view=="true"){
		$query="SELECT * FROM `patient_info` WHERE `P_ID` ='$id'";
		$result = mysqli_query($conn, $query);

			if(mysqli_num_rows($result)==1){
				$row=mysqli_fetch_assoc($result);
				return $row;
			}
	}
}

function view_user($view,$id,$conn)
{
	if($view=="true"){
		$query="SELECT * FROM `patient_info` WHERE `P_ID` ='$id'";
		$result = mysqli_query($conn, $query);

			if(mysqli_num_rows($result)==1){
				$row=mysqli_fetch_assoc($result);
				return $row;
			}

	}else {

	}
}

function patient_pic($gender)
{
	$male="../../assets/img/profile_male.png";
	$female="../../assets/img/profile_female.png";


	if ($gender=="Male"){
		echo $male;
	}else if ($gender=="Female"){
		echo $female;
	}
}

?>