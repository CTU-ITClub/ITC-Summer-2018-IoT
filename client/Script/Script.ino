#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include <RDM6300.h>
#include <ArduinoJson.h>
#include <LiquidCrystal_I2C.h>


#define ssid  "PKOVER_Wifi"
#define pass  "01678911202"

#define RFID_RX_PIN 4  //RFID Reader Pin 4
#define RFID_TX_PIN 1
#define coi 1         //coi
#define greenled 16    // Den Xanh
#define redled 7      // Den Do

int tag;
char chuoi[11];
LiquidCrystal_I2C lcd(0x3F, 16, 2); // Khai bao LCD

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
  lcd.begin();
  lcd.backlight(); 
  lcd.setCursor(0,0);
  lcd.print("Dang Ket Noi....");
  WiFi.begin(ssid, pass);   //WiFi connection
 
  while (WiFi.status() != WL_CONNECTED) {  //Wait for the WiFI connection completion
    delay(500);
    Serial.println("Dang ket noi");
 
  }
 Serial.println(WiFi.localIP());
 Serial.println("WIFI Connected");
 lcd.setCursor(0,0);
 lcd.print("Da ket noi");
 lcd.setCursor(0,1);
 lcd.print("IP:");
 lcd.setCursor(4,1);
 lcd.print(WiFi.localIP());
 delay(500);
 lcd.clear();
 lcd.setCursor(0,0);
 lcd.print("Da san sang");
 delay(500);
 lcd.clear();
 lcd.setCursor(0,0);
 lcd.print("Moi Quet The");
 lcd.setCursor(0,1);
 lcd.print("Scan your Card");
}
 
void loop() {
  if(RFID.isIdAvailable()) {
   tag = RFID.readId();
   sprintf(chuoi, "%d", tag);
   datasv["idCard"]= int (tag);
//   datasv["DeviceID"] = ("Client01");
 
   char JSONmessageBuffer[300];
    datasv.prettyPrintTo(JSONmessageBuffer, sizeof(JSONmessageBuffer));
    Serial.println(JSONmessageBuffer);
  if(WiFi.status() == WL_CONNECTED){
    HTTPClient http;    //Declare object of class HTTPClient
    
    http.begin("http://dl.hoangthai.me:10110/card/req");      //Specify request destination
    http.addHeader("Content-Type", "application/json");  //Specify content-type header
    int httpCode = http.POST(JSONmessageBuffer);   //Send the request
    String payload = http.getString();   
   
   Serial.println(httpCode);   //Print HTTP return code
   Serial.println(payload);    //Print request response payload
   
   http.end();  //Close connection
   thanhcong();
   Serial.println("Gui du lieu len may chu thanh cong");
  }
  else  
  thatbai();
  Serial.println("Gui du lieu len may chu that bai");
  
   }
}


