//blank line is required
app.controller('ctrl_gallery',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$http.get("gallery/view_data").success(function(data){
		$scope.datadb=data;
	})
	$scope.filter_image=function(x){
		if(x=="0"){
			$scope.search_text="";
		}
		else{
			$scope.search_text=x;
		}
	}
	
	$scope.edit_data=function(x){
		$scope.x=x;
		$("#btnsubmit").html('<u><b>U</b></u>pdate');
		window.scrollTo(0, 0);
	}
	
	$scope.insert_data=function(){
		$("#btnsubmit").html('Please Wait...');
		$("#btnsubmit").prop('disabled',true);
		$('#webprogress').css('display','inline');
		
		var formData = new FormData();
		if ($scope.x && $scope.x.title) {
		    formData.append('title', $scope.x.title);
		}
		if ($scope.x && $scope.x.auto_id) {
		    formData.append('auto_id', $scope.x.auto_id);
		}
		var fileInput = document.getElementById('file');
		if (fileInput.files.length > 0) {
		    formData.append('image', fileInput.files[0]);
		}

		$http.post("gallery/image_upload", formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).success(function(data){
			console.log(data);
			if(data=="1")
			{
				$("#result").html("<div class='alert alert-success'>Image Uploaded Successfully</div>");
				$http.get("gallery/view_data").success(function(data){
					$scope.datadb=data;
				});
				$scope.x={};
				fileInput.value = "";
				$("#validation").html("");
			}
			else if(data=="0")
			{
				$("#result").html("<div class='alert alert-info'>No Data Affected</div>");
				$("#validation").html("");
			}
			else
			{
				$("#validation").html("<div class='alert alert-danger'>"+data+"</div>");
				$("#result").html("");
			}
			$('#webprogress').css('display','none');
			$("#btnsubmit").html('<u><b>U</b></u>pload');
			$("#btnsubmit").prop('disabled',false);
		}).error(function() {
		    $('#webprogress').css('display','none');
			$("#btnsubmit").html('<u><b>U</b></u>pload');
			$("#btnsubmit").prop('disabled',false);
			$("#validation").html("<div class='alert alert-danger'>Server error occurred.</div>");
		});
	};
	
	$scope.filter_new=function(){
		$scope.x={};
	}
	
	$scope.delete_data=function(x)
	{
		if(confirm("Are you Sure to DELETE ??"))
		{
			$http.get("gallery/delete_data?id="+x.auto_id).success(function(data){
				if(data=="1")
				{
					$("#result").html("<div class='alert alert-success'>Image Deleted Successfully</div>");
				}
				else
				{
					$("#result").html("<div class='alert alert-danger'>Image not Deleted</div>");
				}
				$http.get("gallery/view_data").success(function(data){
					$scope.datadb=data;
				})
			})
		}
	}
	$scope.toggle_status=function(x){
		var newStatus = (x.status=='1' || x.status==1) ? 0 : 1;
		$http.get("gallery/update_status?id="+x.auto_id+"&status="+newStatus).success(function(data){
			$http.get("gallery/view_data").success(function(data){
				$scope.datadb=data;
			})
		})
	}

});
