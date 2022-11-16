<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .equipo {
            background-image: url('../images/banner/nosotros.png');
            color: #ffffff;
        }

        .perfil {
            position: relative;
            box-sizing: border-box;
            width: calc(100% - 2em);
            overflow: hidden;
            height: 50vh;
            background-color: #ffffff;
            margin: 1em;
            cursor: pointer;
            border-radius: 10px;
            border: 3px solid #F08300;
            box-shadow: inset 0 0 15px 4px #484A5B;
            transition: all .5s;
        }

        .desc-perfil {
            padding: 2% 5%;
            background-color: #ffffff;
            width: 100%;
            position: absolute;
            bottom: -100%;
            z-index: 3;
            transition: all .5s;
            color: #000
        }

        .desc-perfil ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .desc-perfils {
            bottom: 0;
        }

        .foto-perfil img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 126%;
        }

        @media (min-width: 768px) {
            .perfil {
                height: 30vh;
                width: calc(33.33% - 2em);
            }

            .perfil:hover {
                border-radius: 0;
                transform: scale(1.3);
            }
        }

        @media (min-width: 992px) {
            .perfil {
                width: calc(25% - 2em);
                height: 38vh;
            }
        }

        .nosotros {
            padding: 10vh 10%;
            min-height: 90vh;
            background-color: #efeeee;
        }

        .nosotros h3 {
            color: #484a5b;
            font-size: 3em;
            margin-bottom: 1em;
        }

        .nosotros .row .col-md-5 {
            padding-right: 5em;
        }

        .nosotros .row .col-md-5 img {
            width: 50%;
            margin-top: 4em;
            margin-bottom: 2em;
        }

        .nosotros .row .col-md-7 div.ifra {
            width: 100%;
            height: 80%;
            border: solid 1px black;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 1em;
        }

        @media (max-width: 768px) {
            .nosotros {
                height: auto;
            }

            .nosotros .row .col-md-7 div.ifra {
                height: auto;
            }
        }

        #video-style {
            width: 100%;
            height: auto;
            border: 5px solid #F08300;
            border-radius: 20px;
        }

        #videoContent {
            position: relative;
        }

        #resp {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            width: 20%;
            height: 20%;
            border-radius: 100px;
        }

        video::-webkit-media-controls {
            display: none;
        }
    </style>

</head>

<body>

    <section class="container">
        <div id="videoContent">
            <button id="resp" class="btn naranja">Reproducir</button>
            <video class="video" id="video-style" width="320" height="240" controls>
                <source src="https://jose-mena.github.io/miscuentos/videos/<?= $_GET['video'] ?>" type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </div>
    </section>

    <script src="/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".perfil").hover(
                function() {
                    $(this).find('.desc-perfil').addClass("desc-perfils");
                },
                function() {
                    $(this).find('.desc-perfil').removeClass("desc-perfils");
                }
            );

            var vids = $("video");
            $.each(vids, function() {
                this.controls = true;
            });

            $("video").click(function() {
                if (this.paused) {
                    this.play();
                    $("#resp").attr('style', 'opacity: 0');
                } else {
                    this.pause();
                    $("#resp").attr('style', 'opacity: 1');
                }
            });

            $("#resp").click(function() {
                $("#resp").attr('style', 'opacity: 0');
                $.each(vids, function() {
                    if (this.paused) {
                        this.play();
                    } else {
                        this.pause();
                    }
                });
            });
        });
    </script>
</body>

</html>