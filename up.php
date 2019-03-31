<?php
echo "start<br/>";
if ($_POST)
  {

    print_r($_POST)."<br/>";







  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("./" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
          if (!@move_uploaded_file($_FILES["file"]["tmp_name"],  "./" . $_FILES["file"]["name"])) {
              HandleError("文件无法保存.");
              exit(0);
            }else{  
                echo "Stored in: " . "./" . $_FILES["file"]["name"];
            }

      }
    }
  }












  function HandleError($message) {
  header("HTTP/1.1 500 Internal Server Error");
  echo $message;
}
?>
<html>
<body>

<form action="upload.php" method="post"
enctype="multipart/form-data">

<br />
<br />
<br />
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>