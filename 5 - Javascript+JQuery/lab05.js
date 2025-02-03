/*PROBLEM 1*/
// book club enrollment
function validateForm()
{
	// take in name, address, phone number
	const name = document.getElementById("nameReq").value;
	const address = document.getElementById("addressReq").value;
	let phone = document.getElementById("phoneReq").value;
	
	const namePattern = /^[A-Za-z\s]+$/;
	const phonePattern = /^\([0-9]{3}\)[0-9]{3}\-[0-9]{4}/;
	
	// validate name: only letters
	if (!name.match(namePattern))
	{
		alert("Invalid Name");
		return false;}
	
	// address cannot be empty
	if (address.length == 0) 
	{
		alert("Address Not Found");
		return false;}
	
	// validate phone number: (###)###-####
	if (!phone.match(phonePattern)) 
	{
		alert("Invalid Phone Number");
		return false;}
	
	// transform phone number: ###-###-####
	phone = transformPhone(phone);
	writeToPageForm(name,address,phone);
}

// transform phone number: ###-###-####
function transformPhone(phoneNumber)
{
	return phoneNumber.slice(1,4)+"-"+phoneNumber.slice(5,);
}

// display name, address and phone number
function writeToPageForm(name,address,phone)
{
	 document.getElementById("writeMessage").innerHTML = 
	 `<h4 class="message">Hello ${name},</h4>
        <p>&#x1f5e3 Thanks for signing up for this week's Yap Session! We can't wait to 
        talk to you about all sorts of irrelevant things. We hope you pay attention
        because we certainly have been thinking a lot about what we have to say...</p>
        <p>&#128195 We have sent an invitation to your address: <b>${address}</b>. In addition 
        to granting you entry into the event, the invitation outlines this 
        weeks line-up of yappers and topics.</p>
        <p>&#128226 If you'd like to register to be a yapper in future line-ups, please 
        contact us via phone or email. If you're approved, we'll give you a call at
        <b>${phone}</b> to notify you.</p>
        <h4 class="message">Happy Yapping and Listening! &#127773</h4>`;
}

/*PROBLEM 2*/
// counts all characters in textarea
function countCharacters() {
	const textInput = document.getElementById("counterInput").value;
	// length of the input
	document.getElementById("countAll").innerHTML = "Characters: " +textInput.length;
}

// counts only letters in textarea
function countLetters() {
	const textInput = document.getElementById("counterInput").value;
	// remove everything that isn't alphabetical, find the length
	const letterCount = textInput.replace(/[^a-zA-Z]/g, '').length;
	document.getElementById("countAlphabet").innerHTML = "Letters: " + letterCount;
}

// event listener to monitor changes to textarea
// did not work without the DOMContentLoaded check
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("counterInput").addEventListener("input", () => {
		// calling out counter functions to display the changes and update the values
        countCharacters();
        countLetters();
    });
});


/*PROBLEM 3*/
// image becomes fullscreen when clicked
function fullScreenImage() {
	// using the id to get the image
    const image = $("#otter");
	
	// listener, animates on click
    image.on("click", function() {
        $(this).animate({
            width: "100%",
            height: "100%",
            position: "fixed"
        }, 800);

		// google materials icon
        const closeIcon = $('<span class="material-symbols-outlined" style="color:#CBD4C2; background-color:#50514F;font-size:40px;">close_fullscreen</span>');
        $("#otter_img").append(closeIcon);
		
		// closing the icon once it's clicked
        closeIcon.on("click", function() {
            image.animate({
                width: "300px",
                height: "auto",
                position: "static"
            }, 500, function() {
                closeIcon.remove();
            });
        });
    });
}

// call function to allow click event
$(document).ready(function() {
    fullScreenImage();
	});
