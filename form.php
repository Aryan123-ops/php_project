<!DOCTYPE html>
<html>
<head>
<style>
    .error {color: green;}
</style>
</head>
<title>Information Form</title>
<body>
<?php 
$nameErr = $emailErr = $websiteErr = $genderErr = /*$maritlErr*/  $comntErr = "";
$name = $email = $website = $comment = $gender = ""; /*$maritlstats =*/ 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["name"])) {
        $nameErr ="Name is required";
    }else {
        $name =test_input($_POST["name"]);
        // check if name contains letters and whitespaces
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "only letters allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    }else {
        $email =test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    } 
    if (empty($_POST["website"])) {
        $website = "";
      } else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
          $websiteErr = "Invalid URL";
        }
      }  
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required ";
    }else{
        $gender = test_input($_POST["gender"]);
    }
    if (empty($_POST["comment"])) {
        $comntErr = "";
    }else {
    $comment = test_input($_POST["comment"]);
    }
    /*if (empty($_POST["maritlstats"])) {
        $maritlErr ="";
    }else{
        $maritlstats = test_input($_POST["maritlstats"]);
    }
    */
}
function test_input($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>     

<h2>Information Form</h2>
<p><span class="error">* Required</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
Name: <input type="text" name="name" >
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
Email: <input type="text" name="email" >
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Website: <input type="text" name="website" value="<?php echo $website;?>">
<span class="error">* <?php echo $websiteErr;?></span>
<br><br>
Comment: <textarea name="comment" rows="4" cols="40"><?php echo $comment;?></textarea><br><br>
Gender: 
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>value="Male" > Male 
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>value="Female" > Female
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?>value="Other" > Other 
<span class="error">* <?php echo $genderErr;?></span>
<br><br>
<!--Marrital Status:
<input type="checkbox" name="mrtlsts" <?php if (isset($maritlstats) && $maritlstats=="marrd") echo "checked";?>value="marrd"> Married
<input type="checkbox" name="mrtlsts" <?php if (isset($maritlstats) && $maritlstats=="unmarrd") echo "checked";?>value="unmarrd" > Unmarried
<span class="error">* <?php echo $maritlErr;?></span>
<br><br> -->
<input type="submit" name="submit" value="Submit"><br><br>
</form>
        
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
echo "<br>";
echo $maritlstats;
echo "<br>";

?> 
</body>
</html>