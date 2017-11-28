<header class="text-center">
    <h1><?= $page_title ?></h1>
</header>
<div class="col-md-8 mx-auto">
    <?php if (count($users)) : ?>
        <?php foreach($users as $user) { ?>
            <div class="row border border-primary rounded">
                <div class="col-md-2 my-atuo">
                    <?= $user->first_name ?>
                </div>
                <div class="col-md-4 my-auto">
                    <?= $user->email ?>
                </div>
                <div class="col-md-4 my-auto">
                    <?php if ($user->street) : ?>
                        <?= $user->street ?><br><?= $user->city ?>, <?= $user->state ?><?= $user->zip ?>
                    <?php else : ?>
                        <br><br>
                    <?php endif; ?>
                </div>
                <div class="col-md-2 text-right my-auto">
                    <a href="./?action=account&user_id=<?= $user->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </div>
            </div>
        <?php } ?>
    <?php endif; ?>
</div>
