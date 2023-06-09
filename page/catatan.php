<?php
//print_r($_POST);

if (!isset($_SESSION)) {

    session_start();
}
?>
<?php
$pdfDir = '../uploads/'; // Ganti dengan direktori tempat file PDF diunggah

    // Mendapatkan daftar file PDF di direktori
$pdfFiles = glob($pdfDir . '*.pdf');

if (count($pdfFiles) > 0) {
    echo "<h1>Daftar File PDF yang Diunggah</h1>";
    echo "<ul>";
    foreach ($pdfFiles as $pdfFile) {
        $fileName = basename($pdfFile);
        echo "<li><a href=\"$pdfFile\" target=\"_blank\">$fileName</a></li>";
    }
    echo "</ul>";
} else {
    echo "<p>Tidak ada file PDF yang diunggah.</p>";
}
?>
<div class="row">
           <div class="col-lg-2"> </div>
           <div class="col-lg-8 mb-5">
            <div class="card">
              <div class="card-header">
                <h4 class="card-heading text-center">CATATAN</h4>
              </div>
              <div style="overflow-x:auto;" class="card-body"> 
              <label class="col-md-9 form-label">Cari dengan tanggal atau suhu tubuh:</label>
                <div class="col-lg-4">
                  <input class="form-control" name="cari" id="cari"
                  type="text" placeholder="Ketik disini untuk pencarian..">
               </div> 
               <table>
                <td>
                    <a>Urutkan berdasar</a>
                    <select id="urut" onclick="urutkan(this)">
                        <option value="0">Tanggal</option>
                        <option value="1">Waktu</option>
                        <option value="2">Lokasi</option>
                        <option value="3">Suhu</option>
                    </select>
                    
                </td>
                </table>     
                <input id="id" name="id" value="<?php echo $_SESSION['admin']; ?>" hidden>                   
                <!-- <table class="table  table-hover " id="myTable">
                  <thead>
                    <tr>
                      <th>Tanggal </th>
                      <th>Waktu </th>
                      <th>Alamat </th>
                      <th>Lokasi Tujuan</th>
                      <th>Suhu</th>
                    </tr>
                  </thead>
                  
                    <tbody id="tampil">

                    </tbody>
                  
                </table> -->
              </div>
            </div>
           </div>
          <div class="col-lg-2"> </div>
</div>
<script src="main.js"></script>

<script type="text/javascript"> 
  $(document).ready(function() {

    $('input[name="cari"]').keyup(function(){ 
	    	var searchterm = $(this).val();
			
			if(searchterm.length > 1) {
				var match = $('tr.data-row:contains("' + searchterm + '")');
				var nomatch = $('tr.data-row:not(:contains("' + searchterm + '"))');				
				match.addClass('selected');
				nomatch.css("display", "none");
			} else {
				$('tr.data-row').css("display", "");
				$('tr.data-row').removeClass('selected');				
			}
    });

    data_tampil();
			
  });

  function data_tampil()
  {
    var id  = $("#id").val();
    $.ajax({
      url     : "crud/show_catatan.php",
      method  : "POST",
      data    : { 
                  id:id
                },
        success:function (data) {
        //alert(data); return;
        $("#tampil").html(data).refresh;
        }

      });

  }
 </script>
  