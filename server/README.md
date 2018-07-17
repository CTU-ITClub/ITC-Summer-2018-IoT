# server
Server for attendance

# Query
## Get All Card
* SELECT * FROM card;

## Get Card By Id
* SELECT * FROM card WHERE idCard='card' OR identification='card';

## Example
### Requiment: User B1400731 need attendance
### URI: http://ipaddress:10110/card/req
### Client: Postman
### JSON Request:
* {"idCard": "0001843075"}
### JSON Response:
* {
    "idCard": "0001843075",
    "endUser": "Wallet"
}
### Commanpromt Response:
* E:\Ampps\www\itc\server>node server.js
* Server listening on port 10110
* Connected!
* Received!
* Card 4624308 of B1400731

# References
* Client POSTMAN: https://www.getpostman.com/
