<!DOCTYPE html>
<html>
    <body>
        <div>
            <h3>
                Someone has submitted a request to book an event!
            </h3>
            <ul>
                <li style="margin-bottom: 10px;">
                    <strong>Name: </strong><?= isset($name) ? $name : 'No name given' ?>
                </li>
                <li style="margin-bottom: 10px;">
                    <strong>Email: </strong><?= isset($email) ? $email : 'No email given' ?>
                </li>
                <li style="margin-bottom: 10px;">
                    <strong>Phone: </strong><?= isset($phone) ? $phone : 'No phone number given' ?>
                </li>
                <li style="margin-bottom: 10px;">
                    <strong>Details: </strong><?= isset($details) ? $details : 'No details given' ?>
                </li>
            </ul>
        </div>
    </body>
</html>