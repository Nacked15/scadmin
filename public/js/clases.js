var Clases = {
	initialize: function() {
		console.log('Clases Initialize');
		this.getCoursesData();
	},

	getCoursesData: function () {
		$('.btnUpdateCourse').click(function(){
			console.log('id: '+$(this).attr('id'));
			$.ajax({
				synch:'true',
				//data: {curso: },
				url: 'course/'+$(this).attr('id'),
				type: 'GET',
				success: function(a){
					var res = JSON.parse(a);
					$('#numcurso').val(res.id);
					$('#curso').val(res.name);
					$('#descripcion').val(res.description);

			    }
			});
		});
	}
};

Clases.initialize();