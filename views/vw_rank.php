<header class="text-center">
    <h1><?= $page_title ?></h1>
</header>
<?php if (count($categories)) : ?>
<div class="col-md-6 mx-auto">
    <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
    <div class="form-group row">
        <label class="col-form-label col-md-3" for="category">Category:</label>
        <div class="col-md-6">
            <select name="category" class="form-control" required="true">
                <option value="">Select a Catagory</option>
                <?php
                    foreach($categories as $cat) {
                        $selected = ($cat->id == $_POST['category']) ? "selected" : "";
                        if($cat instanceOf Category) {
                            echo("<option $selected value=\"{$cat->id}\">{$cat->name}</option>");
                        }
                    }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <input type="submit" name="select" value="Select" />
        </div>
    </div>
    </form>
</div>
<div class="col-md-8 mx-auto">
    <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
        <p class="h3">Ranked Users</p>
        <div id="ranked_box">
            <?php if (count($ranked_users)) : ?>
                <?php foreach($ranked_users as $user) { ?>
                    <div class="row border border-primary rounded">
                        <div class="col-md-2 my-atuo">
                            <?= $user->first_name ?>
                        </div>
                        <div class="col-md-4 my-auto">
                            <?= $user->email ?>
                        </div>
                        <div class="col-md-4 my-auto">
                            <?= $user->street ?><br><?= $user->city ?>, <?= $user->state ?><?= $user->zip ?>
                        </div>
                        <div class="col-md-2 text-right my-auto">
                            <a href="#"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <?php } ?>
            <?php endif; ?>
        </div>

        <p class="h3">Unranked Users</p>
        <div id="unranked_box">
            <?php if (count($unranked_users)) : ?>
                <?php foreach($unranked_users as $user) { ?>
                    <div class="row border border-primary rounded">
                        <div class="col-md-2 my-auto">
                            <?= $user->first_name ?>
                        </div>
                        <div class="col-md-4 my-auto">
                            <?= $user->email ?>
                        </div>
                        <div class="col-md-4 my-auto">
                            <?= $user->street ?><br><?= $user->city ?>, <?= $user->state ?><?= $user->zip ?>
                        </div>
                        <div class="col-md-2 text-right my-auto">
                            <a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        </div>
                    </div>
                <?php } ?>
            <?php endif; ?>
        </div>

        <div class="text-right">
            <input type="submit" name="save" value="Save" />
        </div>
    </form>
</div>
<?php else : ?>
    <div class="col-md-12 text-center">
        <p>There are currently no categories to choose from.</p>
    </div>
<?php endif; ?>
