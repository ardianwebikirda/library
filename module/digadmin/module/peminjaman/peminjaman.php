					<style type="text/css">
					#judul-buku{
						font-weight: bold;
						font-size: 14px;
						color: #4A9900;
					}

					#nama{
						font-weight: bold;
						font-size: 14px;
						color: #4A9900;
					}
					</style>
					<!-- Container datagrid dan form -->
					<div class="container-fluid">
						<div class="row-fluid clearfix">

							<!-- Form Place -->
							<div class="col-md-5 column">
								<ul class="breadcrumb">
									<li><i class="fa fa-th-list"></i> <b>Trasaksi Peminjaman</b></li>
								</ul>

					    		<!-- Form CRUD Book Master -->
								<form class="form" id="frm-peminjaman" action="" method="post">
								<input type="text" class="form-control" id="cd-update" disabled="disabled" placeholder="Masukan Code Buku">

									<div class="form-group">
										<label>Code Angoota</label>
										<input type="text" class="form-control" id="codeanggota" name="codeanggota" 
										maxlength="50" required	placeholder="Masukan Code Anggota ...">

										<label>Nama Anggota</label>
				 						<input type="text" class="form-control" id="nama" name="nama" 
										required disabled="disabled" />

										<label>Code Buku</label>
										<input type="text" class="form-control" id="codebuku" name="codebuku" 
										required placeholder="Masukan Code Buku">
										
										<label>Judul Buku</label>
										<input type="text" class="form-control" id="judul-buku" name="judul-buku" 
										disabled="disabled" required> 
									</div>
									<button type="submit" id="save" name="save" value="save" class="btn btn-sm btn-success">Tambah</button>
									<button type="button" id="syncronize" name="syncronize" class="btn btn-sm btn-warning">Syncronize</button>
									<button type="reset" id="reset" class="btn btn-sm btn-primary">Reset</button>						
								</form><!-- /. End Form CRUD Book Master -->
							</div><!-- /. End Form Place -->

							<!-- Datagrid Place -->
							<div class="col-md-7 column">
								<table id="tablepeminjaman" class="display" cellspacing="0">
									<thead>
										<tr>
											<th width="10%">Peminjam</th>
											<th width="35%">Judul</th>
											<th width="15%">Tanggal</th>
											<th width="10%">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											include "../../bin/koneksi.php";

											$sql 	= "SELECT * FROM view_pinjam ORDER BY namabuku ASC";
											$hasil 	= $konek->query($sql);
											while($row = $hasil->fetch_assoc()){
												extract($row);

												echo"
													<tr>
														<td>{$namaanggota}</td>
														<td>{$namabuku}</td>
														<td>{$tgl_pinjam}</td>
														<td>
															<a href='module/peminjaman/aksipeminjaman.php?id=$row[id_temp]&code=$row[codebook]'>
															<button class='btn btn-sm btn-danger'>Delete</button>
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