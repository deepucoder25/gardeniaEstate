 <div class="col-sm-6">
    <div class="table_horizontal">
		<div class="custom_addon">
            <i class="fa fa-search" style="margin-right: 5px;"></i>
            <input type="text" ng-model="search_text" placeholder="Search here...">
		</div>
		<div class="admin-table-title">Records</div>
        <div class="table-data admin-table">
			<table class="table table-hover">
				<thead>
					<tr class="active">
						<th class="text-center">title</th>
						<th class="text-center">URL</th>
						<th class="text-center">Date</th>
						<th class="text-center">Time</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Image</th>
						<th class="text-center" style="width:85px">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr dir-paginate="y in datadb | filter: search_text | itemsPerPage: 3" >
						<td>{{y.title}}</td>
						<td>{{y.slug}}</td>
						<td>{{y.date}}</td>
						<td>{{y.time}}</td>
						<td>{{y.author}}</td>
						
						<td class="img-responsive text-center">
						    <img ng-if="y.image" ng-src="<?=base_url()?>assets/uploads/blog/thumb/{{y.image}}" style="height: 50px; border-radius: 4px;">
						</td>
						
						<td class="text-center">
						  <a href="javascript:void(0)" ng-click="update_call(y)" data-toggle="modal" data-target=".bs-example-modal-sm">
    						<span class="fa fa-pencil fa-2x"></span></a>
    						&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" ng-click="delete_data(y.b_id)">
    						<span class="fa fa-trash"></span></a>               
						</td>
					</tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-12">
            <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="app/pagination"></dir-pagination-controls>
        </div>
    </div>
</div>
