             // $(document).ready(function () {
             //     $('#sidebarCollapse').on('click', function () {
             //         $('#sidebar').toggleClass('active');
             //         $(this).toggleClass('active');
             //     });
             // });
         

              $(function(){

			    $('#sidebar li').click(function(){ 
			      $(this).addClass('active').siblings().removeClass('active');
			    }); 
			  })
			var $myGroup = $('#sidebar li');
				$myGroup.on('show.bs.collapse','.collapse', function() {
			    $myGroup.find('.collapse.in').collapse('hide');
			});         
