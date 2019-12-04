var editors = document.querySelectorAll('.ckeditor-full');
for (var i = 0; i < editors.length; ++i) {
    CKEDITOR.replace(editors[i].id, {
        toolbar: [
            { items: ['Format', 'Styles', 'Font', 'FontSize'] },
            { items: ['Bold', 'Italic', 'Strike', 'Subscript', 'Superscript'] },
            { items: ['RemoveFormat'] },
            { items: ['NumberedList', 'BulletedList', 'Outdent', 'Indent'] },
            { items: ['Blockquote', 'CreateDiv', '-', 'BidiLtr', 'BidiRtl', 'Language'] },
            { items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
            { items: ['Link', 'Unlink', 'Anchor'] },
            { items: ['Image', 'oembed', 'Table', 'HorizontalRule', 'SpecialChar'] },
            { items: ['Maximize', 'ShowBlocks', 'Source'] },
        ],
        entities: false,
        format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div',
        stylesSet: [
            { name: 'Button 1', element: 'a', attributes: { class: 'btn btn-primary' } },
            { name: 'Button 2', element: 'a', attributes: { class: 'btn btn-secondary' } },
            { name: 'Button 1 outline', element: 'a', attributes: { class: 'btn btn-outline-primary' } },
            { name: 'Button 2 outline', element: 'a', attributes: { class: 'btn btn-outline-secondary' } },
            { name: 'Link button', element: 'a', attributes: { class: 'btn btn-link' } },

            { name: 'Alert Success', element: 'div', attributes: { class: 'alert alert-success' } },
            { name: 'Alert Info', element: 'div', attributes: { class: 'alert alert-info' } },
            { name: 'Alert Warning', element: 'div', attributes: { class: 'alert alert-warning' } },
            { name: 'Alert Danger', element: 'div', attributes: { class: 'alert alert-danger' } },

            { name: 'Clear Container', element: 'div', styles: { clear: 'both' } },

            { name: 'Typewriter', element: 'tt' },

            { name: 'Computer Code', element: 'code' },
            { name: 'Keyboard Phrase', element: 'kbd' },
            { name: 'Sample Text', element: 'samp' },
            { name: 'Variable', element: 'var' },

            { name: 'Deleted Text', element: 'del' },
            { name: 'Inserted Text', element: 'ins' },

            { name: 'Cited Work', element: 'cite' },
            { name: 'Inline Quotation', element: 'q' },

            { name: 'Language: RTL', element: 'span', attributes: { dir: 'rtl' } },
            { name: 'Language: LTR', element: 'span', attributes: { dir: 'ltr' } },
        ],
        extraPlugins: 'image2,codemirror,panelbutton,oembed,justify,showblocks,div,dialogadvtab',
        removePlugins: 'image',
        extraAllowedContent: 'dl dt dd',
        bodyClass: 'rich-content',
        height: 500,
        contentsCss: ['/css/public.css'],
        codemirror: {
            theme: 'twilight',
        },
        language: $('html').attr('lang'),
        filebrowserBrowseUrl: '/admin/files?view=filepicker',
        filebrowserImageBrowseUrl: '/admin/files?type=i&view=filepicker',
    });
}
