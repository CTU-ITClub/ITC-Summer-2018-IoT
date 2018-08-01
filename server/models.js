var db = require('./db');

var Model = {
	getAllCard:function(callback){
		return db.query("SELECT * FROM card",callback);
	},
	getCardById:function(id,callback){
		return db.query("SELECT * FROM card WHERE idCard=? OR identification=?",[id,id],callback);
	},
	checkIdentification:function(id,callback){
		return db.query("SELECT * FROM rfid WHERE idCard=? OR identification=?",[id,id],callback);
	}
};
 module.exports=Model;
