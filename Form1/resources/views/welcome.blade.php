<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 style="color: darkblue; text-align: center; font-family: Arial, sans-serif;">
        Hello World
    </h1>

    <a href="{{route('forms.create')}}"
       style="display: inline-block; padding: 10px 15px; background-color: green; color: white; text-decoration: none; border-radius: 5px; font-family: Arial, sans-serif;">
       Click me for add.
    </a>

    <a href="{{route('forms.index')}}"
       style="display: inline-block; padding: 10px 15px; background-color: blue; color: white; text-decoration: none; border-radius: 5px; font-family: Arial, sans-serif; margin-left: 10px;">
       Click me for view all info.
    </a>
</body>
</html>