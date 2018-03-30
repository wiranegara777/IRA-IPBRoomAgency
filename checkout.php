<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/loader.css">

    <title>Checkout</title>
    <body onload="myFunction()" style="margin:0;">

        <div id="loader"></div>
        <center><p style="margin-top:400px;" id="wait">Processing Your Order</p></center>

        <div style="display:none;" id="myDiv" class="animate-bottom">
        <h2>Success Making Your Checkout!</h2>
        <p>Here is Your detail!</p>
        </div>


    </body>
</html>

<script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 4000);
        }

        function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("wait").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
        }
 </script>