<?php require('../inc/admin/header.php') ?>

        <div class="main-content">
            <div class="container-fluid">
                <div class="admin-title">
                    <h1> Phần mềm Admin quản lý <i class="fa-solid fa-user-gear"></i></h1>
                </div>
                <div class="tab-content">
                    <div>
                        <div style="display: block;">
                            <div class="qly-user">
                                <div class="qly-user-title">
                                    <h3>Danh sách bài đăng</h3>
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
                                                    <th scope="col">Ảnh đại diện</th>
                                                    <th scope="col">Người đăng</th>
                                                    <th scope="col">Số điện thoại</th>
                                                    <th scope="col">Địa chỉ</th>
                                                    <th scope="col">Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $dsTinDangQuery = mysqli_query($conn, 'Select * From tindang');
                                                ?>
                                                <!-- Bài đăng Đã duyệt -->
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td class="col-img"><img src="../asset/images/nha.jpg" alt=""></td>
                                                    <td>Le Viet Hieu</td>
                                                    <td>0968951277</td>
                                                    <td>84 Cửu Việt 1, Trâu Quỳ, Gia Lâm, Hà Nội</td>
                                                    <td>
                                                        <div class="hoatdong">
                                                            <div class="status-detail">
                                                                <i class="fa-solid fa-circle on"></i> Đã duyệt
                                                            </div>
                                                            <div class="btn-hoatdong">
                                                                <div class="btn-lock">
                                                                    <a href="#" onclick="openPopupD()"><i class="fa-solid fa-check"></i> Duyệt</a>
                                                                </div>
                                                                <div class="btn-unlock">
                                                                    <a href="#" onclick="openPopupHD()"><i class="fa-solid fa-xmark"></i> Bỏ duyệt</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="thaotac">
                                                            <div class="btn-update">
                                                                <a href=""><i class="fa-solid fa-screwdriver-wrench"></i> Sửa</a>
                                                            </div>
                                                            <div class="btn-delete">
                                                                <a href="#" onclick="openPopupDeletePost()"><i class="fa-solid fa-trash"></i> Xóa</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>


                                                <!-- Bài đăng Chưa duyệt -->

                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td class="col-img"><img src="../asset/images/nha2.jpg" alt=""></td>
                                                    <td>Le Viet Hieu</td>
                                                    <td>0968951277</td>
                                                    <td>84 Cửu Việt 1, Trâu Quỳ, Gia Lâm, Hà Nội</td>
                                                    <td>
                                                        <div class="hoatdong">
                                                            <div class="status-detail">
                                                                <i class="fa-solid fa-circle off"></i> Chưa duyệt
                                                            </div>
                                                            <div class="btn-hoatdong">
                                                                <div class="btn-lock">
                                                                    <a href="#" onclick="openPopupD()"><i class="fa-solid fa-check"></i> Duyệt</a>
                                                                </div>
                                                                <div class="btn-unlock">
                                                                    <a href="#" onclick="openPopupHD()"><i class="fa-solid fa-xmark"></i> Bỏ duyệt</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="thaotac">
                                                            <div class="btn-update">
                                                                <a href=""><i class="fa-solid fa-screwdriver-wrench"></i> Sửa</a>
                                                            </div>
                                                            <div class="btn-delete">
                                                                <a href="#" onclick="openPopupDeletePost()"><i class="fa-solid fa-trash"></i> Xóa</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
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
        </div>
    </section>

    <section id="section-popup">
        <!-- Xóa tin đăng -->
        <div class="overlay" id="overlayDeletePost">
            <div class="popup">
                <p>Bạn có chắc chắn muốn Xóa tin đăng này?</p>
                <button class="btn btn-yes" onclick="closePopupDeletePost(true)">Yes</button>
                <button class="btn btn-no" onclick="closePopupDeletePost(false)">No</button>
            </div>
        </div>

        <!-- Duyet -->
        <div class="overlay" id="overlayD">
            <div class="popup">
                <p>Bạn có chắc chắn muốn duyệt tin đăng này?</p>
                <button class="btn btn-yes" onclick="closePopupD(true)">Yes</button>
                <button class="btn btn-no" onclick="closePopupD(false)">No</button>
            </div>
        </div>

        <!-- huy Duyet -->
        <div class="overlay" id="overlayHD">
            <div class="popup">
                <p>Bạn có chắc chắn muốn hủy duyệt tin đăng này?</p>
                <button class="btn btn-yes" onclick="closePopupHD(true)">Yes</button>
                <button class="btn btn-no" onclick="closePopupHD(false)">No</button>
            </div>
        </div>
    </section>
</body>
</html>