<center>
    <table id="login">
        <tr>
            <td class="split_form">
                <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
                    <div class="form-group">
                        <label class="control-label col-md-5" for="first_name">First Name:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" required="true" value="<?php echo($_POST['first_name']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="last_name">Last Name:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" value="<?php echo($_POST['last_name']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="email">Email Address:</label>
                        <div class="col-md-7">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required="true" value="<?php echo($_POST['email']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="password">Password:</label>
                        <div class="col-md-7">
                            <input type="password" class="form-control" id="password" name="password" required="true" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="password2">Confirm Password:</label>
                        <div class="col-md-7">
                            <input type="password" class="form-control" id="password2" name="password2" required="true" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="street">Street Address:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="street" name="street" placeholder="Enter street address" required="true" value="<?php echo($_POST['street']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="city">City:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required="true" value="<?php echo($_POST['city']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="state">State:</label>
                        <div class="col-md-7">
                            <select name="state" class="form-control" required="true">
                                <?php
                                    foreach($config["states"] as $abbrev => $state) {
                                        $selected = ($_POST['state'] == $abbrev) ? 'selected' : '';
                                        echo("<option value=\"{$abbrev}\" $selected>{$state}</option>");
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="zip">Zip Code:</label>
                        <div class="col-md-7">
                            <input type="zip" class="form-control" id="zip" name="zip" placeholder="Enter zip code" required="true" value="<?php echo($_POST['zip']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="instruction">Special Instrcutions:</label>
                        <div class="col-md-7">
                            <textarea name="instructions" class="form-control"><?php echo($_POST['instructions']); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="categories">Categories:</label>
                        <div class="col-md-7">
                            <?php
                                foreach($categories as $category) {
                                    $checked = (in_array($category->id, $_POST['categories'])) ? 'checked' : '';
                                    echo("<div class=\"form-check\"><label class=\"form-check-label\">");
                                    echo("<input type=\"checkbox\" class=\"form-check-input\" name=\"categories[]\" value=\"{$category->id}\" $checked>{$category->name}");
                                    echo("</label></div>");
                                }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <input type="submit" name="create" value="Create" />
                        </div>
                    </div>
                </form>
            </td>
            <td class="split_form">
                <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
                    <div class="form-group">
                        <label class="control-label col-md-5" for="login_email">Email Address:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="login_email" name="email" placeholder="Enter email address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="login_password">Password:</label>
                        <div class="col-md-7">
                            <input type="password" class="form-control" id="login_passsword" name="password" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                        <input type="submit" name="login" value="Login" />
                        </div>
                    </div>
                </form>
            </td>
        </tr>
    </table>
</center>
