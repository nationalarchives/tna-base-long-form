/**
 * Created by pchotrani on 23/03/16.
 */

(function() {
    tinymce.PluginManager.add('image_align', function( editor, url ) {
        editor.addButton('image_align', {
            title: 'My test button',
            icon: 'icon dashicons-wordpress-alt',
            onclick: function() {
                editor.insertContent('Finally done it');
            }
        });
    });
})();
