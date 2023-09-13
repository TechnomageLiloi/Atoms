<?php if($collection->count()): ?>
    <link href="/Engine/API/Maps/Collection/Style.css" rel="stylesheet" />
    <hr/>
    <div id="maps-collection">
        <ol>
            <?php foreach($collection as $entity): ?>
                <li>
                    <a href="<?php echo $entity->getUrl(); ?>">
                        <?php echo $entity->getTitle(); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
<?php endif; ?>