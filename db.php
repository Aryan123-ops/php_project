<?php
//print_r($_POST); exit;  "to check whether program working or not 
$servername ="localhost";
$username ="root";
$password ="";
$dbname ="infodb";

$conn = new mysqli($servername, $username, $password,$dbname);
 if ($conn->connect_error) {
     die("connection failed" .$conn->conn_error);
}
// To insert query in table info_tbl
//echo "connecteed successfully";
$sql = "INSERT INTO info_tbl( name, email, website, comment, gender)
VALUES('aryan','aryan.kumar9911@gmail.com','https://www.w3schools.com','This is very good','Male');";

$sql .= "INSERT INTO info_tbl( name, email, website, comment, gender)
VALUES('apporva','aryan.kumar9911@gmail.com','https://www.w3schools.com','This is very good','Male');";
//echo "Added successfully";
if ($conn->multi_query($sql) === TRUE){
    echo "records added";
}else{
echo "Error" .$sql ."<br>" .$conn->error;
}
/*$sql = "SELECT * From info_tbl";
$result =$conn->query($sql);

if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        echo "id: " .$row["id"]. "<br>" ,"-Name: " .$row["name"].  "<br>" ,"-Email: " .$row["email"].  
        "<br>" ,"Website: " .$row["website"].  "<br>", "Comment: " .$row["comment"]. "<br>", "Gender: ". $row["gender"]. "<br>";
    }

}else{
    echo "NO records";
}
*/
