<?= $this->extend('user/template');?>
<?= $this->section('bodycontent');?>

<?php if (session()->getFlashdata('add_success')) : ?>
<div class="container-fluid">
    <div class="row" style="display: flex; justify-content: flex-end">
        <div class="col-lg-3">
            <div class="alert alert-success alert-dismissible fade show alertnotif" role="alert">
                <strong> <?= session()->getFlashdata('add_success'); ?> </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data <i class="fa fa-angle-right"></i> <strong>Lihat</strong>
        </h1>
    </div>

    <div class="d-sm-flex align-items-center mb-4">
        <a href="#" data-toggle="modal" data-target="#addmodal" class="d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">
            <i class="fas fa-plus fa-sm"></i> Tambah
        </a>
        <a href="admin-data-import.php" class="d-sm-inline-block btn btn-sm btn-warning shadow-sm mr-2">
            <i class="fas fa-upload fa-sm"></i> Import
        </a>
        <a href="admin-class-export.php" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2">
            <i class="fas fa-download fa-sm"></i> Download
        </a>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data Produk</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($product as $row): ?>
                        <tr>
                            <td><?=$row['product_id']?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#viewmodal"
                                    data-pid="<?=$row['product_id'];?>" data-pname="<?=$row['product_name'];?>"
                                    data-pcategory="<?=$row['product_category'];?>"
                                    data-pdescription="<?=$row['product_description'];?>"
                                    data-pprice="<?=$row['product_price'];?>"
                                    data-pimg="../product-img/<?=$row['product_img'];?>" class="viewID"><?=$row['product_name']?></a>
                            </td>
                            <td><?=$row['product_category']?></td>
                            <td><?=number_format($row['product_price'])?></td>
                            <td><img src="/product-img/<?=$row['product_img']?>" style="width:100px; height:100px; object-fit:cover"></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#editmodal"
                                    data-eid="<?=$row['product_id'];?>" data-ename="<?=$row['product_name'];?>"
                                    data-ecategory="<?=$row['product_category'];?>"
                                    data-edescription="<?=$row['product_description'];?>"
                                    data-eprice="<?=$row['product_price'];?>"
                                    data-eimg="../product-img/<?=$row['product_img'];?>" class="editID">
                                    <button type="button" class="btn ink-reaction btn-floating-action btn-circle btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>

                                <a href="#" data-toggle="modal" data-target="#deletemodal"
                                    data-did="<?=$row['product_id'];?>" class="deleteID">
                                    <button type="button" class="btn ink-reaction btn-floating-action btn-circle btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- Add Modal-->
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Cross Site Request Forgery enctype="multipart/form-data" -->
                <form action="/admin/insert_data" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="product_name" class="form-control" placeholder="Nama Produk" autofocus required>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="product_category" required>
                            <option value="Food">Food</option>
                            <option value="Electronic">Electronic</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Home Supplies">Home Supplies</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="product_description"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="product_price" id="product_price" class="form-control"
                            placeholder="Harga Produk" required>
                    </div>

                    <div class="form-group">
                        <label>File Gambar</label>
                        <input type="file" name="product_img" accept=".jpg,.jpeg,.png" class="form-control-file" placeholder="Gambar Produk">
                        <i style="color:red">*Gambar harus file .jpg / .png <br>**Abaikan jika tidak ada gambar produk</i>
                        <!-- <input type="text" name="product_img" class="form-control" placeholder="Nama File" required> -->
                    </div>

                    <div class="row">
                        <div class="col">
                            <button class="form-control btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                        <div class="col">
                            <button class="form-control btn btn-success" type="button">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- View Modal-->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Produk</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" enctype="multipart/form-data" action="admin-class-crud.php">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="p_name" id="pname" class="form-control" placeholder="Nama Produk" disabled="">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="number" name="p_category" id="pcategory" class="form-control" placeholder="Kategori Produk" disabled="">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="p_description" id="pdescription" disabled=""></textarea>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="p_price" id="pprice" class="form-control" placeholder="Harga Produk" disabled="">
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="form-group">
                            <img id="pimgs" src="" style="width:200px;">
                        </div>
                    </div>

                    <input type="text" name="p_id" id="pid" hidden required>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal-->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" enctype="multipart/form-data" action="/admin/update_data">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="product_name" id="ename" class="form-control" placeholder="Nama Produk" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="product_category" id="ecategory" required>
                            <option value="Food">Food</option>
                            <option value="Electronic">Electronic</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Home Supplies">Home Supplies</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="product_description" id="edescription" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" step="any" name="product_price" id="eprice" class="form-control" placeholder="Harga Produk" required>
                    </div>

                    <div class="form-group">
                        <label>File Gambar</label>
                        <div class="form-group">
                            <img id="eimgs" src="" style="width:200px;">
                        </div>

                        <!-- <input class="form-control-file" type="file" name="p_img" accept="image/*"> -->
                        <i style="color:red">*Gambar harus file .jpg / .png <br>**Abaikan jika tidak merubah gambar produk</i>

                        <input type="text" name="product_img" class="form-control" placeholder="Nama File" required>
                    </div>


                    <input type="text" name="product_id" id="eid" hidden required>


                    <div class="row">
                        <div class="col">
                            <button class="form-control btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                        <div class="col">
                            <button class="form-control btn btn-success" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="/admin/delete_data">
                <div class="modal-body">
                    <i class="text-danger">Anda yakin Ingin menghapus data produk ini?</i>
                </div>

                <input type="text" name="product_id" id="did" hidden required>

                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-success" type="submit">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection();?>