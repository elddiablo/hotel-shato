<div class="col-md-6" align="right">
  <label>Select Multiple Files</label>
 </div>
 <div class="col-md-6">
  <input type="file" name="files" id="files" multiple />
 </div>
 <div style="clear:both"></div>
 <br />
 <br />

 <div id="uploaded_images" class="row">
 	
 </div>


 <script>
$(document).ready(function(){
 $('#files').change(function(){
  var files = $('#files')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("files[]", files[count]);
   }
  }
  if(error == '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>upload_multiple/upload<?php echo "?table=". $table. "&id=". $id; ?>", //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
     $('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
    },
    success:function(data)
    {
     $('#uploaded_images').html(data);
     $('#files').val('');
    }
   })
  }
  else
  {
   alert(error);
  }
 });
});
</script>