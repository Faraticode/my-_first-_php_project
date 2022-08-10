<?php
include 'inc/header.php';
?>
<?php 
$name = $email = $body ='';
$nameErr = $emailErr = $bodyErr ='';

//Form Submit
if(isset($_POST['submit'])){
//Validate name
if(empty($_POST['name'])){
    $nameErr = 'Name is required';
}
else{
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

//Validate EMAIL
if(empty($_POST['email'])){
    $emailErr = 'Email is required';
}
else{
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
}

//Validate BODY
if(empty($_POST['body'])){
    $bodyErr = 'FeedBack is required';
}
else{
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
if(empty($nameErr) && empty($emailErr) && empty($bodyErr))
{
    //Add to Database
    $sql = "INSERT INTO feedback (name,email,body) VALUES('$name' , '$email' , '$body')";
    if(mysqli_query($conn,$sql)){
        //Success
        header('Location: feedback.php');
    }
    else{
        //Error
        echo 'Error :'.mysqli_error($conn);
    }
}
}
 
?>
            <img src=" " class="w-25 mb-3" alt="">
            <h2>

        FeedBack
            </h2>
            <p class="lead text-center"><p>Leave feedBack for FaratiCodes</p>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control <?php echo $nameErr ?'is-invalid' : null;?> " id="name" name="name" placeholder="Enter your name">
                    <div class="invalid-feedback">
                        <?php echo $nameErr; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control <?php echo $emailErr ?'is-invalid' : null;?> " id="email" name="email" placeholder="Enter your email">
<div class="invalid-feedback">
    <?php echo $emailErr ; ?>
</div>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">FeedBack</label>
                   <textarea class="form-control <?php echo $bodyErr ?'is-invalid' : null;?> " id="body" name="body" placeholder="Enter your FeedBack"></textarea>
               
                <div class="invalid-feedback">
    <?php echo $bodyErr ; ?>
</div>
</div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-dark w-100" name="submit" placeholder="Enter your name" value="Send">
                    <?php
include 'inc/footer.php' ;?>
