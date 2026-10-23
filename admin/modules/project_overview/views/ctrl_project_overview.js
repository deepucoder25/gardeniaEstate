app.controller('ctrl_project_overview', function($scope, $http) {
    $scope.save_overview = function() {
        $("#btnsubmit_overview").html('<i class="fa fa-spinner fa-spin me-1"></i> Saving...');
        $("#btnsubmit_overview").prop('disabled', true);

        var form = document.getElementById('overview_form');
        var formData = new FormData(form);

        var handleSuccess = function(data) {
            var msg = (typeof data === 'string') ? data : (data && data.data ? data.data : 'Project Overview settings updated successfully!');
            $("#overview_result").html("<div class='alert alert-success rounded-3 shadow-sm mb-4'><i class='fa fa-check-circle me-1'></i> " + msg + "</div>");
            $("#btnsubmit_overview").html('<i class="fa fa-save me-1"></i> SAVE CHANGES');
            $("#btnsubmit_overview").prop('disabled', false);
            $('html, body').animate({
                scrollTop: $("#overview_result").offset().top - 100
            }, 300);
        };

        var handleError = function() {
            $("#overview_result").html("<div class='alert alert-danger rounded-3 shadow-sm mb-4'><i class='fa fa-exclamation-triangle me-1'></i> Server error occurred. Please try again.</div>");
            $("#btnsubmit_overview").html('<i class="fa fa-save me-1"></i> SAVE CHANGES');
            $("#btnsubmit_overview").prop('disabled', false);
        };

        var request = $http.post("project_overview/save_overview", formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        });

        if (request.success) {
            request.success(handleSuccess).error(handleError);
        } else if (request.then) {
            request.then(function(res) { handleSuccess(res.data); }, handleError);
        }
    };
});
