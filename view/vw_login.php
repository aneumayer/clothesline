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
                            <td class="input"><input type="text" name="first_name" /></td>
                        </tr>
                        <tr>
                            <td class="label">Last Name</td>
                            <td class="input"><input type="text" name="last_name" /></td>
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
                            <td class="label">Street</td>
                            <td class="input"><input type="text" name="street" /></td>
                        </tr>
                        <tr>
                            <td class="label">City</td>
                            <td class="input"><input type="text" name="city" /></td>
                        </tr>
                        <tr>
                            <td class="label">State</td>
                            <td class="input">
                                <select name="state">
                                    <?php
                                        foreach($config["states"] as $abbrev => $state) {
                                            echo("<option value=\"{$abbrev}\">{$state}</option>");
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Zip</td>
                            <td class="input"><input type="text" name="zip" /></td>
                        </tr>
                        <tr>
                            <td class="label">Special Instructions</td>
                            <td class="input"><textarea name="instructions"></textarea></td>
                        </tr>
                        <tr>
                            <td class="label">Categories</td>
                            <td class="input">
                                <?php 
                                    foreach($categories as $category) {
                                        echo("<input type=\"checkbox\" name=\"categories[]\" value=\"{$category['category_id']}\">{$category['name']} <br />");
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