<center>
    <table id="login">
        <tr>
            <td id="new_account">
                <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
                    <table class="form">
                        <tr>
                            <td colspan="2" class="h_label">Edit Account</td>
                        </tr>
                        <tr>
                            <td class="label">First Name</td>
                            <td class="input"><input type="text" name="first_name" value="<?= $user->first_name ?>" /></td>
                        </tr>
                        <tr>
                            <td class="label">Last Name</td>
                            <td class="input"><input type="text" name="last_name" value="<?= $user->last_name ?>" /></td>
                        </tr>
                        <tr>
                            <td class="label">Email Address</td>
                            <td class="input"><input type="text" name="email" value="<?= $user->email ?>" /></td>
                        </tr>
                        <tr>
                            <td class="label">Street</td>
                            <td class="input"><input type="text" name="street" value="<?= $user->street ?>" /></td>
                        </tr>
                        <tr>
                            <td class="label">City</td>
                            <td class="input"><input type="text" name="city" value="<?= $user->city ?>" /></td>
                        </tr>
                        <tr>
                            <td class="label">State</td>
                            <td class="input">
                                <select name="state">
                                    <?php
                                        foreach($config["states"] as $abbrev => $state) {
                                            $selected = ($abbrev == $user->state) ? "selected=\"seleted\"" : "";
                                            echo("<option value=\"{$abbrev}\" {$selected}>{$state}</option>");
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Zip</td>
                            <td class="input"><input type="text" name="zip" value="<?= $user->zip ?>" /></td>
                        </tr>
                        <tr>
                            <td class="label">Special Instructions</td>
                            <td class="input"><textarea name="instructions"><?= $user->instructions ?></textarea></td>
                        </tr>
                        <tr>
                            <td class="label">Categories</td>
                            <td class="input">
                                <?php
                                    $uc = [];
                                    foreach($user_categories as $user_cat) {
                                        $uc[] = $user_cat->category_id;
                                    }
                                    foreach($categories as $category) {
                                        $checked = in_array($category->id, $uc) ? "checked=\"checked\"" : "";
                                        echo("<input type=\"checkbox\" name=\"categories[]\" value=\"{$category->id}\" {$checked}>{$category->name} <br />");
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="submit"><input type="submit" name="update" value="Update" /></td>
                        </tr>
                    </table>
                </form>
            </td>
            <td id="reset_password">
                <form method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
                    <table class="form">
                        <tr>
                            <td colspan="2" class="h_label">Reset Password</td>
                            </tr>
                        <tr>
                            <td class="label">Old Password</td>
                            <td class="input"><input type="password" name="old_password" /></td>
                        </tr>
                        <tr>
                            <td class="label">New Password</td>
                            <td class="input"><input type="password" name="password" /></td>
                        </tr>
                        <tr>
                            <td class="label">Confirm New Password</td>
                            <td class="input"><input type="password" name="password2" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="submit"><input type="submit" name="reset" value="Reset" /></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</center>
