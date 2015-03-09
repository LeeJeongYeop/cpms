
		var cadi=false;
		var cadiw=false;
		var cadib=false;
		var cadie=false;
		$(document).ready(function(){
			$('#cadi,#cadiw,#cadib,#cadie').hide();
		
			var middle=(screen.width-$('#login').outerWidth())/2;
			$('#login,#logo').css("left",middle+"px");
			var fMiddle=(screen.width-$('#footer').outerWidth())/2;
			$('#footer').css("left",fMiddle+"px");
			$('#header').css("min-width",screen.width+"px");

			$('body').click(function(event){
				
				if(event.target==this){

					$('#cadi,#cadiw,#cadib,#cadie').hide();
				
					$('#cadiLogo,#cadiwLogo,#cadibLogo,#cadieLogo').show();
				
					cadi=false;
					cadiw=false;
					cadib=false;
					cadie=false;
					
				}
			
			})
			


		})
		function mOver(target){

			$('#'+target).show();
			$('#'+target+'Logo').hide();
		}
		function mOut(target){

			if((target=='cadi') && cadi){

				return;
			}
			else if((target=='cadiw') && cadiw){
				
				return;
			}
			if((target=='cadib') && cadib){
				
				return;
			}
			if((target=='cadie') && cadie){

				return;
			}
			else{
				$('#'+target).hide();
				$('#'+target+'Logo').show();
				
			}
			

		}
		
		function fixed(target){
			cadi=false;
			cadiw=false;
			cadib=false;
			cadie=false;
			if(target=='cadi'){
				$('#cadiw,#cadib,#cadie').hide();
				$('#cadiwLogo,#cadibLogo,#cadieLogo').show();
				
				cadi=true;
			}
			else if(target=='cadiw'){
				$('#cadi,#cadib,#cadie').hide();
				$('#cadiLogo,#cadibLogo,#cadieLogo').show();
				
				cadiw=true;
			}
			else if(target=='cadib'){
				$('#cadi,#cadiw,#cadie').hide();
				$('#cadiLogo,#cadiwLogo,#cadieLogo').show();
				
				cadib=true;
			}
			else{
				$('#cadi,#cadiw,#cadib').hide();
				$('#cadiLogo,#cadiwLogo,#cadibLogo').show();
				
				cadie=true;
			}



		}
