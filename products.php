<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .product img {
            max-width: 200px;
            height: auto;
            margin-bottom: 10px;
        }
        .product-details {
          margin-bottom: 10px;
        }
        .product-price {
          font-weight: bold;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Our Products</h1>

    <div class="product">
        <img src="images/thing.jpg" alt="Product 1">
        <div class="product-details">
          <h2>Awesome Widget</h2>
          <p>This widget is super awesome and does amazing things.</p>
        </div>
        <div class="product-price">$19.99</div>
    </div>

    <div class="product">
        <img src="images/gizmo.jpg" alt="Product 2">
        <div class="product-details">
          <h2>Deluxe Gizmo</h2>
          <p>The deluxe gizmo. Even better than the regular one!</p>
        </div>
        <div class="product-price">$29.99</div>
    </div>

    <div class="product">
        <img src="images/widget.jpg" alt="Product 3">
        <div class="product-details">
          <h2>Super Thingamajig</h2>
          <p>The thingamajig to end all thingamajigs.  You need this!</p>
        </div>
        <div class="product-price">$9.99</div>
    </div>

    <a href="./index.php">Back to Homepage</a>

</body>
</html>