
 <?php

$conn = new mysqli("localhost","root","","MajorProject");


// sql to create table

$q = "create table cases(eid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				ename VARCHAR(30),
				description VARCHAR(30),
				typeofcase VARCHAR(30),
				status VARCHAR(10),
				lawyer VARCHAR(30),
				dateofhearing VARCHAR(10),
				lawyerstatus VARCHAR(10)
				)";


if ($conn->query($q) == TRUE) 
{
 echo "Table emp created successfully";
} 
else 
{
 echo "Error creating table:".$conn->connect_error;
}

$conn->close();

?>