<style>
/* Modern Admin Panel Overrides */
.heading { margin-bottom: 25px; }
.breadcrumb { background: transparent; padding: 0; font-size: 16px; font-weight: 600; color: #4361ee; }
.breadcrumb li a { color: #4361ee; text-decoration: none; transition: 0.3s; }
.breadcrumb li a:hover { color: #3f37c9; }

.modern-card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    padding: 30px;
    border: none;
    margin-bottom: 30px;
    transition: all 0.3s ease;
}

/* Stepper */
.admin-stepper {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 30px;
    border-bottom: 2px solid #edf2f9;
    padding-bottom: 15px;
}
.admin-step {
    background: #f8f9fa;
    border: none;
    padding: 10px 25px;
    border-radius: 30px;
    color: #6c757d;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: pointer;
}
.admin-step:hover {
    background: #e9ecef;
    color: #495057;
}
.admin-step.is-active {
    background: #4361ee;
    color: #fff;
    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
}

/* Form Controls */
.admin-section-title {
    font-size: 18px;
    font-weight: 700;
    color: #2b3445;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px dashed #e2e8f0;
}
.admin-form label {
    font-weight: 600;
    color: #4a5568;
    margin-top: 10px;
}
.admin-form .form-control {
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 12px 15px;
    box-shadow: none;
    transition: all 0.3s ease;
    background: #f8fafc;
}
.admin-form .form-control:focus {
    border-color: #4361ee;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
}

/* Buttons */
.btn-info {
    background: #4361ee;
    border: none;
    border-radius: 8px;
    padding: 10px 25px;
    font-weight: 600;
    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
    transition: all 0.3s ease;
}
.btn-info:hover {
    background: #3f37c9;
    box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
    transform: translateY(-2px);
}
.btn-default {
    background: #e2e8f0;
    border: none;
    border-radius: 8px;
    padding: 10px 25px;
    font-weight: 600;
    color: #4a5568;
    transition: all 0.3s ease;
}
.btn-default:hover {
    background: #cbd5e1;
    color: #1e293b;
}
.admin-data-toggle { margin-top: 20px; text-align: right; }
.admin-data-toggle .btn { border-radius: 30px; }

/* Table specific styles */
.admin-table-title {
    font-size: 18px;
    font-weight: 700;
    color: #2b3445;
    margin-bottom: 15px;
}
.custom_addon {
    background: #fff;
    border-radius: 30px;
    border: 1px solid #e2e8f0;
    padding: 5px 15px;
    display: flex;
    align-items: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    margin-bottom: 20px;
}
.custom_addon input {
    border: none;
    outline: none;
    width: 100%;
    padding: 8px 10px;
    background: transparent;
}
.custom_addon i { color: #a0aec0; }
.admin-table table {
    width: 100%;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    margin-bottom: 0;
}
.admin-table thead th {
    background: #f8fafc;
    color: #4a5568;
    font-weight: 600;
    border-bottom: 2px solid #edf2f9 !important;
    padding: 15px;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.5px;
}
.admin-table tbody td {
    padding: 15px;
    vertical-align: middle !important;
    border-bottom: 1px solid #f1f5f9;
    color: #475569;
}
.admin-table tbody tr:hover {
    background: #f8fafc;
}
.admin-table .fa-pencil { color: #4361ee; font-size: 18px; transition: 0.3s;}
.admin-table .fa-trash { color: #e53e3e; font-size: 18px; transition: 0.3s;}
.admin-table .fa-pencil:hover { color: #3f37c9; transform: scale(1.2); }
.admin-table .fa-trash:hover { color: #c53030; transform: scale(1.2); }

/* Form layout spacing */
.form-group { margin-bottom: 20px; }
.admin-form label { display: block; margin-bottom: 8px; font-weight: 600; color: #4a5568; }
</style>

<div class="heading">
	<ol class="breadcrumb">
		<li><a href="#/">Dashboard</a></li>
		<li><a href="javascript:void(0)">Album</a></li>
	</ol>
</div>

<div class="col-sm-12 modern-card" ng-controller="ctrl_album">
     <div class="col-sm-6" ng-class="{'col-sm-12': !showData}">
         <form class="admin-form" name="form2" id="form2" ng-submit="save_data(x)" enctype="multipart/form-data">
        
            <input type="text" name="id" ng-model="x.album_id" hidden>
			<div class="admin-stepper" ng-init="step='details'; showData=true">
				<button type="button" class="admin-step" ng-class="{'is-active': step==='details'}" ng-click="step='details'">Album Details</button>
			</div>
            <div id="validation2"></div>
			<div ng-show="step==='details'">
            <div class="admin-section-title">Details</div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>Album Title</label>
                <input ng-model="x.title" name="title" class="form-control" autofocus placeholder="Enter Album Title" required>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>Status (Show/Hide)</label>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" ng-model="x.status" value="1"
                      ng-init="x.status = (x.status === undefined || x.status === null || x.status === '') ? '1' : x.status"
                      ng-true-value="'1'" ng-false-value="'0'">
                    Show Album
                  </label>
                </div>
              </div>
            </div>
			<div class="col-lg-12">
              <div class="form-group">
                <label>Album Image</label>
                <input type="file" name="image" class="form-control" style="padding: 9px 15px;">
                <input ng-model="x.image" name="old_image" hidden>
                <div class="mt-3" ng-show="x.image">
                  <label>Current Image</label><br>
                  <img ng-src="<?=base_url('assets/uploads/album')?>/{{x.image}}" style="height:100px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                </div>
              </div>
            </div>
			</div>
           
            <div class="clearfix"></div>
            
            <div id="result2" class="pull-left"></div>
            <br>
            <div class="col-sm-12 form-actions" style="margin-top: 20px; display: flex; gap: 10px; border-top: 1px dashed #e2e8f0; padding-top: 20px;">
                <div id="webprogress2" style="display: none; margin-right: 10px;">
                    <img src="<?=base_url("assets/images/progress/load1.gif")?>" height="40">
                </div>
               <button type="submit" id="submitbtn2" accesskey="s" class="btn btn-info" ng-disabled="form2.$invalid"><u><b>S</b></u>ave Album</button>
               <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>ancel</a> 
            </div>
        </form>
    </div>
	<div class="admin-data-toggle">
		<button type="button" class="btn btn-default btn-xs" ng-click="showData=!showData">
			{{showData ? 'Hide Records' : 'Show Records'}}
		</button>
	</div>
	<div class="admin-data-panel" ng-show="showData">
		<?php 
		include 'data.php';
		?>
	</div>
</div>
