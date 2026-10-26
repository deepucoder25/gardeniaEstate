app.controller('ctrl_newly_launched', function($scope, $http, $templateCache) {
    // Clear AngularJS template cache for newly_launched so fresh view can load
    if ($templateCache) {
        $templateCache.remove('newly_launched');
    }

    $scope.projects = [];
    $scope.loading = false;
    $scope.baseUrl = (window.location.origin + window.location.pathname).replace(/\/myadmin\.php.*$/i, '') + '/';

    // Load projects dynamically from database JSON endpoint
    $scope.loadProjects = function() {
        $scope.loading = true;
        var url = 'newly_launched/get_projects_json?t=' + new Date().getTime();
        $http.get(url).then(function(res) {
            $scope.projects = res.data || [];
            $scope.loading = false;
        }, function(err) {
            $scope.loading = false;
            console.error("Failed to load projects", err);
        });
    };

    // Initial load
    $scope.loadProjects();

    // Toggle Active / Inactive
    $scope.toggleStatus = function(p) {
        $http.get('newly_launched/toggle_status/' + p.id + '?t=' + new Date().getTime()).then(function(res) {
            p.status = (p.status && p.status.toLowerCase() === 'active') ? 'Inactive' : 'Active';
            if (typeof messages === 'function') {
                messages("success", "Status Updated!", res.data || "Status updated", 2500);
            }
        }, function() {
            alert('Failed to update project status.');
        });
    };

    // Delete Project
    $scope.deleteProject = function(p) {
        if (!confirm("Are you sure you want to delete '" + p.name + "'?")) {
            return;
        }
        $http.get('newly_launched/delete_project/' + p.id + '?t=' + new Date().getTime()).then(function(res) {
            var idx = $scope.projects.indexOf(p);
            if (idx > -1) {
                $scope.projects.splice(idx, 1);
            }
            if (typeof messages === 'function') {
                messages("success", "Deleted!", "Project deleted successfully", 2500);
            }
        }, function() {
            alert('Failed to delete project.');
        });
    };

    // Edit Project - populate form
    $scope.editProject = function(p) {
        if (typeof editProjectData === 'function') {
            editProjectData(p);
        }
    };

    // Expose reload function to global window for jQuery AJAX callback
    window.refreshAngularProjectsList = function() {
        $scope.$applyAsync(function() {
            $scope.loadProjects();
        });
    };
});
