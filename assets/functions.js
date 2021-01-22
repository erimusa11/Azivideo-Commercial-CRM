//this is the raiting function
function total_rating() {

    $('.total-rating').barrating({
        theme: 'fontawesome-stars',
        readonly: 'true',
        initialRating: true,
        emptyValue: ''
    });
}

//vlera1 = simple category 
//vlera2 = thethe author
//vlera3 super Category protcast or video
//vlerat4 i piu clicati
//***** the value  1 came from piu clicati  */
//***** the value  2 came from piu preferiti  */
//***** the value  3 came from  video iniziati  */
//***** the value  4 came from  Series  */
function showthevideos(vlera, vlera2, vlera3, vlera4) {
    var URL = "";
    if (vlera4 == 1)
    {
        URL = "/showfiles/showpiuclicati.php";
    } else if (vlera4 == 2)
    {
        URL = "/showfiles/showpreferiti.php";
    } else if (vlera4 == 3)
    {
        URL = "/showfiles/showIniziati.php";
    } else if (vlera4 == 4)
    {
        URL = "/showfiles/showSeries.php";
    }
    else
    {
        URL = "/showfiles/showcategoriaautori.php";
    }

    $.post(URL, {
        "category": vlera,
        "autore": vlera2,
        "superCategory": vlera3
    }, function (response) {
        var vlerat = JSON.parse(response);
        let theme = ""
        let theme1 = ""
        let tipologia = "";
        // the stars rate
        var star1 = "";
        var star2 = "";
        var star3 = "";
        var star4 = "";
        var star5 = "";
        var categoria = "";

        vlerat.forEach(vlerat => {
            // if the video is free or not
            if (vlerat.tipologia_video == 1)
            {
                var tipologia =
                    '<div class="zmovo-trailor-img-slide-free ml-2"><span>free</span></div>';

            } else
            {
                var tipologia =
                    '<div class="zmovo-trailor-img-slide"><span>premium</span></div>';
            }

            if (vlerat.super_categorie == 2)
            {
                categoria = "podcast_details.php";

            } else
            {

                categoria = "video_details.php";

            }

            if (vlerat.rating >= 1)
            {
                star1 = 'br-selected';

            } else
            {
                star1 = '';
            }

            if (vlerat.rating >= 2)
            {
                star2 = 'br-selected';

            } else
            {
                star2 = '';
            }

            if (vlerat.rating >= 3)
            {
                star3 = 'br-selected';

            } else
            {
                star3 = '';
            }

            if (vlerat.rating >= 4)
            {
                star4 = 'br-selected';

            } else
            {
                star4 = '';
            }


            // this is the carts on row style

            theme = theme + '<div class="col-lg-3 col-md-6">\
                                      <div class="item">\
                                          <div class="zmovo-video-item-box pb-30">\
                                              <div class="zmovo-video-box-inner">' + tipologia + ' \
                                                  <div class="zmovo-v-box-img gradient">\
                                                      <img src="thumbnail_video/' + vlerat.path + '" alt="" class="thumbnail-video">\
                                                      <div class="ply-btns">\
                                                          <a href="'+ categoria + '?id=' + vlerat.id_video + '" class="ply-btn"><img src="image/play.svg" alt=""></a>\
                                                      </div>\
                                                      <div class="zmovo-v-box-content">\
                                                          <a  href="'+ categoria + '?id=' + vlerat.id_video + '" >' + vlerat.title_video + '</a>\
                                                          <div class="zmovo-v-tag c2">\
                                                              <span>Autore: ' + vlerat.autore + '</span>\
                                                          </div>\
                                                          <div class="movie-time">Publicato:\
                                                              <span>' + vlerat.data_creation + '</span>\
                                                          </div>\
                                                          <div class="movie-time">\
                                                          <div class="br-wrapper br-theme-fontawesome-stars">\
                                                          <select id="total-rating" class="total-rating" name="rating" autocomplete="off" style="display: none">                                                                                      </select>\
                                                          <div class="br-widget br-readonly">\
                                                          <a href="#" data-rating-value="1" data-rating-text="1" class="'+ star1 + '"></a>\
                                                          <a href="#" data-rating-value="2" data-rating-text="2" class="'+ star2 + '"></a>\
                                                          <a href="#" data-rating-value="3" data-rating-text="3"  class="'+ star3 + '"></a>\
                                                          <a href="#" data-rating-value="4" data-rating-text="4" class="'+ star4 + '"></a>\
                                                          <a href="#" data-rating-value="5" data-rating-text="5" class="'+ star5 + '"></a>\
                                                            </div>\
                                                              </div>\
                                                          </div>\
                                                      </div>\
                                                  </div>\
                                              </div>\
                                          </div>\
                                      </div>\
                                  </div>';

            //this is the cart in cououn style
            theme1 = theme1 + '<div class="row pb-50">\
                                  <div class="col-lg-4 col-md-5">' + tipologia + '\
                                      <div class="zmovo-product-list-item zmovo-v-box-img gradient">\
                                          <img src="thumbnail_video/' + vlerat.path + '" alt="" class="thumbnail-video">\
                                          <div class="ply-btns">\
                                              <a href="" class="ply-btn"><img src="image/play.svg" alt=""></a>\
                                          </div>\
                                      </div>\
                                  </div>\
                                  <div class="col-lg-8 col-md-7">\
                                      <div class="zmovo-product-list-dec">\
                                          <div class="zmovo-trailor-meta-info">\
                                              <div class="dec-review-dec">\
                                                  <div class="details-title">\
                                                      <a href="'+ categoria + '?id=' + vlerat.id_video + '"">' + vlerat.title_video + '</a>\
                                                  </div>\
                                                 <div class="movie-time">\
                                                 <div class="br-wrapper br-theme-fontawesome-stars">\
                                                          <select id="total-rating" class="total-rating" name="rating" autocomplete="off" style="display: none">                                                                                      </select>\
                                                          <div class="br-widget br-readonly">\
                                                          <a href="#" data-rating-value="1" data-rating-text="1" class="'+ star1 + '"></a>\
                                                          <a href="#" data-rating-value="2" data-rating-text="2" class="'+ star2 + '"></a>\
                                                          <a href="#" data-rating-value="3" data-rating-text="3"  class="'+ star3 + '"></a>\
                                                          <a href="#" data-rating-value="4" data-rating-text="4" class="'+ star4 + '"></a>\
                                                          <a href="#" data-rating-value="5" data-rating-text="5" class="'+ star5 + '"></a>\
                                                            </div>\
                                                              </div>\
                                                          </div>\
                                                  <div class="dec-review-meta">\
                                                      <ul>\
                                                          <li><span>Autore <label>:</label></span><a href="autore_categoria.php?autore='+ vlerat.id_autore + '">' + vlerat.autore + '</a></li>\
                                                          <li><span>Categoria <label>:</label></span><a href="video_categoria.php?categoria='+ vlerat.id_category + '">' + vlerat.category_video + '</a></li>\
                                                          <li><span>Publicato <label>:</label></span><a href="#">' + vlerat.data_creation + '</a></li>\
                                                          <li><span>Descrizione <label>:</label></span><a href="#">' + vlerat.description_video + '</a></li>\
                                                      </ul>\
                                                  </div>\
                                              </div>\
                                          </div>\
                                      </div>\
                                  </div>\
                              </div>';
        });
        //ad the element after the datas get printed
        $(".addVideos").html(theme);
        $(".addVideosfanel2").html(theme1);
        //refresh the rating
        total_rating();
    })
}

$(document).ready(function () {
    var controls = [
        'play-large', // The large play button in the center
        'restart', // Restart playback
        'play', // Play/pause playback
        'progress', // The progress bar and scrubber for playback and buffering
        'current-time', // The current time of playback
        'duration', // The full duration of the media
        'mute', // Toggle mute
        'volume', // Volume control
        'pip',
        'fullscreen' // Toggle fullscreen
    ];
    const player = new Plyr('.player', {
        controls
    });

    var videoId = $('#videoId').val();
    var userId = $('#userId').val();
    var rating = $('#ratingId').val();
    showComment(videoId);
    showViews(videoId);

    //init rating
    $('#video-rating').barrating({
        theme: 'fontawesome-stars',
        initialRating: true,
        emptyValue: ''
    });
    $('#video-rating').barrating('set', rating);


    $('#total-rating').barrating({
        theme: 'fontawesome-stars',
        readonly: 'true',
        initialRating: true,
        emptyValue: ''
    });

    totalRating(videoId);

    function totalRating(videoId) {
        $.ajax({
            type: "POST",
            url: "totalRatingAjax.php",
            data: {
                "id_video": videoId,
            },
            success: function (data) {
                const dataParse = JSON.parse(data);;
                $('#total-rating').barrating('set', dataParse[0].avgRating);
                $('#nrTotalRating').text(`${dataParse[0].countRating} recensioni`);
            },
            error: function (data) {
                alert('error');
            }
        })
    }

    //rate video
    $('#video-rating').on('change', function () {
        let video_rating = $(this).val();
        let selectedOption = ""
        $.ajax({
            type: "POST",
            url: "ratingAjax.php",
            data: {
                "id_video": videoId,
                "id_user": userId,
                "video_rating": video_rating
            },
            success: function (data) {
                if (data == 'update success' || data == 'insert success')
                {
                    $('#video-rating').barrating('set', data);
                } else if (data == 'query failed' || data == 'update failed')
                {
                    swal("Errore!", "Si è verificato un errore imprevisto!",
                        "error");
                }
            },
            complete: function (data) {
                totalRating(videoId);
            },
            error: function (data) {
                alert('error');
            }
        })

    });

    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    function showComment(videoId) {
        $.ajax({
            type: "POST",
            url: "commentShow.php",
            data: {
                "videoId": videoId,
            },
            success: function (data) {
                if (data == 'No comment found')
                {
                    $('.comments').attr('hidden', 'hidden');
                } else
                {
                    $('.comment-list').html(data);
                }
            },
        })
    }

    function showViews(videoId) {
        $.ajax({
            type: "POST",
            url: "viewsShow.php",
            data: {
                "videoId": videoId,
            },
            success: function (data) {
                $('#nrViews').html(`${data} visualizzazioni`);
            }
        })
    }

    $('#form-comment').submit(function (e) {
        e.preventDefault();
        let comment = $('#comment').val();
        $.ajax({
            type: "POST",
            url: "commentPost.php",
            data: {
                "videoId": videoId,
                "userId": userId,
                "comment": comment
            },
            success: function (data) {
                if (data == 'insert succes')
                {
                    toastr.success('Il commento è stato salvato!');
                    showComment(videoId);
                    $('.comments').removeAttr('hidden');
                }
            },
            complete: function (data) {
                $('#comment').val('');
            }
        })
    });

    $("video").on('play', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "viewsPost.php",
            data: {
                "videoId": videoId,
                "userId": userId,
            },
            success: function (data) {
                showViews(videoId);
            }
        })
    });



});