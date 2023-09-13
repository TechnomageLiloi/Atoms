<?php if($collection->count()): ?>
    <link href="/Engine/API/Repositories/Collection/Style.css" rel="stylesheet" />
    <hr/>
    <div id="repositories-collection">
        <h3>Atoms</h3>
        <table>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Global/Local</th>
                <th>Actions</th>
            </tr>
            <?php foreach($collection as $entity): ?>
                <tr>
                    <td>
                        <?php echo $entity->getTitle(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getStatusCaption(); ?>
                    </td>
                    <td>
                        <a href="<?php echo $entity->getGlobal(); ?>" target="_blank">
                            <?php echo $entity->getLocal(); ?>
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="Atoms.Repositories.edit('<?php echo $entity->getKeyAtom(); ?>');">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>