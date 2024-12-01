<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Debt</title>
</head>
<body>
    <h1>Edit Debt</h1>
    <p>
        <?php  
            if (isset($_SESSION["edit_debt"]) && isset($_SESSION["edit_debt"]['success'])) 
            echo $_SESSION["edit_debt"]['success'];
        ?>
    </p>
    <form method="post">
        <input type="hidden" name="id" value="<?= $debt["id"] ?>">
        <p><label for="amount">Amount</label>
            <input type="text" name="amount" id="amount" value="<?= $_SESSION["edit_debt"]["debt"]["amount"] ?>">
        </p>
        <p>
            <?php  
                if (isset($_SESSION["edit_debt"]) && isset($_SESSION["edit_debt"]['amount_error'])) 
                echo $_SESSION["edit_debt"]['amount_error'];
            ?>
        </p>
        <p><label for="reason">Reason</label>
            <input type="text" name="reason" id="reason" value="<?= $debt["reason"] ?>">
        </p>
        <p><label for="status">Status</label>
            <input type="text" name="status" id="status" value="<?= $debt["status"] ?>">
        </p>
        <input type="submit" value=Update>
    </form>
    <a href="index">Back</a>
</body>
</html>