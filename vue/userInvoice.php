
<?php 
session_start();
include('../database/conection.php');
$idUser = $_SESSION['userInfo']['id_user'];
$id_order= $_GET['id_order'];


    $sql_order_line = 'select ol.*,p.libell
    from order_line ol
    INNER join product p
    on ol.id_product = p.id_product where id_orderr =:id_orderr';
    $statement = $connection->prepare($sql_order_line);
    $statement->execute([':id_orderr' => $id_order]);
    $lineOrders = $statement -> fetchAll(PDO::FETCH_OBJ); 


    $sql = "select * from userr where id_user =:id_user";
    $statement1 = $connection->prepare($sql);
    $statement1->execute([':id_user' => $idUser]);
    $user = $statement1 -> fetch(PDO::FETCH_ASSOC);

    $fullname = $user['fname'] . ' ' . $user['lname'];
    $numero = $user['numero'];
    $email = $user['email'];
    $city = $user['city'];
    $adress = $user['adress1'].' '.$user['adress2'];
    $zipcode = $user['zipcode'];

date_default_timezone_set("Africa/Casablanca");
$date = date('d/m/y');

$totalToPay = 0;

$html='
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
        text-align: center;}
        h3{
        text-align: right;}

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #f99116;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #f99116;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
        #total{
            font-weight: bold;
        }
        table{
            height: 400px;
        }
    </style>
</head>
<body>
    <h1>Invoice for your order</h1>
    <h2>User info:</h2>
    <h5>Full Name : '.$fullname.'</h5>
    <h5>numero : '.$numero.'</h5>
    <h5>Email: '.$email.'</h5>
    <h5>City: '.$city.'</h5>
    <h5>Adress: '.$adress.'</h5>
    <h5>Zipcode: '.$zipcode.'</h5>
    
    <h2>Order detail:</h2>
        <table class="styled-table" border="2" cellpadding="10" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th colspan="5" >Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product ID :</td>
                    <td>Product Name:</td>
                    <td>Price :</td>
                    <td>Quantity :</td>
                    <td>Price total :</td>
                </tr>';
                foreach ($lineOrders as $lineOrder) {
                    $html .= '
                    <tr>
                        <td>' . $lineOrder->id . '</td>
                        <td>' . $lineOrder->libell . '</td>
                        <td>' . $lineOrder->price . '$</td>
                        <td>x' . $lineOrder->quantity . '</td>
                        <td>' . $lineOrder->total . '$</td>
                    </tr>';
                    $totalToPay += $lineOrder->total;
                }
            $html .= '
            <tr>
                <th colspan="4">Total to pay:</th>
                <td id="total">'.$totalToPay.'$</td>
            </tr>';
            $html .= '
            </tbody>
            </table>
        <h3>'. $date . '</h3>
    </div>
</body>
</html>';
?>


<?php
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options -> set('chroot',realpath(''));

$dompdf = new Dompdf($options);
// $html = file_get_contents("index.html");
$dompdf ->loadhtml($html);
$dompdf ->setPaper('A4','portrait');
$dompdf ->render();
$dompdf ->stream("userInvoice.pdf")

?>