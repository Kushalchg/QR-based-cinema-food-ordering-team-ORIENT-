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
    <title></title>
    <link rel="stylesheet" href="form.css">
    <script type="text/javascript" src="form.js"></script>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>
<body>
  <?php
   $seat = $_GET['seat'];

  ?>
    <table class="form">
    <form action="order.php" method="post" class="h1">
    <tr class="username">
        <td>Name</td>
        <td><input type="text" class="name" name="customer_name" placeholder="customer name"></td>
      </tr>
      <input type="hidden" name="seat_no" value="<?php echo $seat; ?>">
     
            <tr class="first">
              <td><img class="food-pic" src="images/popcorn.webp"   width="100" height="100"></td>
              <td><strong>White Popcorn</strong><p class="food-order-text2" name="price1">₹100 for one<p></td><br>
              <td><label for="sb1"> </label>
              <input type="hidden" name="productid1" value="White Popcorn">
                Quantaty<select class="select-box" name="product1" id="sb1" onchange="calculatePrice()">
                    <option value="0">none</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>                        
                </td>
            </tr>  
            <tr class="second">
              <td><img class="food-pic" src="images/popcorn.webp"   width="100" height="100"></td>
              <td><strong>Red Popcorn</strong><p class="food-order-text2" name="price2">₹150 for one<p></td><br>
              <td><label for="sb2"> </label>
              <input type="hidden" name="productid2" value="Red Popcorn">
                Quantaty<select class="select-box" name="product2" id="sb2" onchange="calculatePrice()">
                    <option value="0">none</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>            
              </td>
            </tr>  
            <tr class="third">
              <td><br><img class="food-pic" src="images/drink.png"   width="100" height="100"></td>
              <td><strong>Soft Drink</strong><p class="food-order-text2" name="price3">₹70 for one<p></td>
              <td><label for="sb3"> </label>
              <input type="hidden" name="productid3" value="Soft Drink">
                Quantaty<select class="select-box" name="product3" id="sb3" onchange="calculatePrice()">
                    <option value="0">none</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>            
              </td>
            </tr>  


            <tr class="fourth">
              <td><img class="food-pic" src="images/French Fries.jpg"   width="100" height="100"></td>
              <td><strong>French Fries</strong><p class="food-order-text2" name="price2">₹80 for one<p></td><br>
              <td><label for="sb4"> </label>
              <input type="hidden" name="productid4" value="Red Popcorn">
                Quantaty<select class="select-box" name="product4" id="sb4" onchange="calculatePrice()">
                    <option value="0">none</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>            
              </td>
            </tr>  
            <tr class="fith">
              <td><br><img class="food-pic" src="images/lays.png"   width="100" height="100"></td>
              <td><strong>Lays</strong><p class="food-order-text2" name="price3">₹90 for one<p></td>
              <td><label for="sb5"> </label>
              <input type="hidden" name="productid5" value="Soft Drink">
                Quantaty<select class="select-box" name="product5" id="sb5" onchange="calculatePrice()">
                    <option value="0">none</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>            
              </td>
            </tr>  

            <tr class="sixth">
              <td><br><img class="food-pic" src="images/Mcdonalds Fries.jpg"   width="100" height="100"></td>
              <td><strong>Mcdonalds Fries</strong><p class="food-order-text2" name="price3">₹85 for one<p></td>
              <td><label for="sb6"> </label>
              <input type="hidden" name="productid6" value="Soft Drink">
                Quantaty<select class="select-box" name="product6" id="sb6" onchange="calculatePrice()">
                    <option value="0">none</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>            
              </td>
            </tr>


            <tr>
                <td>
                 
                <br><button type="button" >Total Price <div id="totalTip">
                    <sup>₹</sup><span id="tip">0.00</span>
                    <small id="each"><br> <br></small>
                  </div> </button>
                  </td>
                  <td><br><button type="submit" name="Submit">Continue to  payment</button></td>
            </tr>
    </form>
</table>



<script>
  function calculatePrice(){
    var sb1 = document.getElementById("sb1").value;
    var sb2 = document.getElementById("sb2").value;
    var sb3 = document.getElementById("sb3").value;
    var sb4 = document.getElementById("sb4").value;
    var sb5 = document.getElementById("sb5").value;
    var sb6 = document.getElementById("sb6").value;

   var first=(100 * sb1);
   var second=(150 * sb2);
   var third=(70 * sb3);
   var fourth=(80 * sb4);
   var fith=(90 * sb5);
   var sixth=(85 * sb6);


    var total = first+second+third+fourth+fith+sixth;
    
    total = total.toFixed(2);
    
  document.getElementById("totalTip").style.display = "block";
  document.getElementById("tip").innerHTML = total;
}

document.getElementById("totalTip").style.display = "none";
document.getElementById("each").style.display = "none";

document.getElementById("calculate").onclick = function() {
    calculatePrice();
}


// for payment
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

</body>
</html>
