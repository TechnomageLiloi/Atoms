<link href="/Engine/API/Repositories/Edit/Style.css" rel="stylesheet" />

<div id="game-repositories-edit">
    <a href="javascript:void(0)" onclick="Rune.Repositories.save('<?php echo $entity->getKeyAtom(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Maps.show();">Cancel</a>
    <hr/>
    <table>
        <tr><td style="width: 10%;">Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>" /></td></tr>

        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Summary</td><td><textarea name="summary"><?php echo $entity->getSummary(); ?></textarea></td></tr>

        <tr><td>Global</td><td><input type="text" name="global" value="<?php echo $entity->getGlobal(); ?>" /></td></tr>

        <tr><td>Local</td><td><input type="text" name="local" value="<?php echo $entity->getLocal(); ?>" /></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Repositories.save('<?php echo $entity->getKeyAtom(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Maps.show();">Cancel</a>
</div>