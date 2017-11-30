<header class="text-center">
    <h1><?= $page_title ?></h1>
</header>
<div class="col-md-8 mx-auto">
    <?php if (count($users)) : ?>
        <?php foreach($users as $user) { ?>
            <div class="form-group row border-primary rounded" <?= ($user->notes) ? 'title="'.$user->notes.'"' : '' ?>>
                <div class="col-md-2 my-auto">
                    <?= $user->first_name ?>
                </div>
                <div class="col-md-4 my-auto">
                    <?= $user->email ?>
                </div>
                <div class="col-md-4 my-auto">
                    <a href="https://www.google.com/maps/?q=<?= urlencode("$user->street, $user->city, $user->state $user->zip") ?>/" target="_blank">
                        <?= $user->street ?><br><?= $user->city ?>, <?= $user->state ?> <?= $user->zip ?>
                    </a>
                </div>
                <div class="col-md-2 text-right my-auto">
                    <a href="./?action=account&user_id=<?= $user->id ?>"><i class="fa fa-pencil-square-o act-btn" aria-hidden="true"></i></a>
                </div>
            </div>
        <?php } ?>
    <?php endif; ?>
</div>
