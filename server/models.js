var db = require('./conn');

var Model={
	// getAllCard:function(callback){
	// 	return db.query("Select * from sinhvien",callback);
	// },
	// getCardById:function(id,callback){
	// 	return db.query("select * from sinhvien where Id=?",[id],callback);
	// },
	// addCard:function(sinhvien,callback){
	// 	return db.query("Insert into sinhvien(name,class,dob) values(?,?,?)",[sinhvien.name,sinhvien.class,sinhvien.dob],callback);
	// },
	// deleteCard:function(id,callback){
	// 	return db.query("delete from sinhvien where Id=?",[id],callback);
	// },
	// updateCard:function(id,sinhvien,callback){
	// 	return db.query("update sinhvien set name=?,class=?,dob=? where Id=?",[sinhvien.name,sinhvien.class,sinhvien.dob,id],callback);
	// }
	getAllCard:function(callback){
		return db.query("SELECT * FROM card",callback);
	},
	getCardById:function(id,callback){
		return db.query("SELECT * FROM card WHERE idCard=? OR identification=?",[id,id],callback);
	}
};
 module.exports=Model;
