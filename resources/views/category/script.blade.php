<script>
    base = "{{ url('/') }}";
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });        

        $(document).on('click', '.edit', function (e) {
            var id = $(this).data('id');
            $target = base+'/category/' + id + '/edit';

            $.get($target, function (data) {
                $('input[name="name"]').val(data.name);
                $('input[name="slug"]').val(data.slug);
                $('#edit form').attr('action', base + '/category/' + id);
                $('#edit').modal('show');
            });
        });
    });
</script>