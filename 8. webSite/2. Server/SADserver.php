<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<?php session_start(); ?>
<html>
<head>
  <title> DDingdong - SAD project </title>
  <h1> Search Restaurants with Keyword </h1>

</head>
<body>
</br>
<form action="SADserver.php" method ="get">
  <h5> Category </h5>
  <button id="chicken" name="getAllchicken">Chicken</button>
  <button id="pizza" name="getAllpizza">Pizza</button>
  <button id="china" name="getAllchina">Chinese Food</button>
  <button id="korean" name="getAllkorean">Korean Food</button>
  <button id="japan" name="getAlljapan">Japanese Food</button>
  <button id="pigfoot" name="getAllpigfoot">Pig's feet</button>
</form>
<?php


$conn = mysqli_connect("localhost", "root", "", "SADproj");
if ($conn->connect_error){
  echo "Failed to connect to MYSQL:".mysqli_connect_error();
  die($conn->connect_error);
}
mysqli_set_charset($conn, 'utf8');

if(isset($_GET['getAllchicken'])){
  ?>
  <form action="SADserver.php" method="post">
    <input type="radio" name="c" value="Oil"> Oil <br>
    <input type="radio" name="c" value="Crisp"> Crisp <br>
    <input type="radio" name="c" value="Dry"> Lean(dry) <br>
    <input type="radio" name="c" value="Meat"> Meat <br>
    <input type="submit" name="Keyword_chicken" value="Submit">
  </form>
  <?php
  echo "execute query";
  $sql = "SELECT res_name, location, res_rate FROM chicken ORDER BY res_rate DESC";
  $result = $conn->query($sql);
  if($result->num_rows >0){
    while($row = mysqli_fetch_assoc($result)){
      ?>
      <form action="SADserver.php" method="post" >
        <tr>
          <td><?php echo $row['res_name'] ?></td>
          <td><?php echo $row['location'] ?></td>
          <td><?php echo $row['res_rate'] ?></td>
        </tr>
      </form>

      <?php
    }
  }else{
    echo "0 results";
  }
}
//onclick chichken category button


if(isset($_POST['Keyword_chicken'])&&isset($_POST['c'])){

  $selectedR = $_POST['c'];
  echo "Result for the Keyword: ".$selectedR;

  if($selectedR == 'Oil'){
    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword1 FROM chicken WHERE keyword1 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM chicken_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword1']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php

      }else{
      echo "0 results for keyword ".$selectedR;
    }
    //keyword = smell//keyword1

  }else if ($selectedR == 'Crisp') {

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword2 FROM chicken WHERE keyword2 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM chicken_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword2']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php

      }else{
      echo "0 results for keyword ".$selectedR;
    }
    //keyword = Crisp//keyword2


  }else if ($selectedR == 'Dry') {

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword3 FROM chicken WHERE keyword3 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM chicken_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword3']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php

      }else{
      echo "0 results for keyword ".$selectedR;
    }
    //keyword = Dry//keyword3


  }else if($selectedR == 'Meat'){

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword4 FROM chicken WHERE keyword4 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM chicken_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword4']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php

      }else{
      echo "0 results for keyword ".$selectedR;
    }
    //keyword = meat//keyword4

  }

}
//keyword for chicken

if(isset($_GET['getAllpizza'])){
  ?>
  <form action="SADserver.php" method="post">
    <input type="radio" name="p" value="Cost"> Cost-Effective <br>
    <input type="radio" name="p" value="Dough"> Dough <br>
    <input type="radio" name="p" value="Pickle"> Pickle <br>
    <input type="radio" name="p" value="Topping"> Topping <br>
    <input type="submit" name="Keyword_pizza" value="Submit">
  </form>
  <?php
  echo "execute query";
  $sql = "SELECT res_name, location, res_rate FROM pizza ORDER BY res_rate DESC";
  $result = $conn->query($sql);
  if($result->num_rows >0){
    while($row = mysqli_fetch_assoc($result)){
      ?>
      <form action="SADserver.php" method="post">
        <tr>
          <td><?php echo $row['res_name'] ?></td>
          <td><?php echo $row['location'] ?></td>
          <td><?php echo $row['res_rate'] ?></td>
        </tr>
      </form>

      <?php
    }
  }else{
    echo "0 results";
  }
}

if(isset($_POST)&&isset($_POST['p'])){

  $selectedR = $_POST['p'];
  echo "keyword ".$selectedR." is Selected.";

  if($selectedR == 'Cost'){

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword1 FROM pizza WHERE keyword1 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM pizza_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword1']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }

    //keyword1
  }elseif ($selectedR == 'Dough') {
    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword2 FROM pizza WHERE keyword2 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM pizza_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword2']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }
    // keyword2

  }elseif ($selectedR == 'Pickle'){
  ?>
  <table>
    <thead>
      <tr>
        <td> Restaurants </td>
        <td> Location </td>
        <td> Our Store Point </td>
        <td> Total Review Number </td>
        <td> Star Point </td>
        <td> Sentiment Analysis </td>
        <td> Business Start Date </td>
        <td> Last Review </td>
        <td> Correlation </td>
      </tr>
    </thead>
  <tbody>
    <?php

  $key_query = "SELECT res_name, location, res_rate, ID, keyword3 FROM pizza WHERE keyword3 >= 0.04 ORDER BY res_rate DESC";
  $key_result = $conn->query($key_query);

  if($key_result->num_rows >0){
    while($row = mysqli_fetch_assoc($key_result)){
      $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM pizza_rate WHERE res_id =".$row['ID'];
      $value = $conn->query($q_get_value);
      $fetch = mysqli_fetch_assoc($value);
      ?>
        <tr>
          <td><?php echo "  ".$row['res_name']."  " ?></td>
          <td><?php echo "  ".$row['location']."  " ?></td>
          <td><?php echo "  ".$row['res_rate']."  " ?></td>
          <td><?php echo "  ".$fetch['countR']."  " ?></td>
          <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
          <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
          <td><?php echo "  ".$fetch['start_date']."  " ?></td>
          <td><?php echo "  ".$fetch['last_date']."  " ?></td>
          <td><?php echo "  ".$row['keyword3']."  " ?></td>
        </tr>
      <?php
    }
    ?>
  </tbody>
</table>
    <?php
    }else{
    echo "0 results for keyword ".$selectedR;
  }
    // keyword3

  }elseif ($selectedR == 'Topping') {

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword4 FROM pizza WHERE keyword4 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM pizza_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword4']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }
    // keyword4
  }

}
//keyword for pizza


if(isset($_GET['getAllchina'])){
  ?>
  <form action="SADserver.php" method="post">
    <input type="radio" name="chi" value="Fast"> Fast <br>
    <input type="radio" name="chi" value="Sauce"> Sauch <br>
    <input type="radio" name="chi" value="Dish"> Dish <br>
    <input type="radio" name="chi" value="Set menu"> Set menu <br>
    <input type="submit" name="Keyword_china" value="Submit">
  </form>
  <?php
  echo "execute query";
  $sql = "SELECT res_name, location, res_rate FROM china ORDER BY res_rate DESC";
  $result = $conn->query($sql);
  if($result->num_rows >0){
    while($row = mysqli_fetch_assoc($result)){
      ?>
      <form action="SADserver.php" method="post">
        <tr>
          <td><?php echo $row['res_name'] ?></td>
          <td><?php echo $row['location'] ?></td>
          <td><?php echo $row['res_rate'] ?></td>
        </tr>
      </form>
      <?php
    }
  }else{
    echo "0 results";
  }
}
//category china

if(isset($_POST)&&isset($_POST['chi'])){
  $selectedR = $_POST['chi'];
  echo "keyword ".$selectedR." is Selected.";

  if($selectedR == 'Fast'){

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword1 FROM china WHERE keyword1 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM china_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword1']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }

    //keyword1
  }elseif ($selectedR == 'Sauce') {

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword2 FROM china WHERE keyword2 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM china_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword2']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }
    // keyword2
  }elseif ($selectedR == 'Dish') {

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword3 FROM china WHERE keyword3 >= 0.04 ORDER BY res_rate";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM china_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword3']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }
    // keyword3
  }elseif ($selectedR == 'Set menu') {

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword4 FROM china WHERE keyword4 >= 0.04 ORDER BY res_rate";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM china_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword4']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }
    // keyword4
  }

}
//keyword for china 수정중

if(isset($_GET['getAllkorean'])){
  ?>
  <form action="SADserver.php" method="post">
    <input type="radio" name="k" value="Soup"> Soup <br>
    <input type="radio" name="k" value="Spicy"> Spicy <br>
    <input type="radio" name="k" value="Meat"> Meat <br>
    <input type="submit" name="Keyword_korean" value="Submit">
  </form>
  <?php
  echo "execute query";
  $sql = "SELECT res_name, location, res_rate FROM korean ORDER BY res_rate";
  $result = $conn->query($sql);
  if($result->num_rows >0){
    while($row = mysqli_fetch_assoc($result)){
      ?>

      <form action="SADserver.php" method="post">
        <tr>
          <td><?php echo $row['res_name'] ?></td>
          <td><?php echo $row['location'] ?></td>
          <td><?php echo $row['res_rate'] ?></td>
        </tr>
      </form>

      <?php
    }
  }else{
    echo "0 results";
  }
}
//category korean

if(isset($_POST)&&isset($_POST['k'])){
  $selectedR = $_POST['k'];
  echo "keyword ".$selectedR." is Selected.";

  if($selectedR == 'Soup'){
    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword1 FROM korea WHERE keyword1 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM korea_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword1']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }
    //keyword1
  }elseif ($selectedR == 'Spicy') {
    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword2 FROM korea WHERE keyword2 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM korea_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword2']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }
    // keyword3
  }elseif ($selectedR == 'Meat') {
    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword3 FROM korea WHERE keyword3 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM korea_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword3']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }
    // keyword4
  }

}
//keyword for korean

if(isset($_GET['getAlljapan'])){
  ?>
  <form action="SADserver.php" method="post">
    <input type="radio" name="j" value="Fresh"> Fresh <br>
    <input type="radio" name="j" value="Packaging"> Packaging <br>
    <input type="radio" name="j" value="Drink"> Drinking alone <br>
    <input type="radio" name="j" value="Sauce"> Sauce <br>
    <input type="submit" name="Keyword_japanese" value="Submit">
  </form>
  <?php
  echo "execute query";
  $sql = "SELECT res_name, location, res_rate FROM japan ORDER BY res_rate DESC";
  $result = $conn->query($sql);
  if($result->num_rows >0){
    while($row = mysqli_fetch_assoc($result)){
      ?>

      <form action="SADserver.php" method="post">
        <tr>
          <td><?php echo $row['res_name'] ?></td>
          <td><?php echo $row['location'] ?></td>
          <td><?php echo $row['res_rate'] ?></td>
        </tr>
      </form>

      <?php
    }
  }else{
    echo "0 results";
  }
}
//category Japanese

if(isset($_POST)&&isset($_POST['j'])){
  $selectedR = $_POST['j'];
  echo "keyword ".$selectedR." is Selected.";

  if($selectedR == 'Fresh'){
    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword1 FROM japan WHERE keyword1 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM japan_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword1']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }
    //keyword1
  }elseif ($selectedR == 'Packaging') {
    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword2 FROM japan WHERE keyword2 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM japan_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword2']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }
    // keyword2
  }elseif ($selectedR == 'Drink') {

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword3 FROM japan WHERE keyword3 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM japan_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword3']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }
    // keyword3
  }elseif ($selectedR == 'Sauce') {
    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword4 FROM japan WHERE keyword4 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM japan_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword4']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php
      }else{
      echo "0 results for keyword ".$selectedR;
    }
    // keyword4
  }

}
//keyword for Japanese 수정중

if(isset($_GET['getAllpigfoot'])){
  ?>
  <form action="SADserver.php" method="post">
    <input type="radio" name="f" value="Smell"> Smell <br>
    <input type="radio" name="f" value="Kimchi"> Kimchi <br>
    <input type="radio" name="f" value="Spicy"> Spicy <br>
    <input type="radio" name="f" value="Chewy"> Chewy <br>
    <input type="submit" name="Keyword_pigfoot" value="Submit">
  </form>
  <?php
  echo "execute query";
  $sql = "SELECT res_name, location, res_rate FROM pigfoot ORDER BY res_rate DESC";
  $result = $conn->query($sql);
  if($result->num_rows >0){
    while($row = mysqli_fetch_assoc($result)){
      ?>
      <form action="SADserver.php" method="post">
        <tr>
          <td><?php echo $row['res_name'] ?></td>
          <td><?php echo $row['location'] ?></td>
          <td><?php echo $row['res_rate'] ?></td>
        </tr>
      </form>
      <?php
    }
  }else{
    echo "0 results";
  }
}


if(isset($_POST['Keyword_pigfoot'])&&isset($_POST['f'])){

  $selectedR = $_POST['f'];
  echo "this is ".$selectedR;

  if($selectedR == 'Smell'){

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword1 FROM pigfoot WHERE keyword1 >= 0.04 ORDER BY res_rate";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM pigfoot_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword1']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php

      }else{
      echo "0 results for keyword ".$selectedR;
    }
//keyword 1  = Smell
  }else if ($selectedR == 'Kimchi') {

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword2 FROM pigfoot WHERE keyword2 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM pigfoot_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword2']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php

      }else{
      echo "0 results for keyword ".$selectedR;
    }
//keyword2

  }else if ($selectedR == 'Spicy') {

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword3 FROM pigfoot WHERE keyword3 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM pigfoot_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword3']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
      <?php

      }else{
      echo "0 results for keyword ".$selectedR;
    }

    //keyword3

  }else if($selectedR == 'Chewy'){

    ?>
    <table>
      <thead>
        <tr>
          <td> Restaurants </td>
          <td> Location </td>
          <td> Our Store Point </td>
          <td> Total Review Number </td>
          <td> Star Point </td>
          <td> Sentiment Analysis </td>
          <td> Business Start Date </td>
          <td> Last Review </td>
          <td> Correlation </td>
        </tr>
      </thead>
    <tbody>
      <?php

    $key_query = "SELECT res_name, location, res_rate, ID, keyword4 FROM pigfoot WHERE keyword4 >= 0.04 ORDER BY res_rate DESC";
    $key_result = $conn->query($key_query);

    if($key_result->num_rows >0){
      while($row = mysqli_fetch_assoc($key_result)){
        $q_get_value = "SELECT countR, starpoint, sentiment, start_date, last_date FROM pigfoot_rate WHERE res_id =".$row['ID'];
        $value = $conn->query($q_get_value);
        $fetch = mysqli_fetch_assoc($value);
        ?>
          <tr>
            <td><?php echo "  ".$row['res_name']."  " ?></td>
            <td><?php echo "  ".$row['location']."  " ?></td>
            <td><?php echo "  ".$row['res_rate']."  " ?></td>
            <td><?php echo "  ".$fetch['countR']."  " ?></td>
            <td><?php echo "  ".$fetch['starpoint']."  " ?></td>
            <td><?php echo "  ".$fetch['sentiment']."  " ?></td>
            <td><?php echo "  ".$fetch['start_date']."  " ?></td>
            <td><?php echo "  ".$fetch['last_date']."  " ?></td>
            <td><?php echo "  ".$row['keyword4']."  " ?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
    </table>
      <?php

      }else{
      echo "0 results for keyword ".$selectedR;
    }
    //keword4

  }

}
//keyword for pigFoot

//맨 마지막에 커넥션 죽이기
mysqli_close($conn)
?>

</body>
</html>
