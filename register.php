<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div class="header">
        <?php
        include('header.php');
        include('registerProcess.php');
        ?>
    </div>
    <main>
    <div class="container mx-auto border border-secondary-subtle rounded-1 p-0" style="width: 30%; margin-block: 60px;">
        <div class="ps-3 py-2 bg-secondary bg-opacity-10 border-bottom border-secondary-subtle">Register</div>
        <form class="px-3 my-3" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

        <div class="mb-3">
            <?php 
                if(!empty($error)) {
                    ?>
                        <p class="p-4 bg-danger text-light rounded-1">
                            <?php echo $error;?>
                        </p>
                    <?php
                }else if(!empty($success)){
                    ?>
                        <p class="p-4 bg-success text-light rounded-1">
                            <?php echo $success;
                            }?>
                        </p>
        </div>
        
            <div class="mb-3"><input type="text" class="form-control form-control-sm border border-secondary-subtle py-2" placeholder="Name" name="uname"></div>
            <div class="mb-3"><input type="text" class="form-control form-control-sm border border-secondary-subtle py-2" placeholder="Age" name="uage"></div>
            <div class="mb-3"><select class="form-select border border-secondary-subtle" name="gender">
                    <option selected disabled value="">Select Gender</option>
                    <option value="male" name="gender">Male</option>
                    <option value="female" name="gender">Female</option>
                </select>
            </div>
            <div class="mb-3"><input type="text" class="form-control form-control-sm border border-secondary-subtle py-2" placeholder="Mobile number" name="unumber"></div>
            <div class="mb-3"><input type="text" class="form-control form-control-sm border border-secondary-subtle py-2" placeholder="Email" name="uemail"></div>
            <div class="mb-3"><input type="password" class="form-control form-control-sm border border-secondary-subtle py-2" placeholder="Password" name="upass"></div>
            <div class="mb-3"><input type="password" class="form-control form-control-sm border border-secondary-subtle py-2" placeholder="Confirm Password" name="urepass"></div>
            <div class="mb-3"><input type="submit" value="Continue" class="btn btn-primary btn-sm rounded-1 text-light p-2"></div>
</form>
    </div>
    </main>
    <div class="footer">
        <?php
        include('footer.php');
        ?>
    </div>
</body>

</html>