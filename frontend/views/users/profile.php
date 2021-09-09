<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 9/9/2021
 * Time: 1:16 AM
 */
?>

<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10"><h1>User name</h1></div>
    </div>
    <form class="row" action="" method="post" enctype="multipart/form-data">
        <div class="col-sm-3"><!--left col-->


            <div class="text-center">
                <img src="../backend/assets/uploads/<?php echo $_SESSION['user']['avatar'] ?>"
                     class="avatar img-circle img-thumbnail" alt="avatar"
                     style="border-radius: 50%"
                >
                <h6>Upload a different photo...</h6>
                <input name="avatar" type="file" class="text-center center-block file-upload">
            </div></hr><br>
        </div><!--/col-3-->
        <div class="col-sm-9">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <div class="form"  id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>First name</h4></label>
                                <input type="text" class="form-control" name="first_name"  value="<?php echo $_SESSION['user']['first_name'] ?>"
                                       id="first_name" placeholder="first name" title="enter your first name if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name"><h4>Last name</h4></label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION['user']['last_name'] ?>"
                                       name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone"><h4>Phone</h4></label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION['user']['phone'] ?>"
                                       name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="address"><h4>Address</h4></label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION['user']['address'] ?>"
                                       name="address" id="address" placeholder="enter Address" title="enter your mobile number if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <input type="email" class="form-control" value="<?php echo $_SESSION['user']['email'] ?>"
                                       name="email" id="email" placeholder="you@email.com" title="enter your email.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="link_facebook"><h4>Link facebook</h4></label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION['user']['facebook'] ?>"
                                       name="facebook" id="link_facebook" placeholder="enter a link facebook" title="enter a link facebook">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit" name="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <!--                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                        </div>
                    </div>

                    <hr>

                </div><!--/tab-pane-->
            </div><!--/tab-pane-->
        </div><!--/tab-content-->

    </form><!--/col-9-->
</div><!--/row-->

