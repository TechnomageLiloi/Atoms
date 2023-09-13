<link href="/Engine/API/Maps/Edit/Style.css" rel="stylesheet" />

<div id="game-maps-edit">
    <a href="javascript:void(0)" onclick="Rune.Maps.save('<?php echo $entity->getKey(); ?>');">Save</a>
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

        <tr><td>Program</td><td><textarea name="program"><?php echo $entity->getProgram(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Maps.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Maps.show();">Cancel</a>
</div>