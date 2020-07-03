<!-- page script -->
<script>
    const get_obj_form = (selector) => {
        var data = {}
        var form = $(selector).serializeArray();
        $.each(form, function(index, input) {
            data[input.name] = input.value
        });
        return data
    }

    const delete_data = (id) => {
        $.post(base_url + "Person/delete", {
            id: id
        }, (response) => console.log(response), "json");
        $("#table_data").DataTable().ajax.reload()
    }

    const open_edit_data = (id) => {
        var data = get_obj_form('#person_form_edit')
        $.post(base_url + "Person/get/", {
            id: id
        }, (response) => {
            console.log(response)
            $.each($('#person_form_edit input'), (index, input) => {
                $.each(response.data, function(index, data) {
                    for (let key in data) {
                        if (key == input.name) {
                            input.value = data[key]
                        }
                    }

                });
            });
        }, "json");
        $('#modal-edit').modal('show')
    }

    const add_data = () => {
        var data = get_obj_form('#person_form')
        $.post(base_url + "Person/post", data, (response) => console.log(response), "json");
        $("#table_data").DataTable().ajax.reload()
        $('#modal-default').modal('hide')
    }

    const save_data = () => {
        let id = $('#person_form_edit input[name="id"]').val()
        var data = get_obj_form('#person_form_edit')
        $.post(base_url + "Person/update", data, (response) => console.log(response), "json");
        $("#table_data").DataTable().ajax.reload()
        $('#modal-edit').modal('hide')
    }

    $(() => {
        $("#table_data").DataTable({
            "responsive": true,
            "autoWidth": false,
            "ajax": base_url + "Person/get",
            "columns": [{
                    "data": "firstname"
                },
                {
                    "data": "lastname"
                },
                {
                    "data": "nickname"
                },
                {
                    "data": "age"
                },
                {
                    "data": 'id',
                    render: function(dataField) {
                        return `<div class="row">
                                <div class="col">
                                <button type="button" class="btn btn-block bg-gradient-warning btn-sm" onclick="open_edit_data(${dataField})"><i class="fas fa-edit"></i></button>
                                </div>
                                <div class="col">
                                <button type="button" class="btn btn-block bg-gradient-danger btn-sm" onclick="delete_data(${dataField})"><i class="fas fa-trash-alt"></i></button>
                                </div>
                                </div>`;
                    }
                }
            ]
        });

    });
</script>

<style>
    .small_button {
        max-width: 80px;
    }
</style>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- a -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">ข้อมูลบุคคล</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">

                        <button type="button" class="btn btn-block btn-primary btn-sm small_button mb-3" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i></button>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ตารางแสดงข้อมูลบุคคล</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table_data" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ชื่อจริง</th>
                                            <th>นามสกุล</th>
                                            <th>ชื่อเล่น</th>
                                            <th>อายุ</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <!-- ajax resource -->
                                    <tfoot>
                                        <tr>
                                            <th>ชื่อจริง</th>
                                            <th>นามสกุล</th>
                                            <th>ชื่อเล่น</th>
                                            <th>อายุ</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <div class="card-footer">
                ข้อมูลบุคคล
            </div>
        </div>
        <!-- a -->

        <div class="modal fade" id="modal-default" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" id="person_form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="Firstname">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Lastname">
                                    </div>
                                    <div class="form-group">
                                        <label for="nickname">Nickname</label>
                                        <input type="text" class="form-control" name="nickname" placeholder="Nickname">
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="text" class="form-control" name="age" placeholder="Age">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <label for="picture">Picture</label>
                                        <input type="text" class="form-control" name="picture" placeholder="Picture">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="add_data()">Add data</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-edit" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" id="person_form_edit">
                                <div class="card-body">
                                    <input type="hidden" name="id">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="Firstname">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Lastname">
                                    </div>
                                    <div class="form-group">
                                        <label for="nickname">Nickname</label>
                                        <input type="text" class="form-control" name="nickname" placeholder="Nickname">
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="text" class="form-control" name="age" placeholder="Age">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <label for="picture">Picture</label>
                                        <input type="text" class="form-control" name="picture" placeholder="Picture">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="save_data()">Update data</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->