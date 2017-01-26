var Teachers = {
	initialize: function() {
		console.log('Teachers Initialize');
		this.getTeacherData();
	},

	getTeacherData: function () {
		$('.btnUpdateTeacher').click(function(){
			var id = $(this).attr('id')
			console.log('id: '+id);
			$.ajax({
				synch:'true',
				url: 'teacher/'+id,
				type: 'GET',
				success: function(a){
					var res = JSON.parse(a);
					$('#teacher').val(res.id);
					$('#editname').val(res.name);
					$('#editsurname').val(res.surname);
					$('#editemail').val(res.email);
					$('#editphone').val(res.phone);
			    }
			});//->End Ajax
		});
	}
};

Teachers.initialize();
