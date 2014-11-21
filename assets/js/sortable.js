/**
 * initializeSorting()
 *
 * This sets up our list to interact with html5sortable. It is called
 * on page load, and after the list is refreshed.
 */
function initializeSorting() {

	// Disable our toolbar buttons
	$("[data-control='toolbar']").find('button').prop('disabled', true);

	// Add a sortable class to our table so our css can easily distinguish
	// sortable / non-sortable lists.
	$('#Lists').addClass('html5sortable');

	// Add a "disabled" class to rows that should not be sorted
	$('#Lists tr:has(.disabled)').addClass('disabled');

	// Initialize HTML5Sortable on our tbody
	$('#Lists tbody').html5sortable({
		forcePlaceholderSize: true,
		items: ':not(.disabled)'
	});

	// Callback function for when sorting is completed
	$('#Lists tbody').sortable().bind('sortupdate', function() {

		// Trigger the update button
		$('#updatePosition').prop("disabled", false);

		// Remove the "display: block" that gets added to our rows
		$('#Lists tbody tr').css('display', '');

	});
}

$(function() {
	initializeSorting();
});