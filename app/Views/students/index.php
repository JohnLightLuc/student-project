<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="container" id="content" style="margin-top: 5rem;">
    <div class="d-flex justify-content-between mb-2">
        <h2>List of students</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-plus"></i> Register student
        </button>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <tr v-for="student in students" v-cloak :key="student.id">
                <th scope="row">${ student.id }</th>
                <td>${ student.first_name }</td>
                <td>${ student.last_name }</td>
                <td>${ student.email }</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a type="button" :href="'/students/'+student.id" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                        <button type="button" 
                           class="btn btn-outline-primary" 
                            data-bs-toggle="modal" data-bs-target="#updateModal" 
                           :data-first_name="student.first_name"
                           :data-last_name="student.last_name"
                           :data-email="student.email"
                           :data-id="student.id">
                               <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button type="button" :data-id="student.id" v-on:click="delete_student(student.id)" class="btn btn-outline-primary deleteBtn" ><i class="fa-solid fa-trash"></i></button>
                    </div>
                </td>
            </tr>

            <tr v-if="students.length == 0" style="text-align:center;">
                <th scope="row" colspan='5'>Empty data</th>
            </tr>

        </tbody>
    </table>


    <!-- Create Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register new student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/formdata">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" aria-describedby="first_name">
                            <div v-if="'last_name' in errors" id="first_name" class="form-text text-danger">${ errors.first_name }</div>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control"  aria-describedby="last_name">
                            <div v-if="'last_name' in errors" id="last_name" class="form-text text-danger">${ errors.last_name }</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name='email' class="form-control" id="email" aria-describedby="emailHelp">
                            <div v-if="'email' in errors" id="emailHelp" class="form-text text-danger">${ errors.email }</div>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="modal-dismiss" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="register-btn" v-on:click="create_student()" class="btn btn-primary">Register </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update student info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  method="POST" enctype="multipart/formdata" id="update-form">
                        <input type="text" name="student_id" id="student_id" hidden />
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="firstName" aria-describedby="first_nameHelp">
                            <div v-if="'last_name' in upErrors" id="firstName" class="form-text text-danger">${ upErrors.first_name }</div>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="lastName" aria-describedby="last_name">
                            <div v-if="'last_name' in upErrors" id="lastName" class="form-text text-danger">${ upErrors.last_name }</div>
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email address</label>
                            <input type="email" name='email' class="form-control" id="Email" aria-describedby="emailHelp">
                            <div v-if="'email' in upErrors" id="emailHelp" class="form-text text-danger">${ upErrors.email }</div>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="update-dismiss" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="update-btn" v-on:click="update_student()" class="btn btn-primary">Update </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    // ------  Delete student with AJax ------- //
    // $(document).ready(function(){
    //     $(".deleteBtn").click(function(){
    //         var studentId = this.getAttribute("data-id");
    //         console.log("/students/"+studentId+'/delete');

    //         if (confirm("Do you confirm the deletion of the students ?") == true) {
    //             $.ajax({
    //                 type: "DELETE",
    //                 url: "/students/"+studentId+'/delete',
    //                 success: function (data) {
    //                     console.log(data)
    //                     // your callback here
    //                     if(data.success == true){
    //                         vueApp.students = data.data;
    //                         iziToast.success({
    //                             title: 'Delete',
    //                             message: data.message,
    //                             position: 'bottomRight',
    //                         });
    //                     }else{
    //                         console.log(vueApp.data);
    //                         iziToast.warning({
    //                             title: 'Error',
    //                             message: data.message,
    //                             position: 'center',
    //                         });

    //                     }
    //                 },
    //                 error: function (error) {
    //                     // handle error
    //                     console.log(error.message)
    //                     iziToast.error({
    //                         title: 'Error',
    //                         message: error.message,
    //                         position: 'center',
    //                     });
    //                 },
    //                 async: true,
    //                 cache: false,
    //                 contentType: false,
    //                 processData: false,
    //                 timeout: 60000
    //             });
    //         }
            
    //     });
    // });


    // ####------  start VueJS Code to manage students  ###------- //
    var vueApp = new Vue({
        el: '#content',
        delimiters: ['${', '}'],
        data: {
            message: 'Hello Vue !',
            students: [],
            errors: {},
            upErrors: {},
        },
        mounted() {
            this.getStudents();
        },
        methods: {
            getStudents() {
                axios.get(location.origin + '/students/all')
                    .then((res) => {
                        console.log(res.data);
                        if (res.data.success == true) {
                            console.log(res.data.data)
                            this.students = res.data.data
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            create_student() {
                var form = $('form')[0]; // You need to use standard javascript object here
                var formData = new FormData(form);
                axios.post(location.origin + '/students', formData)
                    .then((res) => {
                        if (res.data.success == true) {
                            $('#modal-dismiss').click();
                            $('#first_name').val('');
                            $('#last_name').val('');
                            $('#email').val('');
                            $('#photo').val('');

                            this.students = res.data.data;

                            iziToast.success({
                                title: 'Register',
                                message: res.data.message,
                                position: 'bottomRight',
                            });
                        }
                        

                        if ("errors" in res.data) {
                            this.errors = res.data.errors;
                            
                        } else {
                            this.errors = {}
                        }
                        console.log(this.errors);

                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            update_student(){
                var studentId = $('#student_id').val();
                var form = $('form')[1];
                console.log(form);
                var formData = new FormData(form);
                axios.post(location.origin + '/students/'+studentId+'/update', formData)
                    .then((res) => {
                        if (res.data.success == true) {
                            $('#update-dismiss').click();
                            $('#firstName').val('');
                            $('#lastName').val('');
                            $('#Email').val('');
                            $('#Photo').val('');

                            this.students = res.data.data;

                            iziToast.success({
                                title: 'Update',
                                message: res.data.message,
                                position: 'bottomRight',
                            });
                        }
                        
                        if ("errors" in res.data) {
                            this.upErrors = res.data.errors;
                            
                        } else {
                            this.upErrors = {}
                        }

                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            delete_student(id){
                console.log(vueApp.students);
                if (confirm("Do you confirm the deletion of the students ?") == true) {
                    axios.delete(location.origin + "/students/"+id+'/delete')
                    .then((res) => {
                        if(res.data.success == true){
                            this.students = res.data.data;
                            iziToast.success({
                                title: 'Delete',
                                message: res.data.message,
                                position: 'bottomRight',
                            });
                        }else{
                            iziToast.warning({
                                title: 'Error',
                                message: res.data.message,
                                position: 'center',
                            });

                        }
                    })
                    .catch((err)=>{
                        iziToast.error({
                            title: 'Error',
                            message: err.message,
                            position: 'center',
                        });
                    });
                }
            }
            
        }
    })
    // ------  End VueJS Area ------- //

    
    // ------ Fill updated modal ---- ///
    $('#updateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var first_name = button.data('first_name');
        var last_name = button.data('last_name');
        var email = button.data('email')
        var id = button.data('id')
        console.log(first_name, last_name,email, id);
        
        var modal = $(this)
        modal.find('#firstName').val(first_name);
        modal.find('#lastName').val(last_name)
        modal.find('#Email').val(email)
        modal.find('#student_id').val(id)
    })
</script>
<?= $this->endSection() ?>