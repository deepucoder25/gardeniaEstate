//blank line is required
app.controller('ctrl_booking',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$scope.loader=function(){
		$http.get("contact/view_booking").success(function(data){
			$scope.datadb=data;
			$scope.datadb.forEach(function(x){
				x.status = x.status || 'not_converted';
				x.drop_reason = x.drop_reason || '';
			});
		})
	}
	$scope.loader();
	
	$scope.update_call=function(y){
		$scope.x=y;
	}

	$scope.statusFilter = "";
	$scope.dateFilter = "";
	$scope.sortBy = "-timestamp";

	$scope.bookingFilter = function(item){
		if($scope.statusFilter && item.status !== $scope.statusFilter) return false;

		if($scope.dateFilter){
			var d = new Date(item.timestamp);
			if(isNaN(d.getTime())) return true;
			var now = new Date();
			if($scope.dateFilter === "this_month"){
				if(d.getMonth() !== now.getMonth() || d.getFullYear() !== now.getFullYear()) return false;
			}
			if($scope.dateFilter === "this_year"){
				if(d.getFullYear() !== now.getFullYear()) return false;
			}
		}
		return true;
	};

	$scope.updateBooking=function(item){
		var payload = $.param({
			id: item.id,
			status: item.status,
			drop_reason: item.drop_reason
		});
		$http.post("contact/update_booking", payload, {
			headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
		}).success(function(data){
			data = (data || '').toString().trim();
			if(data!="1"){
				messages("warning", "Warning!", data, 3000);
			}
		});
	};
	
	$scope.deleteBooking = function(id) {
		if (confirm("Are you sure you want to delete this booking?")) {
			$http.get("contact/delete_booking?id=" + id).success(function(data) {
				if (data.trim() == "1") {
					$scope.loader();
				} else {
					messages("warning", "Warning!", "Failed to delete booking.", 3000);
				}
			});
		}
	};
	
});
