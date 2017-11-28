<header class="text-center">
    <h1><?= $page_title ?></h1>
</header>
<?php if (count($categories)) : ?>
<div class="col-md-6 mx-auto">
    <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
    <div class="form-group row">
        <label class="col-form-label col-md-4" for="category">Category:</label>
        <div class="col-md-8">
            <select name="category" class="form-control" required="true" onchange="this.form.submit()">
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
    </div>
    </form>
</div>
<div class="col-md-8 mx-auto">
    <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
        <div id="ranked_box">
            <p><strong>Ranked Users</strong></p>
            <?php if (count($ranked_users)) : ?>
                <?php foreach($ranked_users as $user) { ?>
                    <div class="row border border-primary rounded rank-block">
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
                            <div class="rank-move-1 invisible">
                                <a href="#" class="rank-add"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                            </div>
                            <div class="rank-move-2 visible">
                                <a href="#" class="rank-up"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                                <a href="#" class="rank-down"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                                <a href="#" class="rank-remove"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <input type="hidden" name="ranking[<?= $user->id ?>]" value="<?= $user->position ?>">
                    </div>
                    <?php } ?>
            <?php endif; ?>
        </div>
        <div id="unranked_box">
            <p><strong>Unranked Users</strong></p>
            <?php if (count($unranked_users)) : ?>
                <?php foreach($unranked_users as $user) { ?>
                    <div class="row border border-primary rounded rank-block">
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
                             <div class="rank-move-1 visible">
                                <a href="#" class="rank-add"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                            </div>
                            <div class="rank-move-2 invisible">
                                <a href="#" class="rank-up"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                                <a href="#" class="rank-down"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <input type="hidden" name="ranking[<?= $user->id ?>]" value="">
                    </div>
                <?php } ?>
            <?php endif; ?>
        </div>
        <div class="text-right">
            <input type="hidden" name="category" value="<?= $_POST['category'] ?>">
            <input type="submit" name="save" value="Save" />
        </div>
    </form>
</div>
<?php else : ?>
    <div class="col-md-12 text-center">
        <p>There are currently no categories to choose from.</p>
    </div>
<?php endif; ?>
