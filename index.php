<?php require_once 'vendor/autoload.php'; 
use App\Models\Database;
use App\Models\Delete;

$data = new Database();
$data->getData();
$del = new Delete();
$del->deleteData(47);
?>
<!-- 
1. Проверяю, работает ли AJAX
2. Смотрю, есть ли 404 (500)
3. Смотрю, возвращаются ли данные с бэкенда
4. Если данные возвращаются, то какого типа? Комментируем dataType в js
5. Проверяем вывод консоли -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/calculator-php-ajax/access/img/favicon.jpg" rel="shortcut icon" type="image/jpg">
    <link rel="stylesheet" href="access/styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="access/js/scrypt.js"></script>
    <title>Calculator</title>
</head>

<body>
<h1>Calculator</h1>
 <form class="form-message" id="form"> 
    <!-- наверху снесли action - отправку данных на контроллер (calculator.php) -->
 <label for="num1">Enter first number</label>   
 <input type="text" name="num1" id=""><br><br>
 <select name="operator" id="">
    <option value="+">sum</option>
    <option value="-">difference</option>
    <option value="*">multiplication</option>
    <option value="/">division</option>
 </select><br><br>
 <label for="num2">Enter second number</label>   
 <input type="text" name="num2" id=""><br><br>
 <input type="hidden" name="submit" value="1">
 <input type="submit" value="Result!"><br><br>
 <div id="AJAX"> Итого: <div id="ajaxResult"></div></div>
 <div id="ajaxHistory"><h1>history</h1>
   <tr>
      <?php
      foreach($data->getData() as $v):   
      ?>
      <tb id=<?php echo $v["id"] ?>>
      <button onclick="deleteRecord(<?php echo $v['id']; ?>)">Delete</button>
      <?php  echo "Count:{$v["id"]}=>{$v["num1"]}+{$v["num2"]}={$v["result"]}<br>"; ?> <td>
                
            </td></tb>
   </tr>
   <?php endforeach;?>

</div> 
</form>
 
</body>
</html>
