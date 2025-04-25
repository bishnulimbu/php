
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Info</title>
</head>
<body>
    <form action="{{route('forms.update')}}" method="POST" style="max-width: 400px; margin: 30px auto; font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
    @method('UPDATE')
        @csrf
        <label style="display: block; margin-bottom: 10px;">
            First Name<br>
            <input type="text" name="first_name" style="width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
        </label>

        <label style="display: block; margin-bottom: 10px;">
            Last Name<br>
            <input type="text" name="last_name" style="width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
        </label>

        <label style="display: block; margin-bottom: 10px;">
            Email<br>
            <input type="email" name="email" style="width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
        </label>

        <div style="margin-bottom: 15px;">
            Gender<br>
            <label><input type="radio" name="gender" value="male" style="margin-right: 5px;">Male</label><br>
            <label><input type="radio" name="gender" value="female" style="margin-right: 5px;">Female</label><br>
            <label><input type="radio" name="gender" value="gaeyyyy" style="margin-right: 5px;">I am not sure myself</label>
        </div>

        <button type="submit" style="padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Submit
        </button>
    </form>
</body>
</html>