function actionClick(link){
		var ligneId  = $('.row_selected td:first').attr("id");
		var action = link.attr('href');
		if (!link.hasClass("noid")){
			if (!ligneId) {
				alert('Pas de selection!');
				return false;
			}
			if (link.hasClass("confirm")){
				if (!confirm('Supprimer?')){
					return false;
				}
			}
			ligneId =ligneId.substring(3);
			window.location = action+'/'+ligneId;
		} else {
			window.location =action;
		}
}



function ajaxLoad(url,model) {
			var form_data = $("#F"+model).serializeArray();
			$('#C000'+model).load(url, form_data, 
				function(response, status, xhr) {
				  if (status == "error") {
					var msg = "Il y a eu une erreur; ";
					alert(msg + xhr.status + " " + xhr.statusText);
				  }
				  else{
						initDatatable();
				  }
				} 
			);
}

function initDatatable(){
		$('*[rel=datatable]').dataTable ({
					"sScrollY": "400px",
					"bFilter": false,
					"bSort": false ,
					"bPaginate": false,
					"bInfo": false,
					//"bAutoWidth": false,
					"sScrollX": "100%"
				//	"sScrollXInner": "110%"

				});
}	
	

var slate = {};

slate = function ()
{
	var pub = {};
	var self = {};
	
	
	
	
	pub.init = function ()
	{	$(".form input:checkbox, .form input:radio, .form input:file").uniform();
		/*Data Table function*/
		initDatatable();
		$('.select tbody tr').live ('click' , function () { 
			$('.select tbody tr').each(function (){
					$(this).removeClass('row_selected');
			});
			$(this).toggleClass('row_selected');
		});	
		$('.multiselect tbody tr').live ('click' , function () { 
			$(this).toggleClass('row_selected');
		});
		$('#actions a').live ('click' , function () { 
				actionClick($(this));
				return false;
		});	
		$('.sortTable  th a').live ('click' , function () { 
				var myTable = $(this).parents('div[id^="C000"]');
			    model =myTable.attr("id");
				model =model.substring(4);
				url = $(this).attr("href");
				ajaxLoad(url,model);
				return false;
		});	
		
		
		
		
	}
	
	return pub;
	
}();