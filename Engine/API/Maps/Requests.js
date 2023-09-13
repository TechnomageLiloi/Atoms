Atoms.Maps = {
    show: function ()
    {
        API.request('Atoms.Maps.Show', {

        }, function (data) {
            $('#page').html(data.render);
            // Atoms.Trigger.initialize();
        }, function () {

        });
    },

    getCollection: function (keyRune, wrap)
    {
        API.request('Atoms.Maps.Collection', {
            key_rune: keyRune
        }, function (data) {
            wrap.html(data.render);
        }, function () {

        });
    },

    edit: function ()
    {
        API.request('Atoms.Maps.Edit', {

        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (keyMap)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#game-maps-edit');
        API.request('Atoms.Maps.Save', {
            key_map: keyMap,
            title: jq_block.find('[name=title]').val(),
            status: jq_block.find('[name=status]').val(),
            program: jq_block.find('[name=program]').val()
        }, function (data) {
            Atoms.Maps.show();
        }, function () {

        });
    },

    remove: function (keyMap)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        if(!confirm('This will remove not only map, but lessons, tickets, etc. Sure?'))
        {
            return;
        }

        API.request('Atoms.Game.Maps.Remove', {
            key_map: keyMap
        }, function (data) {
            Atoms.Maps.show();
        }, function () {

        });
    }
}