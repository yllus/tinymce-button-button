(function() {
    tinymce.PluginManager.add('tinymce_button_button', function( editor, url ) {
        editor.addButton( 'tinymce_button_button', {
            title: 'Insert button',
            icon: 'icon dashicons-download',
            onclick: function() {
                editor.windowManager.open( {
                    title: 'Insert Button',
                    body: [{
                        type: 'textbox',
                        name: 'label',
                        label: 'Label Text'
                    },
                    {
                        type: 'textbox',
                        name: 'url',
                        label: 'URL'
                    },
                    {
                        type: 'listbox', 
                        name: 'target', 
                        label: 'Open In', 
                        'values': [
                            { text: 'Current tab', value: '_self' },
                            { text: 'New tab', value: '_blank' },
                        ]
                    }],
                    onsubmit: function( e ) {
                        editor.insertContent( '<a href="' + e.data.url + '" target="' + e.data.target + '"><button type="button">' + e.data.label + '</button></a>');
                    }
                });
            }
        });
    });
})();