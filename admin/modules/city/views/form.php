<div class="heading">
	<ol class="breadcrumb">
		<li><a href="#/">Dashboard</a></li>
		<li><a href="javascript:void(0)">City</a></li>
	</ol>
</div>

<div class="col-sm-12 well">
	<div class="col-sm-5" ng-class="{'col-sm-12': !showData}">
		<form class="admin-form" name="form1" id="form1" method="post" action=""
			autocomplete="off">
			<input name="b_id" ng-model="x.b_id" hidden>

			<div class="admin-stepper" ng-init="step='location'; showData=true">
				<button type="button" class="admin-step" ng-class="{'is-active': step==='location'}" ng-click="step='location'">Location</button>
				<button type="button" class="admin-step" ng-class="{'is-active': step==='content'}" ng-click="step='content'">Content</button>
				<button type="button" class="admin-step" ng-class="{'is-active': step==='contact'}" ng-click="step='contact'">Contact</button>
				<button type="button" class="admin-step" ng-class="{'is-active': step==='visibility'}" ng-click="step='visibility'">Visibility</button>
				<button type="button" class="admin-step" ng-class="{'is-active': step==='media'}" ng-click="step='media'">Media</button>
			</div>

			<div ng-show="step==='location'">
			<div class="clearfix"></div>
			<div class="col-sm-12">
				<div class="admin-section-title">Location</div>
			</div>
			<div class="col-sm-2 ">
				<label>State</label>
			</div>
			<div class="col-sm-10">
			<select name="state" class="form-control" ng-model="x.state">
					<option value=''>--Select--</option>
					<option >Andhra Pradesh</option>
					<option >Andaman and Nicobar Islands</option>
					<option >Arunachal Pradesh</option>
					<option >Assam</option>
					<option >Bihar</option>
					<option >Chandigarh</option>
					<option >Chhattisgarh</option>
					<option >Dadar and Nagar Haveli</option>
					<option >Daman and Diu</option>
					<option >Delhi</option>
					<option >Lakshadweep</option>
					<option >Puducherry</option>
					<option >Goa</option>
					<option >Gujarat</option>
					<option >Haryana</option>
					<option >Himachal Pradesh</option>
					<option >Jammu and Kashmir</option>
					<option >Jharkhand</option>
					<option>Karnataka</option>
					<option >Kerala</option>
					<option >Madhya Pradesh</option>
					<option >Maharashtra</option>
					<option>Manipur</option>
					<option >Meghalaya</option>
					<option >Mizoram</option>
					<option >Nagaland</option>
					<option>Odisha</option>
					<option >Punjab</option>
					<option >Rajasthan</option>
					<option >Sikkim</option>
					<option >Tamil Nadu</option>
					<option>Telangana</option>
					<option >Tripura</option>
					<option >Uttar Pradesh</option>
					<option >Uttarakhand</option>
					<option >West Bengal</option>
				</select>
			</div>
			<div class="clearfix"></div>

			<div class="col-sm-2 ">
				<label>City</label>
			</div>
			<div class="col-sm-10">
				<input name="city" class="form-control" ng-model="x.city" required autofocus>
			</div>
			</div>

			<div ng-show="step==='content'">
			<div class="clearfix"></div>
			<div class="col-sm-12">
				<div class="admin-section-title">Content</div>
			</div>
			<div class="col-sm-2 ">
				<label>Title</label>
			</div>
			<div class="col-sm-10">
				<input name="title" class="form-control" ng-model="x.title">
			</div>
			<div class="clearfix"></div>
			<div class="col-sm-2 ">
				<label>SEO Title</label>
			</div>
			<div class="col-sm-10">
				<input name="seo_title" class="form-control" ng-model="x.seo_title" placeholder="SEO title">
			</div>
			<div class="clearfix"></div>
			<div class="col-sm-2 ">
				<label>SEO Description</label>
			</div>
			<div class="col-sm-10">
				<textarea name="seo_desc" class="form-control" ng-model="x.seo_desc" rows="2" placeholder="SEO description"></textarea>
			</div>
			<div class="clearfix"></div>
			<div class="col-sm-2 ">
				<label>City content</label>  
			</div>
			<div class="col-sm-10">
				<summernote cpnfig="option" ng-model="x.content"></summernote>
				<textarea name="content" class="form-control"  ng-model="x.content" style="display: none;" ></textarea>
			</div>
			</div>

			<div ng-show="step==='contact'">
			<div class="clearfix"></div>
			<div class="col-sm-12">
				<div class="admin-section-title">Contact</div>
			</div>
			<div class="col-sm-2 ">
				<label>Phone</label>
			</div>
			<div class="col-sm-10">
				<input name="phone" class="form-control" ng-model="x.phone" >
			</div>

			<div class="clearfix"></div>
			<div class="col-sm-2 ">
				<label>Phone2</label>
			</div>
			<div class="col-sm-10">
				<input name="phone2" class="form-control" ng-model="x.phone2" >
			</div>

			<div class="clearfix"></div>
			<div class="col-sm-2 ">
				<label>Whatsapp</label>
			</div>
			<div class="col-sm-10">
				<input name="whatsapp" class="form-control" ng-model="x.whatsapp">
			</div>
			</div>
			
			<div ng-show="step==='visibility'">
			<div class="clearfix"></div>
			<div class="col-sm-12">
				<div class="admin-section-title">Visibility</div>
			</div>
			<div class="col-sm-5 ">
				<label class="checkarea">Status</label>
			</div>
			<div class="col-sm-2">
				<input type ="checkbox" class="form-check" name="status" ng-model="x.status" ng-true-value="'1'" ng-false-value="'0'">
				<span class="checkmark"></span>
			</div>
			</div>


			<div ng-show="step==='media'">
			<div class="clearfix"></div>
			<div class="col-sm-12">
				<div class="admin-section-title">Media</div>
			</div>
			<div class="col-sm-4">
				<input type="file" name="image" id="image">
				  <input ng-model="x.image" name="old_image" hidden>
				<p class="help-block" style="font-size: 12px">Select any picture to
					view on your branch.</p>
			</div>
              
				<div class="col-sm-3" ng-show="x.image">
					<img src="<?=base_url("assets/uploads/branches")?>/{{x.image}}" class="img-responsive" style="height: 150px;">
				</div>
			</div>
			
			<div class="clearfix"></div>

			<div class="col-sm-12">
				<div id="webprogress" style="display: none">
					<img src="<?=base_url()?>/assets/images/progress/load1.gif">
				</div>
				<button type="submit" id="submitbtn" accesskey="s"
					ng-click="save_data(x)" class="btn btn-info"
					ng-disabled="form1.$invalid">
					<u><b>S</b></u>ave
				</button>
				<a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a>
				<br>
				<br>
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
<style>
	.form-check{
	display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px double #fff;
    border-radius: 4px;
}

</style>

