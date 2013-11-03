<!DOCTYPE html>
<html>
    <head>
        <title>Easy Morning</title>
        <link rel='stylesheet' type='text/css' href='../style.css' />
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
    <table class="table table-striped" id="table_div">
        <thead>  
          <tr>  
            <th>ID</th>  
            <th>Name</th>  
            <th>Date</th>  
          </tr>  
        </thead>
        <tbody>
        </tbody>
    </table>
    <div><input type="text" id="prev" placeholder="prev"></div>
    <div><button id="download" class="btn btn-primary" type="button">Download EasyFM Today</button></div>  
    <p><div class='result'></div></p>
    <script src="../jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            /*var data = { "programs" : [{
                   "ID" : 1,
                   "Name" : 'ezm130816.mp3',
                   "Date" : 20130816
                },
                {
                   "ID" : 2,
                   "Name" : 'ezm130816.mp3',
                   "Date" : 20130816
                }]
            };
	   */
           $('#download').on('click', function(e) {
               console.log('download');
               var prev_days = document.getElementById("prev").value;
               $.get('./download.php?prev=' + prev_days, function(data) {
                  $('.result').html(data);
                  console.log('Load was performed.');
               }); 
	   });

            
           $.getJSON('./getdata.php').done(function(data) {
               //console.log(data);
               $.each(data.programs, function() {
                  $('#table_div > tbody:last').append('<tr><td>'+this.ID+'</td><td><a href=\"' + this.Name + "\">" + this.Name + '</a></td><td>' + this.Date  + '</td></tr>');
             }); 
           }).fail(function( jqxhr, textStatus, error ) {
  var err = textStatus + ', ' + error;
  //console.log( "Request Failed: " + err);
});
        });
    </script>
</body>
</html>





