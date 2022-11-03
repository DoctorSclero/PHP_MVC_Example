<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Exercise - Insert User</title>
</head>

<body>
    <h1>MVC Exercise - Insert User</h1>
    <form action="../controllers/user_insert_performer.php" method="post">
        <label for="nome"> Nome </label> <br/>
        <input type="text" name="nome" id="nome"> <br/>
        <label for="data_nascita"> Data di nascita </label> <br/>
        <input type="date" name="data_nascita"> <br/>
        <label for="provincia"> Provincia </label> <br/>
        <input type="text" name="provincia"> <br/>
        <label for="patente"> Ha la patente? </label> <br/>
        <input type="checkbox" name="patente"> <br/>
        <label for="hobby"> Hobbys </label> <br />
        <input type="text" name="hobby"><br />
        <input type="submit" name="btn_submit" value="Inserisci">
    </form>
</body>

</html>