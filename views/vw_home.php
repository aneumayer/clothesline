<center>
    <table id="options">
        <tr>
            <td>
                <a href="./?action=register">Register New Load</a>
            </td>
            <td>
                <a href="./?action=check_in">Check in Load</a>
            </td>
            <td>
                <a href="./?action=account">Edit Account</a>
            </td>
        </tr>
        <?php if(isset($_SESSION['admin']) && $_SESSION["admin"] == 1) { ?>
        <tr>
            <td>
                <a href="./?action=track">Track Loads</a>
            </td>
            <td>
                <a href="./?action=details">Load Details</a>
            </td>
            <td>
                <a href="./?action=rank">Rank Accounts</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</center>