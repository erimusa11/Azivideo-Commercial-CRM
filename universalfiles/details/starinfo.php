<div class="zmovo-blog-dec-content pt-30">
    <div class="row col-12">
        <h2 class="col-6"><?php echo $titleVideo; ?></h2>
        <div class="col-6 d-flex justify-content-end">
            <form action="video_details.php" method="POST">
                <?php
                                                              if($userId !="" && $userId !=null){

                                                                if($countpref['totalcountpref']>=1){

                                                           
                                                            ?>

                <button type="submit" name="unpreferito" value="<?php echo $videoId; ?>"
                    class="btn btn-md btn-danger"><i class="fas fa-minus"></i> Unpreferito</button>

                <?php     } else {
                                                            ?>

                <button type="submit" name="preferito" value="<?php echo $videoId; ?>" class="btn btn-md btn-info"><i
                        class="fas fa-plus"></i> Preferito</button>

                <?php 

                                                              } }?>
            </form>
        </div>
    </div>
    <div class="zmovo-blog-d-p">
        <ul>
            <li>
                <div class="ratting">
                    <select id="total-rating" name="rating" autocomplete="off">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <a id="nrTotalRating"></a>
                </div>
                <div class="ratting">
                    <i class="fas fa-eye"></i>
                    <a id="nrViews"></a>
                </div>
            </li>
            <li>
                <div class="dec-review-meta">
                    <ul>
                        <li>
                            <span>Categoria
                                <label>:</label></span><a href="#"><?php echo $categoryVideo; ?></a>
                        </li>
                        <li>
                            <span>Autore:
                                <label>:</label></span><a href="#"><?php echo $autoreVideo; ?></a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <p><?php echo $descriptionVideo; ?> </p>

        <?php if (isset($userId) && ($canSeeVideo == true)) { ?>
        <div class="dec-review-meta mt-5">
            <form method="POST" action="">
                <h2 class="title">Valuta il video:
                </h2>
                <p> <select id="video-rating" name="rating" autocomplete="off">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select></p>
            </form>
        </div>
        <?php } ?>
    </div>
</div>