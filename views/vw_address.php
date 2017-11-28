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
                            $selected = ($cat->id == $_POST['category']) ? "selected" : "";
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
