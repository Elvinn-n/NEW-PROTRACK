<?php
	session_start();
	include("../Assets/Connection/Connection.php");
	$selQuery="select * from tbl_admin where admin_id='".$_SESSION['aid']."'";
	$result=$con->query($selQuery);
	$data=$result->fetch_assoc();
	
?>



<?php
ob_start();
include("Head.php");
?>
            
            <h1 align="center">WELCOME </h1>
            <h1 align="center"><?php echo $data['admin_name'] ?></h1>
             <!-- <div class="row">
              <div class="col-lg-12">
                <div class="users-table table-wrapper">
                  <table class="posts-table">
                    <thead>
                      <tr class="users-table-info">
                        <th>
                          <label class="users-table__checkbox ms-20">
                            <input type="checkbox" class="check-all" />Thumbnail
                          </label>
                        </th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <label class="users-table__checkbox">
                            <input type="checkbox" class="check" />
                            <div class="categories-table-img">
                              <picture
                                ><source
                                  srcset="
                                    ../Assets/Templates/Admin/img/categories/01.webp
                                  "
                                  type="image/webp" />
                                <img
                                  src="../Assets/Templates/Admin/img/categories/01.jpg"
                                  alt="category"
                              /></picture>
                            </div>
                          </label>
                        </td>
                        <td>Starting your traveling blog with Vasco</td>
                        <td>
                          <div class="pages-table-img">
                            <picture
                              ><source
                                srcset="
                                  ../Assets/Templates/Admin/img/avatar/avatar-face-04.webp
                                "
                                type="image/webp" />
                              <img
                                src="../Assets/Templates/Admin/img/avatar/avatar-face-04.png"
                                alt="User Name"
                            /></picture>
                            Jenny Wilson
                          </div>
                        </td>
                        <td><span class="badge-pending">Pending</span></td>
                        <td>17.04.2021</td>
                        <td>
                          <span class="p-relative">
                            <button
                              class="dropdown-btn transparent-btn"
                              type="button"
                              title="More info"
                            >
                              <div class="sr-only">More info</div>
                              <i
                                data-feather="more-horizontal"
                                aria-hidden="true"
                              ></i>
                            </button>
                            <ul class="users-item-dropdown dropdown">
                              <li><a href="##">Edit</a></li>
                              <li><a href="##">Quick edit</a></li>
                              <li><a href="##">Trash</a></li>
                            </ul>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="users-table__checkbox">
                            <input type="checkbox" class="check" />
                            <div class="categories-table-img">
                              <picture
                                ><source
                                  srcset="
                                    ../Assets/Templates/Admin/img/categories/02.webp
                                  "
                                  type="image/webp" />
                                <img
                                  src="../Assets/Templates/Admin/img/categories/02.jpg"
                                  alt="category"
                              /></picture>
                            </div>
                          </label>
                        </td>
                        <td>Start a blog to reach your creative peak</td>
                        <td>
                          <div class="pages-table-img">
                            <picture
                              ><source
                                srcset="
                                  ../Assets/Templates/Admin/img/avatar/avatar-face-03.webp
                                "
                                type="image/webp" />
                              <img
                                src="../Assets/Templates/Admin/img/avatar/avatar-face-03.png"
                                alt="User Name"
                            /></picture>
                            Annette Black
                          </div>
                        </td>
                        <td><span class="badge-pending">Pending</span></td>
                        <td>23.04.2021</td>
                        <td>
                          <span class="p-relative">
                            <button
                              class="dropdown-btn transparent-btn"
                              type="button"
                              title="More info"
                            >
                              <div class="sr-only">More info</div>
                              <i
                                data-feather="more-horizontal"
                                aria-hidden="true"
                              ></i>
                            </button>
                            <ul class="users-item-dropdown dropdown">
                              <li><a href="##">Edit</a></li>
                              <li><a href="##">Quick edit</a></li>
                              <li><a href="##">Trash</a></li>
                            </ul>
                          </span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              
            </div> -->
         <?php
            include("Foot.php");
            ob_flush();
         ?>
