function dropDownNav()
{
    showDropDown("nav_dropdown");
}

function showDropDown(element_id)
{
	var ID = document.getElementById(element_id);
	if (ID.className.indexOf("visible") == -1)
	{
		ID.className += " visible";
	}
	else
	{
		ID.className = ID.className.replace(" visible", "");
	}
}

document.addEventListener('click', function(event)
{
	var IDIcon = document.getElementById("nav_dropdown_icon");
	var ID = document.getElementById("nav_dropdown");

	var isClickInside = IDIcon.contains(event.target);

	if (!isClickInside)
	{
		if (ID.className.indexOf("visible") >= 0)
		{
			ID.className = ID.className.replace(" visible", "");
		}
		console.log("click is outside");

	}
	else
	{
		console.log("click is inside");
	}
});
