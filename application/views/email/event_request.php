<!DOCTYPE html>
<html>
    <body>
        <div>
            <h3>
                Someone has submitted a request to book an event!
            </h3>
            <ul>
                <li>
                    <strong>Name: </strong><?= isset($name) ? $name : 'No name given' ?>
                    <br>
                </li>
                <li>
                    <strong>Email: </strong><?= isset($email) ? $email : 'No email given' ?>
                    <br>
                </li>
                <li>
                    <strong>Phone: </strong><?= isset($phone) ? $phone : 'No phone number given' ?>
                    <br>
                </li>
                <li>
                    <strong>Details: </strong><?= isset($details) ? $details : 'No details given' ?>
                    <br>
                </li>
            </ul>
        </div>
    </body>
</html>