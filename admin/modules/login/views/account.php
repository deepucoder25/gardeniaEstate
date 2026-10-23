<div class="heading">
<ol class="breadcrumb">
 <li><a href="#/">Dashboard</a></li> 
<li><a href="javascript:void(0)">Account Settings</a></li>
</ol>
</div>


<div class="col-sm-12 well" style="padding: 10px 10px 20px 10px">
    <div class="row">
        <!-- Update Profile Section -->
        <div class="col-sm-6" style="border-right: 1px solid #ccc;">
            <h4 class="text-center">Update Profile</h4>
            <hr>
            <form class="admin-form" name="form_profile" id="form_profile" ng-submit="save_profile()">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" ng-model="profile_name" class="form-control" name="profile_name" placeholder="Enter Name" required ng-init="profile_name='<?=$this->session->userdata('name')?>'">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" ng-model="profile_username" class="form-control" name="profile_username" placeholder="Enter Username" required ng-init="profile_username='<?=$this->session->userdata('username')?>'">
                </div>
                <br>
                <div id="webprogress_profile" style="display: none">
                    <img src="<?=base_url("assets/images/progress/load1.gif")?>">
                </div>
                <div id="result_profile"></div>
                <button type="submit" id="submitbtn_profile" class="btn btn-info" ng-disabled="form_profile.$invalid">Update Profile</button>
            </form>
        </div>

        <!-- Change Password Section -->
        <div class="col-sm-6">
            <h4 class="text-center">Change Password</h4>
            <hr>
            <form class="admin-form" name="form1" id="form1" ng-submit="save_data()">
                <div class="form-group">
                    <label>Current Password </label>
                    <input class="form-control" ng-model="old" name="currentpass" id="currentpass" type="password" placeholder=" Enter Current Password" required>
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" ng-model="new" class="form-control" name="newpass" placeholder="Enter New Password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" ng-model="conf" class="form-control" name="cmpassword" placeholder="Confirm Your New Password" required>
                </div>
                <br>
                <div id="webprogress" style="display: none">
                    <img src="<?=base_url("assets/images/progress/load1.gif")?>">
                </div>
                <div id="result"></div>
                <button type="submit" id="submitbtn" class="btn btn-info" ng-disabled="form1.$invalid" accesskey="s">Change Password</button>
                <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a> 
            </form>
        </div>
    </div>
</div>

