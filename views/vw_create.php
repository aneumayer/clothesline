<form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
    <div class="form-group row">
        <label class="col-form-label col-md-2" for="category">Category:</label>
        <div class="col-md-3">
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
        <div class="col-md-2">
            <input type="submit" name="create" value="Create" />
        </div>
    </div>
</form>
