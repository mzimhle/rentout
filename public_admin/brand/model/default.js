
var oTable	= null;

$(document).ready(function() {
	getSearch();
});

function getSearch() {						
	var html		= '';
	
	/* Clear table contants first. */			
	$('#tableContent').html(''); 
	
	$('#tableContent').html('<table id="dataTable" border="0" cellspacing="0" cellpadding="0" width="100%"><thead><tr><th>Brand</th><th>Make</th><th>Name</th><th>Year</th></tr></thead><tbody><tr><td colspan="5"></td></tr></tbody></table>');	
		
	oTable = $('#dataTable').dataTable({					
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",							
		"bSort": false,
		"bFilter": false,
		"bInfo": false,
		"iDisplayStart": 0,
		"iDisplayLength": 20,				
		"bLengthChange": false,									
		"bProcessing": true,
		"bServerSide": true,		
		"sAjaxSource": "?action=tablesearch&search="+$('#search').val(),
		"fnServerData": function ( sSource, aoData, fnCallback ) {
			$.getJSON( sSource, aoData, function (json) {
					if (json.result === false) {
							$('#itembody').html('<tr><td colspan="4" align="center">There are currently no makes</td></tr>');											
					}
					fnCallback(json)
			});
		},
		"fnDrawCallback": function(){
		}
	});	
	return false;
}	