var express = require('express');
var router = express.Router();
var Model = require('./models');
router.get('/:id?',function(req,res,next){
    if(req.params.id){
        Model.getCardById(req.params.id,function(err,rows){
            if(err){
                res.json(err);
            }
            else{
              if(rows.length > 0){
                res.json(rows);
              }
              else{
                res.json({'message':'Card not found!'});
              }
            }
        });
    }else{
        Model.getAllCard(function(err,rows){
            if(err){
                res.json(err);
            } else {
              if(rows.length > 0){
                res.json(rows);
              }
              else{
                res.json({'message':'Card not found!'});
              }
            }
        });
    }
});

router.post('/req',function(req,res,next){
  var received = req.body;
  var value = String(received.idCard);

  if(received){
    console.log('Received!');
  }

  if(value.length === 7) {
    idCard = '000' + received.idCard;
  } else if(received.idCard.length === 10){
    idCard = received.idCard;
  } else {
    idCard = null;
  }

  Model.getCardById(idCard,function(err,rows){
    if(err){
      res.json(err);
    } else{
      if(rows.length > 0){
        endUser = rows[0]['identification'];
        var string = '{"idCard":"' + received.idCard + '","endUser":"' + endUser + '"}';
        data = JSON.parse(string);
        res.json(data);
        console.log("Card " + data.idCard + " of " + data.endUser);
      }
    }
  });
});
module.exports=router;
