<?php
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "crud_operations");

// Connect to the database
$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

// Check connection
if (!$connection) {
    die(json_encode(["error" => "Connection failed: " . mysqli_connect_error()]));
}

$sql = "SELECT COUNT(id) AS total_employees FROM employees";
$result = $connection->query($sql);
$employee_count = 0;
if($result && $row = $result->fetch_assoc())
{
  $employee_count = (int)$row['total_employees'];

}
$sql_products = "SELECT COUNT(id) AS total_products FROM products";
$result_product = $connection->query($sql_products);
$products_count = 0;
if($result_product && $row = $result_product->fetch_assoc())
{
  $products_count = (int)$row['total_products'];
}
echo json_encode([
  "total_employees" => $employee_count,
  "total_products" => $products_count
]);
$connection->close();
?>