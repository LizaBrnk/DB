<form action="main.php" method="post"> 
  <label for="table">Обрати таблицю:</label>
  <select name="table">
    <option value="product_type_dyrectory">product_type_dyrectory</option>
    <option value="trademark_directory">trademark_directory</option>
    <option value="price_list">price_list</option>
    <option value="goods_realization">goods_realization</option>
  </select>
  <br>
  <label for="action">Обрати дію:</label>
  <select name="action">
    <option value="Select">SELECT</option>
    <option value="Insert">INSERT</option>
    <!--<option value="Update Product type dyrectory">UPDATE Product type dyrectory</option>
    <option value="Update Trademark directory">UPDATE Trademark directory</option>-->
    <option value="Update">UPDATE</option>
  </select> 
  <input type="submit" name="submit" value="Виконати"> 
</form>