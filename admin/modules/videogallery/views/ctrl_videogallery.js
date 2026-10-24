//blank line is required
app.controller('ctrl_videogallery',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$http.get("videogallery/view_data").success(function(data){
		$scope.datadb=data;
	})
	
	$scope.insert_video=function(){
        $("#btnsubmit").text('Please Wait...');
        $("#btnsubmit").prop('disabled',true);
        
        var formData = new FormData();
        if ($scope.x.auto_id) {
            formData.append('auto_id', $scope.x.auto_id);
        }
        formData.append('video_url', $scope.x.video_url);

        $http.post("videogallery/video_upload", formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).success(function(data){
            if(data=="1")
            {
                $("#result").html("<div class='alert alert-success'>Video Saved Successfully</div>");
                $http.get("videogallery/view_data").success(function(data){
                    $scope.datadb=data;
                })
                $scope.x={};
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
            $("#btnsubmit").html('<u><b>A</b></u>dd Video');
            $("#btnsubmit").prop('disabled',false);
        }).error(function() {
            $("#btnsubmit").html('<u><b>A</b></u>dd Video');
            $("#btnsubmit").prop('disabled',false);
            $("#result").html("<div class='alert alert-danger'>Error submitting video.</div>");
        });
	};

    $scope.edit_data=function(x){
        $scope.x = angular.copy(x);
        $("#btnsubmit").html('<u><b>U</b></u>pdate Video');
        window.scrollTo(0, 0);
    };
	
	$scope.delete_data=function(x)
	{
		if(confirm("Are you Sure to DELETE ??"))
		{
			$http.get("videogallery/delete_data?id="+x.auto_id).success(function(data){
				if(data=="1")
				{
					$("#result").html("<div class='alert alert-success'>Video Deleted Successfully</div>");
				}
				else
				{
					$("#result").html("<div class='alert alert-danger'>Video not Deleted</div>");
				}
				$http.get("videogallery/view_data").success(function(data){
					$scope.datadb=data;
				})
			})
		}
	}
	$scope.toggle_status=function(x){
		var newStatus = (x.status=='1' || x.status==1) ? 0 : 1;
		$http.get("videogallery/update_status?id="+x.auto_id+"&status="+newStatus).success(function(data){
			$http.get("videogallery/view_data").success(function(data){
				$scope.datadb=data;
			})
		})
	}
});

app.filter('trustAsResourceUrl', ['$sce', function($sce) {
    return function(val) {
        return $sce.trustAsResourceUrl(val);
    };
}]);
