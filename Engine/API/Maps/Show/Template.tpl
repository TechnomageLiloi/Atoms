<link href="/Engine/API/Maps/Show/Style.css" rel="stylesheet" />

<div id="game-maps-show" class="stylo">
    <div class="seeds">
        <?php echo $entity->getSeeds(); ?>
    </div>
    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>

    <?php if($entity->getProgram()): ?>
        <hr/>
        <?php echo $entity->parseProgram(); ?>
    <?php endif; ?>

    <div id="game-maps-collection">
        <script>Atoms.Maps.getCollection("<?php echo $entity->getKey(); ?>", $('#game-maps-collection'));</script>
    </div>

    <div id="game-repositories-collection">
        <script>Atoms.Repositories.getCollection("<?php echo $entity->getKey(); ?>", $('#game-repositories-collection'));</script>
    </div>
</div>