    <table id="login">
        <tr>
            <td id="new_account">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table class="form">
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
                            <td class="label">Street</td>
                            <td class="input"><input type="text" name="stree" /></td>
                        </tr>
                        <tr>
                            <td class="label">City</td>
                            <td class="input"><input type="text" name="city" /></td>
                        </tr>
                        <tr>
                            <td class="label">State</td>
                            <td class="input">
                                <select name="state">
                                	<option value="AL">Alabama</option>
                                	<option value="AK">Alaska</option>
                                	<option value="AZ">Arizona</option>
                                	<option value="AR">Arkansas</option>
                                	<option value="CA">California</option>
                                	<option value="CO">Colorado</option>
                                	<option value="CT">Connecticut</option>
                                	<option value="DE">Delaware</option>
                                	<option value="DC">District of Columbia</option>
                                	<option value="FL">Florida</option>
                                	<option value="GA">Georgia</option>
                                	<option value="HI">Hawaii</option>
                                	<option value="ID">Idaho</option>
                                	<option value="IL">Illinois</option>
                                	<option value="IN">Indiana</option>
                                	<option value="IA">Iowa</option>
                                	<option value="KS">Kansas</option>
                                	<option value="KY">Kentucky</option>
                                	<option value="LA">Louisiana</option>
                                	<option value="ME">Maine</option>
                                	<option value="MD">Maryland</option>
                                	<option value="MA">Massachusetts</option>
                                	<option value="MI">Michigan</option>
                                	<option value="MN">Minnesota</option>
                                	<option value="MS">Mississippi</option>
                                	<option value="MO">Missouri</option>
                                	<option value="MT">Montana</option>
                                	<option value="NE">Nebraska</option>
                                	<option value="NV">Nevada</option>
                                	<option value="NH">New Hampshire</option>
                                	<option value="NJ">New Jersey</option>
                                	<option value="NM">New Mexico</option>
                                	<option value="NY">New York</option>
                                	<option value="NC">North Carolina</option>
                                	<option value="ND">North Dakota</option>
                                	<option value="OH">Ohio</option>
                                	<option value="OK">Oklahoma</option>
                                	<option value="OR">Oregon</option>
                                	<option value="PA">Pennsylvania</option>
                                	<option value="RI">Rhode Island</option>
                                	<option value="SC">South Carolina</option>
                                	<option value="SD">South Dakota</option>
                                	<option value="TN">Tennessee</option>
                                	<option value="TX">Texas</option>
                                	<option value="UT">Utah</option>
                                	<option value="VT">Vermont</option>
                                	<option value="VA">Virginia</option>
                                	<option value="WA">Washington</option>
                                	<option value="WV">West Virginia</option>
                                	<option value="WI">Wisconsin</option>
                                	<option value="WY">Wyoming</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Zip</td>
                            <td class="input"><input type="text" name="zip" /></td>
                        </tr>
                        <tr>
                            <td class="label">Password</td>
                            <td class="input"><input type="password" name="password" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="submit"><input type="submit" name="submit" value="Create" /></td>
                        </tr>
                    </table>
                </form>
            </td>
            <td id="login">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table class="form">
                        <tr>
                            <td class="label">Email Address</td>
                            <td class="input"><input type="text" name="email" /></td>
                        </tr>
                        <tr>
                            <td class="label">Password</td>
                            <td class="input"><input type="password" name="password" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="submit"><input type="submit" name="submit" value="Login" /></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
    
</form>