app.controller('ctrl_timer', function($scope, $http) {
    $scope.save_timer = function() {
        $("#btnsubmit_timer").html('<i class="fa fa-spinner fa-spin"></i> Saving...');
        $("#btnsubmit_timer").prop('disabled', true);

        var form = document.getElementById('timer_form');
        var formData = new FormData(form);

        $http.post("timer/save_timer", formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).success(function(data) {
            $("#timer_result").html("<div class='alert alert-success'><i class='fa fa-check-circle me-1'></i> " + data + "</div>");
            $("#btnsubmit_timer").html('<i class="fa fa-save" style="margin-right:6px;"></i> Save Timer Settings');
            $("#btnsubmit_timer").prop('disabled', false);
        }).error(function() {
            $("#timer_result").html("<div class='alert alert-danger'>Server error occurred. Please try again.</div>");
            $("#btnsubmit_timer").html('<i class="fa fa-save" style="margin-right:6px;"></i> Save Timer Settings');
            $("#btnsubmit_timer").prop('disabled', false);
        });
    };
});
