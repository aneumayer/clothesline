<header class="text-center">
    <h1><?= (strlen($page_title)) ? $page_title : "Home" ?></h1>
</header>
<?php if (count($categories)) : ?>
<form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
    <div class="col-md-6 mx-auto">
        <div class="form-group row">
            <label class="col-form-label col-md-4" for="category">Category:</label>
            <div class="col-md-4">
                <select name="category" class="form-control" required="true">
                    <?php
                        foreach($categories as $cat) {
                            if($cat instanceOf UserCategory) {
                                echo("<option value=\"{$cat->category_id}\">{$cat->name}</option>");
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <input type="submit" name="create" value="Create" />
            </div>
        </div>
    </div>
</form>
<?php else : ?>
    <div class="col-md-12 text-center">
        <p>You currently have no groups that you are placed in.</p>
    </div>
<?php endif; ?>
