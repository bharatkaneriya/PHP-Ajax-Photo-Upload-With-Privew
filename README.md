# PHP Ajax Photo Upload With Privew

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
