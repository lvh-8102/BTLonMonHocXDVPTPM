<?php require('../inc/admin/header.php') ?>

            <div class="main-content">
                <div class="container-fluid">
                    <div class="admin-title">
                        <h1> Phần mềm Admin quản lý <i class="fa-solid fa-user-gear"></i></h1>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="qly-user">
                                <div class="qly-user-title">
                                    <h3>Danh sách tài khoản</h3>
                                </div>
                            </div>
                            <div class="qly-user-main">
                                <div class="qly-search">
                                    <div class="combobox-search">
                                        <select name="type">
                                            <option value="all">-- Tất cả --</option>
                                            <option value="name">Họ và tên</option>
                                            <option value="sdt">SĐT</option>
                                        </select>
                                    </div>
                                    <div class="input-search">
                                        <input type="search">
                                    </div>
                                    <div class="btn-search">
                                        <a href=""><i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm </a>
                                    </div>
                                </div>

                                <div class="qly-content">
                                    <div class="row list-user">
                                        <table class="table">
                                            <thead class="head-table">
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên tài khoản</th>
                                                    <th scope="col">Họ và tên</th>
                                                    <th scope="col">Số điện thoại</th>
                                                    <th scope="col">Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $stt = 1;
                                                    $dsTaiKhoanQuery = mysqli_query($conn, "Select * From taikhoan Where LoaiTaiKhoan='user'");
                                                    if($dsTaiKhoanQuery->num_rows>0){
                                                        while($dsTaiKhoan = $dsTaiKhoanQuery->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <th><?php echo $stt++; ?></th>
                                                    <td><?php echo $dsTaiKhoan['TenTaiKhoan'] ?></td>
                                                    <td><?php echo $dsTaiKhoan['HoTen'] ?></td>
                                                    <td><?php echo $dsTaiKhoan['SDT'] ?></td>
                                                    <td>
                                                        <div class="hoatdong">
                                                            <div class="status-detail">
                                                                <i class="fa-solid fa-circle <?php if($dsTaiKhoan['TrangThaiTaiKhoan'] == 'Đang hoạt động') echo 'on'; else echo 'off'; ?>"></i> <?php echo $dsTaiKhoan['TrangThaiTaiKhoan'] ?>
                                                            </div>
                                                            <div class="btn-hoatdong">
                                                                <div class="btn-lock">
                                                                    <a href="#" onclick="openPopupLock()"><i class="fa-solid fa-lock"></i> Khóa</a>
                                                                </div>
                                                                <div class="btn-unlock">
                                                                    <a href="#" onclick="openPopupUnLock()"><i class="fa-solid fa-lock-open"></i> Mở khóa</a>
                                                                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <div class="btn-delete">
                                                                    <a href="#" onclick="openPopupDeleteUser()"><i class="fa-solid fa-trash"></i> Xóa</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="combo-page">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="section-popup">
            <!-- Xóa user -->
            <div class="overlay" id="overlayDeleteUser">
                <div class="popup">
                    <p>Bạn có chắc chắn muốn Xóa người dùng này?</p>
                    <button class="btn btn-yes" onclick="closePopupDeleteUser(true)">Yes</button>
                    <button class="btn btn-no" onclick="closePopupDeleteUser(false)">No</button>
                </div>
            </div>

            <!-- Khóa -->
            <div class="overlay" id="overlayLock">
                <div class="popup">
                    <p>Bạn có chắc chắn muốn khóa người dùng này?</p>
                    <button class="btn btn-yes" onclick="closePopupLock(true)">Yes</button>
                    <button class="btn btn-no" onclick="closePopupLock(false)">No</button>
                </div>
            </div>

            <!-- Mở Khóa -->
            <div class="overlay" id="overlayUnLock">
                <div class="popup">
                    <p>Bạn có chắc chắn muốn mở khóa người dùng này?</p>
                    <button class="btn btn-yes" onclick="closePopupUnLock(true)">Yes</button>
                    <button class="btn btn-no" onclick="closePopupUnLock(false)">No</button>
                </div>
            </div>
        </section>
</body>
</html>