<link href="/Engine/API/Maps/Collection/Style.css" rel="stylesheet" />
<?php if($collection->count()): ?>
    <hr/>
    <table>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php foreach($collection as $entity): ?>
            <tr>
                <td>
                    <a href="<?php echo $entity->getUrl(); ?>">
                        <?php echo $entity->getTitle(); ?>
                    </a>
                </td>
                <td><?php echo $entity->getStatusCaption(); ?></td>
                <td>
                    <a href="javascript:void(0)" class="butn" onclick="Rune.Maps.remove('<?php echo $entity->getKey(); ?>');">Remove</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>