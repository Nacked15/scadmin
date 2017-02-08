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
					$('#teacher').val(id);
					$('#editname').val(res[0].name);
					$('#editsurname').val(res[0].surname);
					$('#editemail').val(res[0].email);
					$('#editphone').val(res[0].phone);
			    }
			});//->End Ajax
		});
	},

	deleteTeacher: function(){
		$('.btnDeleteTeacher').click(function(){
			var teacher = $(this).attr('id');
			$('#deleteTeacher').modal({show: 'false'}); 
			$('#deleteteacher').val(teacher);
		});
	}
};

Teachers.initialize();
