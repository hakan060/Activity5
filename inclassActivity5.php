<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert to Money</title>
</head>
<body>

    <!-- I designed a table for the design to be neat -->
    <form method="post">
        <table style="padding: 2px;">
            <tr>
                <td>
                    From :
                </td>
                <td>
                    <input type="num" name="from">
                </td>
                <td>
                    Currency :
                </td>
                <td>
                    <select name="from_cur">
                        <option value="USD">US Dollar</option>
                        <option value="CAD">Canadian Dollar</option>
                        <option value="EUR">Euro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    To :
                </td>
                <td>
                    <input type="num" name="to" readonly>
                </td>
                <td>
                    Currency :
                </td>
                <td>
                    <select name="to_cur">
                        <option value="USD">US Dollar</option>
                        <option value="CAD">Canadian Dollar</option>
                        <option value="EUR">Euro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <!--I wanted the button to go to the 4th column to be on the right. -->
                <td colspan="4">
                    <input type="submit" value="convert" style="float: right;">
                </td>
            </tr>

        </table>
    </form>

    <!-- I created php part -->
    <?php
    
          $from = $_POST['from'];
		  $from_cur = $_POST['from_cur'];
		  $to_cur = $_POST['to_cur'];

		  $exchange_rates = array(
		  	'USD' => array('CAD' => 1.36, 'EUR' => 0.91),
		  	'CAD' => array('USD' => 0.74, 'EUR' => 0.67),
		  	'EUR' => array('USD' => 1.10, 'CAD' => 1.47)
		  );

      // calculating the result
		  $exchange_rate = $exchange_rates[$from_cur][$to_cur];
		  $amount = $from * $exchange_rate;

      // writing result to "to" space
      
      echo '<script>document.getElementsByName("from_cur")[0].value = "' . $from_cur . '";</script>';
      echo '<script>document.getElementsByName("to_cur")[0].value = "' . $to_cur . '";</script>';
      echo '<script>document.getElementsByName("from")[0].value = "' . number_format($from, 2) . '";</script>';
      echo '<script>document.getElementsByName("to")[0].value = "' . number_format($amount, 2) . '";</script>';
      
    
    ?>
</body>
</html>