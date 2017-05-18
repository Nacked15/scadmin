
var Teachers = {
	initialize: function() {
		console.log('Teachers Initialize');
		this.getTeacherData();
		this.deleteTeacher();
	},

	getTeacherData: function () {
		$('.btnUpdateTeacher').click(function(){
			var id = $(this).attr('id');
			console.log('id: '+id);
			$.ajax({
				synch:'true',
				url: 'teacher/'+id,
				type: 'GET',
				success: function(a){
					var res = JSON.parse(a);
					var path = $('#path').val();
					$('#teacher_picture').attr('src', path+'/'+res[0].avatar);
					$('#teacher').    val(id);
					$('#id_pic').     val(res[0].avatar);
					$('#editname').   val(res[0].name);
					$('#editsurname').val(res[0].surname);
					$('#editemail').  val(res[0].email);
					$('#editphone').  val(res[0].phone);
			    }
			});//->End Ajax
		});
	},

	deleteTeacher: function(){
		$('.btnDeleteTeacher').click(function(){
			var id = $(this).attr('id');
			var teacher = $(this).attr('data-teacher');
			$('#deleteTeacher').modal({show: 'false'}); 
			$('#deleteteacher').val(id);
			$('#maestro').text(teacher.toUpperCase());
		});
	}
};

Teachers.initialize();
