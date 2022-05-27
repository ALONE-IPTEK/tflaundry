<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-user'></i> Data Admin</h3> 
                                    </div>  <div class='panel-body'> 
                                <table id='datatable' class='table table-hover'>
                                    <thead>
                                        <tr>
										<th><i class='icon-terminal'></i> NIK</th>
                                            <th><i class='icon-terminal'></i> Nama</th>
                                            <th><i class='icon-time'></i> Username</th>
											<th><i class='icon-signal'></i> Alamat</th>
											<th><i class='icon-signal'></i> Telp</th>
											<th><i class='icon-signal'></i> Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
							$i=1;
							$tp=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengguna WHERE level='Administrator' ORDER BY id ");
							while($r=mysqli_fetch_array($tp)){
							?>
							<tr>
							 <td><?php echo $r['nik'];?></td>
                                    <td><?php echo $r['nama'];?></td>
									<td><?php echo$r['username'];?></td>
									<td><?php echo$r['alamat'];?></td>
									<td><?php echo$r['telp'];?></td>
									<td><?php echo$r['gender'];?></td>
                                    
							</tr>
							<?php $i=$i+1;?>
							<?php } ?>
							</tbody>
                        </table>
                                     </div><!-- /.box-body -->
          </div><!-- /.box -->   