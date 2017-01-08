<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->module('template');
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />	
	<title>Dubimotors - Dashboard</title>
    <?=$this->template->headFiles();?>
    <style type="text/css">
    .span2 a img{
		width:50px;	
	}
    </style>
</head>

<body>
	<?=$this->template->header();?>
	<div class="container-fluid" id="content">
    	<?=$this->template->leftNavigation();?>	
        	
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Dashboard</h1>
					</div>
					<div class="pull-right">
						<ul class="minitiles">
							<li class='grey'>
								<a href="#"><i class="icon-cogs"></i></a>
							</li>
							<li class='lightgrey'>
								<a href="#"><i class="icon-globe"></i></a>
							</li>
						</ul>
						<ul class="stats">
							<li class='satgreen'>
								<i class="icon-money"></i>
								<div class="details">
									<span class="big">$324,12</span>
									<span>Balance</span>
								</div>
							</li>
							<li class='lightred'>
								<i class="icon-calendar"></i>
								<div class="details">
									<span class="big">February 22, 2013</span>
									<span>Wednesday, 13:56</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
                
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="more-login.html">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="index.html">Dashboard</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
                
				
				<div class="row-fluid">					
					<div class="span12">
						<div class="box box-color box-bordered">	
                        	<div class="box-title">
								<h3><i class="icon-user"></i>Management</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>						
							<div class="box-content nopadding">
                            		
                                <div class="span2" align="center" style="padding:10px;">
                                	<a href="" style="">
                                		<i class="fa fa-users fa-3x" aria-hidden="true"></i><br/>
                                        Manage Agents
                                   	</a>
                                </div>	
                                
                                <div class="span2" align="center" style="padding:10px;">
                                	<a href="" style="">
                                		<i class="fa fa-file-text fa-3x" aria-hidden="true"></i><br/>
                                    	Manage Content
                                   	</a>
                                </div>
                                <div class="span2" align="center" style="padding:10px;">
                                	<a href="" style="">
                                		<i class="fa fa-picture-o fa-3x" aria-hidden="true"></i><br/>
                                    	Manage Slider
                                   	</a>
                                </div>
                                <div class="span2" align="center" style="padding:10px;">
                                	<a href="" style="">
                                		<i class="fa fa-envelope-o fa-3x" aria-hidden="true"></i><br/>
                                    	Manage Email Templates
                                   	</a>
                                </div>	
                                <div class="span2" align="center" style="padding:10px;">
                                	<a href="" style="">
                                		<i class="fa fa-edit fa-3x" aria-hidden="true"></i><br/>
                                    	Manage Settings
                                   	</a>
                                </div>
							</div>
                                                                               
						</div>
					</div>
				</div>
                
                <div class="row-fluid">					
					<div class="span12">
						<div class="box box-color box-bordered">	
                        	<div class="box-title">
								<h3><i class="icon-user"></i>Reports</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>						
							
                            <div class="box-content nopadding" style="border-bottom:none;">
                                <div class="span2" align="center" style="padding:10px;">
                                	<a href="" style="">
                                		<i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i><br/>
                                    	Manage Website Visitors
                                   	</a>
                                </div>
                                <div class="span2" align="center" style="padding:10px;">
                                	<a href="" style="">
                                		<i class="fa fa-area-chart fa-3x" aria-hidden="true"></i><br/>
                                    	Manage Activity Log
                                   	</a>
                                </div>
                                	
							</div>
                            
						</div>
					</div>
				</div>
				
				<div class="row-fluid">					
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3><i class="icon-user"></i>Recently Added</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content nopadding scrollable" data-height="300" data-visible="true">
								<table class="table table-user table-nohead">
									<tbody>
										<tr class="alpha">
											<td class="alpha-val">
												<span>B</span>
											</td>
											<td colspan="2"></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-1.jpg" alt=""></td>
											<td class='user'>Bi Doe</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-2.jpg" alt=""></td>
											<td class='user'>Boo Doe</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr class="alpha">
											<td class="alpha-val">
												<span>D</span>
											</td>
											<td colspan="3"></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-3.jpg" alt=""></td>
											<td class='user'>Dan Doe</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-4.jpg" alt=""></td>
											<td class='user'>Dane Doe</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr class="alpha">
											<td class="alpha-val">
												<span>H</span>
											</td>
											<td colspan="3"></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-3.jpg" alt=""></td>
											<td class='user'>Hilda N. Ervin</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr class="alpha">
											<td class="alpha-val">
												<span>J</span>
											</td>
											<td colspan="3"></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-5.jpg" alt=""></td>
											<td class='user'>John Doe</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-6.jpg" alt=""></td>
											<td class='user'>John Doe</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr class="alpha">
											<td class="alpha-val">
												<span>L</span>
											</td>
											<td colspan="3"></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-5.jpg" alt=""></td>
											<td class='user'>Laura J. Brown</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-6.jpg" alt=""></td>
											<td class='user'>Lilly J. Tooley</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr class="alpha">
											<td class="alpha-val">
												<span>M</span>
											</td>
											<td colspan="3"></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-1.jpg" alt=""></td>
											<td class='user'>Maxi Doe</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-2.jpg" alt=""></td>
											<td class='user'>Max Doe</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr class="alpha">
											<td class="alpha-val">
												<span>O</span>
											</td>
											<td colspan="3"></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-1.jpg" alt=""></td>
											<td class='user'>Oxx Doe</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-2.jpg" alt=""></td>
											<td class='user'>Osam Doe</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr class="alpha">
											<td class="alpha-val">
												<span>P</span>
											</td>
											<td colspan="3"></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-1.jpg" alt=""></td>
											<td class='user'>Petra Doe</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
										<tr>
											<td class='img'><img src="img/demo/user-2.jpg" alt=""></td>
											<td class='user'>Per Doe</td>
											<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
   	</div>		
</body>
</html>