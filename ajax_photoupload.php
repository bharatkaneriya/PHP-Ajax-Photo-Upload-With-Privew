<?php
if(isset($_FILES['fileUpload']))
{
    if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], "upload/".$_FILES['fileUpload']['name']))
    {
        echo "Photo Upload Success...";
    }
    else {
        echo "Photo Upload Error...";
    }
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Ajax  Photo Upload</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#fileUpload").change(function () {
            //alert('yes');
            readURL(this);
        });
        
         function readURL(input) {
             if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo_id').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
          }
        });
        function upload()
        {
         data = new FormData($('#myform')[0]);

        $.ajax({
            url: '<?php echo $_SERVER['PHP_SELF'] ?>',
            data: data,
            processData: false,
            contentType: false,
            chatch:false,
            type: 'POST',
            success: function ( data ) {
                alert( data );
            }
        });
        }
    </script>
</head>

<body>
    <form method="post" enctype="multipart/form-data" id="myform">
        <table border="0" align="center" cellpadding="5">
            <tr>
                <td colspan="2"><h3>Photo Upload Using Ajax And Jquery</h3></td>
            </tr>
            <tr>
                <td valign="top">Preview</td>
            	<td><img id="photo_id" name="photo_id" src="#" height="150" width="150"></td>
            </tr>
            <tr>
            <td>Select File</td>
                <td><input type="file" name="fileUpload" id="fileUpload" /></td>
            </tr>
            <tr>
                <td></td>
                <td><br /><input type="button" value="Upload Photo" onclick="upload()" /></td>
            </tr>
        </table>
    </form>
</body>
</html>
