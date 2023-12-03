<!DOCTYPE html>
<html>
    <head>
        <title> Blog 01</title>

        <!-- google font for poppins font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Poppins:wght@500&display=swap" rel="stylesheet">
        
        
        <link rel="stylesheet" href ="./style.css" type ="text/css">
        <script src="searchbar.js" type="text/javascript"> </script>            
           
    </head>
    
<body>
     
    <section class ="section1">
                                                     
    <div class="container">

    <div class="boxA">        
                                                 
            <h1> PLANING & START A BUSINESS </h1>
    </div>

                                                  
    <div class="boxB">
            <p>  A comprehensive resource for aspiring entrepreneurs who are ready to
                 take the leap into the worldof business ownership. we provide you with a simple,yet 
                 effective, step by step guide to planning and starting own successsful business. </p>
               
     </div><br>
             
     <div class="boxC">

     <div class="search">
        <!-- search bar -->
     <input type="text" name="" id="find" placeholder="search here..." onkeyup="search()">

     <div class ="chatbot">
    

    
                  
<br></div> </div> <br>
    <!--   blogs    -->   
     <div class="raw1">

        <?php
            //  database connection
            include_once('inc/conn.php');

            // Fetch the blog data from the database
            $select = mysqli_query($conn, "SELECT * FROM blog");

            // Loop through the fetched data and 
            while ($row = mysqli_fetch_assoc($select)) {
                $blogId = $row['bid'];
                $blogImage = $row['image'];
                $blogTitle = $row['title'];
                $blogContent = $row['content'];
                $blogDate = $row['date'];
       
                // display each blog by uploading blogs through blog panel
                echo '                  
                <div class="blogs">
                <a href = uploaded_image/' . $blogImage . ' target ="_self">
                <img src="uploaded_image/' . $blogImage . '" alt="" height="200px" width="300px"></a>
                <button>' . $blogTitle . '</button>
                <p>' . $blogContent . '</p>
                <h4><i> &nbsp; Published On : ' . $blogDate . '</i></h4>
                </div>';

            } ?>       </div>
            
        </section>  
                                  
        
        <section class ="section2">      
            <br>
            <div class ="chatbot">
            <img src="./images/chatbotg.gif" id="ch2" alt="small pic" width="150px" height="150">  </div>                     
            
            <div class ="chatbot">       
            <p><input type="text"class="hello" name="hello" id = "hell" placeholder="Hello there !. How can I help you ... "> </p> </div>          
            
            
            
            <div class ="chatbot">
            <img src="./images/blog3.gif" id ="ch" alt="small pic" width="150px" height="120"> </div>

        </section>        
            
 </body>
 </html>