


<html>
    <body>
    <?php
$nameErr= $emailErr=$genderErr=$websiteErr="";
$name= $email=$gender=$website="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["name"])) {
$nameErr = "Name is required";
} else {
$name = test_input($_POST["name"]);
}
if (empty($_POST["email"])) {
$emailErr = "Email is required";
} else {
$email = test_input($_POST["email"]);
// Check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailErr = "Invalid email format";
}
}
if (empty($_POST["website"])) {
$website = "";
} else {
$website = test_input($_POST["website"]);
}
if (empty($_POST["comments"])) {
$comments = "";
} else {
$comments = test_input($_POST["comments"]);
}
if(empty($_POST["gender"])){
    $genderErr="gender is required";
}else{
    $gender = test_input($_POST["gender"]);
}
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
<table>
    <!-- <form> -->
            <h2>Absolute classes registration</h2> 
            <p><span class = "error">* required field.</span></p>
              <form method = "post" action = "<?php 
             echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <table>
                 <tr> 
                <td>Name: </td>
                
                <td><input type = "text" name = "name"> <span class = "error">* <?php echo $nameErr;?></span> 
                </td> </tr>
                <tr>
                     <td>E-mail: </td>
                      <td><input type = "text" name = "email"> 
                      <span class = "error">* <?php echo $emailErr;?></span>
</td>
</tr> 
<tr>
    <td>Time:</td> 
    <td> <input type = "text" name = "website", <span class = "error"><?php echo $websiteErr;?> </span> 
</td>
 </tr>
  <tr>
     <td>Classes:</td>
      <td> <textarea name = "comments" rows = "5" cols = "40"></textarea></td>
</tr>
<tr>
<td>Gender:</td>
<td><input type="text" name="name">
<span class="error">*<?php echo $nameErr;?></span>
</td>
<tr>

<td>
    <input type="submit" name ="submit" value ="submit">
</td>
</table>
</form>
<?php
echo"<h2> your given values are:</h2>";
echo $name;
echo"<br>";

echo $email;
echo"<br>";

echo $website;
echo"<br>";

echo $comments;
echo"<br>";

echo $gender;
?>
</body>
</html>

