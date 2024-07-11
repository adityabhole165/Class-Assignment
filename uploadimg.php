<?php   include('db.php'); ?>
<?php
    if ($_POST['submit']) {
        $file=$_FILES['image']['name'];
        $tempname=$_FILES['image']['tem-name'];
        $folder= 'Images/'.$file_name;

        $query=mysqli_query($conn,"Insert into images(files) values('$file_name')" );

        if(move_uploaded_file($tempname,$folder)) {
            echo "<script>alert('data added');</script>";
        
        }else{
            echo "<script>alert('data not  added');</script>";

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-compatible" content="IE=edge> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" />
        <br/><br/>
        <button type="submit" name="submit">Submit</button>
    </form>
    <div>
        <?php
        $res = mysqli_query($conn,"select * from images");
        while ($row = mysqli_fetch_assoc($res)){ 
        ?>
        <img src="Images/" <?php echo $row['file']?> />
        <?php }?>
    </div>
</body>
</html>
<!-- <?php
    // if ($_POST['submit']) {
    //     $file=$_FILES['image']['name'];
    //     $tempname=$_FILES['image']['tem-name'];
    //     $folder= 'Images/'.$file_name;

    //     $query=mysqli_query($conn,"Insert into images(files) values('$file_name')" );

    //     if(move_uploaded_file($tempname,$folder)) {
    //         echo "<script>alert('data added');</script>";
        
    //     }else{
    //         echo "<script>alert('data not  added');</script>";

    //     }
    // }
?> -->