#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include <RDM6300.h>
#include <ArduinoJson.h>

#define ssid  "PKOVER_Wifi"
#define pass  "01678911202"

#define RFID_RX_PIN 4  //RFID Reader Pin 4
#define RFID_TX_PIN 1
#define coi 1         //coi
#define greenled 16    // Den Xanh
#define redled 7      // Den Do

int tag;
char chuoi[11];

RDM6300 RFID(RFID_RX_PIN, RFID_TX_PIN);


StaticJsonBuffer<256> obj;
JsonObject& datasv = obj.createObject();

void beep(){
  digitalWrite(coi, HIGH);
  delay(200);
  digitalWrite(coi, LOW);
  delay(200);
  digitalWrite(coi, HIGH);
  delay(200);
  digitalWrite(coi, LOW);
}

void thanhcong(){
  digitalWrite(greenled, HIGH);
  delay(200);
  digitalWrite(greenled, LOW);
  delay(200);
  digitalWrite(greenled, HIGH);
  delay(200);
  digitalWrite(greenled, LOW);
}

void thatbai(){
  digitalWrite(redled, HIGH);
  delay(200);
  digitalWrite(redled, LOW);
  delay(200);
  digitalWrite(redled, HIGH);
  delay(200);
  digitalWrite(redled, LOW);
}
 
void setup() {
 
  Serial.begin(115200);                                  //Serial connection
  WiFi.begin(ssid, pass);   //WiFi connection
 
  while (WiFi.status() != WL_CONNECTED) {  //Wait for the WiFI connection completion
    delay(500);
    Serial.println("Dang ket noi");
 
  }
 Serial.println(WiFi.localIP());
 Serial.println("WIFI Connected");
}
 
void loop() {
  if(RFID.isIdAvailable()) {
   tag = RFID.readId();
   sprintf(chuoi, "%d", tag);
   datasv["idCard"]= int (tag);
   datasv["DeviceID"] = ("Client01");
 
   char JSONmessageBuffer[300];
    datasv.prettyPrintTo(JSONmessageBuffer, sizeof(JSONmessageBuffer));
    Serial.println(JSONmessageBuffer);
    HTTPClient http;    //Declare object of class HTTPClient
    
    http.begin("http://192.168.43.178:10110/card/req");      //Specify request destination
    http.addHeader("Content-Type", "application/json");  //Specify content-type header
    int httpCode = http.POST(JSONmessageBuffer);   //Send the request
    String payload = http.getString();   
   
   Serial.println(httpCode);   //Print HTTP return code
   Serial.println(payload);    //Print request response payload
   
   http.end();  //Close connection
   thanhcong();
   Serial.println("Thanh cong");
  }

}


