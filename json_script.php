<script src="http://jquery-csv.googlecode.com/git/src/jquery.csv.js"></script>
<script>		
		//Reading file.csv
		$.ajax({
			        type: "GET",
			        url: "YourFile.csv",
						contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
			        success: function(data) {
			            Conversor(data,',');
			        },
	                error: function(jqxhr,textStatus,errorThrown)
	                    {
	                       alert(jqxhr + textStatus + errorThrown);

	                   //<--- All those logs/alerts, don't say anything helpful, how can I understand what error is going on? ---->

	                }
			    });
		//Function conversor
			$(document).ready(function() {
		    function Conversor( strData, strDelimiter ){

		    	var json_final = "";
		    	var column_info = new Array();
		    	var index_linha = 0;

		    	//Push data from CSV
		    	var line_info = {};
				var lines = strData.split(/\n/);                
					   $.each(lines, function( indexline, value ) {
					 	var column = value.split(strDelimiter);
					 	 $.each( column, function( index, value ) {
					 	 	if(index == 0){
					 	 		YouUrl = "http://yourul.com/server=live,email=" + value;
					 	 	}
					 	 	column_info[index] = value;
					 
					 	 })

					 	 	line_info[indexline] = {
					 	 		0: column_info[0],
					 	 		1: column_info[1],
					 	 		2: column_info[2],
					 	 		3: column_info[3],
					 	 		4: column_info[4],
					 	 		5: column_info[5],
					 	 		6: column_info[6],
					 	 		7: column_info[7],
					 	 		8: column_info[8],
					 	 		9: column_info[9]
					 	 	}

				//Get data from database through API 
					 	$.getJSON(YouUrl, function (data) {
			                        $.each(data.list, function (entryIndex, entry) {
			                        	
			                          	json_final += '{<br/>'
									       +'"column_database" : "'+ entry.column + '",<br/>'
										   +'"column_csv" : "'+ line_info[indexline][9] + '",<br/>}';

			                      });
					});
		    });
		};
</script>