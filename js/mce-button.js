/**
 * Created by pchotrani on 23/03/16.
 */

(function() {
    tinymce.PluginManager.add('image_align', function( editor, url ) {
        editor.addButton('image_align', {
            title: 'Align Image',
            icon: 'icon dashicons-wordpress-alt',
            onclick: function() {
                //editor.insertContent('Finally done it');
                editor.selection.setContent('<div class="col-md-6">'+ editor.selection.getContent()+'</div');
            }
        });
    });
})();



/*(function() {

    tinymce.create('tinymce.plugins.WRAP', {
        /!**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished its initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         *!/
        init : function(ed, url) {

            //this command will be executed when the button in the toolbar is clicked
            ed.addCommand('mceWRAP', function() {

                selection = tinyMCE.activeEditor.selection.getContent();

                //prompt for a tag to use
                //tag = prompt('Tag:');
                //tinyMCE.activeEditor.selection.setContent('<' + tag + '>' + selection + '</' + tag + '>');

                tinyMCE.activeEditor.selection.setContent('<div class="classy-div">' + selection + '</div>');

            });

            ed.addButton('WRAP', {
                title : 'WRAP.desc',
                cmd : 'mceWRAP',
                //image : url + '/your-icon.gif'
                icon: 'icon dashicons-wordpress-alt',
            });

        },

    });

    // Register plugin
    tinymce.PluginManager.add('WRAP', tinymce.plugins.WRAP);
})();*/
