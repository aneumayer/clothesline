<form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
    <div class="form-group row">
        <label class="col-form-label col-3 text-right" for="category">Category:</label>
        <div class="col-6">
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
        <div class="col-3">
            <input type="submit" name="create" value="Create" />
        </div>
    </div>
</form>
