					<!-- Container datagrid dan form -->
					<div class="container-fluid">
						<div class="row-fluid clearfix">

							<!-- Datagrid Place -->
							<div class="col-md-12 column daft">
								<ul class="breadcrumb">
									<li><i class="fa fa-th-list"></i> <b>Detail Peminjaman</b></li>
								</ul>
								<table id="daftarpeminjaman" class="display" cellspacing="0">
									<thead>
										<tr>
											<th>No Peminjaman</th>
											<th>Nama</th>
											<th>Judul</th>
											<th>Pinjam</th>
											<th>Kembali</th>
										</tr>
									</thead>
									<tbody>
										<?php
											include "../../bin/koneksi.php";

											$sql 	= "SELECT * FROM view_trspeminjaman WHERE statusbuku='Running'";
											$hasil 	= $konek->query($sql);
											while($row = $hasil->fetch_assoc()){
												extract($row);

												echo"
													<tr>
														<td>{$nopeminjaman}</td>
														<td>{$nama}</td>
														<td>{$judul}</td>
														<td>{$tgl_pinjam}</td>
														<td>{$tgl_kembali}</td>
													</tr>";
											}
										?>                		
									</tbody>
								</table>
							</div><!-- /. End Datagrid Place -->
						</div>
					</div>	<!-- ./End Container datagrid dan form -->