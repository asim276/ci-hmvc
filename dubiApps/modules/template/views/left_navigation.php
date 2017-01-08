<style type="text/css">
#left .subnav{
	margin-top:0px !important;	
}

.custom_link{
	background:#F4F4F4;
	border:1px solid #E6E9ED;
	width:100%; padding:5px 0;
	display:block;
	border-bottom:none;
	color:#2a2a2a !important;
	font-size:14px;	
}
.selected{
	background:#CC0001;	
	text-decoration:none;
	color:#FFF !important;
}
.custom_link:hover{
	background:#CC0001;	
	text-decoration:none;
	color:#FFF !important;
}
</style>
<div id="left">
    <form action="search-results.html" method="GET" class='search-form'>
        <div class="search-pane">
            <input type="text" name="search" placeholder="Search here...">
            <button type="submit"><i class="icon-search"></i></button>
        </div>
    </form>
    <div class="subnav">
        <div class="subnav-title">
            <a href="#" class='subnav custom_link selected'> &nbsp; <img src="<?=base_url().'jic-repo/img/icons/dashboard.png'?>" width="17" /> Dashboard</a>
        </div>        
    </div>
    
    <div class="subnav">
        <div class="subnav-title">
            <a href="#" class='subnav custom_link'> &nbsp; <img src="<?=base_url().'jic-repo/img/icons/agents.png'?>" width="17" /> Agents</a>
        </div>        
    </div>
    
    <div class="subnav">
        <div class="subnav-title">
            <a href="#" class='subnav custom_link'> &nbsp; <img src="<?=base_url().'jic-repo/img/icons/content.png'?>" width="17" /> Content</a>
        </div>        
    </div>
    
    <div class="subnav">
        <div class="subnav-title">
            <a href="#" class='subnav custom_link'> &nbsp; <img src="<?=base_url().'jic-repo/img/icons/slider.png'?>" width="17" /> Slider</a>
        </div>        
    </div>
    
    <div class="subnav">
        <div class="subnav-title">
            <a href="#" class='subnav custom_link'> &nbsp; <img src="<?=base_url().'jic-repo/img/icons/email_templates.png'?>" width="17" /> Email Templates</a>
        </div>        
    </div>
    
    <div class="subnav">
        <div class="subnav-title">
            <a href="#" class='subnav custom_link'> &nbsp; <img src="<?=base_url().'jic-repo/img/icons/notifications.png'?>" width="17" /> Notifications</a>
        </div>        
    </div>
    
    <div class="subnav">
        <div class="subnav-title">
            <a href="#" class='subnav custom_link'> &nbsp; <img src="<?=base_url().'jic-repo/img/icons/activity_log.png'?>" width="17" /> Activity Log</a>
        </div>        
    </div>
    
    <div class="subnav">
        <div class="subnav-title">
            <a href="#" class='subnav custom_link'> &nbsp; <img src="<?=base_url().'jic-repo/img/icons/users.png'?>" width="17" /> Customers / Users</a>
        </div>        
    </div>
    
    <div class="subnav">
        <div class="subnav-title">
            <a href="#" class='subnav custom_link' style="border:1px solid #E6E9ED;"> &nbsp; <img src="<?=base_url().'jic-repo/img/icons/settings.png'?>" width="17" /> Settings</a>
        </div>        
    </div>    
</div>