<table style="width:55%;float:left">
							<thead>
							  <tr>
								<th class="first">Time</th>
								<th>M</th>
								<th>T</th>
								<th>W</th>
								
							  </tr>
							</thead>
							
		<?php
				
		$query=mysqli_query($con,"select * from time where days='mtw' order by time_start")or die(mysqli_error($con));
					
			while($row=mysqli_fetch_array($query)){
				$id=$row['time_id'];
				$start=date("h:i a",strtotime($row['time_start']));
				$end=date("h:i a",strtotime($row['time_end']));
		?>
					<tr >
						<td class="first"><?php echo $start."-".$end;?></td>
							<td><?php 
							if ($member<>""){
								$query1=mysqli_query($con,"select * from schedule natural join member where day='m' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
							}
							elseif ($room<>""){
									$query1=mysqli_query($con,"select * from schedule natural join member where day='m' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
							elseif ($class<>""){
									$query1=mysqli_query($con,"select * from schedule natural join member where day='m' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>" ")
											$displayrm= "<li>$row1[remarks]</li>";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											echo $row1['subject_code'];
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room $row1[room]</li>";
											echo $displayrm;
											echo "</ul>";
										}	
									?>
								</td>
								<td><?php 
									if ($member<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join member where day='t' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join member where day='t' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join member where day='t' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								
										$row1=mysqli_fetch_array($query2);
										$count=mysqli_num_rows($query2);
										$id1=$row1['sched_id'];
										//$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>"")
											$displayrm= "<li>$row1[remarks]</li>";
											
										
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											echo $row1['subject_code'];
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room ".$row1['room']."</li>";
											echo $displayrm;
											echo "</ul>";
										}	
									?>
								</td>
								<td><?php 
								if ($member<>"")
								{
									$query3=mysqli_query($con,"select * from schedule natural join member where day='w' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query3=mysqli_query($con,"select * from schedule natural join member where day='w' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query3=mysqli_query($con,"select * from schedule natural join member where day='w' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row1=mysqli_fetch_array($query3);
										$count=mysqli_num_rows($query3);
										$id1=$row1['sched_id'];
										//$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>"")
											$displayrm= "<li>$row1[remarks]</li>";
											
										else
											$displayrm="";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											echo $row1['subject_code'];
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room $row1[room]</li>";
											echo $displayrm;
											echo "</ul>";
										}	
									?>
								</td>
								
							  </tr>
							
		<?php }?>					  
		</table>    

			<table style="width:45%;float:right">
								<thead>
								  <tr>
									<th class="first">Time</th>
									<th>TH</th>
									<th>F</th>
									
								  </tr>
								</thead>
								
			<?php
					
					$query=mysqli_query($con,"select * from time where days='thf' order by time_start")or die(mysqli_error($con));
						
					while($row=mysqli_fetch_array($query)){
							$id=$row['time_id'];
							$start=date("h:i a",strtotime($row['time_start']));
							$end=date("h:i a",strtotime($row['time_end']));
			?>
								  <tr >
								<td class="first"><?php echo $start."-".$end;?></td>
								<td class="sec">
								<?php 
								if ($member<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='th' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='th' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='th' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row1=mysqli_fetch_array($query1);
										$count=mysqli_num_rows($query1);
										$id1=$row1['sched_id'];
										
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>"")
											$displayrm= "<li>$row1[remarks]</li>";
											
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											echo $row1['subject_code'];
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room ".$row1['room']."</li>";
											echo $displayrm;
											echo "</ul>";
										}	
									?>
								</td>
								<td class="sec"><?php 
								if ($member<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join member where day='f' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join member where day='f' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join member where day='f' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row2=mysqli_fetch_array($query2);
										$count=mysqli_num_rows($query2);
										$id1=$row2['sched_id'];
										//$count=mysqli_num_rows($query1);
										$encode=$row2['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row2['remarks']<>"")
											$displayrm1= "<li>$row2[remarks]</li>";
											
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											echo $row2['subject_code'];
											echo "</li>";
											echo "<li class='$displayc'>$row2[cys]</li>";
											echo "<li class='$displaym'>$row2[member_last], $row2[member_first]</li>";											
											echo "<li class='$displayr'>Room ".$row2['room']."</li>";
											echo $displayrm1;
											echo "</ul>";
										}	
									?>
								</td>
						
								
							  </tr>
								
			<?php }?>					  
			</table> 