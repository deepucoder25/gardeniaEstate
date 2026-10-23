<div class="col-sm-6">
    <div class="table_horizontal">
		<div class="custom_addon">
            <i class="fa fa-search" style="margin-right: 5px;"></i>
            <input type="text" ng-model="search_text" placeholder="Search albums...">
		</div>
		<div class="admin-table-title">Records</div>
        <div class="table-data admin-table">
            <div class="table-responsive" style="border:none;">
    			<table class="table table-hover" style="table-layout: fixed; min-width: 500px; width: 100%;">
    				<thead>
    					<tr class="active">
    						<th class="text-center" style="width: 35%;">Title</th>
    						<th class="text-center" style="width: 25%;">Image</th>
    						<th class="text-center" style="width: 15%;">Status</th>
    						<th class="text-center" style="width: 25%;">Action</th>
    					</tr>
    				</thead>
    				<tbody>
    				
    					<tr dir-paginate="z in albums | filter: search_text | itemsPerPage: 5" paginate-id="album">
    						<td style="word-wrap: break-word; white-space: normal;">{{z.title}}</td>
    						<td class="text-center">
    							<img ng-if="z.image" ng-src="<?= base_url() ?>assets/uploads/album/{{z.image}}" style="height: 45px; border-radius: 4px;">
    							<i ng-if="!z.image" class="text-muted">-</i>
    						</td>
    						<td class="text-center">
    							<span class="badge" style="background-color: #e53e3e;" ng-if="z.status=='0'">Hidden</span>
    							<span class="badge" style="background-color: #48bb78;" ng-if="z.status=='1'">Visible</span>
    						</td>
    						<td class="text-center">
    						  <a href="javascript:void(0)" ng-click="update_call(z)" title="Edit" style="margin-right: 15px;">
        						<span class="fa fa-pencil fa-2x"></span></a>
        					  <a href="javascript:void(0)" ng-click="delete_data(z.album_id)" title="Delete">
        						<span class="fa fa-trash"></span></a>               
    						</td>
    					</tr>
    				</tbody>
    			</table>
            </div>
        </div>
        <div class="col-sm-12" style="margin-top: 15px;">
            <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?=site_url('app/pagination')?>" paginate-id="album"></dir-pagination-controls>
        </div>
        
   </div>
</div>
