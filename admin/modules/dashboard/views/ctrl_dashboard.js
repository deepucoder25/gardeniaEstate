//blank line is required
app.controller('ctrl_dashboard',function($scope,$http)
{
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});

	$http.get("dashboard/fetch_cards_data").success(function(data)
	{
		$scope.logs=data['logs'] || 0;
		$scope.blog=data['blog'] || 0;
		$scope.bookings=data['bookings'] || 0;
		$scope.contact=data['contact'] || 0;
		$scope.reviews=data['reviews'] || 0;
//		$scope.video_row=data['video'];
//		$scope.album_row=data['album'];
//		$scope.admin_row=data['admin_profile'];
//		$scope.news_row=data['news'];
//		$scope.member_row=data['member'];
	})


});
