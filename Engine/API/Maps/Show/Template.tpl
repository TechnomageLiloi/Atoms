<link href="/Engine/API/Maps/Show/Style.css" rel="stylesheet" />

<div id="game-maps-show" class="stylo">
    <div class="seeds">
        <?php echo $entity->getSeeds(); ?>
    </div>
    <h1 class="wrap-title">
        <?php $drive = $entity->getDrive(); ?>

        <?php if($drive): ?>
            <a href="<?php echo $drive; ?>" target="_blank">
                <?php echo $entity->getTitle(); ?>
            </a>
        <?php else: ?>
            <?php echo $entity->getTitle(); ?>
        <?php endif; ?>
    </h1>

    <?php if($entity->getProgram()): ?>
        <hr/>
        <?php echo $entity->parseProgram(); ?>
    <?php endif; ?>

    <div id="game-maps-collection">
        <script>Rune.Maps.getCollection("<?php echo $entity->getKey(); ?>", $('#game-maps-collection'));</script>
    </div>

    <div id="game-repositories-collection">
        <script>Rune.Repositories.getCollection("<?php echo $entity->getKey(); ?>", $('#game-repositories-collection'));</script>
    </div>
</div>