/**
 * Created by pchotrani on 23/03/16.
 */

(function() {
    tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
        editor.addButton('my_mce_button', {
            title: 'My test button',
            icon: 'icon dashicons-wordpress',
            onclick: function() {
                editor.insertContent('Finally done it');
            }
        });
    });
})();
