<?php
include_once TEMPLATE.'basic/navbar.php';
include_once COMMON.'class.common.php';
include_once COMMON.'class.paginate.php';
include_once 'blade/view.publicationHome.blade.php';
?>

<div class="container">

    <!--Publication List-->
    <div class="row">
        <?php
        $results_per_page=8;
        $_Paginate=new Paginate();
        $PublicationList=$_Paginate->loadPaginatedData($_PublicationHomeBao->getLimitPublication($_Paginate->paginationInitial(),$results_per_page));

        foreach ($PublicationList as $publication){
            ?>
            <div class="col-lg-3 portfolio-item">
                <div class="card h-37">
                    <a href="<?php echo PageUtil::$PUBLICATION_MEMBER.'?id='.$publication->getPublicationId();?>" class="card-header">
                        <img class="card-img-top" src="<?php echo $publication->getPublicationThumbnail();?>" alt="Publication" ></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="<?php echo PageUtil::$PUBLICATION_MEMBER.'?id='.$publication->getPublicationId();?>"><?php echo $publication->getPublicationTitle();?></a>
                        </h4>
                        <p class="card-text"><?php
                            if(strlen($publication->getPublicationDescription())>80){
                                echo substr($publication->getPublicationDescription(),0,80).'...';
                            }
                            else{
                                echo $publication->getPublicationDescription();
                            }
                            ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <!--Pagination-->
    <?php
    echo $_Paginate->paginate($results_per_page,PageUtil::$PUBLICATION_HOME,$_PublicationBao->getAllPublication());
    ?>

</div>
