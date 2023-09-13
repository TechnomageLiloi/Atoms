Atoms.Repositories = {
    getCollection: function (keyMap, wrap)
    {
        API.request('Atoms.Repositories.Collection', {
            keyMap: keyMap
        }, function (data) {
            wrap.html(data.render);
        }, function () {

        });
    },

    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        if(!confirm('This action can not be undone. Sure?'))
        {
            return;
        }

        API.request('Atoms.Repositories.Create', {

        }, function () {
            Atoms.Maps.show();
        }, function () {

        });
    },

    edit: function (keyAtom)
    {
        API.request('Atoms.Repositories.Edit', {
            keyAtom: keyAtom
        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (keyAtom)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#game-repositories-edit');
        API.request('Atoms.Repositories.Save', {
            keyAtom: keyAtom,
            title: jq_block.find('[name=title]').val(),
            summary: jq_block.find('[name=summary]').val(),
            global: jq_block.find('[name=global]').val(),
            local: jq_block.find('[name=local]').val(),
            status: jq_block.find('[name=status]').val()
        }, function (data) {
            location.reload();
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

        API.request('Atoms.Repositories.Remove', {
            keyMap: keyMap
        }, function (data) {
            location.reload();
        }, function () {

        });
    }
}