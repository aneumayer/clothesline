<center>
<table id="login">
    <tr>
        <td class="split_form">
            <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
                <div class="form-group">
                    <label class="control-label col-md-5" for="first_name">First Name:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" required="true" value="<?= $user->first_name ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5" for="email">Email Address:</label>
                    <div class="col-md-7">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required="true" value="<?= $user->email ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5" for="street">Street Address:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="street" name="street" placeholder="Enter street address" required="true" value="<?= $user->street ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5" for="city">City:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required="true" value="<?= $user->city ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5" for="state">State:</label>
                    <div class="col-md-7">
                        <select name="state" class="form-control" required="true">
                            <?php
                                foreach($config["states"] as $abbrev => $state) {
                                    $selected = ($user->state == $abbrev) ? 'selected' : '';
                                    echo("<option value=\"{$abbrev}\" $selected>{$state}</option>");
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5" for="zip">Zip Code:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter zip code" required="true" value="<?= $user->zip ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5" for="instruction">Special Instructions:</label>
                    <div class="col-md-7">
                        <textarea name="instructions" class="form-control"><?= $user->instructions ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5" for="categories">Categories:</label>
                    <div class="col-md-7">
                        <?php
                            $uc = [];
                            foreach($user_categories as $user_cat) {
                                $uc[] = $user_cat->category_id;
                            }
                            foreach($categories as $category) {
                                $checked = in_array($category->id, $uc) ? "checked=\"checked\"" : "";
                                echo("<div class=\"form-check\"><label class=\"form-check-label\">");
                                echo("<input type=\"checkbox\" class=\"form-check-input\" name=\"categories[]\" value=\"{$category->id}\" $checked>{$category->name}");
                                echo("</label></div>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 text-right">
                        <input type="submit" name="update" value="Update" />
                    </div>
                </div>
            </form>
        </td>
        <td class="split_form">
            <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
                <div class="form-group">
                    <label class="control-label col-md-5" for="login_old_password">Old Password:</label>
                    <div class="col-md-7">
                        <input type="password" class="form-control" id="login_old_password" name="old_password" placeholder="Enter old password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5" for="login_password">New Password:</label>
                    <div class="col-md-7">
                        <input type="password" class="form-control" id="login_passsword" name="password" placeholder="Enter password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5" for="login_password2">Confirm Password:</label>
                    <div class="col-md-7">
                        <input type="password" class="form-control" id="login_passsword2" name="password2" placeholder="Enter password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 text-right">
                    <input type="submit" name="reset" value="Reset" />
                    </div>
                </div>
            </form>
        </td>
    </tr>
</table>
</center>
