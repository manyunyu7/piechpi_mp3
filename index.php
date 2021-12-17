<?php
include 'connect.php';
$query = mysqli_query($conn, "SELECT * FROM music");
$release = [];
$song = [];
$coming_soon = [];

while ($result = mysqli_fetch_assoc($query)) {
    if ($result['status'] == 'release') {
        $release[] = $result;
        $song[] = [
            'name' => $result['name'],
            'artist' => $result['artist'],
            'url' => $result['url'],
            'cover' => $result['cover'],
        ];
    } elseif ($result['status'] == 'coming soon')
        $coming_soon[] = $result;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Music Streaming by Feylaboratory">
    <meta name="keywords" content="music, streaming">
    <meta name="author" content="Henry Augusta Harsono">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Feyla Radio</title>

    <style>
        @font-face {
            font-family: gloss;
            src: url(assets/gloss-and-bloom/gloss.ttf);
        }

        img {
            object-fit: cover;
            /* background-position: center center;
            background-repeat: no-repeat; */
            width: 100%;
            height: 250px;
        }

        .main {
            padding: 40px 0;
        }

        .h4 {
            text-transform: uppercase;
        }

        .album-poster {
            display: block;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 0 25px #3d2173a1;
            transition: all ease 1s;
        }

        .album-poster:hover {
            transform: scale(0.95) translateY(10px);
        }

        .col-md-3,
        col-md-2 {
            margin-bottom: 50px;
        }

        h3 {
            font-size: 34px;
            margin-bottom: 34px;
            border-bottom: 4px solid #e6e6e6;
        }

        h4 {
            font-size: 14px;
            text-transform: uppercase;
            margin-top: 15px;
            font-weight: 700;
        }

        #aplayer {
            position: fixed;
            bottom: -100%;
            left: 0;
            width: 100%;
            box-shadow: 0 -2px 2px #dadada;
            background-color: white;
            transition: all ease 0.5s;
        }

        #aplayer.showPlayer {
            bottom: 0;
        }
    </style>
</head>

<body>

    <div class="main">

        <div class="container">



            <div class="row">
                <div class="col-md-12">
                    <h1 style="font-family: gloss;">Feylaboratory</h1>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <h4><a href="./upload.php"> Music</a>Streaming by <a href="https://feylaboratory.xyz/">Feylaboratory</a></h4>
                </div>
            </div>

            <div class="row navigation" style="margin-top: 20px; margin-bottom:20px">
                <div class="col-md-12">
                    <?php
                    include 'navbar.php';
                    // echo "$nav";
                    ?>
                </div>
            </div>



            <div class="row">
                <?php for ($i = 0; $i < count($release); $i++) : ?>
                    <div class="col-sm-2">
                        <a href="javascript:void();" class="album-poster" data-switch="<?php echo $i; ?>">
                            <img onerror="this.onerror=null; this.src='./assets/album/n5'" src="<?php echo $release[$i]['cover']; ?>" alt="<?php echo $release[$i]['name']; ?>">
                        </a>
                        <h4><?php echo $release[$i]['name']; ?></h4>
                        <p><?php echo $release[$i]['artist']; ?></p>
                    </div>

                <?php endfor; ?>

            </div>


            <div class="row">
                <div class="col-md-12">
                    <!-- <h3>Cooming Soon</h3> -->
                </div>
                <?php for ($i = 0; $i < count($coming_soon); $i++) : ?>
                    <div class="col-md-1">
                        <a href="javascript:void();" class="album-poster" data-switch="-1">
                            <img src="<?php echo $coming_soon[$i]['cover']; ?>">
                        </a>
                        <h4><?php echo $coming_soon[$i]['h4']; ?></h4>
                        <p><?php echo $coming_soon[$i]['p']; ?></p>
                    </div>
                <?php endfor; ?>
            </div>



        </div>
    </div>
    <div class="fixed-bottom" id="aplayer"></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <!-- APlayer Jquery and CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.js" integrity="sha512-RWosNnDNw8FxHibJqdFRySIswOUgYhFxnmYO3fp+BgCU7gfo4z0oS7mYFBvaa8qu+axY39BmQOrhW3Tp70XbaQ==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.css" integrity="sha512-CIYsJUa3pr1eoXlZFroEI0mq0UIMUqNouNinjpCkSWo3Bx5NRlQ0OuC6DtEB/bDqUWnzXc1gs2X/g52l36N5iw==" crossorigin="anonymous" />

    <script>
        $(".album-poster").on('click', function(e) {
            var dataSwitchID = $(this).attr('data-switch');

            if (dataSwitchID >= 0) {
                ap.list.switch(dataSwitchID)
                ap.play()
                $("#aplayer").addClass("showPlayer");
            } else {
                ap.pause();
            }
        });


        const ap = new APlayer({
            container: document.getElementById('aplayer'),
            listFolded: true,
            audio: <?php echo json_encode($song); ?>
        });
    </script>


</body>

</html>