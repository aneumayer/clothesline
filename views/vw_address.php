<header class="text-center">
    <h1><?= $page_title  ?></h1>
</header>
<?php if (count($categories)) : ?>
<form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
    <div class="col-md-6 mx-auto">
        <div class="form-group row">
            <label class="col-form-label col-md-4" for="category">Category:</label>
            <div class="col-md-8">
                <select name="category" class="form-control" required="true" onchange="this.form.submit()">
                    <option value="">Select a Catagory</option>
                    <?php
                        foreach($categories as $cat) {
                            if ($cat->id == $_POST['category']) {
                                $selected = 'selected';
                                $category_name = $cat->name;
                            } else {
                                $selected = '';
                            }
                            if($cat instanceOf UserCategory) {
                                echo("<option $selected value=\"{$cat->category_id}\">{$cat->name}</option>");
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>
</form>
<?php else : ?>
    <div class="col-md-12 text-center">
        <p>You currently have no groups that you are placed in.</p>
    </div>
<?php endif; ?>
<?php if ($only) : ?>
    <div class="col-md-12 text-center">
        <p>You are currently the only person in this group.</p>
    </div>
<?php elseif ($next_user instanceOf User) : ?>
    <div class="col-md-12 text-center mt-5">
        <p>The next address for <strong><?= $category_name ?></strong> is:</p>
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
