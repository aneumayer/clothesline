<div class="col-md-12 text-center mb-4">
    <img src="img/logo.jpg" class="img-fluid col-md-7" alt="Responsive image">
</div>
<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 40px;">
    <li class="nav-item">
        <a class="nav-link active" href="#login" role="tab" data-toggle="tab">Log In</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#create" role="tab" data-toggle="tab">Sign Up</a>
    </li>
</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade-in active" id="login">
        <div class="col-md-6 mx-auto">
            <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                <div class="form-group row">
                    <label class="col-form-label col-md-5" for="login_email">Email Address:</label>
                    <div class="col-md-7">
                        <input type="email" class="form-control" id="login_email" name="email" placeholder="Enter email address" value="<?= $_POST['email'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 text-right">
                        <input type="submit" class="btn btn-primary" name="login" value="Log In" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="create">
        <div class="col-md-8  mx-auto">
            <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="first_name">First Name:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" required="true" value="<?= $_POST['first_name'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="email">Email Address:</label>
                    <div class="col-md-8">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required="true" value="<?= $_POST['email'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="subscription"><?= $config['app']['org'] ?> Newsletter Subscription:</label>
                    <div class="col-md-8">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="subscription" value="1" checked>
                                Yes, please add this email address.
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="subscription" value="0">
                                No thank you.
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="subscription" value="2">
                                I am already subscribed.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="street">Street Address:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="street" name="street" placeholder="Enter street address" required="true" value="<?= $_POST['street'] ?>">
                        <span class="form-text small text-muted">
                            Please do not use a P.O. box.
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="city">City:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required="true" value="<?= $_POST['city'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="state">State:</label>
                    <div class="col-md-8">
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
                    <label class="col-form-label col-md-4" for="zip">Zip Code:</label>
                    <div class="col-md-4">
                        <input type="zip" class="form-control" id="zip" name="zip" placeholder="Enter zip code" required="true" value="<?= $_POST['zip'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="instruction">Special Instructions for Bag Delivery:</label>
                    <div class="col-md-8">
                        <textarea name="instructions" class="form-control"><?= $_POST['instructions'] ?></textarea>
                        <span class="form-text small text-muted">
                            Examples: leave by side door, apartment in back, etc.
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4" for="categories">Categories:</label>
                    <div class="col-md-8 signup-categories">
                        <?php
                            foreach($categories as $category) {
                                $checked = '';
                                if (isset($_POST['categories'])) {
                                    if ((in_array($category->id, $_POST['categories']))) {
                                        $checked =  'checked';
                                    }
                                }
                                echo("<div class=\"form-check\"><label class=\"form-check-label\">");
                                echo("<input type=\"checkbox\" class=\"form-check-input\" name=\"categories[]\" value=\"{$category->id}\" $checked>");
                                echo("<i class=\"fa fa-{$category->icon}\" aria-hidden=\"true\"></i> {$category->name}");
                                echo("</label></div>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="form-check-label col-md-12" for="no-throw-agreement">
                        <input id="no-throw-agreement" type="checkbox" class="form-check-input" required="true">
                            I agree to deliver clothesline bags to the next address on the
                            list and will not sell, throw away, or donate the items delivered to me.
                    </label>
                </div>
                <div class="form-group row">
                    <label class="form-check-label col-md-12" for="address-listing-agreement">
                        <input id="address-listing-agreement" type="checkbox" class="form-check-input" required="true">
                            I acknowledge that my home address will be listed on a website available
                            to all participants in The Charlottesville Clothesline. My name and email
                            address will NOT be included for others to see.
                    </label>
                </div>
                <div class="form-group row">
                    <label class="form-check-label col-md-12" for="risk-agreement">
                        <input id="risk-agreement" type="checkbox" class="form-check-input" required="true">
                            I participate in The Charlottesville Clothesline community project at my own risk.
                            By joining, I agree to hold neither the list owners, moderators, nor anyone affiliated
                            with Connections, Inc. responsible or liable for any circumstance resulting from a
                            clothesline-related donation, delivery, or communication.
                    </label>
                </div>
                <div class="form-group row">
                    <label class="form-check-label col-md-12" for="email-agreement">
                        <input id="email-agreement" type="checkbox" class="form-check-input" required="true">
                            I will reply to periodic emails sent from the program administrators asking me to confirm
                            my registration details in order to remain in the program and will contact Connections, Inc.
                            with any location changes as necessary.
                    </label>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 text-right">
                        <input type="submit" class="btn btn-success" name="create" value="Sign Up" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
