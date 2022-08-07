
<?php
$servername = "localhost";
$username = "hackathon";
$password = "password";

// Create connection
$conn = new mysqli('localhost','root','', 'hackathon');

?>
<html>
<head>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>
<body>
    <?php 

    $customer_name =$_POST['customer_name'];

   
    $seat = $_POST['seat_no'];
    $product1 = $_POST['product1'];
    $product2 = $_POST['product2'];
    $product3 = $_POST['product3'];
    $product4 = $_POST['product4'];
    $product5 = $_POST['product5'];
    $product6 = $_POST['product6'];
    $productid1 = $_POST['productid1'];
    $productid2 = $_POST['productid2'];
    $productid3 = $_POST['productid3'];
    $productid4 = $_POST['productid4'];
    $productid5 = $_POST['productid5'];
    $productid6 = $_POST['productid6'];
    
   // $price1 = mysqli_query($conn,"select price from products where id = $productid1");
    // $price2 = mysqli_query($conn,"SELECT price from products where id = $productid2");
    // $price3 = mysqli_query($conn,"SELECT price from products where id = $productid3"); 
     
    
    $total_qty = $product1 + $product2 +$product3 + $product4 + $product5 +$product6;
    
    
    $total_price = $product1*100 + $product2*150 + $product3*70 +$product4*80 + $product5*90 + $product6*85;

    $sql = mysqli_query($conn,"INSERT INTO customers(id,customer_name,seat_no,total_quantity,total_price) VALUES('','$customer_name', '$seat' , '$total_qty' , '$total_price')");

    // insert into products
    $sql_for_id=mysqli_query($conn,"SELECT id from customers ");

    while($cust_result=mysqli_fetch_assoc($sql_for_id)){
        $cust_id=$cust_result['id'];

    }
    
   // $cust_id=$sql_for_id['id'];


//    $sql =mysqli_query($conn, "INSERT INTO products Values('',")
 



    //  $name1 = mysqli_query($conn,"SELECT name from products where id = $productid1");
    //  echo"$name1";
    
      
       
     $customer_id="$seat";


     if($product1!=0){
        $sql = mysqli_query($conn,"INSERT into product_order(id,cust_id,customer_id,product_name,price,quantity)  VALUES('','$cust_id', '$customer_id' ,'$productid1' ,  $product1*100 ,'$product1')");
      }
      if($product2!=0){
        $sql = mysqli_query($conn,"INSERT into product_order(id,cust_id,customer_id,product_name,price,quantity)  VALUES('','$cust_id', '$customer_id' ,'$productid2' ,  $product2*150 ,'$product2')");
      }
      if($product3!=0){
        $sql = mysqli_query($conn,"INSERT into product_order(id,cust_id,customer_id,product_name,price,quantity) VALUES('','$cust_id',  '$customer_id' ,'$productid3' , $product3*70,'$product3')");
      }
      if($product4!=0){
        $sql = mysqli_query($conn,"INSERT into product_order(id,cust_id,customer_id,product_name,price,quantity)  VALUES('','$cust_id', '$customer_id' ,'$productid4' ,  $product4*80 ,'$product4')");
      }
      if($product5!=0){
        $sql = mysqli_query($conn,"INSERT into product_order(id,cust_id,customer_id,product_name,price,quantity)  VALUES('','$cust_id', '$customer_id' ,'$productid5' ,  $product5*90 ,'$product5')");
      }
      if($product6!=0){
        $sql = mysqli_query($conn,"INSERT into product_order(id,cust_id,customer_id,product_name,price,quantity) VALUES('','$cust_id',  '$customer_id' ,'$productid6' , $product6*85,'$product6')");
      }
    
    ?>

<?php 

$args = http_build_query(array(
    'token' => 'QUao9cqFzxPgvWJNi9aKac',
    'amount'  => 1000
));

$url = "https://khalti.com/api/v2/payment/verify/";

# Make the call using API.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$headers = ['Authorization: Key test_secret_key_6f28e4b78e234c6fae642bbbb517722a'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Response
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
?>




    <!-- Place this where you need payment button -->
    <button id="payment-button">Pay with Khalti</button>
    <link rel="stylesheet" href="form.css">
    <!-- Place this where you need payment button -->
    <!-- Paste this code anywhere in you body tag -->
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_cc0a198131fd4066bd1964d21048376b",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }
    </script>
    <!-- Paste this code anywhere in you body tag -->
    
</body>
</html>