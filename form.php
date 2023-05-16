<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <title>Task 3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id = "form">

  <form action=""
    method="POST">

    <label>
      Имя:<br />
      <input name="name"/>
    </label><br />

    <label >
      E-mail:<br />
      <input name="email"
        type="email"/>
    </label><br />

    <label>
      Год рождения:<br />
      <select name="birthdayear">
        <?php 
        for ($i = 1950; $i <= 2023; $i++) {
          printf('<option value="%d">%d год</option>', $i, $i);
        }
        ?>
      </select><br />

      Пол<br/>
    <label><input type="radio" checked="checked"
      name="gen" value="m" />
      Мужской</label>
    <label><input type="radio"
      name="gen" value="f" />
      Женский</label><br />
      Количество конечностей<br/>
    <div class="lim">
    <label><input type="radio" checked="checked"
      name="body" value="0" />
      0</label>
    <label><input type="radio"
      name="body" value="4" />
      4</label><br />
    <label><input type="radio"
      name="body" value="5" />
      5</label><br />
    <label>
      Сверхспособности
      <br />
      <select name="ability[]"
          multiple="multiple">
          <option value="1" selected="selected">бессмертие</option>
          <option value="2">прохождение сквозь стены</option>
          <option value="3">левитация</option>
          <option value="4">не чувствовать боль</option>
      </select>
      </label><br />
      <label>
      Биография<br />
        <textarea name="biographiya"></textarea>
        </label><br />
        
      <label><input type="checkbox" checked="checked"
        name="check" />
        Ознакомился с контрактом</label>

      <input type="submit" value="Отправить" />
    </form>
  </div>
</body>
</html>