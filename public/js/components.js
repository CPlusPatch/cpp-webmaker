window.snackbar = async (content, color = "gray-800") => {
	$("main").append($("<div></div>").addClass(`snackbar fixed z-50 px-4 py-2 text-white bg-${color} rounded-md bottom-7 left-5 transition ease-out duration-200 transform opacity-0 scale-95`).text(content));
	await new Promise(r => setTimeout(r, 200));
	$(".snackbar").removeClass("opacity-0 scale-95").addClass("opacity-100 scale-100");
	await new Promise(r => setTimeout(r, 4000));
	$(".snackbar").removeClass("ease-out duration-200").addClass("ease-in duration-75");
	await new Promise(r => setTimeout(r, 75));
	$(".snackbar").removeClass("opacity-100 scale-100").addClass("opacity-0 scale-95");
}