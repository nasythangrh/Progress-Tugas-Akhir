$(document).ready(function(){
 $('#country').change(function(){
  var country_id = $('#country').val();
  if(country_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Grafik_tes/fetch_kabupaten",
    method:"POST",
    data:{country_id:country_id},
    success:function(data)
    {
     $('#state').html(data);
     $('#kecamatan').html('<option value="">Select kecamatan</option>');
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select Kabupaten</option>');
   $('#kecamatan').html('<option value="">Select Kecamatan</option>');
  }
 });

 $('#state').change(function(){
  var state_id = $('#state').val();
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Grafik_tes/fetch_kecamatan",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
     $('#kecamatan').html(data);
    }
   });
  }
  else
  {
   $('#kecamatan').html('<option value="">Select Kecamatan</option>');
  }
 });

 $('#kecamatan').change(function(){
  var kecamatan_id = $('#kecamatan').val();
  if(kecamatan_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Grafik_tes/fetch_kelurahan",
    method:"POST",
    data:{kecamatan_id:kecamatan_id},
    success:function(data)
    {
     $('#kelurahan').html(data);
    }
   });
  }
  else
  {
   $('#kelurahan').html('<option value="">Select Kelurahan</option>');
  }
 });

 $('#kelurahan').change(function(){
  var kelurahan_id = $('#kelurahan').val();
  if(kelurahan_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Grafik_tes/fetch_tps",
    method:"POST",
    data:{kelurahan_id:kelurahan_id},
    success:function(data)
    {
     $('#tps').html(data);
    }
   });
  }
  else
  {
   $('#tps').html('<option value="">Select TPS</option>');
  }
 });
 
});