var Students = {
	initialize: function() {
		console.log('Students Initialize');
		this.saveTutorData();
		this.validator();
		this.saveStudentData();
	},

	saveTutorData: function(){
		let that = this;
		$('#saveTutor').click(function(){
			$.ajax({
				synch:'true',
				data: $('#newTutor').serialize(),
				url: 'newTutor',
				type: 'POST',
				success: function(a){
					console.log(a);
					if (parseInt(a) === 1) {
						$('.tutortab').addClass('hide');
						$('#studenttab').addClass('active');
						$('#student').addClass('active');
					}
			    }
			}); //End Ajax
		});	
	},

	validator: function(){

		$('#yes').click(function() {
			console.log('test');
		});
	},

	saveStudentData: function() {
		$.ajax({
			synch:'true',
			url: 'getAddress',
			type: 'GET',
			success: function(a){
				var res = JSON.parse(a);
				$('#streetst'). val(res[0].street);
				$('#numberst'). val(res[0].number);
				$('#betweenst').val(res[0].between);
				$('#colonyst'). val(res[0].colony);
		    }
		}); //End Ajax
		$('#saveStudent').click(function(event){
			event.preventDefault();
			$.ajax({
				synch:'true',
				data: $('#newStudent').serialize(),
				url: 'newStudent',
				type: 'POST',
				success: function(a){
					console.log(a);
					if (parseInt(a) === 1) {
						$('.tutortab').addClass('hide');
						$('.studenttab').addClass('hide');
						$('#studenttab').addClass('active');
						$('#student').addClass('active');
					}
			    }
			}); //End Ajax
		});
	}
};

Students.initialize();