(function($){
	$(document).ready(function() {
		$.each($('td[data-head="Date de soumission"]'),function(){
		var dateVal = $(this).text().split(' ');
		console.log(dateVal);
		var jourVal = dateVal[0].split('-');
		var jourSoumission = "Le "+jourVal[2]+"/"+jourVal[1]+"/"+jourVal[0];
		var heureVal = dateVal[1].split(':');
		var heureSoumission = "à "+heureVal[0]+"H"+heureVal[1];
		$(this).html(jourSoumission +'<br/>' + heureSoumission);
		});


		$('#cf7d-modal-form-edit-value').prepend('<p class="mailButton"></p>');
		$('#backLink').click(function(){history.go(-1)});
		var url1      = window.location.href;
		var urltab = url1.split('cf7_id=');
		console.log(urltab[1]);
		 $('a.cf7d-edit-value').click(function() {
		 	setTimeout(function(){
		 		var mailVal = $('input.field-Email').val();
		 		var nomVal = $('input.field-Nom').val();
		 		var metierVal = $('input.field-Metierdemand').val();
		 		var civiliteVal = $('textarea.field-radio-159').val();
		 		var recu;
		 		if(civiliteVal ==="Madame"){
		 			recu = "reçue";
		 		}
		 		else{
		 			recu = "reçu";
		 		}
		 		var nba = $('#cf7d-modal-form-edit-value p.mailButton a').length;
		 		if(nba <= 0){
		 			if (urltab[1] === "393"){
			 			$('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-refus.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&urlid=393">Refus définitif</a>');
			 			$('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-vivier.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&urlid=393">Mise en vivier</a>');	
			 			$('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-refus-suite-rdv.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&urlid=393">Refus suite RDV Web transition</a>');	
			 			$('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-refus-suite-rdv-client.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&urlid=393">Refus suite RDV client</a>');
			 			$('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-entretien.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&recu='+recu+'&urlid=393">Confirmation d\'entretien</a>');
                                                $('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-refus-stage.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&urlid=393">Refus de stage</a>');
                                                $('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-attente.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&urlid=393">En attente</a>');
			 		}else if(urltab[1] === "420"){
		 				$('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-refus-spontane.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&urlid=420">Refus définitif</a>');
			 			$('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-vivier-spontane.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&urlid=420">Mise en vivier</a>');	
			 			$('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-refus-suite-rdv.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&urlid=420">Refus suite RDV Web transition</a>');	
			 			$('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-refus-suite-rdv-client.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&urlid=420">Refus suite RDV client</a>');
			 			$('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-entretien.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&recu='+recu+'&urlid=420">Confirmation d\'entretien</a>');	
                                                $('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-refus-stage.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&urlid=393">Refus de stage</a>');
                                                $('#cf7d-modal-form-edit-value p').append('<a href="../../wp-admin/admin-form-attente-spontane.php?email='+mailVal+'&nom='+nomVal+'&metier='+metierVal+'&civilite='+civiliteVal+'&urlid=393">En attente</a>');
		 			}

		 			
		 		}
		 		$('#cf7d-modal-form-edit-value p a').wrapInner('<span class="verticalAlign contenu">').append('<span class="verticalAlign">&nbsp;</span>')
		 		$('textarea.field-Etatdelacandidature').parents('li').addClass('etatCandidature');
		 		var etatActuel = $('textarea.field-Etatdelacandidature').val();
				if($('select#selectAjoute').length<=0){
					$('li.etatCandidature').prepend('<select id="selectAjoute" name="field[Etatdelacandidature]" rows="3" cols="20"><option value="-">-</option><option value="Non traité">Non traité</option><option value="A rappeler">A rappeler</option><option value="Refus définitif">Refus définitif</option><option value="Mise en vivier">Mise en vivier</option><option value="Refus suite RDV WT">Refus suite RDV WT</option><option value="Refus suite RDV client">Refus suite RDV client</option><option value="Entretien confirmé">Entretien confirmé</option></select>');
					
				}
		 		$('textarea.field-Etatdelacandidature').hide();
	 			$('#selectAjoute').change(function(){
		 			var candVal = $('#selectAjoute').val();
		 			$('textarea.field-Etatdelacandidature').val(candVal);
		 		});
		 		
		 	},2000);
			
			});
		 var tdSuivi = $('td[data-head="Suivi candidature"]');
		 tdSuivi.each(function(){
			 if($(this).html()==="A rappeler"){
			 	$(this).css('color','#990000');
			 }
		 });
		 
		 $('#nbNouveaux').change(function(){

		 	var nbNouveaux = parseInt($(this).val());
		 	console.log(nbNouveaux);
		 	if(nbNouveaux> 0){
		 		$('#ensembleArrivants').empty();
		 		for(i=1;i<nbNouveaux+1;i++){

		 			$('#ensembleArrivants').append('<div class="ensembleArrivant'+i+'"><label for="linkImgArrivant'+i+'">url/source de la photo de l\'arrivant n°'+i+'</label><input type="text" name="linkImgArrivant'+i+'" /><label for="prenomArrivant'+i+'">Prénom de l\'arrivant n°'+i+'</label><input type="text" name="prenomArrivant'+i+'" /><label for="posteArrivant'+i+'">Poste de l\'arrivant n°'+i+'</label><input type="text" name="posteArrivant'+i+'" /></div>');

		 		}
		 	}else{
		 		$('#ensembleArrivants').empty();
		 	}
		 })

	});
})(jQuery);
