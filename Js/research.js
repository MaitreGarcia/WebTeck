$(document).ready(function()
{
	$(".groupe").click(function()
	{
		var id = $(this).attr('id');
		$('.'+id).toggle();
	});
});