<form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
    <table class="form">
        <tr>
            <td class="label">First Name</td>
            <td class="input"><input type="text" name="first_name" value="<?php echo($account_data["first_name"]); ?>" /></td>
        </tr>
        <tr>
            <td class="label">Last Name</td>
            <td class="input"><input type="text" name="last_name" value="<?php echo($account_data["last_name"]); ?>" /></td>
        </tr>
        <tr>
            <td class="label">Email Address</td>
            <td class="input"><?php echo($account_data["email"]); ?></td>
        </tr>
        <tr>
            <td class="label">Password</td>
            <td class="input"><input type="password" name="password" value="<?php echo($account_data["password"]); ?>" /></td>
        </tr>
        <tr>
            <td class="label">Street</td>
            <td class="input"><input type="text" name="street" value="<?php echo($account_data["street"]); ?>" /></td>
        </tr>
        <tr>
            <td class="label">City</td>
            <td class="input"><input type="text" name="city" value="<?php echo($account_data["city"]); ?>" /></td>
        </tr>
        <tr>
            <td class="label">State</td>
            <td class="input">
                <select name="state">
                    <?php
                        foreach($config["states"] as $abbrev => $state) {
                            $selected = ($abbrev == $account_data["state"]) ? "selected=\"seleted\"" : "";
                            echo("<option value=\"{$abbrev}\" {$selected}>{$state}</option>");
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="label">Zip</td>
            <td class="input"><input type="text" name="zip" value="<?php echo($account_data["zip"]); ?>" /></td>
        </tr>
        <tr>
            <td class="label">Special Instructions</td>
            <td class="input"><textarea name="instructions"><?php echo($account_data["instructions"]); ?></textarea></td>
        </tr>
        <tr>
            <td class="label">Categories</td>
            <td class="input">
                <?php 
                    foreach($categories as $category) {
                        $checked = in_array($category['category_id'], $account_data["categories"]) ? "checked=\"checked\"" : "";
                        echo("<input type=\"checkbox\" name=\"categories[]\" value=\"{$category['category_id']}\" {$checked}>{$category['name']} <br />");
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="submit"><input type="submit" name="update" value="Update" /></td>
        </tr>
    </table>
</form>