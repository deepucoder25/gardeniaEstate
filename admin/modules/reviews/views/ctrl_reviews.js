//blank line is required
app.controller('ctrl_reviews',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$http.get("reviews/view_data").success(function(data){
		$scope.datadb=data;
	})
	$scope.editForm={};
	$scope.update=function(rid,st){
		$http.get("reviews/save?id="+rid+"&status="+st).success(function(data){
			console.log(data);
			messages("success", "Success!","Review Updated Successfully", 3000);
		})
	}
	$scope.openEdit=function(r){
		$scope.editForm={
			r_id: r.r_id,
			name: r.unm,
			email: r.email,
			stars: r.rt,
			r_title: r.t,
			r_desc: r.cmt,
			r_type: r.ty,
			admin_reply: r.ar,
			status: r.st
		};
		$("#reviewEditModal").modal("show");
	}
	$scope.saveEdit=function(){
		var fd = new FormData();
		angular.forEach($scope.editForm, function(val, key){
			fd.append(key, val);
		});
		$http.post("reviews/update_data", fd, {
			transformRequest: angular.identity,
			headers: {'Content-Type': undefined}
		}).success(function(data){
			$("#reviewEditModal").modal("hide");
			$http.get("reviews/view_data").success(function(data){
				$scope.datadb=data;
			})
			messages("success", "Success!","Review Updated Successfully", 3000);
		})
	}
	$scope.deleteReview=function(rid){
		if(confirm("Delete this review? This cannot be undone.")){
			$http.get("reviews/delete_data?id="+rid).success(function(data){
				$http.get("reviews/view_data").success(function(data){
					$scope.datadb=data;
				})
				messages("success", "Success!","Review Deleted Successfully", 3000);
			})
		}
	}
	
});
