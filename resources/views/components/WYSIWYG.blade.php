@props(['name'])

<textarea name="{{ $name }}"  id="tinymce-mytextarea"></textarea>


<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.2/tinymce.min.js"></script>
<script>
    // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                selector: '#tinymce-mytextarea',
                height: 300,
                menubar: false,
                statusbar: false,
                directionality: 'rtl',
                plugins: [

                ],
                toolbar: "undo redo spellcheckdialog  | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | align lineheight checklist bullist numlist | indent outdent | removeformat typography",
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 25px; -webkit-font-smoothing: antialiased; }'
                // font_size_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
            }
            if (localStorage.getItem("tablerTheme") === 'dark') {
                options.skin = 'oxide-dark';
                options.content_css = 'dark';
            }
            tinyMCE.init(options);
            const editor = tinymce.get('tinymce-mytextarea');
            editor.on('change', function() {
                @this.setDescription(editor.getContent());
            })
        })


    // @formatter:on
</script>

