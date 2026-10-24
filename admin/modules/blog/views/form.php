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
		<li><a href="javascript:void(0)">blog</a></li>
	</ol>
</div>

<div class="col-sm-12 modern-card">
	<div class="col-sm-6" ng-class="{'col-sm-12': !showData}">
		<form class="admin-form" name="form1" id="form1" method="post" action=""
			autocomplete="off" enctype="multipart/form-data">
			<input name="b_id" ng-model="x.b_id" hidden>

			<div class="admin-stepper" ng-init="step='basic'; showData=true; showSeo=true">
				<button type="button" class="admin-step" ng-class="{'is-active': step==='basic'}" ng-click="step='basic'">Basic</button>
				<button type="button" class="admin-step" ng-class="{'is-active': step==='seo'}" ng-click="step='seo'">SEO</button>
				<button type="button" class="admin-step" ng-class="{'is-active': step==='content'}" ng-click="step='content'">Content</button>
				<button type="button" class="admin-step" ng-class="{'is-active': step==='publish'}" ng-click="step='publish'">Publish</button>
				<button type="button" class="admin-step" ng-class="{'is-active': step==='media'}" ng-click="step='media'">Media</button>
			</div>

			<div ng-show="step==='basic'">
				<div class="col-sm-12">
					<div class="admin-section-title">Basic Info</div>
				</div>
				<div class="col-sm-12 form-group">
					<label>Title</label>
					<input name="title" class="form-control" ng-model="x.title" required ng-keyup="slugify()">
				</div>
			</div>

			<div ng-show="step==='seo'">
				<div class="col-sm-12 d-flex align-items-center justify-content-between mb-3">
					<div class="admin-section-title mb-0">SEO</div>
					<a href="javascript:void(0)" class="btn btn-default btn-xs" ng-click="showSeo=!showSeo">
						{{showSeo ? 'Hide SEO' : 'Show SEO'}}
					</a>
				</div>
				<div ng-show="showSeo">
					<div class="col-sm-12 form-group">
						<label>Slug (URL)</label>
						<input name="slug" class="form-control" ng-model="x.slug" placeholder="auto-generated-if-empty">
					</div>
					<div class="col-sm-12 form-group">
						<label>Meta Title</label>
						<input name="meta_title" class="form-control" ng-model="x.meta_title" placeholder="SEO title">
					</div>
					<div class="col-sm-12 form-group">
						<label>Meta Description</label>
						<textarea name="meta_desc" class="form-control" ng-model="x.meta_desc" rows="3" placeholder="SEO description"></textarea>
					</div>
				</div>
			</div>

			<div ng-show="step==='content'">
				<div class="col-sm-12">
					<div class="admin-section-title">Content</div>
				</div>
				<div class="col-sm-12 form-group">
					<label>Description</label>
					<summernote config="options" ng-model="x.description"></summernote>
					<textarea name="description" ng-model="x.description" hidden></textarea>
				</div>
			</div>

			<div ng-show="step==='publish'">
				<div class="col-sm-12">
					<div class="admin-section-title">Publish Details</div>
				</div>
				<div class="col-sm-6 form-group">
					<label>Date</label>
					<input name="date" id="DOB1" class="form-control" ng-model="x.date" required>
				</div>
				<div class="col-sm-6 form-group">
					<label>Time</label>
					<input name="time" class="form-control" ng-model="x.time" required>
				</div>
			</div>

			<div ng-show="step==='media'">
				<div class="col-sm-12">
					<div class="admin-section-title">Media</div>
				</div>
				<div class="col-sm-6 form-group">
					<label>Author</label>
					<input name="author" class="form-control" ng-model="x.author" placeholder="Author name (optional)">
				</div>
				<div class="col-sm-6 form-group">
					<label>Tags/Keywords</label>
					<input name="tags" class="form-control" ng-model="x.tags" placeholder="keyword1, keyword2 (optional)">
				</div>
				<div class="col-sm-12 form-group" ng-if="x.url_type!='1'">
					<label>Select Image</label>
					<input type="file" name="image" class="form-control" style="padding: 9px 15px;">
					<input ng-model="x.image" name="old_image" hidden>
					<p class="help-block" style="font-size: 12px; margin-top: 5px;">Select any picture to view on your page.</p>
				</div>
				<div class="col-sm-12 form-group" ng-show="x.image">
					<label>Current Image</label>
					<div>
						<img src="<?=base_url("assets/uploads/blog/thumb")?>/{{x.image}}" class="img-responsive" style="height: 150px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
					</div>
				</div>
			</div>
			
			<div class="clearfix"></div>

			<div class="col-sm-12 form-actions" style="margin-top: 20px; display: flex; gap: 10px; border-top: 1px dashed #e2e8f0; padding-top: 20px;">
				<div id="webprogress" style="display: none; margin-right: 10px;">
					<img src="<?=base_url()?>assets/images/progress/load1.gif" height="40">
				</div>

				<!-- Previous Buttons -->
				<button type="button" class="btn btn-default" ng-click="step='basic'" ng-show="step==='seo'">
					<i class="fa fa-arrow-left"></i> Previous
				</button>
				<button type="button" class="btn btn-default" ng-click="step='seo'" ng-show="step==='content'">
					<i class="fa fa-arrow-left"></i> Previous
				</button>
				<button type="button" class="btn btn-default" ng-click="step='content'" ng-show="step==='publish'">
					<i class="fa fa-arrow-left"></i> Previous
				</button>
				<button type="button" class="btn btn-default" ng-click="step='publish'" ng-show="step==='media'">
					<i class="fa fa-arrow-left"></i> Previous
				</button>

				<!-- Next Buttons -->
				<button type="button" class="btn btn-info" ng-click="step='seo'" ng-show="step==='basic'">
					Next <i class="fa fa-arrow-right"></i>
				</button>
				<button type="button" class="btn btn-info" ng-click="step='content'" ng-show="step==='seo'">
					Next <i class="fa fa-arrow-right"></i>
				</button>
				<button type="button" class="btn btn-info" ng-click="step='publish'" ng-show="step==='content'">
					Next <i class="fa fa-arrow-right"></i>
				</button>
				<button type="button" class="btn btn-info" ng-click="step='media'" ng-show="step==='publish'">
					Next <i class="fa fa-arrow-right"></i>
				</button>

				<!-- Save Button -->
				<button type="submit" id="submitbtn" accesskey="s" ng-click="save_data(x)" class="btn btn-success" ng-show="!form1.$invalid" style="background: #10b981; border: none; color: white; padding: 10px 25px; border-radius: 8px; font-weight: 600; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);">
					<u><b>S</b></u>ave Blog
				</button>
				<a class="btn btn-default" accesskey="c" ng-click="filter_new()" ng-show="!form1.$invalid"><u><b>C</b></u>lear Form</a>
			</div>
		</form>
	</div>

	<div class="admin-data-toggle">
		<button type="button" class="btn btn-default btn-xs" ng-click="showData=!showData">
			{{showData ? 'Hide Records' : 'Show Records'}}
		</button>
	</div>
	<div class="admin-data-panel" ng-show="showData">
		<?php include 'data.php';?>
	</div>
   
</div>

