<div class="heading">
	<ol class="breadcrumb">
		<li><a href="#/">Dashboard</a></li> 
        <li><a href="javascript:void(0)" ng-click="refresh_albums()">Photo Gallery</a></li>
	</ol>
</div>

<div class="clearfix"></div>
<br>
<div class="col-sm-3">
 <form class="admin-form" name="form" id="form" method="post" action="">
 <div id="validation"></div>
 <br>
      
       <div class="form-group">
        <label for="title">Image Title (Optional)</label>
        <input type="text" class="form-control" id="title" name="title" ng-model="x.title" placeholder="Picture name">
      </div>
      
      <div class="form-group">
        <label for="file">Image</label>
        <input type="file" id="file" name="image">
        <p class="help-block" style="font-size:10px">For better user experiences, Upload resized images to load pages faster. (Recommended Size: 720px images) </p>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
          <button type="button" ng-disabled="form.$invalid" class="btn btn-primary btn-block" id="btnsubmit" ng-click="insert_data()" accesskey="u"><u><b>U</b></u>pload</button>
      </div>
      <br>
      <div id="result" class="pull-left"></div>
      <div class="form-group col-sm-2" id="webprogress" style="display: none">
            <img src="<?=base_url("assets/website/img/f.jpg")?>" class="img-responsive">
      </div>
 </form>
</div>

<div class="col-sm-9 gallery">
    <div class="input-group custom">
        <div class="input-group-addon info">?</div>
	     <input type="text" class="form-control" ng-model="search_text" placeholder="Search here...">
	</div>
    <div class="clearfix"></div>
    <hr>
    <div class="col-sm-3 col-xs-4" dir-paginate="x in datadb | filter: search_text | itemsPerPage: 8" style="height:260px"  paginate-id="gallery">
    <div  class="gallery_delete">
        <label style="font-size:10px">{{x.title}}</label>
        <div style="font-size:10px;margin-bottom:4px;">
            <span class="label label-success" ng-if="x.status=='1' || x.status==1">Show</span>
            <span class="label label-default" ng-if="x.status=='0' || x.status==0">Hide</span>
        </div>
        <img ng-src="<?=base_url("assets/uploads/gallery/thumb")?>/{{x.image}}" style="height:180px" class="img-responsive" style="object-fit:cover;">
        <a href="javascript:void(0)" ng-click="delete_data(x)" class="delete" style="opacity:1; transform:none; top:10px; right:10px; background:#e74c3c; border-radius:3px; padding:2px 8px;" title="Delete"><i class="fa fa-trash"></i></a>
        <a href="javascript:void(0)" ng-click="edit_data(x)" class="delete" style="opacity:1; transform:none; top:10px; right:45px; background:#f39c12; border-radius:3px; padding:2px 8px;" title="Edit"><i class="fa fa-pencil"></i></a>
        <a href="javascript:void(0)" ng-click="toggle_status(x)" class="delete" style="opacity:1; transform:none; top:10px; right:75px; background:#0d86c9; border-radius:3px; padding:2px 8px;" title="Show/Hide">{{(x.status=='1' || x.status==1) ? 'Hide' : 'Show'}}</a>
    </div>
    </div>
    <div class="col-sm-12">
        <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?=site_url('app/pagination')?>" paginate-id="gallery"></dir-pagination-controls>
    </div>
</div>


