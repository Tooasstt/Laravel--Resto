<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <h1>HELLOW WORLD!</h1>
    <p>this is a test paragraph</p>
    
<table>
    <tr>
        <th>Customer id</th>
        <th>Customer name</th>
        <th>Customer Address</th>
        <th>Options</th>
    </tr>

   <!-- you can use php fucnction inside of ytour blade tmeplate -->
   <!-- your $customerData has 3 indexes -->
   @foreach($customerData as $custData)
    <tr>
        <td>{{$custData->cust_id}}</td>
        <td>{{$custData->custname}}</td>
        <td>{{$custData->cust_address}}</td>
        <td class="form-option">
            <form action ="{{route('customerEdit',$custData->cust_id)}}"method ="POST"> 
                @csrf
                @method('GET')
                <input type="submit" value="Edit">
            </form>
            <form action="{{route ('customerDelete',$custData->cust_id)}}"method="POST">
                 @csrf
                
                 @method('Delete')           
                <input type="submit" value="Delete">
            </form>           
        </td>
    </tr>
    @endforeach
</table>
    <br>

    <h1 class="customer-header">Customer Registration Form</h1>
     <form class= "customer-form" action="{{route('saveCustomer')}}" method="POST">
        @csrf
        <label>Customer Name</label><br>
        <input type="text" id="custname" name="Name">
        <br>
        <label>Customer Address</label><br>
        <input type="text" id="cust_address" name="Address"><br> 
        <br>
        <input type="submit" value="Submit">
    </form>
    <br>
     <h1 class="customer-header">Customer Registration Form - Unsanitized</h1>
     <form class= "customer-form" action="{{route('saveCustomerUnsanitized')}}" method="POST">
        @csrf
        <label>Customer Name</label><br>
        <input type="text" id="custname" name="Name">
        <br>
        <label>Customer Address</label><br>
        <input type="text" id="cust_address" name="Address"><br> 
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>