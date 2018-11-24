<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Url shortner</h1>
<form action="/generate" method="post">
    @csrf
    <label for="url">Url:
        <input type="text" name="url">
    </label>
    <input type="submit">
</form>
</body>
</html>