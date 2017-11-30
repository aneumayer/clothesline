<header class="text-center">
    <h1><?= $page_title ?></h1>
</header>
<?php if (count($categories)) : ?>
    <div class="col-md-4 mx-auto">
        <div class="dropdown mx-auto">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Please Select a Category
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                    foreach($categories as $cat) {
                        if ($cat instanceOf Category) {
                            if ($cat->id == $_GET['category']) {
                                $active = 'active';
                                $category_icon = $cat->icon;
                                $category_name = $cat->name;
                            } else {
                                $active = '';
                            }
                            $url = './?action=' . $_GET['action'] . '&category=' . $cat->id;
                            echo("<a class=\"dropdown-item {$active}\" href=\"$url\"><i class=\"fa fa-{$cat->icon}\" aria-hidden=\"true\"></i> {$cat->name}</a>");
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-8 mx-auto">
        <?php if (isset($_GET['category'])) : ?>
            <div class="alert alert-info mt-4" role="alert">
                Showing results for the <i class="fa fa-<?= $category_icon ?>" aria-hidden="true"></i> <strong><?= $category_name ?></strong> category.
            </div>
        <?php endif; ?>
        <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
            <div id="ranked_box">
                <p><strong>Ranked Users</strong></p>
                <div class="form-group row border-primary row-header rounded">
                    <div class="col-md-2 my-auto">Name</div>
                    <div class="col-md-4 my-auto">Email</div>
                    <div class="col-md-4 my-auto">Address</div>
                    <div class="col-md-2 text-right my-auto"></div>
                </div>
                <?php if (count($ranked_users)) : ?>
                    <?php foreach($ranked_users as $user) { ?>
                        <div class="form-group row border-primary rounded rank-block" <?= ($user->notes) ? 'title="'.$user->notes.'"' : '' ?>>
                            <div class="col-md-2 my-auto">
                                <?= $user->first_name ?>
                            </div>
                            <div class="col-md-4 my-auto">
                                <?= $user->email ?>
                            </div>
                            <div class="col-md-4 my-auto">
                                <a href="https://www.google.com/maps/?q=<?= urlencode("$user->street, $user->city, $user->state $user->zip") ?>/" target="_blank">
                                    <?= $user->street ?><br><?= $user->city ?>, <?= $user->state ?><?= $user->zip ?>
                                </a>
                            </div>
                            <div class="col-md-2 text-right my-auto">
                                <div class="rank-move-1 d-none">
                                    <a href="#" class="rank-add"><i class="fa fa-plus-circle act-btn" aria-hidden="true"></i></a>
                                </div>
                                <div class="rank-move-2">
                                    <a href="#" class="rank-up"><i class="fa fa-arrow-circle-up act-btn" aria-hidden="true"></i></a>
                                    <a href="#" class="rank-down"><i class="fa fa-arrow-circle-down act-btn" aria-hidden="true"></i></a>
                                    <a href="#" class="rank-remove"><i class="fa fa-minus-circle act-btn" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <input type="hidden" class="rank-val" name="ranked[]" value="<?= $user->user_id ?>">
                        </div>
                        <?php } ?>
                <?php endif; ?>
            </div>
            <div id="unranked_box" class="mt-5">
                <p><strong>Unranked Users</strong></p>
                <div class="form-group row border-primary row-header rounded">
                    <div class="col-md-2 my-auto">Name</div>
                    <div class="col-md-4 my-auto">Email</div>
                    <div class="col-md-4 my-auto">Address</div>
                    <div class="col-md-2 text-right my-auto"></div>
                </div>
                <?php if (count($unranked_users)) : ?>
                    <?php foreach($unranked_users as $user) { ?>
                        <div class="form-group row border-primary rounded unrank-block" <?= ($user->notes) ? 'title="'.$user->notes.'"' : '' ?>>
                            <div class="col-md-2 my-auto">
                                <?= $user->first_name ?>
                            </div>
                            <div class="col-md-4 my-auto">
                                <?= $user->email ?>
                            </div>
                            <div class="col-md-4 my-auto">
                                <a href="https://www.google.com/maps/?q=<?= urlencode("$user->street, $user->city, $user->state $user->zip") ?>/" target="_blank">
                                    <?= $user->street ?><br><?= $user->city ?>, <?= $user->state ?><?= $user->zip ?>
                                </a>
                            </div>
                            <div class="col-md-2 text-right my-auto">
                                <div class="rank-move-1">
                                    <a href="#" class="rank-add"><i class="fa fa-plus-circle act-btn" aria-hidden="true"></i></a>
                                </div>
                                <div class="rank-move-2 d-none">
                                    <a href="#" class="rank-up"><i class="fa fa-arrow-circle-up act-btn" aria-hidden="true"></i></a>
                                    <a href="#" class="rank-down"><i class="fa fa-arrow-circle-down act-btn" aria-hidden="true"></i></a>
                                    <a href="#" class="rank-remove"><i class="fa fa-minus-circle act-btn" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <input type="hidden" class="rank-val" name="unranked[]" value="<?= $user->user_id ?>">
                        </div>
                    <?php } ?>
                <?php endif; ?>
            </div>
            <div class="mt-5 text-right">
                <input type="hidden" name="category" value="<?= $_GET['category'] ?>">
                <input type="submit" class="btn btn-success" name="save" value="Save" />
            </div>
        </form>
    </div>
<?php else : ?>
    <div class="col-md-12 text-center mt-5">
        <p>There are currently no categories to choose from.</p>
    </div>
<?php endif; ?>
