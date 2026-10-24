<div class="heading">
	<ol class="breadcrumb">
		<li><a href="#/">Dashboard</a></li> 
        <li><a href="javascript:void(0)" ng-click="refresh_albums()">Video Gallery</a></li>
	</ol>
</div>

<div class="clearfix"></div>
<br>
<div class="col-sm-4">
 <form class="admin-form" name="form" id="form" method="post" action="">
 <div id="validation"></div>
 <br>
      
      <div class="form-group">
        <label for="video_url">YouTube/Vimeo Embed URL</label>
        <input type="text" class="form-control" id="video_url" name="video_url" ng-model="x.video_url" placeholder="https://www.youtube.com/embed/XXXX" required>
        <p class="help-block" style="font-size:10px">Paste the embed URL for your video.</p>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
          <button type="submit" ng-disabled="form.$invalid" class="btn btn-primary btn-block" id="btnsubmit" ng-click="insert_video()" accesskey="u"><u><b>A</b></u>dd Video</button>
      </div>
      <br>
      <div id="result" class="pull-left"></div>
 </form>
</div>

<div class="col-sm-8 gallery">
    <div class="input-group custom">
        <div class="input-group-addon info">?</div>
	     <input type="text" class="form-control" ng-model="search_text" placeholder="Search here...">
	</div>
    <div class="clearfix"></div>
    <hr>
    <div class="col-sm-4 col-xs-6" dir-paginate="x in datadb | filter: search_text | itemsPerPage: 6" style="height:260px"  paginate-id="gallery">
    <div  class="gallery_delete">
        <div style="font-size:10px;margin-bottom:4px;">
            <span class="label label-success" ng-if="x.status=='1' || x.status==1">Show</span>
            <span class="label label-default" ng-if="x.status=='0' || x.status==0">Hide</span>
        </div>
        <iframe ng-src="{{x.video_url | trustAsResourceUrl}}" style="width:100%;height:140px;border:none;"></iframe>
        <a href="javascript:void(0)" ng-click="delete_data(x)" class="delete">X</a>
        <a href="javascript:void(0)" ng-click="edit_data(x)" class="delete" style="right:48px;background:#f39c12;"><i class="fa fa-pencil"></i></a>
        <a href="javascript:void(0)" ng-click="toggle_status(x)" class="delete" style="right:24px;background:#0d86c9;">{{(x.status=='1' || x.status==1) ? 'H' : 'S'}}</a>
    </div>
    </div>
    <div class="col-sm-12">
        <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?=site_url('app/pagination')?>" paginate-id="gallery"></dir-pagination-controls>
    </div>
</div>
