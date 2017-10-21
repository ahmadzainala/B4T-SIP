    <input type="hidden" value="<?php echo $this->session->flashdata('error'); ?>" id="error">
    
    <script type="text/javascript">
    alert(document.getElementById("error").value);
    </script>
