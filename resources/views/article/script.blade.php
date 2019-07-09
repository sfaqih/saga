<script src="{{ asset('admin/plugins/select2/dist/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin/plugins/fileuploads/js/dropify.min.js') }}"></script>


<script>
    $(function () {
        $('.select2').select2();
    tinymce.init({
        selector: '#test textarea[name="content"]',
    });

    $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop a file here or click',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                },
                error: {
                    'fileSize': 'The file size is too big (5M max).'
                }
            });
    
    });
</script>