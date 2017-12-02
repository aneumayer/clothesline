<header class="text-center">
    <h1><i class="fa fa-map-signs" aria-hidden="true"></i> Delivery Address</h1>
</header>
<?php if (count($categories)) : ?>
    <div class="row col-md-4 mx-auto">
        <div class="dropdown mx-auto">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Please Select a Category
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                    foreach($categories as $cat) {
                        if($cat instanceOf UserCategory) {
                            if ($cat->id == $_GET['category']) {
                                $active = 'active';
                                $category_icon = $cat->icon;
                                $category_name = $cat->name;
                            } else {
                                $active = '';
                            }
                            $url = './?action=' . $_GET['action'] . '&category=' . $cat->category_id;
                            echo("<a class=\"dropdown-item {$active}\" href=\"$url\"><i class=\"fa fa-{$cat->icon}\" aria-hidden=\"true\"></i> {$cat->name}</a>");
                        }
                    }
                ?>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="col-md-12 text-center mt-5">
        <p>You currently have no groups that you are placed in.</p>
    </div>
<?php endif; ?>

<?php if ($only) : ?>
    <div class="col-md-12 text-center mt-5">
        <p>You are currently the only person in <i class="fa fa-<?= $category_icon ?>" aria-hidden="true"></i> <strong><?= $category_name ?></strong>.</p>
    </div>
<?php elseif ($next_user instanceOf User) : ?>
    <div class="col-md-12 text-center mt-5">
        <p>The next address for <i class="fa fa-<?= $category_icon ?>" aria-hidden="true"></i> <strong><?= $category_name ?></strong> is:</p>
        <p>
            <a href="https://www.google.com/maps/?q=<?= urlencode("$next_user->street, $next_user->city, $next_user->state $next_user->zip") ?>/" target="_blank">
                <?= $next_user->street ?><br><?= $next_user->city ?>, <?= $next_user->state ?> <?= $next_user->zip ?>
            </a>
        </p>
        <?php if ($next_user->instructions) : ?>
            <p><strong>Special Instructions:</strong></p>
            <p><?= $next_user->instructions ?></p>
        <?php endif; ?>
    </div>
<?php endif; ?>
