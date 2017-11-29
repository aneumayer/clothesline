<header class="text-center">
    <h1><?= $page_title ?></h1>
</header>
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
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="<?= $user->email ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-md-4" for="street">Street Address:</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="street" name="street" placeholder="Enter password" value="<?= $user->street ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-md-4" for="city">City:</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" value="<?= $user->city ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-md-4" for="state">State:</label>
            <div class="col-md-8">
                <select name="state" class="form-control" required="true">
                    <?php
                    echo($user->state);
                        foreach($config["states"] as $abbrev => $state) {
                            $selected = ($user->state == $abbrev) ? 'selected' : '';
                            echo("<option value=\"{$abbrev}\" $selected>{$state}</option>");
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-md-4" for="zip">Zip Code:</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter zip code" value="<?= $user->zip ?>">
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
                <input type="submit" class="btn btn-danger" id="delete_btn" name="delete" value="Delete" />
                <input type="submit" class="btn btn-success" name="update" value="Save" />
            </div>
        </div>
    </form>
</div>
