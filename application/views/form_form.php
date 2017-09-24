<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>FORM</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id User <?php echo form_error('id_user') ?></td>
            <td>
              <?php echo cmb_dinamis('id_user', 'user_akun', 'username', 'id_user', $id_user); ?>
              <!--
              <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
            !-->
        </td>
	    <tr><td>Date <?php echo form_error('date') ?></td>
            <td><input type="date" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d"); ?>" readonly />
        </td>
      <tr><td>That <?php echo form_error('that') ?></td>
            <td><input type="text" class="form-control" name="that" id="that" placeholder="Agar" value="<?php echo $that; ?>" />
        </td>
	    <tr><td>Date Needs <?php echo form_error('date_needs') ?></td>
            <td>
              <select name='date_needs' id="date_needs" class='selectpicker' onchange="getinput(this);">
                <option value='Segera'>Segera</option>
                <option value='Date' id='cek'>Date</option>
              </select>
              <input class="form-control" type="hidden" placeholder="YYYY-MM-DD" id="tes" onchange="setvalue(this);">
              <!--
              <input type="date" placeholder="YYYY-MM-DD" class="form-control" name="date_needs" id="date_needs" placeholder="Tanggal dibutuhkan" value="<?php echo $date_needs; ?>" />
              !-->
        </td>
      <tr><td>Information <?php echo form_error('information') ?></td>
          <td><textarea class="form-control" rows="3" name="information" id="information" placeholder="Keterangan"><?php echo $information; ?></textarea>
      </td></tr>
	    <input type="hidden" name="id_form" value="<?php echo $id_form; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('form') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

    <script type="text/javascript">
      

      function getinput(data){
        if(data.value == "Date"){
          document.getElementById("tes").type = "date";
          document.getElementById("tes").required = true;
          
            //document.body.appendChild(x);
        }else{
          document.getElementById("tes").type = "hidden";
        }
      }
      function setvalue(data){
        document.getElementById("cek").value = data.value;
        //var x = document.getElementById("cek").value;
        //alert(x);
      }
    </script>