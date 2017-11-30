<header class="text-center">
    <h1><?= $page_title ?></h1>
</header>
<div class="col-md-8 mx-auto">
    <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
        <div class="form-group row">
            <label class="col-form-label col-md-4" for="first_name">First Name:</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="first_name" name="first_name" readonly value="<?= $user->first_name ?>">
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
                <textarea name="instructions" readonly class="form-control"><?= $user->instructions ?></textarea>
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
                        echo("<input type=\"checkbox\" class=\"form-check-input\" disabled name=\"categories[]\" value=\"{$category->id}\" $checked>");
                        echo("<i class=\"fa fa-{$category->icon}\" aria-hidden=\"true\"></i> {$category->name}");
                        echo("</label></div>");
                    }
                ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="alert alert-info text-center" role="alert">
                If you need to make changes to your account please send an email to
                <a href="mailto:<?= $config['email']['from'] ?>?Subject=<?= $config['app']['title'] ?>%20Account%20Update" target="_blank"><?= $config['email']['from'] ?></a>.
            </div>
        </div>
    </form>
</div>
