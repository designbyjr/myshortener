<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jamie's ~Url~ Shortener</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<h1>Url shortner</h1>
<p>Please enter the url or web address you want to shorten in the form below</p>
<p>We use base 64 encode to generate our unique urls with a sqlite database</p>
<form action="/generate" method="post">
    @csrf
    <label for="url">Url:
        <input type="text" name="url">
    </label>
    <input type="submit">
</form>
@if(isset($newurl))
    {{$newurl}}
@endif

@if(!empty($errors->first()))
    <div class="row col-lg-12">
        <div class="alert alert-danger">
            <span>{{ $errors->first() }}</span>
        </div>
    </div>
@endif

</body>
</html>