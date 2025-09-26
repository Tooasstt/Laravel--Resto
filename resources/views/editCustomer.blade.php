<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.css'])
</head>
<body>
{{-- {{dd($customerDetails)}} --}}
      <h1 class="customer-header">Edit Customer Details Page</h1>
     <form class= "customer-form" action="{{route('saveEditCustomer',$customerDetails->cust_id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Customer Name</label><br>
        <input type="text" id="custname" name="Name" value="{{$customerDetails->custname}}">
        <br>
        <label>Customer Address</label><br>
        <input type="text" id="cust_address" name="Address"value="{{$customerDetails->cust_address}}">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>