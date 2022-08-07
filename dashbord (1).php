<?php
$servername = "localhost";
$username = "hackathon";
$password = "password";

// Create connection
$conn = new mysqli('localhost','root','', 'hackathon');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Record</title>
</head>

<body>
  <table border="1">
    <tr>
      <th>customer_id</th>
      <th>customer_name </th>
      <th>seat_no</th>
      <th>product_name </th>
      <th>product_quantity</th>
      <th>total_quantity</th>
      <th>total_price</th>
    </tr>
    <?php
    $selectquery = " SELECT * from customers,product_order where customers.id=product_order.cust_id order by customers.id,product_order.id";


       $query = mysqli_query($conn, $selectquery);

    $current_cust_id="";
    $current_customer_name="";
    $current_seat_no="";
    $current_total_quantity="";
    $current_total_price="";

       while ($result = mysqli_fetch_assoc($query)){

    
        if($result['cust_id']!=$current_cust_id){
            $custi_id=$result['cust_id'];
            $current_cust_id=$custi_id;
        }
        else{
            $custi_id="";
        }


        if($result['customer_name']!=$current_customer_name){
            $customer_name=$result['customer_name'];
            $current_customer_name=$customer_name;
        }
        else{
            $customer_name="";
        }

        if($result['seat_no']!=$current_seat_no){
            $seat_no=$result['seat_no'];
            $current_seat_no=$seat_no;
        }
        else{
            $seat_no="";
        }


        if($result['total_quantity']!=$current_total_quantity){
            $total_quantity=$result['total_quantity'];
            $current_total_quantity=$total_quantity;
        }
        else{
            $total_quantity="";
        }

        if($result['total_price']!=$current_total_price){
            $total_price=$result['total_price'];
            $current_total_price=$total_price;
        }
        else{
            $total_price="";
        }




   ?>

      <tr>
        <td><?php echo  $custi_id;?></td>
        <td><?php echo $customer_name;?></td>
        <td> <?php echo $seat_no; ?></td>
        <td> <?php echo $result['product_name']; ?></td>
        <td> <?php echo $result['quantity'];?></td>
        <td> <?php echo $total_quantity; ?></td>
        <td> <?php echo  $total_price; ?></td>
      </tr>
    <?php
    }
    ?>
</table>
</body>

</html>

