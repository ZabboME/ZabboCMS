/**
 *
 * Initializes a new instance of the User. 
 * @constructor
 * @property {Function} User.
 */ 
function User(id, name, figure) {
	this.id = id;
	this.name = name;
	this.figure = figure;
	this.chatMgr = null; 
};

/**
 *
 * Gets the id of the user.
 *
 * @property {Function} getId.
 * @return {Integer} id.
 */
User.prototype.getId = function() {
	return this.id;	
}

/**
 *
 * Gets the name of the user.
 *
 * @property {Function} getId.
 * @return {String} name.
 */
User.prototype.getName = function() {
	return this.name;
}
