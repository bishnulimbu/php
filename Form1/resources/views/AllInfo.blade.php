<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">

   @foreach ($infos as $info)
      <div
<div style="max-width: 600px; background-color: #ffffff; padding: 15px; margin: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 2px 2px 5px rgba(0,0,0,0.1);">
      <div>
         <p style="margin: 0 0 8px;"><strong>First Name:</strong> {{$info->first_name}}</p> 
         <p style="margin: 0 0 8px;"><strong>Last Name:</strong> {{$info->last_name}}</p>
         <p style="margin: 0 0 8px;"><strong>Email:</strong> {{$info->email}}</p> 
         <p style="margin: 0;"><strong>Gender:</strong> {{$info->gender}}</p> 
      </div>
         <div>
<i class="bi bi-eye text-primary"></i>
<i class="bi bi-pencil-square text-success"></i>
            <form action="{{route('forms.destroy',$info->id)}}" method="POST">
            @csrf
                  @method('DELETE')
                  <button type='submit'>
<i class="bi bi-trash text-danger"></i>
                  </button>
            </form>
         </div>
      </div>
   @endforeach 

</body>
</html>