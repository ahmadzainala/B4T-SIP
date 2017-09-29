    <input type="hidden" value="<?php if($data == 1){echo 'maaf form login belum terisi';}else if($data == 2){echo 'maaf username atau password salah';}else{echo 'password anda salah';}?>" id="error">
    
    <script type="text/javascript">
    alert(document.getElementById("error").value);
    </script>
