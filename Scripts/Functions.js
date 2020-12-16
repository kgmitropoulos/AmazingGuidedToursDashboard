/*Functio for redirection at tour edit*/
function editTour(TourId){
		var confirmed = confirm("Are you sure that you want to edit this tour;");
		if (confirmed == true){
			var str="./EditGuidedTour.php?ToursId="+TourId;
			window.location=str;
		}
}
/*Συνάρτηση για redirection στη διαγραφή άρθρου και από σελίδα άρθρου*/
function deleteTour(TourId){
    var confirmed = confirm("Are you sure that you want to delete this tour;");
		if (confirmed == true){
			var str="Scripts/DeleteGuidedTour.php?ToursId="+TourId;
			window.location=str;
		}
}