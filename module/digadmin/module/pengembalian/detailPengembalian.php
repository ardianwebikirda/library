					<!-- Container datagrid dan form -->
					<div class="container-fluid">
						<div class="row-fluid clearfix">

							<!-- Datagrid Place -->
							<div class="col-md-12 column daft">
								<ul class="breadcrumb">
									<li><i class="fa fa-th-list"></i> <b>Detail Pengembalian</b></li>
									<li>Apabila Denda Bernilai Minus(-) atau 0 Maka Tidak Ada Denda</li>
								</ul>
								<table id="daftarpengembalian" class="display" cellspacing="0">
									<thead>
										<tr>
											<th>No Peminjaman</th>
											<th>Nama</th>
											<th>Judul</th>
											<th>Tgl Kembali</th>
											<th>Lama Pinjam</th>
											<th>Denda</th>
											<th>Print Out</th>
										</tr>
									</thead>
									<tbody>
										<?php
											include "../../bin/koneksi.php";

											$sql 	= "SELECT * FROM view_trspengembalian WHERE statusbuku='OutOfDate'";
											$hasil 	= $konek->query($sql);
											while($row = $hasil->fetch_assoc()){
												extract($row);

												echo"
													<tr>
														<td>{$nopeminjaman}</td>
														<td>{$nama}</td>
														<td>{$judul}</td>
														<td>{$tgl_pengembalian}</td>
														<td>{$lamapinjam} Hari</td>
														<td>{$denda}</td>
														<td>
															<a href='?hal=printPengembalian&idp=$row[nopeminjaman]'>
															<button type='printout' id='printout' class='btn btn-sm btn-info'>
															<i class=' fa fa-file-text'></i> Lihat Faktur
															</button>
															</a>
														</td>
													</tr>";
											}
										?>                		
									</tbody>
								</table>
							</div><!-- /. End Datagrid Place -->
						</div>
					</div>	<!-- ./End Container datagrid dan form -->