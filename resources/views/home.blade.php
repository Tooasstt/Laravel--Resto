<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resource/css/app.css','resource/js/app.css'])
</head>
<body>
    <h1>HELLOW WORLD!</h1>
    <p>this is a test paragraph</p>
    
<table>
    <tr>
        <th>Customer id</th>
        <th>Customer name</th>
        <th>Customer Address</th>
    </tr>

   <!-- you can use php fucnction inside of ytour blade tmeplate -->
   <!-- your $customerData has 3 indexes -->
   @foreach($customerData as $custData)
    <tr>
        <td>{{$custData->cust_id}}</td>
        <td>{{$custData->custname}}</td>
        <td>{{$custData->cust_address}}</td>
    </tr>
    @endforeach
</table>
</body>
</html>