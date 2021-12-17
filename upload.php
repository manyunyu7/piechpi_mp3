<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/styles/styles.css">
    <title>Upload MP3</title>

    <style>
        @font-face {
            font-family: gloss;
            src: url(assets/gloss-and-bloom/gloss.ttf);
        }

        .title {
            text-transform: uppercase;
            font-weight: 900;
            border-bottom: 4px solid #9f9f9f;
        }

        .name {
            font-family: gloss;
        }

        .main {
            margin-top: 50px;
        }

        img {
            object-fit: cover;
            height: 250px;
            width: 100%;
        }

        .albumDesc {
            padding: 20px;
        }

        .albumCard {
            margin-top: 25px;
            width: 250px;
            display: block;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 0 25px #3d2173a1;
            transition: all ease 1s;
        }

        .albumCard:hover {
            transform: scale(0.90);
        }
    </style>
</head>

<body>


    <script>

        function previewPhoto() {
            document.getElementById("input-image")
            var fileReader = new FileReader();
            fileReader.readAsDataURL(document.getElementById("input-image").files[0])
            fileReader.onload = function(oFREvent) {
                document.getElementById("previewCover").src = oFREvent.target.result;
            };
        };

        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }

        $(document).ready(function() {

            $.myfunction = function() {
                $("#previewName").text($("#inputSongName").val());
                $("#previewArtist").text($("#inputSongArtist").val());
                var artist = $.trim($("#inputSongArtist").val())
                var song = $.trim($("#inputSongName").val())
                if (artist == "") {
                    $("#previewArtist").text("Composer")
                }
                if (song == "") {
                    $("#previewName").text("Song Name")
                }
            };

            $("#inputSongName").keyup(function() {
                $.myfunction();
            });

            $("#inputSongArtist").keyup(function() {
                $.myfunction();
            })

            $("#btn1").click(function() {
                $("#test1").text("Hello world!");
            });
            $("#btn2").click(function() {
                $("#test2").html("<b>Hello world!</b>");
            });
            $("#btn3").click(function() {
                $("#test3").val("Dolly Duck");
            });
        });
    </script>


    <div class="main">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h1 class="name">Feylabs Music Library</h1>
                    </div>
                </div>
                <div class="col-md-12 title">
                    <p style="font-family: Montserrat,Quicksand;"><a href="http://feylaboratory.xyz/">Feylaboratory
                        </a>Music Library</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6" style="margin-top: 20px;">

                    <form action="?" method="POST" enctype="multipart/form-data">
                        <label for="input-song">File MP3</label>
                        <input required name="inputFileSongRaw" id="input-song" accept="audio/*" type="file" onchange="" class="form-control-file">
                        <div class="form-group">
                            <label for="inputSongName">Judul Lagu</label>
                            <input name="inputSongName" type="text" class="form-control" id="inputSongName" aria-describedby="emailHelp">
                            <small required class="form-text text-muted">Choose a Song Name</small>
                        </div>
                        <div class="form-group">
                            <label for="songArtist">Artist</label>
                            <input name="inputSongArtist" type="text" required class="form-control" id="inputSongArtist">
                        </div>
                        <label for="inputSongCover">Cover Album</label>
                        <input required name="inputFileSongImage" id="input-image" accept="image/*" type="file" onchange="previewPhoto();" class="form-control-file" id="inputSongCover">
                        <button name="upload" type="submit" class="btn btn-primary">Submit</button><br><br>
                    </form>

                </div>

                <div class="col-md-6 preview">
                    <div class="albumCard">
                        <img id="previewCover" src="./assets/album/melodart.jpg" alt="">
                        <div class="albumDesc">
                            <h4 id="previewName">Song Title</h4>
                            <p id="previewArtist">Composer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include 'connect.php';
    if (isset($_POST['upload'])) {


        $fileIMG = $_FILES['inputFileSongImage'];
        $fileMP3 = $_FILES['inputFileSongRaw'];


        $fileIMG_name = $_FILES['inputFileSongImage']['name'];
        $fileIMG_type = $_FILES['inputFileSongImage']['type'];
        $fileIMG_size = $_FILES['inputFileSongImage']['size'];
        $fileIMG_temp_loc = $_FILES['inputFileSongImage']['tmp_name'];

         

        $fileMP3_name = $_FILES['inputFileSongRaw']['name'];
        $fileMP3_type = $_FILES['inputFileSongRaw']['type'];
        $fileMP3_size = $_FILES['inputFileSongRaw']['size'];
        $fileMP3_temp_loc = $_FILES['inputFileSongRaw']['tmp_name'];

        $file_storeNameIMG = "assets/album/$fileIMG_name";
        $file_storeNameMP3 = "assets/mp3_files/$fileMP3_name";


        $imgStat =  move_uploaded_file($fileIMG_temp_loc, $file_storeNameIMG);
        $mp3Stat =  move_uploaded_file($fileMP3_temp_loc, $file_storeNameMP3);

        if ($imgStat && $mp3Stat) {
            echo "Upload berhasil!";
        }else{
            die("Cannot write to destination file");
        }
        

        $songName =mysqli_real_escape_string($conn,$_POST['inputSongName']);
        $songArtist = mysqli_real_escape_string($conn,$_POST['inputSongArtist']);
        $url = mysqli_real_escape_string($conn,$_POST['inputSongArtist']);

        $query = "INSERT INTO 
                `music`( `name`, `artist`, `url`, `cover`, `status`) VALUES 
                ('$songName','$songArtist','$file_storeNameMP3','$file_storeNameIMG','release')";
        
        $e =  mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($e) {
            echo 'Berhasil Input ke DB';
        }else{
            echo 'Gagal Input ke DB';
        }        
       
    }
    ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>