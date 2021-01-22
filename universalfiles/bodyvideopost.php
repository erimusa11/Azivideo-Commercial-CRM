<div class="product-filter mb-30  ">
    <div class="product-filter-inner">
        <div class="row">
            <!-- LIST VIEW OR GRID VIEW -->
            <div class="col-12 col-md-3 col-lg-4 sm-width">
                <div class="product-filter-list">
                    <ul class="nav" role="tablist">
                        <li class="active"> <a href="#grid" class="active show" role="tab" data-toggle="tab"><i
                                    class="fa fa-th"></i></a></li>
                        <li> <a href="#list" data-toggle="tab" role="tab"><i class="fa fa-th-list"></i></a></li>
                        <li class=" col-9 "> <select class=" form-control changeselect onchangesec ">
                                <option value="tutto"> Mostra tutto...</option>
                                <?php 
                                                  
                                                    global $connection;

                                                    $queryFindCat = "SELECT * FROM video_category";
                                                    $result_findcat = mysqli_query($connection,$queryFindCat);
                                                    while($row_findcat=mysqli_fetch_array( $result_findcat )){
                                                  
                                                  ?>
                                <option value="<?php echo $row_findcat['id_category']; ?>">
                                    <?php echo $row_findcat['category_video']; ?> </option>
                                <?php
                                                    }
                                        ?>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END LIST VIEW OR GRID VIEW -->

        </div>
    </div>
</div>
<!-- end Product Filter -->
<div class="product-items">
    <div class="product-items-inner">
        <div class="zmovo-product-list ">

            <div class="tab-pane fade active in show" id="grid" role="tabpanel">
                <div class="row addVideos">
                    <!-- this is the cart on column type  --->

                </div>
            </div>

            <div class="tab-pane fade active in" id="list" role="tabpanel">
                <div class="zmovo-product-list mb-30 addVideosfanel2">
                </div>
            </div>
        </div>
    </div>
</div>
