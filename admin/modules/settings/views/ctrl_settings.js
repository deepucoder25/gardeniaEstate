app.controller('ctrl_settings',function($scope,$http)
{
    $scope.update_settings = function() {
        $("#btnsubmit").html('Please Wait...');
        $("#btnsubmit").prop('disabled',true);
        
        var formData = new FormData();
        var logoFile = document.getElementById('site_logo').files[0];
        if (logoFile) {
            formData.append('site_logo', logoFile);
        }
        
        var faviconFile = document.getElementById('site_favicon').files[0];
        if (faviconFile) {
            formData.append('site_favicon', faviconFile);
        }
        
        var themeColor = document.getElementById('theme_color').value;
        if (themeColor) {
            formData.append('theme_color', themeColor);
        }
        
        var textColor = document.getElementById('text_color').value;
        if (textColor) {
            formData.append('text_color', textColor);
        }

        $http.post("settings/update", formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).success(function(data){
            $("#result").html("<div class='alert alert-success'>" + data + " Please refresh the page to see changes.</div>");
            $("#btnsubmit").html('Save Settings');
            $("#btnsubmit").prop('disabled',false);
            
            // clear form
            document.getElementById('site_logo').value = "";
            document.getElementById('site_favicon').value = "";
        }).error(function() {
            $("#result").html("<div class='alert alert-danger'>Server error occurred.</div>");
            $("#btnsubmit").html('Save Settings');
            $("#btnsubmit").prop('disabled',false);
        });
    };
    
    $scope.update_labels = function() {
        $("#btnsubmit_labels").html('Please Wait...');
        $("#btnsubmit_labels").prop('disabled',true);
        
        var form = document.getElementById('menu_form');
        var formData = new FormData(form);

        $http.post("settings/update_labels", formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).success(function(data){
            $("#result_labels").html("<div class='alert alert-success'>" + data + " Please refresh the page to see changes.</div>");
            $("#btnsubmit_labels").html('Save Labels');
            $("#btnsubmit_labels").prop('disabled',false);
        }).error(function() {
            $("#result_labels").html("<div class='alert alert-danger'>Server error occurred.</div>");
            $("#btnsubmit_labels").html('Save Labels');
            $("#btnsubmit_labels").prop('disabled',false);
        });
    };
});
