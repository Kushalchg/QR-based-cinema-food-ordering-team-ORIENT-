//calculate the price based on the selected quantity

function calculatePrice(){
    var Sb1 = document.getElementById("sb1").value;

    var total = (100 * 100);
    total = total.toFixed(2);
    document.getElementById("tip").innerHTML = total;
}
document.getElementById("calculate").onclick = function() {
    calculatePrice();
}