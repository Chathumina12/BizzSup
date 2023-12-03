<?php
//database connection
include_once('inc/conn.php');

if(isset($_POST['add_blog'])) {

    //add blogs
    $blog_id = $_POST['blog_id'];
    $blog_title = $_POST['blog_title'];
    $blog_content = $_POST['blog_content'];
    $blog_date = $_POST['blog_date'];
    $blog_image = $_FILES['blog_image']['name'];
    $blog_image_tmp_name = $_FILES['blog_image']['tmp_name'];
    $blog_image_folder = 'uploaded_image/'.$blog_image;

    if(empty($blog_id) || empty($blog_title) || empty($blog_content) || empty($blog_date) || empty($blog_image) ){
        $message[] = 'please fill out all';
    }else{
        $insert = "INSERT INTO blog(bid,title,content,date,image) VALUES ('$blog_id','$blog_title',' $blog_content','$blog_date','$blog_image' )";
        $upload = mysqli_query($conn,$insert);
        if($upload){
            move_uploaded_file($blog_image_tmp_name, $blog_image_folder);
            $message[] = 'new blog added successfully';
        }else{
            $message[] = 'could not add the blog' ;

        }
    }


};

// delete blogs
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM blog WHERE id = $id");
    header('location:index.php');
};
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Blog panel</title>

    <link rel ="stylesheet" href="bstyle.css" type="text/css">
</head>
<body>

<?php
// display message
if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }
}



?>



<div class ="container">

    <div class="blog-contents">
        <!-- display form -->
        <form action ="<?php $_SERVER['PHP_SELF'] ?> "method ="post" enctype ="multipart/form-data">
        <h3> Add new Blog </h3>
        <input type="text" placeholder ="Enter blog ID like (b_)" name ="blog_id" class ="box">
        <input type="text" placeholder ="Enter blog title" name ="blog_title" class ="box">
        <input type="text" placeholder ="Enter blog content" name ="blog_content" class ="box">
        <input type="text" placeholder ="Enter blog date" name ="blog_date" class ="box">
        <input type="file" accept="image/png, image/jpeg, image/jpg" name ="blog_image" class ="box">
        <input type ="submit" class = "btn" name ="add_blog" value = "Add Blog" >
</form>
</div>
<?php
     
     $select = mysqli_query($conn,"SELECT * FROM blog");

?>

<div class ="blog-display">

              <table class ="blog-table">

              <thead>
                <tr>
                       <th> Blog ID </th>
                       <th> Blog Image </th>
                       <th> Blog Title </th>
                       <th> Blog Content </th>
                       <th> Blog Date </th>
                       <th> action </th>

                 </tr>
              </thead>

              <?php

              while($row = mysqli_fetch_assoc($select)){

              ?>
              
              <tr>
                     <!-- display input data from table -->
                       <td><?php echo $row['bid']; ?> </td>
                       <td><img src="uploaded_image/<?php echo $row['image']; ?>" height="150" width = "150" alt =""> </td>
                       <td><?php echo $row['title']; ?> </td>
                       <td><?php echo $row['content']; ?> </td>
                       <td><?php echo $row['date']; ?>  </td>
                       <td> 
                        <a href="update.php?edit=<?php echo $row['id']; ?>" class = "btn"> <i class="fas fa-edit"></i> edit</a>
                        <a href="index.php?delete=<?php echo $row['id']; ?>" class = "btn"> <i class="fas fa-trash"></i>delete</a>

                       </td>

                 </tr>

              <?php   }; ?>
                

</table>
</div>
              </div>

</body>
</html>