<?php
  require_once "../model/class_model.php";
	if(ISSET($_POST)){
		$conn = new class_model();

		  $files = addslashes(file_get_contents($_FILES['document_name']['tmp_name']));
		  $document_name ="student_uploads/". addslashes($_FILES['document_name']['name']);
		  $image_size =  $_FILES['document_name']['size'];
		  move_uploaded_file($_FILES["document_name"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/ORDS/high-school/student/student_uploads/" .   addslashes($_FILES["document_name"]["name"]));
		  $document_decription = trim($_POST['document_decription']);
		  $studentHSID_no = trim($_POST['studentHSID_no']);
		

		$doc = $conn->add_document($document_name, $document_decription, $image_size, $studentHSID_no);
		if($doc == TRUE){
		    echo '<div class="alert alert-success">Add Document Successfully!</div><script> setTimeout(function() {  window.history.go(-1); }, 1000); </script>';

		  }else{
			echo '<div class="alert alert-danger">Add Document Failed!</div><script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';
		}
	}
?>
