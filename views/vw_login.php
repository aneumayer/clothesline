<div class="row">
    <div class="col-6">
        <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
            <div class="form-group row">
                <label class="col-form-label col-5" for="first_name">First Name:</label>
                <div class="col-7">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" required="true" value="<?php echo($_POST['first_name']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-5" for="email">Email Address:</label>
                <div class="col-7">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required="true" value="<?php echo($_POST['email']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-5" for="password">Password:</label>
                <div class="col-7">
                    <input type="password" class="form-control" id="password" name="password" required="true" placeholder="Enter password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-5" for="password2">Confirm Password:</label>
                <div class="col-7">
                    <input type="password" class="form-control" id="password2" name="password2" required="true" placeholder="Enter password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-5" for="street">Street Address:</label>
                <div class="col-7">
                    <input type="text" class="form-control" id="street" name="street" placeholder="Enter street address" required="true" value="<?php echo($_POST['street']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-5" for="city">City:</label>
                <div class="col-7">
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required="true" value="<?php echo($_POST['city']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-5" for="state">State:</label>
                <div class="col-7">
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
            <div class="form-group row">
                <label class="col-form-label col-5" for="zip">Zip Code:</label>
                <div class="col-7">
                    <input type="zip" class="form-control" id="zip" name="zip" placeholder="Enter zip code" required="true" value="<?php echo($_POST['zip']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-5" for="instruction">Special Instructions:</label>
                <div class="col-7">
                    <textarea name="instructions" class="form-control"><?php echo($_POST['instructions']); ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-5" for="categories">Categories:</label>
                <div class="col-7">
                    <?php
                        foreach($categories as $category) {
                            $checked = '';
                            if (isset($_POST['categories'])) {
                                if ((in_array($category->id, $_POST['categories']))) {
                                    $checked =  'checked';
                                }
                            }
                            echo("<div class=\"form-check\"><label class=\"form-check-label\">");
                            echo("<input type=\"checkbox\" class=\"form-check-input\" name=\"categories[]\" value=\"{$category->id}\" $checked> {$category->name}");
                            echo("</label></div>");
                        }
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="form-check-label col-12" for="no-throw-agreement">
                    <input id="no-throw-agreement" type="checkbox" class="form-check-input" required="true">
                        I agree to deliver clothesline bags to the next address on the
                        list and will not sell, throw away, or donate the items delivered to me.
                </label>
            </div>
            <div class="form-group row">
                <label class="form-check-label col-12" for="address-listing-agreement">
                    <input id="address-listing-agreement" type="checkbox" class="form-check-input" required="true">
                        I acknowledge that my home address will be listed in a document available
                        to all participants in The Charlottesville Clothesline. My name and email
                        address will NOT be included in this document.
                </label>
            </div>
            <div class="form-group row">
                <label class="form-check-label col-12" for="risk-agreement">
                    <input id="risk-agreement" type="checkbox" class="form-check-input" required="true">
                        I participate in The Charlottesville Clothesline community project at my own risk.
                        By joining, I agree to hold neither the list owners, moderators, nor anyone affiliated
                        with Connections, Inc. responsible or liable for any circumstance resulting from a
                        clothesline-related donation, delivery, or communication.
                </label>
            </div>
            <div class="form-group row">
                <label class="form-check-label col-12" for="email-agreement">
                    <input id="email-agreement" type="checkbox" class="form-check-input" required="true">
                        I will reply to periodic emails sent from the program administrators asking me to confirm
                        my registration details in order to remain in the program and will contact Connections, Inc.
                        with any location changes as necessary.
                </label>
            </div>
            <div class="form-group row">
                <div class="col-12 text-right">
                    <input type="submit" name="create" value="Create" />
                </div>
            </div>
        </form>
    </div>
    <div class="col-6">
        <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
            <div class="form-group row">
                <label class="col-form-label col-5" for="login_email">Email Address:</label>
                <div class="col-7">
                    <input type="text" class="form-control" id="login_email" name="email" placeholder="Enter email address">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-5" for="login_password">Password:</label>
                <div class="col-7">
                    <input type="password" class="form-control" id="login_passsword" name="password" placeholder="Enter password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-right">
                    <input type="submit" name="login" value="Login" />
                </div>
            </div>
        </form>
    </div>
</div>
