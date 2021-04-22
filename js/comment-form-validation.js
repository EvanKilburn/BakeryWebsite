/******************************************************************************/
/* Constants */
/******************************************************************************/
const DB_FORM = "db-comment-form";
const DB_TEXT = "comment-text";
const DB_NAME = "commenter-name";
const DB_BUTTON = "db-button";
const DB_BUTTON_DIV = "db-button";
const BUTTON_HIDE = "hide-button";

/******************************************************************************/
/* Form Validation */
/******************************************************************************/
function validateComment() {
	let commentMessageElement = document.getElementById(DB_TEXT);
	commentMessageText = commentMessageElement.value;
	commentMessageText = commentMessageText.trim()
	if (commentMessageText.length === 0) {
		return false;	
	}
	else{
		return true;
	}
}


/******************************************************************************/
/* Registering Event Handlers */
/******************************************************************************/
function attachHandlers() {
	let formElement = document.getElementById(DB_FORM);
	let submitButton = document.getElementById(DB_BUTTON);
	let commentMessageElement = document.getElementById(DB_TEXT);
	let commentMessageName = document.getElementById(DB_NAME);
	if (commentMessageElement) {
		commentMessageElement.addEventListener("keyup", function(event) {
			if (validateComment()){
				submitButton.disabled = false;
				submitButton.classList.remove(BUTTON_HIDE);
			}
			else{
				submitButton.disabled = true;
				submitButton.classList.add(BUTTON_HIDE);
			}
		});
	}
	
	if (formElement) {
		formElement.addEventListener("submit", function(event) {
			if (! validateComment()) {
				event.preventDefault();
			}
			else{
				//pop up window
				if (commentMessageName.value.trim().length === 0) {
					var r = confirm("Are you sure you want to post your comment anonymously?");
  					if (r == false) {
    					event.preventDefault();
    				}
				}
			}
		});
	}
}
window.addEventListener("load", attachHandlers, false);
