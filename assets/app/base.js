

var lighthammer = {

	base_url: window.location,

	restart: function(_id){
		$(_id).DataTable().destroy();
	},

	grilla: function(_id,_url) {

		var dataTable = $(_id).DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": {
				url : _url,
				type: "post",
				error: function() {
					alert("horror");
				}
			}
		} );
	},



}
