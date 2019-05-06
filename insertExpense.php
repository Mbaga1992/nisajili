<?php 

require_once('header.php');


?>
<?php

include('functionExpense.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		
		
		$statement = $connection->prepare("
			INSERT INTO expenses (Type, Amount, DateRecorded, Description, Site) 
			VALUES (:Type, :Amount, :DateRecorded, :Description, :Site)
		");
		$result = $statement->execute(
			array(
			

		
				
				':Type'	=>	$_POST["Type"],
			    ':Amount'	=>	$_POST["Amount"],
				':DateRecorded'	=>	$_POST["DateRecorded"],
			    ':Description'	=>	$_POST["Description"],
			    ':Site'	=>	$_POST["Site"],
			   
			
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
			
			
		}
	}
	if($_POST["operation"] == "Edit")
	{
	
		$statement = $connection->prepare(
			"UPDATE expenses 
			SET Type = :Type, Amount = :Amount, DateRecorded = :DateRecorded, Description = :Description, Site = :Site
			WHERE expenseID = :expenseID
			"
		);
		$result = $statement->execute(
			array(
				
				':Type'	=>	$_POST["Type"],
			    ':Amount'	=>	$_POST["Amount"],
				':DateRecorded'	=>	$_POST["DateRecorded"],
			    ':Description'	=>	$_POST["Description"],
			    ':Site'	=>	$_POST["Site"],

				':expenseID'			=>	$_POST["expenseID"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			
			
			
		}
	}
}

?>


			