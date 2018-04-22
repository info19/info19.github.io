<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard &nbsp;&nbsp;&nbsp;</span></li>
							</ol>
					
						</div>
					</header>

<?php
//if(ini_get('safe_mode')){
//   echo '
//    <div class="alert alert-danger">
//		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
//		Safe Mode is enabled on your hosting and some functions of phpGuard PRO won\'t work.
//	</div>';
//}
?>
					
					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-12 col-xl-6">
							<section class="panel">
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<div class="chart-data-selector" id="salesSelectorWrapper">
												<h2>
													Statistics:
													<strong>
														<select class="form-control" id="salesSelector">
															<option value="all" selected>All Attacks</option>
															<option value="sqli">SQLi Attacks</option>
															<option value="mass-requests">Mass Requests</option>
                                                            <option value="proxies">Proxies</option>
                                                            <option value="spammers">Spammers</option>
														</select>
													</strong>
												</h2>

												<div id="salesSelectorItems" class="chart-data-selector-items mt-sm">
													<!-- Flot -->
													<div class="chart chart-sm" data-sales-rel="all" id="flotDashSales1" class="chart-active"></div>
<?php
$year = date('Y');

$date1  = "January $year";
$date2  = "February $year";
$date3  = "March $year";
$date4  = "April $year";
$date5  = "May $year";
$date6  = "June $year";
$date7  = "July $year";
$date8  = "August $year";
$date9  = "September $year";
$date10 = "October $year";
$date11 = "November $year";
$date12 = "December $year";

$table = $prefix . 'logs';

@$query1 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date1'");
@$count1 = mysqli_num_rows($query1);
@$query2 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date2'");
@$count2 = mysqli_num_rows($query2);
@$query3 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date3'");
@$count3 = mysqli_num_rows($query3);
@$query4 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date4'");
@$count4 = mysqli_num_rows($query4);
@$query5 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date5'");
@$count5 = mysqli_num_rows($query5);
@$query6 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date6'");
@$count6 = mysqli_num_rows($query6);
@$query7 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date7'");
@$count7 = mysqli_num_rows($query7);
@$query8 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date8'");
@$count8 = mysqli_num_rows($query8);
@$query9 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date9'");
@$count9 = mysqli_num_rows($query9);
@$query10 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date10'");
@$count10 = mysqli_num_rows($query10);
@$query11 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date11'");
@$count11 = mysqli_num_rows($query11);
@$query12 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date12'");
@$count12 = mysqli_num_rows($query12);
?>
                                                    <script>
														var flotDashSales1Data = [{
														    data: [
														        ["Jan", <?php
echo $count1;
?>],
														        ["Feb", <?php
echo $count2;
?>],
														        ["Mar", <?php
echo $count3;
?>],
														        ["Apr", <?php
echo $count4;
?>],
														        ["May", <?php
echo $count5;
?>],
														        ["Jun", <?php
echo $count6;
?>],
														        ["Jul", <?php
echo $count7;
?>],
														        ["Aug", <?php
echo $count8;
?>],
                                                                ["Sep", <?php
echo $count9;
?>],
                                                                ["Oct", <?php
echo $count10;
?>],
                                                                ["Nov", <?php
echo $count11;
?>],
                                                                ["Dec", <?php
echo $count12;
?>]
														    ],
														    color: "#0088cc"
														}];

													</script>

													<!-- Flot -->
													<div class="chart chart-sm" data-sales-rel="sqli" id="flotDashSales2" class="chart-hidden"></div>
<?php
$year = date('Y');

$date1  = "January $year";
$date2  = "February $year";
$date3  = "March $year";
$date4  = "April $year";
$date5  = "May $year";
$date6  = "June $year";
$date7  = "July $year";
$date8  = "August $year";
$date9  = "September $year";
$date10 = "October $year";
$date11 = "November $year";
$date12 = "December $year";

$table = $prefix . 'logs';

@$squery1 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date1' AND type='SQLi'");
@$scount1 = mysqli_num_rows($squery1);
@$squery2 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date2' AND type='SQLi'");
@$scount2 = mysqli_num_rows($squery2);
@$squery3 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date3' AND type='SQLi'");
@$scount3 = mysqli_num_rows($squery3);
@$squery4 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date4' AND type='SQLi'");
@$scount4 = mysqli_num_rows($squery4);
@$squery5 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date5' AND type='SQLi'");
@$scount5 = mysqli_num_rows($squery5);
@$squery6 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date6' AND type='SQLi'");
@$scount6 = mysqli_num_rows($squery6);
@$squery7 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date7' AND type='SQLi'");
@$scount7 = mysqli_num_rows($squery7);
@$squery8 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date8' AND type='SQLi'");
@$scount8 = mysqli_num_rows($squery8);
@$squery9 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date9' AND type='SQLi'");
@$scount9 = mysqli_num_rows($squery9);
@$squery10 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date10' AND type='SQLi'");
@$scount10 = mysqli_num_rows($squery10);
@$squery11 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date11' AND type='SQLi'");
@$scount11 = mysqli_num_rows($squery11);
@$squery12 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date12' AND type='SQLi'");
@$scount12 = mysqli_num_rows($squery12);
?>
                                                    <script>

														var flotDashSales2Data = [{
														    data: [
														        ["Jan", <?php
echo $scount1;
?>],
														        ["Feb", <?php
echo $scount2;
?>],
														        ["Mar", <?php
echo $scount3;
?>],
														        ["Apr", <?php
echo $scount4;
?>],
														        ["May", <?php
echo $scount5;
?>],
														        ["Jun", <?php
echo $scount6;
?>],
														        ["Jul", <?php
echo $scount7;
?>],
														        ["Aug", <?php
echo $scount8;
?>],
                                                                ["Sep", <?php
echo $scount9;
?>],
                                                                ["Oct", <?php
echo $scount10;
?>],
                                                                ["Nov", <?php
echo $scount11;
?>],
                                                                ["Dec", <?php
echo $scount12;
?>]
														    ],
														    color: "#2baab1"
														}];

													</script>

													<!-- Flot -->
													<div class="chart chart-sm" data-sales-rel="mass-requests" id="flotDashSales3" class="chart-hidden"></div>
<?php
$year = date('Y');

$date1  = "January $year";
$date2  = "February $year";
$date3  = "March $year";
$date4  = "April $year";
$date5  = "May $year";
$date6  = "June $year";
$date7  = "July $year";
$date8  = "August $year";
$date9  = "September $year";
$date10 = "October $year";
$date11 = "November $year";
$date12 = "December $year";

$table = $prefix . 'logs';

@$mrquery1 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date1' AND type='Mass Requests'");
@$mrcount1 = mysqli_num_rows($mrquery1);
@$mrquery2 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date2' AND type='Mass Requests'");
@$mrcount2 = mysqli_num_rows($mrquery2);
@$mrquery3 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date3' AND type='Mass Requests'");
@$mrcount3 = mysqli_num_rows($mrquery3);
@$mrquery4 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date4' AND type='Mass Requests'");
@$mrcount4 = mysqli_num_rows($mrquery4);
@$mrquery5 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date5' AND type='Mass Requests'");
@$mrcount5 = mysqli_num_rows($mrquery5);
@$mrquery6 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date6' AND type='Mass Requests'");
@$mrcount6 = mysqli_num_rows($mrquery6);
@$mrquery7 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date7' AND type='Mass Requests'");
@$mrcount7 = mysqli_num_rows($mrquery7);
@$mrquery8 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date8' AND type='Mass Requests'");
@$mrcount8 = mysqli_num_rows($mrquery8);
@$mrquery9 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date9' AND type='Mass Requests'");
@$mrcount9 = mysqli_num_rows($mrquery9);
@$mrquery10 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date10' AND type='Mass Requests'");
@$mrcount10 = mysqli_num_rows($mrquery10);
@$mrquery11 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date11' AND type='Mass Requests'");
@$mrcount11 = mysqli_num_rows($mrquery11);
@$mrquery12 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date12' AND type='Mass Requests'");
@$mrcount12 = mysqli_num_rows($mrquery12);
?>
                                                    <script>

														var flotDashSales3Data = [{
														    data: [
														        ["Jan", <?php
echo $mrcount1;
?>],
														        ["Feb", <?php
echo $mrcount2;
?>],
														        ["Mar", <?php
echo $mrcount3;
?>],
														        ["Apr", <?php
echo $mrcount4;
?>],
														        ["May", <?php
echo $mrcount5;
?>],
														        ["Jun", <?php
echo $mrcount6;
?>],
														        ["Jul", <?php
echo $mrcount7;
?>],
														        ["Aug", <?php
echo $mrcount8;
?>],
                                                                ["Sep", <?php
echo $mrcount9;
?>],
                                                                ["Oct", <?php
echo $mrcount10;
?>],
                                                                ["Nov", <?php
echo $mrcount11;
?>],
                                                                ["Dec", <?php
echo $mrcount12;
?>]
														    ],
														    color: "#e36159"
														}];

													</script>
                                                    
                                                    <!-- Flot -->
													<div class="chart chart-sm" data-sales-rel="proxies" id="flotDashSales4" class="chart-hidden"></div>
<?php
$year = date('Y');

$date1  = "January $year";
$date2  = "February $year";
$date3  = "March $year";
$date4  = "April $year";
$date5  = "May $year";
$date6  = "June $year";
$date7  = "July $year";
$date8  = "August $year";
$date9  = "September $year";
$date10 = "October $year";
$date11 = "November $year";
$date12 = "December $year";

$table = $prefix . 'logs';

@$pquery1 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date1' AND type='Proxy'");
@$pcount1 = mysqli_num_rows($pquery1);
@$pquery2 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date2' AND type='Proxy'");
@$pcount2 = mysqli_num_rows($pquery2);
@$pquery3 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date3' AND type='Proxy'");
@$pcount3 = mysqli_num_rows($pquery3);
@$pquery4 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date4' AND type='Proxy'");
@$pcount4 = mysqli_num_rows($pquery4);
@$pquery5 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date5' AND type='Proxy'");
@$pcount5 = mysqli_num_rows($pquery5);
@$pquery6 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date6' AND type='Proxy'");
@$pcount6 = mysqli_num_rows($pquery6);
@$pquery7 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date7' AND type='Proxy'");
@$pcount7 = mysqli_num_rows($pquery7);
@$pquery8 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date8' AND type='Proxy'");
@$pcount8 = mysqli_num_rows($pquery8);
@$pquery9 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date9' AND type='Proxy'");
@$pcount9 = mysqli_num_rows($pquery9);
@$pquery10 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date10' AND type='Proxy'");
@$pcount10 = mysqli_num_rows($pquery10);
@$pquery11 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date11' AND type='Proxy'");
@$pcount11 = mysqli_num_rows($pquery11);
@$pquery12 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date12' AND type='Proxy'");
@$pcount12 = mysqli_num_rows($pquery12);
?>
                                                    <script>

														var flotDashSales4Data = [{
														    data: [
														        ["Jan", <?php
echo $pcount1;
?>],
														        ["Feb", <?php
echo $pcount2;
?>],
														        ["Mar", <?php
echo $pcount3;
?>],
														        ["Apr", <?php
echo $pcount4;
?>],
														        ["May", <?php
echo $pcount5;
?>],
														        ["Jun", <?php
echo $pcount6;
?>],
														        ["Jul", <?php
echo $pcount7;
?>],
														        ["Aug", <?php
echo $pcount8;
?>],
                                                                ["Sep", <?php
echo $pcount9;
?>],
                                                                ["Oct", <?php
echo $pcount10;
?>],
                                                                ["Nov", <?php
echo $pcount11;
?>],
                                                                ["Dec", <?php
echo $pcount12;
?>]
														    ],
														    color: "#734ba9"
														}];

													</script>
                                                    
                                                    <!-- Flot -->
													<div class="chart chart-sm" data-sales-rel="spammers" id="flotDashSales5" class="chart-hidden"></div>
<?php
$year = date('Y');

$date1  = "January $year";
$date2  = "February $year";
$date3  = "March $year";
$date4  = "April $year";
$date5  = "May $year";
$date6  = "June $year";
$date7  = "July $year";
$date8  = "August $year";
$date9  = "September $year";
$date10 = "October $year";
$date11 = "November $year";
$date12 = "December $year";

$table = $prefix . 'logs';

@$spquery1 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date1' AND type='Spammer'");
@$spcount1 = mysqli_num_rows($spquery1);
@$spquery2 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date2' AND type='Spammer'");
@$spcount2 = mysqli_num_rows($spquery2);
@$spquery3 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date3' AND type='Spammer'");
@$spcount3 = mysqli_num_rows($spquery3);
@$spquery4 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date4' AND type='Spammer'");
@$spcount4 = mysqli_num_rows($spquery4);
@$spquery5 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date5' AND type='Spammer'");
@$spcount5 = mysqli_num_rows($spquery5);
@$spquery6 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date6' AND type='Spammer'");
@$spcount6 = mysqli_num_rows($spquery6);
@$spquery7 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date7' AND type='Spammer'");
@$spcount7 = mysqli_num_rows($spquery7);
@$spquery8 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date8' AND type='Spammer'");
@$spcount8 = mysqli_num_rows($spquery8);
@$spquery9 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date9' AND type='Spammer'");
@$spcount9 = mysqli_num_rows($spquery9);
@$spquery10 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date10' AND type='Spammer'");
@$spcount10 = mysqli_num_rows($spquery10);
@$spquery11 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date11' AND type='Spammer'");
@$spcount11 = mysqli_num_rows($spquery11);
@$spquery12 = mysqli_query($connect, "SELECT * FROM $table WHERE date LIKE '%$date12' AND type='Spammer'");
@$spcount12 = mysqli_num_rows($spquery12);
?>
                                                    <script>

														var flotDashSales5Data = [{
														    data: [
														        ["Jan", <?php
echo $spcount1;
?>],
														        ["Feb", <?php
echo $spcount2;
?>],
														        ["Mar", <?php
echo $spcount3;
?>],
														        ["Apr", <?php
echo $spcount4;
?>],
														        ["May", <?php
echo $spcount5;
?>],
														        ["Jun", <?php
echo $spcount6;
?>],
														        ["Jul", <?php
echo $spcount7;
?>],
														        ["Aug", <?php
echo $spcount8;
?>],
                                                                ["Sep", <?php
echo $spcount9;
?>],
                                                                ["Oct", <?php
echo $spcount10;
?>],
                                                                ["Nov", <?php
echo $spcount11;
?>],
                                                                ["Dec", <?php
echo $spcount12;
?>]
														    ],
														    color: "#47a447"
														}];

													</script>
												</div>

											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-code"></i>
													</div>
												</div>
<?php
$date  = date('d F Y');
$table = $prefix . 'logs';
@$query = mysqli_query($connect, "SELECT * FROM $table WHERE type='SQLi'");
@$query2 = mysqli_query($connect, "SELECT * FROM $table WHERE date='$date' AND type='SQLi'");
@$count = mysqli_num_rows($query);
@$count2 = mysqli_num_rows($query2);
?>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">SQL Injection Attacks</h4>
														<div class="info">
															<strong class="amount"><?php
echo $count;
?></strong>
															<span class="text-primary">(<?php
echo $count2;
?> today)</span>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="sqli-logs">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-secondary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-retweet"></i>
													</div>
												</div>
<?php
$date  = date('d F Y');
$table = $prefix . 'logs';
@$query = mysqli_query($connect, "SELECT * FROM $table WHERE type='Mass Requests'");
@$query2 = mysqli_query($connect, "SELECT * FROM $table WHERE date='$date' AND type='Mass Requests'");
@$count = mysqli_num_rows($query);
@$count2 = mysqli_num_rows($query2);
?>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Mass Requests</h4>
														<div class="info">
															<strong class="amount"><?php
echo $count;
?></strong>
                                                            <span class="text-primary">(<?php
echo $count2;
?> today)</span>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="massrequest-logs">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-globe"></i>
													</div>
												</div>
<?php
$date  = date('d F Y');
$table = $prefix . 'logs';
@$query = mysqli_query($connect, "SELECT * FROM $table WHERE type='Proxy'");
@$query2 = mysqli_query($connect, "SELECT * FROM $table WHERE date='$date' AND type='Proxy'");
@$count = mysqli_num_rows($query);
@$count2 = mysqli_num_rows($query2);
?>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Proxies</h4>
														<div class="info">
															<strong class="amount"><?php
echo $count;
?></strong>
                                                            <span class="text-primary">(<?php
echo $count2;
?> today)</span>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="proxy-logs">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-keyboard-o"></i>
													</div>
												</div>
<?php
$date  = date('d F Y');
$table = $prefix . 'logs';
@$query = mysqli_query($connect, "SELECT * FROM $table WHERE type='Spammer'");
@$query2 = mysqli_query($connect, "SELECT * FROM $table WHERE date='$date' AND type='Spammer'");
@$count = mysqli_num_rows($query);
@$count2 = mysqli_num_rows($query2);
?>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Spammers</h4>
														<div class="info">
															<strong class="amount"><?php
echo $count;
?></strong>
                                                            <span class="text-primary">(<?php
echo $count2;
?> today)</span>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="spammer-logs">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-12">
                             <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Modules & Functions</h2>
									<p class="panel-subtitle">Monitoring of all enabled and disabled Modules & Functions.</p>
								</header>
								<div class="panel-body">
									
                                    					<div class="row">
					<div class="col-md-3">
                        <div class="well">
						    <center>
							<h3><i class="fa fa-cog"></i> &nbsp;Security Modules</h3>
                            </center>
						</div>
					</div>
					<div class="col-md-2">
                        <div class="well">
						    <center>
							<b><i class="fa fa-code"></i> SQL Injection</b><br />Protection
<?php
$table = $prefix . 'sqli-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['protection'] == 'Yes') {
    echo '
					        <h3><span class="label label-success"><i class="fa fa-check"></i> ON</span></h3>
';
} else {
    echo '
                            <h3><span class="label label-danger"><i class="fa fa-times"></i> OFF</span></h3>
';
}
?>
                            </center>							
						</div>
					</div>
					<div class="col-md-2">
                        <div class="well">
						    <center>
							<b><i class="fa fa-globe"></i> Proxy</b><br />Protection 
<?php
$table = $prefix . 'proxy-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['protection'] == 'Yes') {
    echo '
					        <h3><span class="label label-success"><i class="fa fa-check"></i> ON</span></h3>
';
} else {
    echo '
                            <h3><span class="label label-danger"><i class="fa fa-times"></i> OFF</span></h3>
';
}
?>
                            </center>
						</div>
					</div>
                    <div class="col-md-2">
                        <div class="well">
						    <center>
							<b><i class="fa fa-retweet"></i> Mass Requests</b><br />Protection
<?php
$table = $prefix . 'massrequests-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['protection'] == 'Yes') {
    echo '
					        <h3><span class="label label-success"><i class="fa fa-check"></i> ON</span></h3>
';
} else {
    echo '
                            <h3><span class="label label-danger"><i class="fa fa-times"></i> OFF</span></h3>
';
}
?>
                            </center>
						</div>
					</div>
					<div class="col-md-2">
                        <div class="well">
						    <center>
							<b><i class="fa fa-keyboard-o"></i> Spam</b><br />Protection 
<?php
$table = $prefix . 'spam-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['protection'] == 'Yes') {
    echo '
					        <h3><span class="label label-success"><i class="fa fa-check"></i> ON</span></h3>
';
} else {
    echo '
                            <h3><span class="label label-danger"><i class="fa fa-times"></i> OFF</span></h3>
';
}
?>
                            </center>
						</div>
					</div>
					</div>
					
					<div class="row">
					<div class="col-md-3">
                        <div class="well">
						    <center>
							<h3><i class="fa fa-list-ul"></i> &nbsp;Logging Settings</h3>
                            </center>
						</div>
					</div>
					<div class="col-md-2">
                        <div class="well">
						    <center>
							<b><i class="fa fa-code"></i> SQL Injection</b><br />Logging
<?php
$table = $prefix . 'sqli-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['logging'] == 'Yes') {
    echo '
					        <h3><span class="label label-success"><i class="fa fa-check"></i> ON</span></h3>
';
} else {
    echo '
                            <h3><span class="label label-danger"><i class="fa fa-times"></i> OFF</span></h3>
';
}
?>
                            </center>							
						</div>
					</div>
					<div class="col-md-2">
                        <div class="well">
						    <center>
							<b><i class="fa fa-globe"></i> Proxy</b><br />Logging 
<?php
$table = $prefix . 'proxy-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['logging'] == 'Yes') {
    echo '
					        <h3><span class="label label-success"><i class="fa fa-check"></i> ON</span></h3>
';
} else {
    echo '
                            <h3><span class="label label-danger"><i class="fa fa-times"></i> OFF</span></h3>
';
}
?>
                            </center>
						</div>
					</div>
                    <div class="col-md-2">
                        <div class="well">
						    <center>
							<b><i class="fa fa-retweet"></i> Mass Requests</b><br />Logging
<?php
$table = $prefix . 'massrequests-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['logging'] == 'Yes') {
    echo '
					        <h3><span class="label label-success"><i class="fa fa-check"></i> ON</span></h3>
';
} else {
    echo '
                            <h3><span class="label label-danger"><i class="fa fa-times"></i> OFF</span></h3>
';
}
?>
                            </center>
						</div>
					</div>
					<div class="col-md-2">
                        <div class="well">
						    <center>
							<b><i class="fa fa-keyboard-o"></i> Spam</b><br />Logging
<?php
$table = $prefix . 'spam-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['logging'] == 'Yes') {
    echo '
					        <h3><span class="label label-success"><i class="fa fa-check"></i> ON</span></h3>
';
} else {
    echo '
                            <h3><span class="label label-danger"><i class="fa fa-times"></i> OFF</span></h3>
';
}
?>
                            </center>
						</div>
					</div>
					</div>
					
					<div class="row">
					<div class="col-md-3">
                        <div class="well">
						    <center>
							<h3><i class="fa fa-ban"></i> &nbsp;AutoBan Settings</h3>
                            </center>
						</div>
					</div>
					<div class="col-md-2">
                        <div class="well">
						    <center>
							<b><i class="fa fa-code"></i> SQL Injection</b><br />AutoBan
<?php
$table = $prefix . 'sqli-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['autoban'] == 'Yes') {
    echo '
					        <h3><span class="label label-success"><i class="fa fa-check"></i> ON</span></h3>
';
} else {
    echo '
                            <h3><span class="label label-danger"><i class="fa fa-times"></i> OFF</span></h3>
';
}
?>
                            </center>							
						</div>
					</div>
					<div class="col-md-2">
                        <div class="well">
						    <center>
							<b><i class="fa fa-globe"></i> Proxy</b><br />AutoBan 
<?php
$table = $prefix . 'proxy-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['autoban'] == 'Yes') {
    echo '
					        <h3><span class="label label-success"><i class="fa fa-check"></i> ON</span></h3>
';
} else {
    echo '
                            <h3><span class="label label-danger"><i class="fa fa-times"></i> OFF</span></h3>
';
}
?>
                            </center>
						</div>
					</div>
                    <div class="col-md-2">
                        <div class="well">
						    <center>
							<b><i class="fa fa-retweet"></i> Mass Requests</b><br />AutoBan
<?php
$table = $prefix . 'massrequests-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['autoban'] == 'Yes') {
    echo '
					        <h3><span class="label label-success"><i class="fa fa-check"></i> ON</span></h3>
';
} else {
    echo '
                            <h3><span class="label label-danger"><i class="fa fa-times"></i> OFF</span></h3>
';
}
?>
                            </center>
						</div>
					</div>
					<div class="col-md-2">
                        <div class="well">
						    <center>
							<b><i class="fa fa-keyboard-o"></i> Spam</b><br />AutoBan
<?php
$table = $prefix . 'spam-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['autoban'] == 'Yes') {
    echo '
					        <h3><span class="label label-success"><i class="fa fa-check"></i> ON</span></h3>
';
} else {
    echo '
                            <h3><span class="label label-danger"><i class="fa fa-times"></i> OFF</span></h3>
';
}
?>
                            </center>
						</div>
					</div>
					</div>        
								</div>
							</section>
                            </div>
                        </div>
                        
                     <div class="row">
                                    <div class="col-md-4">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Recent Logs</h2>
									<p class="panel-subtitle">List with the recent Logs.</p>
								</header>
								<div class="panel-body">
<?php
$table = $prefix . 'logs';
$query = mysqli_query($connect, "SELECT * FROM `$table` ORDER BY id DESC LIMIT 4");
$count = mysqli_num_rows($query);
if ($count > 0) {
    foreach ($query as $row) {
        echo '
                        <section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary widget-summary-sm">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">' . $row['date'] . ' at ' . $row['time'] . '</h4>
													<div class="info">
														<strong class="amount">' . $row['ip'] . '</strong>
														<span class="text-primary">
';
        if ($row['type'] == 'SQLi') {
            echo '<button class="btn btn-xs btn-primary pull-right"><i class="fa fa-code"></i> <b>' . $row['type'] . '</b></button>';
        } elseif ($row['type'] == 'Mass Requests') {
            echo '<button class="btn btn-xs btn-danger pull-right"><i class="fa fa-retweet"></i> <b>' . $row['type'] . '</b></button>';
        } elseif ($row['type'] == 'Proxy') {
            echo '<button class="btn btn-xs btn-warning pull-right"><i class="fa fa-globe"></i> <b>' . $row['type'] . '</b></button>';
        } elseif ($row['type'] == 'Spammer') {
            echo '<button class="btn btn-xs btn-success pull-right"><i class="fa fa-keyboard-o"></i> <b>' . $row['type'] . '</b></button>';
        }
        echo '
                                                        
                                                        </span>
													</div><br />
												</div>
												<div class="summary-footer">
                                                    <a class="modal-with-zoom-anim btn btn-sm btn-default" title="Details" href="#log' . $row['id'] . '-modal">
                                                        <i class="fa fa-edit"></i> Details
                                                    </a>
                                                    ';
        if (get_banned($row['ip']) == 'Yes') {
            echo '
									                <a href="bans?type=ip&delete-id=' . get_bannedid($row['ip']) . '" class="btn btn-sm btn-success"><i class="fa fa-ban"></i> Unban</a>
								                	';
        } else {
            echo '
									                <a href="bans?ip=' . $row['ip'] . '&reason=' . $row['type'] . '" class="btn btn-sm btn-warning"><i class="fa fa-ban"></i> Ban</a>
								                    ';
        }
        echo '
							                        <a href="all-logs?delete-id=' . $row['id'] . '" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Delete</a>       

									<!-- Log Modal -->
									<div id="log' . $row['id'] . '-modal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Log #' . $row['id'] . '</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-text">
														
                                                    <div class="form-group">
														<label class="col-sm-3 control-label"><i class="fa fa-list-ul"></i> Log ID: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['id'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-user"></i> IP Address:</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['ip'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-calendar-o"></i> Date & Time: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['date'] . ' at ' . $row['time'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"> <i class="fa fa-globe"></i> Browser: </label>
														<div class="col-sm-9">
                                                            <input type="text" class="form-control" value="' . $row['browser'] . ' ' . $row['browser_version'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-desktop"></i> Operating System: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['os'] . ' ' . $row['os_version'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-map-marker"></i> Country: </label>
														<div class="col-sm-9">
                                                            <input type="text" class="form-control" value="' . visitor_country($row['ip']) . '" readonly /><br />
														</div><br />
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-map-marker"></i> City: </label>
														<div class="col-sm-9">
                                                            <input type="text" class="form-control" value="';
        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $row['ip']));
        echo '' . $query['city'] . '';
        echo '" readonly /><br />
														</div><br />
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-ban"></i> AutoBanned: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . get_banned($row['ip']) . '" readonly /><br />
														</div><br />
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-pencil-square-o"></i> Type: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['type'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-clipboard"></i> Attacked Page: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['page'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-external-link"></i> Referer URL: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['referer_url'] . '" readonly /><br />
														</div>
													</div>

													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-8 text-left">
														';
        if (get_banned($row['ip']) == 'Yes') {
            echo '
									<a href="bans-ip?delete-id=' . get_bannedid($row['ip']) . '" class="btn btn-success">Unban</a>
								';
        } else {
            echo '
									<a href="bans-ip?ip=' . $row['ip'] . '&reason=' . $row['type'] . '" class="btn btn-warning">Ban</a>
								';
        }
        echo '
							<a href="logs?delete-id=' . $row['id'] . '" class="btn btn-danger">Delete</a>
													</div>
                                                    <div class="col-md-4 text-right">
														<button class="btn btn-default modal-dismiss">Close</button>
													</div>
												</div>
											</footer>
										</section>
									</div>  
                 
												</div>
											</div>
										</div>
									</div>
';
    }
} else {
    echo '
            <br />
				<div class="alert alert-success" style="margin-left: 5px; margin-right: 5px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <p><i class="fa fa-check-circle-o" style="font-size: 20px;"></i> &nbsp;&nbsp;There are no recent logs.</p>
                </div>
';
}
?>
								</div>
							</section>
						            </div>
                                    
                                    <div class="col-md-4">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Recent IP Bans</h2>
									<p class="panel-subtitle">List with the recent IP Address Bans.</p>
								</header>
								<div class="panel-body">
<?php
$table = $prefix . 'bans';
$query = mysqli_query($connect, "SELECT * FROM `$table` ORDER BY id DESC LIMIT 4");
$count = mysqli_num_rows($query);
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        echo '	
                                <section class="panel panel-featured-left panel-featured-success">
									<div class="panel-body">
										<div class="widget-summary widget-summary-sm">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-success">
													<i class="fa fa-ban"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">' . $row['date'] . ' at ' . $row['time'] . '</h4>
													<div class="info">
														<strong class="amount">' . $row['ip'] . '</strong>
														<span class="text-primary">
                                                        <button class="btn btn-xs btn-primary pull-right">
                                                        <i class="fa fa-magic"></i> Autobanned: <b>' . $row['autoban'] . '</b></button>
                                                        </span>
													</div><br />
												</div>
												<div class="summary-footer">
                                                    <a href="bans-ip?edit-id=' . $row['id'] . '" class="btn btn-sm btn-default" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                            						<a href="bans-ip?delete-id=' . $row['id'] . '" class="btn btn-sm btn-default" title="Unban"><i class="fa fa-times"></i> Unban</a>
												</div>
											</div>
										</div>
									</div>
								</section>
';
    }
} else {
    echo '
            <br />
				<div class="alert alert-info" style="margin-left: 5px; margin-right: 5px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <p>There are no recent bans.</p>
                </div>
';
}
?>
								</div>
							</section>
						            </div>
                                        
                                    <div class="col-md-4">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Statistics</h2>
									<p class="panel-subtitle">Statistics for the Logs and IP Address Bans.</p>
								</header>
								<div class="panel-body">
					<table class="table table-bordered table-hover">
				    <tr class="active">
                      <th><i class="fa fa-list"></i> Logs</th>
                      <th>Value</th>
                    </tr>
<?php
@$query = mysqli_query($connect, "SELECT id FROM `$table`");
@$count = mysqli_num_rows($query);
?>
                    <tr>
                      <td>Total</td>
                      <td><?php
echo $count;
?></td>
                    </tr>
<?php
$date2 = date("d F Y");
@$query2 = mysqli_query($connect, "SELECT id FROM `$table` WHERE date='$date2'");
@$count2 = mysqli_num_rows($query2);
?>
                    <tr>
                      <td>Today</td>
                      <td><?php
echo $count2;
?></td>
                    </tr>
<?php
$date3 = date("F Y");
@$query3 = mysqli_query($connect, "SELECT id FROM `$table` WHERE date LIKE '% $date3'");
@$count3 = mysqli_num_rows($query3);
?>
					<tr>
                      <td>This month</td>
                      <td><?php
echo $count3;
?></td>
                    </tr>
<?php
$table = $prefix . 'logs';
$date4 = date("Y");
@$query4 = mysqli_query($connect, "SELECT id FROM `$table` WHERE date LIKE '% $date4'");
@$count4 = mysqli_num_rows($query4);
?>
					<tr>
                      <td>This year</td>
                      <td><?php
echo $count4;
?></td>
                    </tr>
					<tr class="active">
                      <th><i class="fa fa-ban"></i> IP Bans</th>
                      <th>Value</th>
                    </tr>
<?php
$table = $prefix . 'bans';
@$query5 = mysqli_query($connect, "SELECT id FROM `$table`");
@$count5 = mysqli_num_rows($query5);
?>
                    <tr>
                      <td>Total</td>
                      <td><?php
echo $count5;
?></td>
                    </tr>
<?php
$table = $prefix . 'bans';
$date6 = date("d F Y");
@$query6 = mysqli_query($connect, "SELECT id FROM `$table` WHERE date='$date6'");
@$count6 = mysqli_num_rows($query6);
?>
                    <tr>
                      <td>Today</td>
                      <td><?php
echo $count6;
?></td>
                    </tr>
<?php
$table = $prefix . 'bans';
$date7 = date("F Y");
@$query7 = mysqli_query($connect, "SELECT id FROM `$table` WHERE date LIKE '% $date7'");
@$count7 = mysqli_num_rows($query7);
?>
					<tr>
                      <td>This month</td>
                      <td><?php
echo $count7;
?></td>
                    </tr>
<?php
$table = $prefix . 'bans';
$date8 = date("Y");
@$query8 = mysqli_query($connect, "SELECT id FROM `$table` WHERE date LIKE '% $date8'");
@$count8 = mysqli_num_rows($query8);
?>
					<tr>
                      <td>This year</td>
                      <td><?php
echo $count8;
?></td>
                    </tr>
                  </table>
								</div>
							</section>
                                    </div>  
                                </div>
					</div>

					<!-- end: page -->
				</section>
<?php
footer();
?>