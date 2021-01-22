<?php
include 'functions.php';
global $connection;

$videoId = $_POST['videoId'];


$query = "SELECT v.*,  CONCAT(u.user_name, ' ', u.user_surname) AS fullName
FROM video_comment v, users u
WHERE v.id_video = '$videoId' AND v.user_id IN 
(SELECT user_id
FROM users
WHERE u.user_id = v.user_id)";
$result = mysqli_query($connection, $query);
$numComment = mysqli_num_rows($result);
if ($numComment > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $comment = $row['comment'];
        $dateComment = $row['date_comment'];
        $dateComment = date('d-m-Y', strtotime($dateComment));
        $fullname = $row['fullName'];

        echo '<li class="single-comment">
                                                                <div class="comment-body">
                                                                    <div class="comment-content">
                                                                        <div class="comment-header">
                                                                            <h3 class="comment-title">' . $fullname . '</h3>
                                                                        </div>
                                                                        <p class="ml-4">' . $comment . '</p>
                                                                        <div class="blog-details-reply-box ml-4">
                                                                            <div class=""><i
                                                                                    class="far fa-clock mr-2"></i>' . $dateComment . '</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>';
    }
} else {
    echo 'No comment found';
}
