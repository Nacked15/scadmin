var Task = {
	initialize: function(){
		console.log('Task Initialize');
		this.getTaskById();
		this.deleteTask();
	},

	getTaskById: function(){
		$('.btnEdit').click(function(){
			var idTask = $(this).attr('id');
			$.ajax({
				synch:'true',
				// data: {task: idTask },
				url: 'task/'+idTask,
				type: 'GET',
				success: function(a){
					console.log(a);
					var res = JSON.parse(a);
					$('#edittasknum').val(res.id);
					$('#edittask').val(res.task);
					$('#editdatetodo').val(res.date_todo);
					$('#editpriority').val(res.priority);

					$('#editdatetodo').datepicker({
			            format: "yyyy-mm-dd",
			            autoclose: true,
			            startDate: 'today',
			        });
			    }
			}); //End Ajax
		});
	},

	deleteTask: function() {
		$('.btnDelete').click(function(){
			var id = $(this).attr('id');
			$('#deletetasknum').val(id);
		});
	},
};

Task.initialize();