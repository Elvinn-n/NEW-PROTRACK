<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td width="109">Name</td>
      <td width="75"><label for="name"></label>
      <input type="text" name="name" id="name" /></td>
    </tr>
    <tr>
      <td>Detail</td>
      <td><label for="detail"></label>
      <textarea name="detail" id="detail" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><input name="price" type="text" id="textfield" />
      <label for="price"></label></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="photo"></label>
      <input type="file" name="photo" id="photo" /></td>
    </tr>
    <tr>
      <td>Category </td>
      <td><label for="category"></label>
        <select name="category" id="category">
      </select></td>
    </tr>
    <tr>
      <td>Sub Category</td>
      <td><label for="sub_category"></label>
        <select name="sub_category" id="sub_category">
      </select></td>
    </tr>
    <tr>
      <td height="67" colspan="2"><p>&nbsp;</p>        
        <p>
          <input type="submit" name="submit" id="submit" value="Submit" />
          <input name="Submit" type="submit" id="Submit" value="Cancel" />
      </p></td>
    </tr>
  </table>
</form>
</body>
</html>