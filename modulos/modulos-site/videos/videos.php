<?php
include '../../../config.php';
?>

<!DOCTYPE HTML>
<?php include_once path('template/template-site/head.php'); ?>
<header id="header">
    <div class="logo container">
        <div>
            <h1><a href="<?= arquivo('index.php') ?>" id="logo"></a></h1>
            <p> Galeria de videos</p>
        </div>
    </div>
</header>
<html>

<body class="is-preload">
    <div id="page-wrapper">

        <?php include_once path('template/template-site/navbar.php'); ?>
        <!-- Main -->

        <section id="main">
            <div class="text-rigth">
                <a class="button" href="https://www.youtube.com/@academiaaracatubensedeletr9776" class="button">Ver mais vídeos</a>
            </div>
            <br>
            <div class="container">


                <div class="row">
                    <?php
                    $sql = "SELECT * FROM videos ORDER BY id ASC ";
                    $videos = retornaDados($sql);
                    $videoCount = 0; // Variável para contar o número de vídeos exibidos

                    foreach ($videos as $video) {
                        $videoCount++; // Incrementa o contador

                        if ($videoCount > 5) {
                            break; // Interrompe o loop se o número de vídeos exibidos for maior que 5
                        }
                    ?>
                        <div class="col-12">
                            <section class="box blog">
                                <div>
                                    <div class="row">

                                        <div class="col-3 col-6-medium col-12-small">
                                            <!-- Feature -->
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <section>
                                                        <h3 class="titulo-hover"><?= $video['nome'] ?></a></h3>
                                                        <div class="video-container">
                                                            <iframe width="560" height="315" src="<?= getEmbedLink($video['link']) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="respVideo"></iframe>
                                                            
                                                        </div>
                                                            <p class="mb-4">Sobre: <?= $video['sobre'] ?></p>
                                                    </section>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>


        <!-- Footer -->
        <footer id="footer">
            <div class="container">
                <div class="row gtr-200">
                    <?php include_once path('template/template-site/contato.php'); ?>
                </div>
            </div>
        </footer>

    </div>

    <?php include_once path('template/template-site/importacoes-js.php'); ?>
</body>

</html>