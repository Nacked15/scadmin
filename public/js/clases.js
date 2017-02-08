var Clases = {
	initialize: function() {
		console.log('Clases Initialize');
		this.getCoursesData();
		this.getlevelInfo();
		this.deleteLevel();
		this.newClass();
		this.addTeacher();
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
	},


	//LEVELS SECTION
	getlevelInfo: function(){
		$('.btnEditLevel').click(function() {
			var id = $(this).attr('id');
			
			$.ajax({
				synch:'true',
				url: 'level/'+id,
				type: 'GET',
				success: function(a){
					console.log(a);
					var res = JSON.parse(a);
					$('#numlevel').val(id);
					$('#editlevel').val(res.level);
					$('#editdescription').val(res.description);
					$('#editLevel').modal({show: 'true'});
			    }
			}); //End Ajax

			
		});
	},

	deleteLevel: function(){
		$('.btnDeleteLevel').click(function(){
			var id 	  = $(this).attr('id')
				level = $(this).attr('data-level');
			$('#idLevel').val(id);
			$('#nivel').text(level);
			$('#deleteLevel').modal({show: 'true'});
		});
	},


	//CLASSES SECTION
	newClass: function(){
		$('#newClasse').click(function() {
			$('#newClass').modal({show: 'false'});
		});

		$('#dateInit').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            startDate: 'today',
            todayHighlight: true,
            language: 'es'
        });
        $('#dateEnd').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            startDate: 'today',
            todayHighlight: true,
            language: 'es'
        });
	},

	addTeacher: function(){
		$('.addTeacher').click(function(){
			var clase = $(this).attr('id');
			$('#clase_id').val(clase);
			$('#setTeacher').modal({show: 'true'});
		});
	},
};

Clases.initialize();