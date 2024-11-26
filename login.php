<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <div class="header">
        <?php
        include('header.php');
            if(isset($_SESSION, $_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){
                header('location: index.php');
                exit;
            }
        ?>
    </div>
    <main>
        <div class="container border border-secondary-subtle mx-auto rounded-1 p-0 text-tertiary" style="width: 30%; margin-block: 140px;">
            <div class="bg-secondary bg-opacity-10 ps-3 py-2 border-bottom border-secondary-subtle">Login</div>
            <div class="panel-body">
            <div class="p-3">
                <?php if(isset($_SESSION, $_SESSION['error']) && !empty($_SESSION['error'])) { ?>
               <p class="p-4 bg-danger text-light mb-0 rounded-1"><span class="fs-5">Alert!</span><br> 
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                }
                    ?>
                </p>

            </div>
                <div class="ps-3 pb-3">Sign in to start session</div>
                <div class="form-panel">
                    <form action="loginProcess.php" method="post">
                        <div class="mb-4 px-3">
                            <input class="form-control form-control-sm border border-secondary-subtle py-2" type="text" placeholder=" Email" name="uemail">
                        </div>
                        <div class="mb-4 px-3">
                            <input class="form-control form-control-sm border border-secondary-subtle py-2" type="password" placeholder=" Password" name="upass">
                        </div>
                        <div class="mb-4 px-3">
                            <input type="submit" class="btn btn-primary rounded-1 text-light" value="Login">
                        </div>
                        <div class="mb-4 px-3">New user?<a href="register.php"> Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <div class="footer">
        <?php
        include('footer.php');
        ?>
    </div>
</body>

</html>