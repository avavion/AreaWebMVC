<?php

use App\Services\Page;

?>

<!DOCTYPE html>
<html lang="en">

<?php Page::part('head'); ?>

<body>
    <section class="section">
        <div class="container">
            <h1>Register</h1>

            <form action="auth/register" method="POST" class="mt-4" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input name="username" type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                    </div>
                </div>

                <div class="form-group mt-2">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="form-group mt-2">
                    <label for="exampleInputPassword1">Repeat Password</label>
                    <input name="re_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="form-group mt-2">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="photo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </section>
</body>

</html>