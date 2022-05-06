<div class="modal fade" id="importModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" id="form_validation">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Import CSV/EXCEL</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <label for="password">Choose CSV/EXCEL file </label>
                        <div class="form-group">
                            <input type="file" id="import_file" name="import_file" class="form-control" required accept=".csv,  application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">Import data</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('pagescripts')
<script>
    $('#form_validation').validate({
        highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
        },
        submitHandler: function(form) {
            var $this = $(form);
            var formData = new FormData(form);
            $.ajax({
                url: "{{route('user.import')}}",
                type: 'POST',
                dataType: "json",
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(response) {
                    if(response.status){
                        $('#importModal').modal('hide');
                        swal("Success", "File Uploaded", "success");
                    }
                },
                error: function(response) {
                    swal("Error", "Plese Try again later", "error");
                }
            });
        }
    });
</script>
@endsection