<div class="comment-area pt-50">
                                                            <div class="comments">
                                                                <h2 class="title">Commenti</h2>
                                                                <ol class="comment-list">

                                                                </ol>
                                                            </div>

                                                            <?php if (isset($userId) && ($canSeeVideo == true)) { ?>
                                                            <!-- COMMENT RESPOND -->
                                                            <div class="comment-respond pt-30">
                                                                <h2 class="title">Lascia un commento</h2>
                                                                <div class="respons-box">
                                                                    <div class="form">
                                                                        <form id="form-comment" action="">
                                                                            <div class="form-group">
                                                                                <label for="message">Scrivi un commento
                                                                                    :</label>
                                                                                <textarea
                                                                                    class="form-control form-comment"
                                                                                    cols="10" rows="8" name="comment"
                                                                                    id="comment" required=""></textarea>
                                                                            </div>
                                                                            <div class="buttons">
                                                                                <button type="submit" name="submit"
                                                                                    id="submit"
                                                                                    class="btn btn-comment">Invia</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <!-- END COMMENT RESPOND -->
                                                        </div>