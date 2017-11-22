<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 40px;">
    <li class="nav-item">
        <a class="nav-link active" href="#edit" role="tab" data-toggle="tab">Edit Account</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#reset" role="tab" data-toggle="tab">Reset Password</a>
    </li>
</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade-in active" id="edit">
        <div class="col-md-8 mx-auto">
            <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="first_name">First Name:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" required="true" value="<?= $user->first_name ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="email">Email Address:</label>
                    <div class="col-md-8">
                        <input type="email" class="form-control" id="email" name="email" readonly value="<?= $user->email ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="street">Street Address:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="street" name="street" readonly value="<?= $user->street ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="city">City:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="city" name="city" readonly value="<?= $user->city ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="state">State:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="state" name="state" readonly value="<?= $config["states"][$user->state] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="zip">Zip Code:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="zip" name="zip" readonly value="<?= $user->zip ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="instruction">Special Instructions:</label>
                    <div class="col-md-8">
                        <textarea name="instructions" class="form-control"><?= $user->instructions ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="categories">Categories:</label>
                    <div class="col-md-8">
                        <?php
                            $uc = [];
                            foreach($user_categories as $user_cat) {
                                $uc[] = $user_cat->category_id;
                            }
                            foreach($categories as $category) {
                                $checked = in_array($category->id, $uc) ? "checked=\"checked\"" : "";
                                echo("<div class=\"form-check\"><label class=\"form-check-label\">");
                                echo("<input type=\"checkbox\" class=\"form-check-input\" name=\"categories[]\" value=\"{$category->id}\" $checked> {$category->name}");
                                echo("</label></div>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 text-right">
                        <input type="submit" class="float-md-right" name="update" value="Update" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="reset">
        <div class="col-md-6 mx-auto">
                <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
                    <div class="form-group row">
                        <label class="col-form-label col-md-5" for="login_old_password">Old Password:</label>
                        <div class="col-md-7">
                            <input type="password" class="form-control" id="login_old_password" name="old_password" placeholder="Enter old password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-5" for="login_password">New Password:</label>
                        <div class="col-md-7">
                            <input type="password" class="form-control" id="login_passsword" name="password" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-5" for="login_password2">Confirm Password:</label>
                        <div class="col-md-7">
                            <input type="password" class="form-control" id="login_passsword2" name="password2" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 text-right">
                        <input type="submit" name="reset" value="Reset" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
