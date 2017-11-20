<center>
    <table id="login">
        <tr>
            <td id="new_account">
                <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
                    <table class="form">
                        <tr>
                            <td colspan="2" class="h_label">Create New Account</td>
                        </tr>
                        <tr>
                            <td class="label">First Name</td>
                            <td class="input"><input type="text" name="first_name" value="<?php echo($_POST['first_name']); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="label">Last Name</td>
                            <td class="input"><input type="text" name="last_name" value="<?php echo($_POST['last_name']); ?>"/></td>
                        </tr>
                        <tr>
                            <td class="label">Email Address</td>
                            <td class="input"><input type="text" name="email" value="<?php echo($_POST['email']); ?>"/></td>
                        </tr>
                        <tr>
                            <td class="label">Password</td>
                            <td class="input"><input type="password" name="password" /></td>
                        </tr>
                        <tr>
                            <td class="label">Confirm Password</td>
                            <td class="input"><input type="password" name="password2" /></td>
                        </tr>
                        <tr>
                            <td class="label">Street</td>
                            <td class="input"><input type="text" name="street" value="<?php echo($_POST['street']); ?>"/></td>
                        </tr>
                        <tr>
                            <td class="label">City</td>
                            <td class="input"><input type="text" name="city" value="<?php echo($_POST['city']); ?>"/></td>
                        </tr>
                        <tr>
                            <td class="label">State</td>
                            <td class="input">
                                <select name="state">
                                    <?php
                                        foreach($config["states"] as $abbrev => $state) {
                                            $selected = ($_POST['state'] == $abbrev) ? 'selected' : '';
                                            echo("<option value=\"{$abbrev}\" $selected>{$state}</option>");
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Zip</td>
                            <td class="input"><input type="text" name="zip" value="<?php echo($_POST['zip']); ?>"/></td>
                        </tr>
                        <tr>
                            <td class="label">Special Instructions</td>
                            <td class="input"><textarea name="instructions"><?php echo($_POST['instructions']); ?></textarea></td>
                        </tr>
                        <tr>
                            <td class="label">Categories</td>
                            <td class="input">
                                <?php
                                    foreach($categories as $category) {
                                        $checked = (in_array($category->id, $_POST['categories'])) ? 'checked' : '';
                                        echo("<input type=\"checkbox\" name=\"categories[]\" value=\"{$category->id}\" $checked>{$category->name} <br />");
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="submit"><input type="submit" name="create" value="Create" /></td>
                        </tr>
                    </table>
                </form>
            </td>
            <td id="login">
                <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
                    <table class="form">
                        <tr>
                            <td colspan="2" class="h_label">Existing Account</td>
                        </tr>
                        <tr>
                            <td class="label">Email Address</td>
                            <td class="input"><input type="text" name="email" /></td>
                        </tr>
                        <tr>
                            <td class="label">Password</td>
                            <td class="input"><input type="password" name="password" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="submit"><input type="submit" name="login" value="Login" /></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</center>
