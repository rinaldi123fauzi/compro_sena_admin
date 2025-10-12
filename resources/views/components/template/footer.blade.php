<!-- JAVASCRIPT -->
<script src="{{ URL::asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ URL::asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ URL::asset('') }}assets/libs/node-waves/waves.min.js"></script>
<script src="{{ URL::asset('') }}assets/libs/feather-icons/feather.min.js"></script>
<script src="{{ URL::asset('') }}assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="{{ URL::asset('') }}assets/js/plugins.js"></script>

<!-- apexcharts -->
<script src="{{ URL::asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="{{ URL::asset('') }}assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="{{ URL::asset('') }}assets/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="{{ URL::asset('') }}assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="{{ URL::asset('') }}assets/js/pages/dashboard-ecommerce.init.js"></script>

<!-- App js -->
<script src="{{ URL::asset('') }}assets/js/app.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ URL::asset('') }}assets/js/pages/datatables.init.js"></script>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>

<!--select2 cdn-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('') }}assets/js/pages/select2.init.js"></script>


<!-- apexcharts -->
<script src="{{ URL::asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Dashboard init -->
<script src="{{ URL::asset('') }}assets/js/pages/dashboard-crm.init.js"></script>


<!-- ckeditor -->
<script src="{{ URL::asset('') }}assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<!-- quill js -->
<script src="{{ URL::asset('') }}assets/libs/quill/quill.min.js"></script>
<!-- init js -->
<script src="{{ URL::asset('') }}assets/js/pages/form-editor.init.js"></script>

<!-- TinyMCE (self-hosted) -->
<script src="{{ URL::asset('') }}assets/libs/tinymce/tinymce.min.js"></script>

<script>
    // Only initialize CKEditor if specific ID elements exist on the page
    ['editor', 'editor1', 'editor2', 'editor3', 'editor4'].forEach(function(editorId) {
        var editorElement = document.querySelector('#' + editorId);
        if (editorElement) {
            ClassicEditor
                .create(editorElement)
                .then(function(editor) {
                    editor.ui.view.editable.element.style.height = '200px';
                })
                .catch(error => {
                    console.error('CKEditor error for #' + editorId + ':', error);
                });
        }
    });
</script>

<!-- TinyMCE Initialization for Slider Form -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Common TinyMCE configuration
        const commonConfig = {
            menubar: false,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'charmap',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'table', 'help', 'wordcount',
                'emoticons', 'template', 'codesample'
            ],
            toolbar: 'undo redo | blocks styleselect fontfamily fontsize | ' +
                'bold italic underline strikethrough | forecolor backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | removeformat | ' +
                'table link image media | emoticons template codesample | ' +
                'code fullscreen | help',
            base_url: "{{ URL::asset('') }}assets/libs/tinymce",
            suffix: ".min",
            promotion: false,
            license_key: 'gpl',
            content_css: "{{ URL::asset('') }}assets/css/plus-jakarta-sans.css",
            content_style: `
                body { font-family:'Plus Jakarta Sans',Arial,Helvetica,sans-serif; font-size:14px; line-height: 1.6; }
                div { margin: 0; padding: 0; }
                p { margin: 1em 0; }
                h1, h2, h3, h4, h5, h6 { margin: 1em 0 0.5em; }
                .alert { padding: 10px; margin: 10px 0; border-radius: 4px; }
                .alert-warning { background: #fff3cd; color: #856404; border: 1px solid #ffeaa7; }
                .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
                .alert-info { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
                .alert-danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
                .lead { font-size: 1.25rem; font-weight: 300; }
                .text-muted { color: #6c757d; }
                .text-center { text-align: center; }
                .text-end { text-align: right; }
                blockquote { border-left: 4px solid #ddd; margin: 1em 0; padding-left: 1em; color: #666; }
                pre { background: #f8f9fa; padding: 1em; border-radius: 4px; overflow-x: auto; }
                code { background: #f8f9fa; padding: 2px 4px; border-radius: 3px; font-family: monospace; }
            `,
            font_family_formats: 'Plus Jakarta Sans=Plus Jakarta Sans,Arial,Helvetica,sans-serif; Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats',
            font_size_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
            // Configuration for plain text without paragraph wrapping
            forced_root_block: 'div',
            forced_root_block_attrs: {},
            block_formats: 'Normal Text=div; Paragraph=p; Main Title=h1; Section Title=h2; Sub Title=h3; Small Heading=h4; Smallest Heading=h5; Preformatted Text=pre; Quote Block=blockquote; Code Block=code; Address=address',

            // Allow empty paragraphs and line breaks
            allow_empty_paragraphs: true,
            br_in_pre: true,

            // Custom formatting options
            formats: {
                // Define custom "normal text" format that uses div without classes
                normaltext: {
                    block: 'div',
                    remove: 'all'
                },
                // Define paragraph format explicitly
                paragraph: {
                    block: 'p'
                }
            },
            style_formats: [{
                    title: 'Text Styles',
                    items: [{
                            title: 'Highlight',
                            inline: 'mark'
                        },
                        {
                            title: 'Small Text',
                            inline: 'small'
                        },
                        {
                            title: 'Deleted Text',
                            inline: 'del'
                        },
                        {
                            title: 'Inserted Text',
                            inline: 'ins'
                        },
                        {
                            title: 'Superscript',
                            inline: 'sup'
                        },
                        {
                            title: 'Subscript',
                            inline: 'sub'
                        }
                    ]
                },
                {
                    title: 'Block Styles',
                    items: [{
                            title: 'Alert Box',
                            block: 'div',
                            classes: 'alert alert-warning'
                        },
                        {
                            title: 'Success Box',
                            block: 'div',
                            classes: 'alert alert-success'
                        },
                        {
                            title: 'Info Box',
                            block: 'div',
                            classes: 'alert alert-info'
                        },
                        {
                            title: 'Danger Box',
                            block: 'div',
                            classes: 'alert alert-danger'
                        }
                    ]
                },
                {
                    title: 'Custom Paragraphs',
                    items: [{
                            title: 'Lead Paragraph',
                            block: 'p',
                            classes: 'lead'
                        },
                        {
                            title: 'Text Muted',
                            block: 'p',
                            classes: 'text-muted'
                        },
                        {
                            title: 'Text Center',
                            block: 'p',
                            classes: 'text-center'
                        },
                        {
                            title: 'Text Right',
                            block: 'p',
                            classes: 'text-end'
                        }
                    ]
                }
            ],
            image_advtab: true,
            templates: [{
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                },
                {
                    title: 'Starting my story',
                    description: 'A cure for writers block',
                    content: 'Once upon a time...'
                },
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                }
            ]
        };

        // Initialize TinyMCE for slider form fields
        if (document.getElementById('primary_text')) {
            tinymce.init({
                selector: '#primary_text',
                height: 200,
                ...commonConfig
            });
        }

        if (document.getElementById('primary_text_eng')) {
            tinymce.init({
                selector: '#primary_text_eng',
                height: 200,
                ...commonConfig
            });
        }

        if (document.getElementById('description')) {
            tinymce.init({
                selector: '#description',
                height: 300,
                ...commonConfig
            });
        }

        if (document.getElementById('description_eng')) {
            tinymce.init({
                selector: '#description_eng',
                height: 300,
                ...commonConfig
            });
        }
    });
</script>

<!-- Form submission handler for TinyMCE -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle form submission to ensure TinyMCE content is saved
        const sliderForm = document.querySelector('form[action*="home-slider"]');
        if (sliderForm) {
            sliderForm.addEventListener('submit', function(e) {
                // Trigger TinyMCE to save content to textarea
                if (typeof tinymce !== 'undefined') {
                    tinymce.triggerSave();
                }
            });
        }
    });
</script>
