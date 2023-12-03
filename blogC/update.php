<?php
//database connection
include_once('inc/conn.php');

//connect index
include 'index.php';


$id = $_GET['edit'];

if(isset($_POST['update_blog'])) {

    //collect new data
    $blog_id = $_POST['blog_id'];
    $blog_title = $_POST['blog_title'];
    $blog_content = $_POST['blog_content'];
    $blog_date = $_POST['blog_date'];
    $blog_image = $_FILES['blog_image']['name'];
    $blog_image_tmp_name = $_FILES['blog_image']['tmp_name'];
    $blog_image_folder = 'uploaded_image/'.$blog_image;

    //update 
    if(empty($blog_id) || empty($blog_title) || empty($blog_content) || empty($blog_date) || empty($blog_image) ){
        $message[] = 'please fill out all';
    }else{
        $update_data = "UPDATE blog SET bid ='$blog_id', title ='$blog_title', content ='$blog_content', date ='$blog_date', image ='$blog_image'
        WHERE id ='$id'";
        $upload = mysqli_query($conn, $update_data);
        if($upload){
            move_uploaded_file($blog_image_tmp_name, $blog_image_folder);
            header('location:index.php');
            
        }else{
            $message[] = 'please fill out all' ;

        }
    }


};



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog update</title>

    <link rel ="stylesheet" href="bstyle.css" type="text/css">
</head>
<body>

<?php

//display error mag
if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }
}



?>

<div class ="container">

<div class="blog-contents centered">


<?php 
$select = mysqli_query($conn,"SELECT * FROM blog WHERE id = '$id' ");
while($row = mysqli_fetch_assoc($select)){


?>
        <!-- display update panel for enter date -->
        <form action ="" method ="post" enctype ="multipart/form-data">
        <h3> Update the Blog </h3>
        <input type="text"  class ="box" name ="blog_id" value="<?php echo $row['bid'];?>" placeholder ="Enter blog ID like (b_)">
        <input type="text" class ="box" name ="blog_title" value="<?php echo $row['title'];?>"  placeholder ="Enter blog title">
        <input type="text" class ="box" name ="blog_content" value="<?php echo $row['content'];?>"  placeholder ="Enter blog content" >
        <input type="text"  class ="box" name ="blog_date" value="<?php echo $row['date'];?>"  placeholder ="Enter blog date">
        <input type="file" accept="image/png, image/jpeg, image/jpg" name ="blog_image" class ="box">
        <input type ="submit" class = "btn" name ="update_blog" value = "update Blog" >
        <a href="index.php" class="btn" >go back </a>
</form>

<?php }; ?>
</div>
</div>
    
</body>
</html>