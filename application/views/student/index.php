
<div class="row" style="margin-top:10px;">
    <div class="col-md-8" >
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">All Student</h5>
        <div id="alert_success" class="alert alert-success" role="alert" style="display:none;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
        <table id="student-table" class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>School Name</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="showdata">

            </tbody>
        </table>
        </div>
        </div>
    </div>
    <div class="col-md-4">
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">Add New Student</h5>
        <form id="student_form" method="POST" action="">
        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Enter Student Name" required>
        </div>
        <div class="form-group">
            <label for="school_name">School Name</label>
            <input type="text" class="form-control" id="school_name" name="school_name" placeholder="Enter School Name" required>
        </div>
        <div class="form-group">
            <label for="student_age">Student Age</label>
            <input type="text" class="form-control" id="student_age" name="student_age" placeholder="Enter Student Age" required>
        </div>
        <button type="submit" id="save_btn" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>       
    </div>
</div>
<!-- Update Modal -->
<div id="edit_modal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="edit_form" method="POST" action="">
      <input type="hidden" name="student_id" id="student_id" value="0">
        <div class="form-group">
            <label for="stud_name">Student Name</label>
            <input type="text" class="form-control" id="stud_name" name="stud_name" placeholder="Enter Student Name" required>
        </div>
        <div class="form-group">
            <label for="schl_name">School Name</label>
            <input type="text" class="form-control" id="schl_name" name="schl_name" placeholder="Enter School Name" required>
        </div>
        <div class="form-group">
            <label for="stud_age">Student Age</label>
            <input type="text" class="form-control" id="stud_age" name="stud_age" placeholder="Enter Student Age" required>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btn_edit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- DleteModal -->
<div id="delete_modal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btn_delete" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        showStudents();
        function showStudents(){
            $.ajax({
                type : 'ajax',
                method : 'get',
                url : '<?php echo base_url()?>student/showAllStudents',
                async : false,
                dataType : 'json',
                success : function(data){
                    console.log(data);
                    var html = '';
                        for(i=0; i<data.length; i++){
                            html += '<tr>'+
                                '<td>'+data[i].id+'</td>'+
                                '<td>'+data[i].full_name+'</td>'+
                                '<td>'+data[i].school_name+'</td>'+
                                '<td>'+data[i].age+'</td>'+
                                '<td>'+
                                    '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>'+
                                    '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Delete</a>'+
                                '</td>'+
                            '</tr>';
                        }
                        $('#showdata').html(html);
                },
                error : function(){
                    alert('Could Not Fetch Data From Database');
                }
            });
        }

        $('#save_btn').click(function(){
            var student_name = $('#student_name').val();
            var school_name = $('#school_name').val();
            var age = $('#student_age').val();

            if(student_name != '' && school_name != '' && age != ''){
                    $.ajax({
                        type : 'ajax',
                        method : 'post',
                        url : '<?php echo base_url()?>student/addStudent',                     
                        data : {student_name:student_name,school_name:school_name,age:age},
                        async : false,
                        dataType : 'json',
                        success : function(){
                            $('#student_form')[0].reset();
                            $('#alert_success').html('Student added Successfully').fadeIn().delay(4000).fadeOut('slow');
                            showStudents();
                        },
                        error : function(){
                            alert('Could not submit data');
                        }
                    });
            } else{
                alert('Please fill all the fields');
            }
        });

        $('#showdata').on('click','.item-edit',function(){
            var student_id = $(this).attr('data');
            $('#edit_modal').modal('show');
            $.ajax({
                type : 'ajax',
                method : 'get',
                url : '<?php echo base_url()?>student/editStudent',
                data : {student_id:student_id},
                dataType : 'json',
                async : false,
                success : function(data){
                    $('#stud_name').val(data.full_name);
                    $('#schl_name').val(data.school_name);
                    $('#stud_age').val(data.age);
                    $('#student_id').val(data.id);
                },
                error : function(){
                    alert('Could not Load Data');
                }
            });
        });

        $('#btn_edit').click(function(){
            var student_name = $('#stud_name').val();
            var school_name = $('#schl_name').val();
            var age = $('#stud_age').val();
            var id = $('#student_id').val();
            if(student_name != '' && school_name != '' && age != '' && age != ''){
                $.ajax({
                type : 'ajax',
                method : 'post',
                url : '<?php echo base_url()?>student/updateStudent',
                data : {student_name:student_name,school_name:school_name,age:age,id:id},
                dataType : 'json',
                async : false,
                success : function(response){
                    $('#edit_modal').modal('hide');
                    $('#edit_form')[0].reset();
                    $('#alert_success').html('Student Updated Successfully').fadeIn().delay(4000).fadeOut('slow');
                    showStudents();
                },
                error : function(){
                    alert('Could not Load Data');
                }
            });
            } else{
                alert('Could not update data');
            }

        });

        $('#showdata').on('click','.item-delete',function(){

            var id = $(this).attr('data');
            $('#delete_modal').modal('show');
            $('#btn_delete').unbind().click(function(){
                $.ajax({
                    type : 'ajax',
                    method : 'get',
                    url : '<?php echo  base_url();?>student/deleteStudent',
                    async : false,
                    data : {id:id},
                    dataType : 'json',
                    success : function(response){
                        if(response.success){
                                $('#delete_modal').modal('hide');
                                $('#alert_success').html('Student Deleted Successfully').fadeIn().delay(4000).fadeOut('slow');
                                showStudents(); 
                            }else{
                                alert('Error');
                            }
                    },
                    error : function(){
                        alert('Failed to delete this student');
                    }
                });
            });
        });
    });
</script>