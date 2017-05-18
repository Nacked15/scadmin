var Students = {
	initialize: function() {
		console.log('Students Initialize');
		this.paginator();
		// this.saveStudentData();
		this.actions();
		this.getLevelsByCourse();
		this.saveDataNewStudent();
	},

	actions: function(){
		$('#sikness').hide();
		$('#prevcourse').hide();
		
		$('input[name=issickness]').click(function(){
			var dato = $(this).val();
			if (dato === 'Si') {
				$('#sikness').show();
			}else {
				$('#sikness').hide();
			}
		});

		$('input[name=isprevcourse]').click(function(){
			var dato = $(this).val();
			if (dato === 'Si') {
				$('#prevcourse').show();
			}else {
				$('#prevcourse').hide();
			}
		});

		$('#birthdate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
        });

        $('#dateinitstudent').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
        });

        $('#street').keyup(function(){
        	var calle = $(this).val();
        	$('#streetst').val(calle);
        });
        $('#number').keyup(function(){
        	var numero = $(this).val();
        	$('#numberst').val(numero);
        });
        $('#between').keyup(function(){
        	var entre = $(this).val();
        	$('#betweenst').val(entre);
        });
        $('#colony').keyup(function(){
        	var colonia = $(this).val();
        	$('#colonyst').val(colonia);
        });
	},

	getLevelsByCourse: function(){
		let that = this;
		$('#course').change(function(){
			var curso = $(this).val();
			$.ajax({
				synch:'true',
				url: 'getLevels/'+curso,
				type: 'GET',
				success: function(data){
					console.log(data);
					var info = JSON.parse(data);
					var opt = '<option value="">Seleccione..</option>';
					for (var i = 0; i < info.length; i++) {
						var id = info[i].id, name = info[i].level;
						opt = opt + '<option value="'+id+'">'+name+'</option>';
					}
					$('#level').html(opt);
			    }
			}); //End Ajax
		});	
	},

	saveDataNewStudent: function(){
		let that = this;
		$('#saveAllData').click(function(){
			$.ajax({
				synch:'true',
				data: $('#newTutor').serialize(),
				url: 'newTutor',
				type: 'POST',
				success: function(data){
					if (data === '1') {
						that.saveStudentData();
					}
			    }
			}); //End Ajax
		});	
	},



	paginator: function(){

		$('.next').click(function() {
			var idprev = $(this).attr('data-tab');

			if (idprev != '3') {
				idnext = parseInt(idprev)+1;
				$('#tab-'+idprev).removeClass('active');
				$('#tab-'+idnext).addClass('active');
				$('#content-'+idprev).removeClass('active');
				$('#content-'+idnext).addClass('active');
			}

		});

		$('.before').click(function() {
			var idact = $(this).attr('data-tab');

			if (idact != '1') {
				idbef = parseInt(idact)-1;
				console.log(idact, idbef);
				$('#tab-'+idact).removeClass('active');
				$('#tab-'+idbef).addClass('active');
				$('#content-'+idact).removeClass('active');
				$('#content-'+idbef).addClass('active');
			}

		});
	},

	saveStudentData: function() {
		// $.ajax({
		// 	synch:'true',
		// 	url: 'getAddress',
		// 	type: 'GET',
		// 	success: function(a){
		// 		if (parseInt(a) !== 0) {
		// 			var res = JSON.parse(a);
		// 			$('#streetst'). val(res[0].street);
		// 			$('#numberst'). val(res[0].number);
		// 			$('#betweenst').val(res[0].between);
		// 			$('#colonyst'). val(res[0].colony);
		// 		}
		//     }
		// }); //End Ajax

		$.ajax({
			synch:'true',
			data: $('#newStudent').serialize(),
			url: 'newStudent',
			type: 'POST',
			success: function(a){
				console.log(a);

		    }
		}); //End Ajax

	},

	
};

Students.initialize();