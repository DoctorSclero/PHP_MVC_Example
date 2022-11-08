<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Exercise - Show Users</title>
    <style>
        body {
            margin: 3em;
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            border-collapse: collapse;
        }
        td, th {
            padding: 1em;
            border: 1px solid black;
        }
        th {
            background-color: #ded478;
        }
    </style>
</head>

<body>
    <h1>Show Users</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>DATA DI NASCITA</th>
            <th>PROVINCIA</th>
            <th>PATENTE</th>
            <th>HOBBY</th>
        </tr>
        <?php
        require_once("../models/user.php");
        $users = User::getList();
        foreach ($users as $user) {
            echo "<tr>\n";
            echo "<td>" . $user->getId() . "</td>\n";
            echo "<td>" . $user->getNome() . "</td>\n";
            echo "<td>" . $user->getNascita()->format("Y/m/d") . "</td>\n";
            echo "<td>" . $user->getProvincia() . "</td>\n";
            echo "<td>" . $user->getPatente() . "</td>\n";
            echo "<td>" . $user->getHobby() . "</td>\n";
            echo "<td><a href='/controller/user_delete_performer.php?user_id=" . $user->getId() . "'>ELIMINA</a>\n";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>