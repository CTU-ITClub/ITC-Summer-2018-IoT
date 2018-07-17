var db = require('./conn');

var Model = {
	getAllCard:function(callback){
		return db.query("SELECT * FROM card",callback);
	},
	getCardById:function(id,callback){
		return db.query("SELECT * FROM card WHERE idCard=? OR identification=?",[id,id],callback);
	}
};
 module.exports=Model;
