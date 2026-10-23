<div class="heading">
	<ol class="breadcrumb">
		<li><a href="#/">Dashboard</a></li> 
        <li><a href="javascript:void(0)" ng-click="refresh_albums()">Video Gallery</a></li>
	</ol>
</div>

<div class="clearfix"></div>
<br>
<div class="col-sm-4">
  <div style="background: #ffffff; border-radius: 12px; padding: 22px; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
    <form class="admin-form" name="form" id="form" method="post" action="">
      <div id="validation"></div>
      
      <div class="form-group">
        <label for="video_url" style="font-weight: 700; color: #094B32; margin-bottom: 8px;">YouTube / Vimeo Embed URL <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="video_url" name="video_url" ng-model="x.video_url" placeholder="https://www.youtube.com/embed/XXXX" required style="border-radius: 8px; padding: 11px 14px; border: 1px solid #cbd5e1;">
        <p class="help-block" style="font-size: 11px; color: #64748b; margin-top: 6px;">Paste the video embed link (e.g. <code>https://www.youtube.com/embed/bQoWe8vGM7I</code>)</p>
      </div>
      
      <div class="form-group" style="display: flex; gap: 8px; margin-bottom: 0;">
        <button type="submit" ng-disabled="form.$invalid" class="btn btn-success" id="btnsubmit" ng-click="insert_video()" accesskey="u" style="flex: 1; background: #094B32; border: none; padding: 11px; font-weight: 700; border-radius: 8px; box-shadow: 0 4px 12px rgba(9,75,50,0.25);">
          <u><b>A</b></u>dd Video
        </button>
        <button type="button" class="btn btn-default" ng-show="x.auto_id" ng-click="cancel_edit()" style="padding: 11px 16px; border-radius: 8px; font-weight: 600;">
          Cancel
        </button>
      </div>
      <div id="result" class="pull-left" style="width: 100%; margin-top: 12px;"></div>
    </form>
  </div>
</div>

<div class="col-sm-8 gallery">
    <div style="background: #ffffff; border-radius: 30px; border: 1px solid #e2e8f0; padding: 6px 18px; display: flex; align-items: center; margin-bottom: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
        <i class="fa fa-search" style="margin-right: 10px; color: #94a3b8; font-size: 14px;"></i>
        <input type="text" class="form-control" ng-model="search_text" placeholder="Search video gallery..." style="border: none; background: transparent; box-shadow: none; outline: none; padding: 6px 0;">
	</div>
    
    <div class="row">
        <div class="col-sm-6 col-xs-12 mb-4" dir-paginate="x in datadb | filter: search_text | itemsPerPage: 6" paginate-id="gallery">
            <div style="border-radius: 14px; border: 1px solid #e2e8f0; margin-bottom: 20px; padding: 16px; background: #ffffff; box-shadow: 0 4px 14px rgba(0,0,0,0.03);">
                
                <!-- Status Badge Header -->
                <div style="font-size: 12px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <span class="label label-success" ng-if="x.status=='1' || x.status==1" style="background: #10b981; padding: 4px 10px; border-radius: 20px; font-weight: 600;">Active</span>
                        <span class="label label-default" ng-if="x.status=='0' || x.status==0" style="background: #64748b; padding: 4px 10px; border-radius: 20px; font-weight: 600;">Hidden</span>
                    </div>
                    <small style="color: #94a3b8; font-weight: 600;">ID: #{{x.auto_id}}</small>
                </div>
                
                <!-- Video Preview Iframe -->
                <div style="border-radius: 10px; overflow: hidden; margin-bottom: 14px; background: #000000; box-shadow: inset 0 0 10px rgba(0,0,0,0.2);">
                    <iframe ng-src="{{x.video_url | trustAsResourceUrl}}" style="width: 100%; height: 160px; border: none; display: block;"></iframe>
                </div>
                
                <!-- Prominent Action Buttons Bar (Edit, Show/Hide, Delete) -->
                <div style="display: flex; gap: 8px;">
                    <button type="button" ng-click="edit_data(x)" class="btn btn-warning btn-sm" style="flex: 1; border-radius: 8px; font-weight: 700; background: #f59e0b; border: none; color: #ffffff; padding: 8px;" title="Edit Video URL">
                        <i class="fa fa-pencil me-1"></i> Edit
                    </button>
                    <button type="button" ng-click="toggle_status(x)" class="btn btn-info btn-sm" style="flex: 1; border-radius: 8px; font-weight: 700; background: #094B32; border: none; color: #ffffff; padding: 8px;" title="Toggle Visibility">
                        <i class="fa fa-eye me-1"></i> {{(x.status=='1' || x.status==1) ? 'Hide' : 'Show'}}
                    </button>
                    <button type="button" ng-click="delete_data(x)" class="btn btn-danger btn-sm" style="flex: 1; border-radius: 8px; font-weight: 700; background: #ef4444; border: none; color: #ffffff; padding: 8px;" title="Delete Video">
                        <i class="fa fa-trash me-1"></i> Delete
                    </button>
                </div>

            </div>
        </div>
    </div>
    
    <div class="col-sm-12">
        <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?=site_url('app/pagination')?>" paginate-id="gallery"></dir-pagination-controls>
    </div>
</div>
